<?php


class Student
{
    private $firstName = 'Underfunded';
    private $lastName = 'Underfunded';
    private $group = 'Underfunded';

    public function __construct($firstName, $lastName, $group)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
    }

    /**
     * @return integer
     */
    public function getScholarship($med)
    {
        return $med === 5 ? 100 : 80;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

}

class Aspirant extends Student
{
    private $scientsWork = "Underfunded";

    public function __construct($firstName, $lastName, $group, $scientsWork)
    {
        parent::__construct($firstName, $lastName, $group);
        $this->scientsWork = $scientsWork;
    }

    /**
     * @return integer
     */
    public function getScholarship($med)
    {
        return $med === 5 ? 200 : 180;
    }
}

$Student = new Aspirant('Ivan', 'Petrov', '2fA', 'New Scotland');
$student2 = new Student('Sergiy', 'vlasenko', '1C');

$arr = [];
array_push($arr, $Student, $student2);

foreach ($arr as $item) {
    echo("Стипендія у " . $item->getFirstName() ." ". "становить: " . $item->getScholarship(random_int(4, 5)) . " гривень" . "\n");
}


