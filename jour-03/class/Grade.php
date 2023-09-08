<?php

class Grade {
    public function __construct(
        private ?int $id = null,
        private ?int $room_id = null,
        private ?string $name = null,
        private ?DateTime $year = null
        )
    {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoomId()
    {
        return $this->room_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getYear()
    {
        return $this->year;
    }
}