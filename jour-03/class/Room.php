<?php

class Room {
    private int $id;
    private int $floor_id;
    private string $name;
    private int $capacity;

    public function __construct(
        int $id = 0,
        int $floor_id = 0,
        string $name = "",
        int $capacity = "",
    ) {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        return $this->id;
    }

    public function getFloorId()
    {
        return $this->floor_id;
    }

    public function setFloorId(int $floor_id)
    {
        return $this->floor_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        return $this->name;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity)
    {
        return $this->capacity;
    }
}

?>