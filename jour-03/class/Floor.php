<?php

class Floor {
    public function __construct(
        private ?int $id = null,
        private ?string $name = null,
        private ?int $level = null
        )
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name; 
    }

    public function getLevel()
    {
        return $this->level;
    }
}