<?php

// teacher - student - person

class Person
{
    protected $age;
    protected $name;
    private $favourite_color = 'green';

    public function __construct(int $age, string $name)
    {
        $this->setAge($age - 1);
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
        return $this;
    }
}


class Teacher extends Person
{
    protected $favourite_color = 'black';

    protected $occupation;
    //
    // public function __construct(int $age, string $name, $occupation)
    // {
    //     $this->setAge($age);
    //     $this->name = $name;
    //     $this->occupation = $occupation;
    // }

    public function setAge(int $age)
    {
        if ($age < 20) {
            throw new Exception('Age error');
        }
        return parent::setAge($age);
    }
}

class Student extends Person
{
    public function setAge(int $age)
    {
        if ($age > 30) {
            throw new Exception('Age error');
        }
        return parent::setAge($age);
    }
}

$t = new Teacher(21, 'Ivan');
var_dump($t);