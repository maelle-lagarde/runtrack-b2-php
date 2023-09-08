<?php

class Student {
    private int $id;
    private int $grade_id;
    private string $email;
    private string $fullname;
    private DateTime $birthdate;
    private string $gender;

    public function __construct(
        int $id = 0,
        int $grade_id = 0,
        string $email = "",
        string $fullname = "",
        DateTime $birthdate = null,
        string $gender = ""
    ) {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate ?: new DateTime();
        $this->gender = $gender;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId()
    {
        return $this->id;
    }

    public function getGradeId()
    {
        return $this->grade_id;
    }
    
    public function setGradeId()
    {
        return $this->grade_id;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail()
    {
        return $this->email;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname()
    {
        return $this->fullname;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate()
    {
        return $this->birthdate;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender()
    {
        return $this->gender;
    }
}

?>