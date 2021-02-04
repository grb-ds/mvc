<?php
class Challenge {

    private $id;
    private $name;
    private $description;
    private $date_open;
    private $date_due;
    private $url;
    private $type;
    private $class_id;

    /**
     * Challenge constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $date_open
     * @param $date_due
     * @param $url
     * @param $type
     * @param $class_id
     */
    public function __construct()
    {
    }

    public static function withData(array $data) {
        $instance = new self();
        foreach ($data as $key => $value) {
            $instance->{$key} = $value;
        }
        return $instance;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDateOpen()
    {
        return $this->date_open;
    }

    /**
     * @param mixed $date_open
     */
    public function setDateOpen($date_open): void
    {
        $this->date_open = $date_open;
    }

    /**
     * @return mixed
     */
    public function getDateDue()
    {
        return $this->date_due;
    }

    /**
     * @param mixed $date_due
     */
    public function setDateDue($date_due): void
    {
        $this->date_due = $date_due;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getClassId()
    {
        return $this->class_id;
    }

    /**
     * @param mixed $class_id
     */
    public function setClassId($class_id): void
    {
        $this->class_id = $class_id;
    }
}