<?php

class Room
{
    public function __construct(private ?int $id =null,
    private ?int $floor_id =null, 
    private ?string $name =null, 
    private ?int $capacity =null)
    {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFloorId()
    {
        return $this->floor_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
}

?>