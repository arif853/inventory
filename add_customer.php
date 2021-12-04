<?php
session_start();

    include("db_con/database_con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //somthing was posted
        $c_id = $_POST['c_id'];
        $name =$_POST['name'];
        $address = $_POST['address'];
		$phone = $_POST['phone'];
        $phone2 = $_POST['phone2'];
        $proprietor = $_POST['proprietor'];
        $email = $_POST['email'];

        //save to database
        $query = "INSERT INTO customer(id, name, address, phone, alter_phn, email, p_name) 
                    VALUES ('$c_id','$name','$address','$phone','$phone2','$email','$proprietor')";
        //mysqli_query($conn, $query);
        if ($conn->query($query) === TRUE) {
            // header("Location: dashboard.php");
            } 
        else {
        $wrng_pass = "User already Registered.";
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

    <link rel="stylesheet" href="css/all.min.css" >
	<link rel="stylesheet" href="css/bootstrap.min.css" >
 	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include_once("./templates/header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                 
                <?php 
                    if(isset($wrng_pass))
                    {
                        echo '<h5 class= "wrng_pass" >' .$wrng_pass. '</h5>' ;
                    }
                    $customer_number = random_int(100000, 999999);
                ?>
                <div class="customer-reg">
                    <form  method="POST" >
                        <div class="input_box ">
                            <h4>Customer ID: </h4>
                            <input name="c_id" readonly  value="<?php echo $customer_number; ?>" >
                        </div>
                        <div class="input_box ">
                            <h4>Business Name*: </h4>
                            <input type="text" name="name" placeholder="Business Name" required>
                        </div>
                        <div class="input_box b-width ">
                            <h4>Address*: </h4>
                            <input type="text" name="address" placeholder="Address" required>
                        </div>
                        <div class="input_box ">
                            <h4>Phone*: </h4>
                            <input type="text" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="input_box ">
                            <h4>Alternate Phone*: </h4>
                            <input type="text" name="phone2" placeholder="Alternate Phone" required>
                        </div>
                        <div class="input_box ">
                            <h4>Proprietor Name*: </h4>
                            <input type="text" name="proprietor" placeholder="Proprietor Name" required>
                        </div>
                        <div class="input_box ">
                            <h4>Email: </h4>
                            <input type="email" name="email" placeholder="Email" >
                        </div>
                       
                        <div class="input_box add-btn">
                            <input type="submit" class="btn btn-success" value="Add Patient" >
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="customer-reg">
                    <table class="table table-bordered">
                        <tr>
                            <th>#ID</th>
                            <th>Customer Name</th>
                        </tr>

                        <?php
                            $c_query = "SELECT * FROM customer WHERE 1 ";
                            $c_result = mysqli_query($conn, $c_query);
                            $i=0;
                            while($data= mysqli_fetch_array($c_result))
                            {
                        ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>