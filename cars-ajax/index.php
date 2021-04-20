
<?php
include("modules/Car.php");

$car = new Car();
$cars = $car->getCars();

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

<script>

var num = 2;

function doAjax( )
{
	$.ajax({
		url: "http://127.0.0.1/projects/cars/ajax.php?num=" + num,
		type: 'post',
		success: function(data) {
			
			var current = $("#more-ajax").html();
			
			$("#more-ajax").html( current + data );
			
			// document.getElementById("more-ajax").innerHTML( data );
		}
	});

	num += 2;
	
	
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div style="clear:both"></div>

<div id="more-ajax">


</div>

<a onclick="doAjax( );" href="#." style="float:left; padding:10px; border:1px solid #bfbfbf; width:500px; text-align:center;">покажи още</a>



