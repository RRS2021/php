<?php

// Наследяване

// Основен клас

class Human {
	
	public $name;
	public $height;
	public $weight;

	// Статични променливи ( свойства )

	static public $eyes;
	
	function printHuman()
	{
		echo $this->eyes ."<br>";
		echo $this->weight ."<br>";
		echo $this->height ."<br>";
	}
}

// Клас, който наследява Human

class Student extends Human {
	
	public $class;
	
	function printHuman()
	{
		echo $this->name ."<br>";
		echo $this->class ."<br>";
		
		// Извикване на метод от основния клас
		
		parent::printHuman();
	}
}

// Примери за създаване на обекти

$student1 = new Student();
$student1->name = "Ivan";
$student1->class = "11-a";
$student1->eyes = "brown";
$student1->weight = 50;
$student1->height = 180;

$student1->printHuman();

// Пример за статично извикване на променлива

Human::$eyes = "black";




?>