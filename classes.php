<?php

// Дефиниране на клас Cat

class Cat {
	
	// Променливи ( свойства ) на класа
	
	// public променливи на класа
	
	public $name;
	
	// private променливи на класа
	
	private $age;
	private $weight;
	
	// Конструктор
	
	function __construct( $name, $age, $weight )
	{
		$this->name = $name;
		$this->age = $age;
		$this->weight = $weight;
	}
	
	// Деструктор
	
	function __destruct(  )
	{
		echo "Destructor...<br>";
	}

	// Метод, който отпечатва променливите на класа

	function printCat()
	{
		echo $this->name;
		echo "<br>";
		echo $this->age;
		echo "<br>";
		echo $this->weight;
		echo "<br>";
	}
}

// Дефиниране на обекти от класа Cat

$cat1 = new Cat( "Kircho", 2, 500 );
$cat2 = new Cat( "Garfield", 3, 600 );

// Отпечатване на полетата от обектите

$cat1->printCat();
$cat2->printCat();

?>

