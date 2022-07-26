<?php

namespace App\Response;

class Response {
    private bool $_success;
    private int $_httpStatusCode;
    private array $_messages = [];
    private array $_data;
    private bool $_toCache = false;
    private array $_responseData = [];

    /**
     * @param string $messages
     */
    public function addMessage(string $messages)
    {
        $this->_messages[] = $messages;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    /**
     * @param bool $toCache
     */
    public function setToCache($toCache)
    {
        $this->_toCache = $toCache;
    }

    /**
     * @param array $responseData
     */
    public function setResponseData($responseData)
    {
        $this->_responseData = $responseData;
    }

    /**
     * @param mixed $httpStatusCode
     */
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->_httpStatusCode = $httpStatusCode;
    }


    /**
     * @param mixed $success
     */
    public function setSuccess($success)
    {
        $this->_success = $success;
    }

    /**
     *
     */
    public function send()
    {
        header('Content-type: application/json;charset=utf-8');

        if($this->_toCache === true) {
            header('Cache-control: max-age=60');
        } else {
            header('Cache-control: no-store');
        }

        if($this->_success !== false && $this->_success !== true) {
            http_response_code(500);
            $this->_responseData['statusCode'] = 500;
            $this->_responseData['success'] = false;
            $this->addMessage('Response creation error');
            $this->_responseData['messages'] = $this->_messages;
        } else {
            $this->_responseData['statusCode'] = $this->_httpStatusCode;
            $this->_responseData['success'] = $this->_success;
            $this->_responseData['messages'] = $this->_messages;
            $this->_responseData['data'] = $this->_data;
        }
        echo json_encode($this->_responseData);
    }

}