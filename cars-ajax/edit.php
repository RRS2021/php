
<?php

$db = new mysqli("localhost", "root", "", "cars");

$dbBrands = $db->query("SELECT * FROM make");
$dbModels = $db->query("SELECT * FROM model");

if ( $_POST['submit'] ) {
	
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$price = $_POST['price'];
	$year = $_POST['year'];

	$file = $_FILES['picture'];
	$file_name = $_FILES['picture']['name'];
	$file_temp = $_FILES['picture']['tmp_name'];
	$file_type = $_FILES['picture']['type'];
	
	if ( $file['type'] == 'image/jpeg' ) {

		move_uploaded_file( $file_temp, "images/".$file_name );
	}
	
	$result = $db->query("
		INSERT INTO cars SET 
		brand = '$brand',
		model = '$model',
		color = '$color',
		price = '$price',
		year = '$year',
		picture = '$file_name'
	");
	
	if ( $result ) {
		
		$message = "<b style='color:green;'>Success</b>";
		
	} else {
		
		$message = "<b style='color:red;'>Error</b>";
	}

}
	
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<br>

<form action="edit.php" method="post" enctype="multipart/form-data">

<div class="container">
	
	<div class="row">
		<div class="col-6">
			<?= $message ?><br><br>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label>Brand:</label>
				<select name="brand" class="form-control" onchange="changeModel( this.value );">
					<option>- select brand -</option>
<?php
while( $data = $dbBrands->fetch_array() ) {
?>
					<option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
<?php
}
?>
				</select>
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label>Model:</label>
				<select name="model" class="form-control">
					<option>- select model -</option>
<?php
while( $data = $dbModels->fetch_array() ) {
?>
					<option class="model m-<?= $data['make_id'] ?>"><?= $data['title'] ?></option>
<?php
}
?>
				</select>
			</div>
		</div>
	
	</div>

	<div class="row">
	
		<div class="col-6">
			<div class="form-group">
				<label>Color:</label>
				<input type="text" name="color" class="form-control" placeholder="color">
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label>Price:</label>
				<input type="text" name="price" class="form-control" placeholder="price">
			</div>
		</div>
	
	</div>


	<div class="row">
	
		<div class="col-6">
			<div class="form-group">
				<label>Picture:</label>
				
				  <div class="custom-file">
					<input name="picture" type="file" class="custom-file-input" id="customFile">
					<label class="custom-file-label" for="customFile">Choose file</label>
				  </div>
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label>Year:</label>
				<input type="text" name="year" class="form-control" placeholder="Year">
			</div>
		</div>
	
	</div>

	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label>&nbsp;</label>
				<input type="submit" name="submit" class="form-control btn btn-info">
			</div>
		</div>
	</div>

</div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>




<script>
$(".model").hide();

function changeModel( value )
{
	$(".model").hide();
	$(".m-" + value ).show();
	
}

</script>



