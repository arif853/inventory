<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Master</title>

    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

	<link rel="stylesheet" href="css/all.min.css" >
	<link rel="stylesheet" href="css/bootstrap.min.css" >
 	<link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php include_once("./templates/header.php"); ?>
	<br/><br/>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="./templates/category.php" class="btn btn-success">Add</a>
						<a href="manage_categories.php" class="btn btn-success">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Brands</h4>
						<p class="card-text">Here you can manage your brand and you add new brand</p>
						<a href="./templates/brand.php" class="btn btn-success">Add</a>
						<a href="manage_brand.php" class="btn btn-success">Manage</a>
					</div>
				</div>
			</div>
            <div class="col-lg-4">
                <div class="card">
						<div class="card-body">
						<h4 class="card-title">Models</h4>
						<p class="card-text">Here you can manage your Item models and you add new model</p>
						<a href="#" class="btn btn-success">Add</a>
						<a href="#" class="btn btn-success">Manage</a>
					</div>
				</div>
            </div>
			
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your products and you add new products</p>
						<a href="./templates/products.php" class="btn btn-success">Add</a>
						<a href="manage_product.php" class="btn btn-success">Manage</a>
					</div>
				</div>
			</div>
        </div>
    </div>
</body>
</html>