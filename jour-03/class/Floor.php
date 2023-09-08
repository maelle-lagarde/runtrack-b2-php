<?php

class Floor {
    private int $id;
    private string $name;
    private int $level;

    public function __construct(
        int $id = 0,
        string $name = "",
        int $level = "",
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        return $this->name;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel(int $level)
    {
        return $this->level;
    }
}

?>