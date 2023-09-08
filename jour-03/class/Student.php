<?php

class Student {   
    public function __construct(
        private ?int $id = null,
        private ?int $grade_id = null, 
        private ?string $email = null, 
        private ?string $fullname = null, 
        private ?DateTime $birthdate = null, 
        private ?string $gender = null
        )
    {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGradeId()
    {
        return $this->grade_id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getGender()
    {
        return $this->gender;
    }
}

?>