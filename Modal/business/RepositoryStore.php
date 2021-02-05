<?php

class RepositoryStore {

    private $id;
    private $user_id;
    private $challenge_id;
    private $url;
    private $create_time;

    /**
     * RepositoryStore constructor.
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getChallengeId()
    {
        return $this->challenge_id;
    }

    /**
     * @param mixed $challenge_id
     */
    public function setChallengeId($challenge_id): void
    {
        $this->challenge_id = $challenge_id;
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
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * @param mixed $create_time
     */
    public function setCreateTime($create_time): void
    {
        $this->create_time = $create_time;
    }
}