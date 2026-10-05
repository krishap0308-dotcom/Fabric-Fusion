<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

  <head>
  <body >
  
  
  
  
					
  
  
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
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
    
    <!-- Global Init -->
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>FABRIC FUSION </title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
	
	
    
	
	 <!-- ***** Header Area Start ***** -->
	 
	 	 
    <header class="header-area header-sticky">
        <div class="container"   >
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
						
						                       
                            <img src="assets/images/green (3).jpg">
                         	
						
						
						
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->

			
                        <ul class="nav" >
                            <li><a href="index.php">Home</a></li>
                            <li><a href="men.php">Men</a></li>
                            <li><a href="women.php">Women</a></li>
                            <li><a href="./kids.php">Kid</a></li>
							<li><a href="./Accessories.php">Accessories</a></li>
							

							
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="product.php">Products</a></li>
                                    <li><a href="single-product.php">Single Product</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
				    

                                </ul>
                            </li>
                                                        
                            <li><a href="#explore">Explore</a></li>
							<li>
				
				
				
				
				<?php
				
				if(!isset($_SESSION['user_name'])){
					
					?>
					<a href="/./img/fabric fusion/loginsystem/login_form.php">Login</a>
					
								
				
				<?php
				}
				else
				{
					
				?>
					<a href="loginsystem/logout.php">Logout</a>
				<?php
				}?>
				
				 
				</li>
				<li><a href="addtocart.php"><img src ="cart.png" style="width:30px; height:30px"/> </a></li>
				
					
                        </ul> 
						
                      
						
						 
						
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
		
			
		
    </header>
    <!-- ***** Header Area End ***** -->
	
</body>

</html>
	