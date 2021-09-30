<?php
    include("../db_con/database_con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if (isset($_POST['brandname']))
      {
        $brandname = $_POST['brandname'];
        $brand_code = $_POST['brand_code'];
        $brand_date = $_POST['brand_date'];
        $query = "INSERT INTO brands (bid, brand_name, added_date) VALUES ('$brand_code', '$brandname','$brand_date')";
        $result = mysqli_query($conn, $query);
        if ($result === TRUE) {
          $wrng_pass = "<script> alert('Brand Added.')</script>";
        } 
        else {
          $wrng_pass = "<script> alert('Brand Name exsist.')</script>";
        }
      } 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory System</title>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js" ></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>

	<link rel="stylesheet" href="../css/all.min.css" >
	<link rel="stylesheet" href="../css/bootstrap.min.css" >
 	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <a class="navbar-brand" href="#">Inventory System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../dashboard.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../logout.php"><i class="fa fa-user"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div  id="form_brand" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
          </div>
          <?php 
              if(isset($wrng_pass))
              {
                  echo '<h5 class= "wrng_pass" >' .$wrng_pass. '</h5>' ;
              }
          ?>
          <div class="category-body">
            <form id="brand_form" method="POST">
                <div class="fill_box">
                  <label>Code</label>
                  <input type="text"  name="brand_code" value="<?php echo rand(1000, 9999); ?>" readonly>
                </div>
                <div class="fill_box">
                  <label>Date</label>
                  <input type="text" name="brand_date" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>
                <div class="fill_box">
                  <label>Brand Name</label>
                  <input type="text" name="brandname" id="brandname" placeholder="Enter Brand Name">
                </div>
                <input type="submit" class="btn btn-success" id="add_btn" value="Add">
            </form>
          </div>
        </div>
      </div>
    </div>
<br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
      <div class="col-lg-6 col-md-6">
      <table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
            <th>Date</th>
		        <th>Brand</th>
		      </tr>
		    </thead>
		    <tbody id="get_brand">
				
				<?php
          $query="SELECT * FROM brands WHERE 1 ";
          $result = mysqli_query($conn, $query);
          $i=0;
					while($brand_data= mysqli_fetch_array($result))
                  {
				?>
			<tr>
				<td><?php echo $brand_data['bid'];?></td>
				<td><?php echo $brand_data['added_date'];?></td>
				<td><?php echo $brand_data['brand_name'];?> </td>
			</tr>
				<?php
					$i++;
					}
				?>
		    </tbody>
		</table>
      </div>
  </div>

  </div>

</body>
</html>
