<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'shopping') or die("Could not connect to mysql" . mysqli_error($conn));
include("header.php");



$query = "SELECT * FROM cart WHERE user_name = '". $_SESSION['user_name']."'";
$result=mysqli_query($conn,$query);

//$row = mysqli_fetch_assoc($result);

 //Check if the user is logged in
/*if (!isset($_SESSION['user_name'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}*/

// Fetch all items in the cart for the logged-in user
/*$username = $_SESSION['user_name'];
$query = "SELECT * FROM cart WHERE user_name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();*/
$cart_items = [];
while($row = mysqli_fetch_array($result))
//{
//while ($row = $result->fetch_assoc())
	{
	echo "Hello";
    $cart_items[] = $row;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/shop.css" type="text/css" />
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' media="all">
     <style>
        .body {
            background-color: #0d1b2a;
            color: #333;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            height: auto;
            background-size: cover;
        }
        .main-content {
            background-color: #0d1b2a;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            height: auto;
            padding: 40px 20px 20px;
            box-sizing: border-box;
        }
        .product-content {
            flex: 0 1 60%;
            overflow-y: auto;
            padding: 60px 20px 20px;
            transition: width 0.5s;
            box-sizing: border-box;
        }
        .form-container {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .product-details {
            padding: 20px;
            width: 60%;
        }
        .product-details h2 {
            margin-top: 0;
        }
        .product-details p {
            margin: 10px 0;
        }
        .btn {
            background-color: #f4f4f4;
            color: grey;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 17px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #add8e6; 
        }
    </style>
</head>
<body>
<div class="main-content clearfix">
    <div class="product-content">
        <?php if (count($cart_items) > 0) { ?>
            <?php foreach ($cart_items as $item) { ?>
                <div class="form-container">
                    <div class="product-details">
                        <h2>Item Details</h2>
                        <p><strong>Product:</strong> <?php echo $item['product_name']; ?></p>
                        <p><strong>Cost:</strong> ₹<?php echo $item['price']; ?></p>
                        <p><strong>Quantity:</strong> <?php echo $item['quantity']; ?></p>
                        
                            <button type="submit" class="btn">Delete</button>
                        
                    </div>
                </div>
            <?php } ?>
            
                <form action="checkout.php" method="post">
                    <button type="submit" class="btn">Checkout</button>
                </form>
            
        <?php } else { ?>
            <p><center>No items in the cart :( </p>
        <?php }  ?>
    </div>
</div>
</body>
</html>
