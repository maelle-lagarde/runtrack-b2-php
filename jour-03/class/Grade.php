<?php

class Grade {
    private int $id;
    private int $room_id;
    private string $name;
    private DateTime $year;

    public function __construct(
        int $id = 0,
        int $room_id = 0,
        string $name = "",
        DateTime $year = null
    ) {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year ?: new DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        return $this->id;
    }

    public function getRoomId()
    {
        return $this->room_id;
    }

    public function setRoomId(int $room_id)
    {
        return $this->room_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        return $this->name;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear(DateTime $year)
    {
        return $this->year;
    }
}

?>