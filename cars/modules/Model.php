<?php

class Model {
	
	public $id;
	public $brand;
	public $model;
	public $color;
	public $price;
	public $year;
	public $picture;
	public $publish;

	function getCars()
	{
		$result = array();
		
		$db = new mysqli("localhost", "root", "", "cars");

		$query = $db->query("
			SELECT *
			FROM cars
		");

		while( $data = $query->fetch_array() ) {

			$temp = strtotime( $data['publish'] );
			$data['date'] = date( "d.m.Y г.", $temp );
			
			$result[] = $data;
		}
		
		return $result;
	}
	
	function getCar( $id )
	{
		$db = new mysqli("localhost", "root", "", "cars");

		$query = $db->query("
			SELECT *
			FROM cars
			WHERE id = $id
		");

		$data = $query->fetch_array();
		
		$this->id = $data['id'];
		$this->brand = $data['brand'];
		$this->model = $data['model'];
		$this->color = $data['color'];
		$this->price = $data['price'];
		$this->year = $data['year'];
		$this->picture = $data['picture'];
		$this->publish = $data['publish'];
	}
}

?>