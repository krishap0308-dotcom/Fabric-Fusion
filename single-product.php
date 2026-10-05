<!DOCTYPE html>
<?php
//session_start(); // Start the session
include('header.php');

$conn= new mysqli('localhost','root','','shopping')
or die("Could not connect to mysql".mysqli_error($conn));

$id=$_GET['id'];
$query = "SELECT * FROM men WHERE id=$id";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result))
{
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
  </head>
  
  <body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    
    <div class="page-heading" id="top">
        <div class="container">
            
        </div>
    </div>

    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">
                        <img src="images/<?php echo $row['image']; ?>" height="500px" style="padding-right:110px;" width="" alt="" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4><?php echo $row['productname']; ?></h4>
                        <span class="price"><?php echo $row['price']; ?><br>
                            <label style="color:black;">Fabric: &nbsp;<?php echo $row['frabic']; ?></label><br>
                            <label>Size:&nbsp;<?php echo $row['size']; ?></label> <br>
                            <label><?php echo $row['description']; ?></label>
                        </span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>

                        <form method="POST" action="">
                            <div class="quantity-content">
                                <div class="left-content">
                                    <h6>No. of Orders</h6>
                                </div>
                                <div class="right-content">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus">
                                        <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['productname']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <div class="total">
                                <div class="main-border-button"><button type="submit" name="add_to_cart">Add To Cart</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <?php
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $username = $_SESSION['user_name']; // Retrieve username from session

        $insert_query = "INSERT INTO cart (product_id, product_name, price, quantity, user_name) VALUES ('$product_id', '$product_name', '$price', '$quantity', '$username')";
        mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
        
        echo "<script>alert('Product added to cart successfully!');</script>";
    }
    } 
    ?>

    

    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/quantity.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
            });
        });
    </script>
  </body>
</html>
