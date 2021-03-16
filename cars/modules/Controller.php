<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->model = new Model();
		$this->view = new View();
	}
	
	function index()
	{
		$cars = $this->model->getCars();
		
		$params = array(
			"cars" => $cars,
		);
		
		$this->view->render( "index", $params );
	}

	function profile()
	{
		$id = $_GET['id'];

		$this->model->getCar( $id );
		$car = $this->model;
		
		$params = array(
			"car" => $car,
		);
		
		$this->view->render( "profile", $params );
	}

}

?>