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
		
		$danni = array( "cars" => $cars );
		$template = "index";
		
		$this->view->render( $template, $danni );
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