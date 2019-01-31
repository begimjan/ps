<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
<div class="bg-light">
	<img src="images/ps.png" style="width:900px; height: 400px;">
	<form action="insert.php" method="POST" enctype="multipart/form-data" >
 		<div class="input-group mb-3">
          	<div class="input-group-prepend">
    			<span class="input-group-text" id="inputGroup-sizing-default">Name</span>
  			</div>
  		<input type="text" name="name" placeholder="имя товара" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
 		
 	<div class="input-group mb-3">
 	     <div class="input-group-prepend">
         	<span class="input-group-text">$</span>
    	 </div>
 	 <input type="text" name="price" placeholder="цена" class="form-control" aria-label="Amount (to the nearest dollar)">
  		<div class="input-group-append">
    		<span class="input-group-text">.00</span>
  		</div>
    </div>

 		<input type="file" class="btn btn-info"name="img" class="w-100">

 		<button class="btn btn-info">
 			добавить
 		</button>
 	</form>
</div>

<?php 
$connect = mysqli_connect('127.0.0.1','root','','begimjan_17_pn');
$result = mysqli_query($connect, "SELECT * FROM store");
for($i = 0; $i<$result->num_rows; $i++){
$res = $result->fetch_assoc();

 ?>

	<div class="container">
  <div class="row">
    <div class="col-3" style=" margin-top: 10px;">
  	<div>
 					<img src="<?php  echo $res['img']?>">
  				</div>
    </div>
    
  </div>
 			
 	 			<span  style="font-size: 25px; margin-top: 10px;" class="badge badge-danger"><?php echo $res["name"] ?></span>
 	 				
 	        

 				 <span style="font-size: 25px; margin-top: 10px;" class="badge badge-danger">
 	 				<?php echo $res["price"] ?>
 	 			</span>
 	 			<form method="POST"  action="delete.php">
 	   				<?php echo '<input type="hidden" name = "id" value="' . $res['id'] . '">';?>
 	   			<button  style="margin-top: 10px;" class="btn btn-info"">
 	   						delete
 	   			</button>
 	 			</form>
 	 <form action="change.php" method="POST" >
 	 		<?php echo '<input type="hidden" name = "id" value="' . $res['id'] . '">';?>
 	 		<?php echo '<input type="hidden" name = "name" value="' . $res['name'] . '">';?>
 	 		<?php echo '<input type="hidden" name = "price" value="' . $res['price'] . '">';?>
 	 		<button style="margin-top: 10px; color: white;"  class="btn btn-warning">
 	 			редактировать
 	 		</button>
 	 </form>
 </div>
	 <?php 
		}
 	 ?>



</body>


</html>
