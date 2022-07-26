<?php
namespace App\Models\Tasks;
use App\Exceptions\TaskException;
use App\Validators\Validators;
use JetBrains\PhpStorm\ArrayShape;

class Tasks {
    private string $id;
    private string $tittle;
    private string $description;
    private string $deadline;
    private string $completed;


    /**
     * @throws TaskException
     */
    public function __construct(string $id, string $tittle, string $description, string $completed, string $deadline)
    {
        $this->setCompleted($completed);
        $this->setDeadline($deadline);
        $this->setDescription($description);
        $this->setId($id);
        $this->setTittle($tittle);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @throws TaskException
     */
    public function setId(string $id): void
    {
        if(!$id){
            throw new TaskException('Invalid ID entered');
        }
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTittle(): string
    {
        return $this->tittle;
    }

    /**
     * @param string $tittle
     * @throws TaskException
     */
    public function setTittle(string $tittle): void
    {
        if(!$tittle){
            throw new TaskException('Invalid tittle entered');
        }
        $this->tittle = $tittle;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @throws TaskException
     */
    public function setDescription(string $description): void
    {
        if(!$description){
            throw new TaskException('Invalid description entered');
        }
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDeadline(): string
    {
        return $this->deadline;
    }

    /**
     * @param string $deadline
     * @throws TaskException
     */
    public function setDeadline(string $deadline): void
    {
        if(!(Validators::validateDateInput($deadline))) {
            throw new TaskException('Invalid date entered');
        }

        $this->deadline = $deadline;
    }


    /**
     * @return string
     */
    public function getCompleted(): string
    {
        return $this->completed;
    }

    /**
     * @param string
     * @throws TaskException
     */
    public function setCompleted(string $completed): void
    {
        if($completed !== 'Y' && $completed !== "N") {
            throw new TaskException("Invalid value for completed column");
        }
        $this->completed =  $completed;
    }

    /**
     * @return array
     */
     public function dataAsArray() :array
    {
        return [
            'id' => $this->getId(),
            'tittle' => $this->getTittle(),
            'description' => $this->getDescription(),
            'deadline' => $this->getDeadline(),
            'completed' => $this->getCompleted()
        ];
    }

}