<?php

$num = $_GET['num'];

include("modules/Car.php");

$car = new Car();
$cars = $car->getCars( $num );

foreach( $cars as $data ) {
	
?>

<a href="profile.php?id=<?= $data['id'] ?>">

<div style="float:left; width:350px;">
	<img src="<?= $data['picture'] ?>" width="160" height="120" style="float:left;">
	
	<div style="float:left; margin-left:20px;">
	
	<p style="margin-top:0px; padding-top:0px;">
	<?= $data['brand'] ?> <?= $data['model'] ?>
	</p>

	<p>
	<?= $data['price'] ?> лв.<br>
	<?= $data['year'] ?> г.<br>
	Цвят: <?= $data['color'] ?><br>
	</p>

	<p>
	<?= $data['date'] ?>
	</p>
	
	</div>
 

</div>
</a>

<?php
}
?>


