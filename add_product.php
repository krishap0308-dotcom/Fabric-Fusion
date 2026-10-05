	<?php 
error_reporting(0);
$conn= new mysqli('localhost','root','','shopping')
or die("Could not connect to mysql".mysqli_error($con));

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

    <h2>Add a New Product</h2>
    <form method="post" action="" enctype="multipart/form-data" style="background:lightblue;">
        <table border="1" align="center">
			<tr>
                <td><label for="id">id:</label></td>
                <td><input type="text" id="id" name="id" required></td>
            </tr>
            <tr>
                <td><label for="productname">productname:</label></td>
                <td><input type="text" id="productname" name="productname" required></td>
            </tr>
            <tr>
                <td><label for="price">price:</label></td>
                <td><input type="number" id="price" name="price" required></td>
            </tr>
            <tr>
                <td><label for="fabric">fabric:</label></td>
                <td>
                    <select id="fabric" name="fabric" required>
					    <option value="Select">Select</option>
                        <option value="Cotton">Cotton</option>
                        <option value="Silk">Silk</option>
                        <option value="Wool">Wool</option>
						<option value="Polycotton">Polycotton</option>
                        <option value="Linen">Linen</option>
                    </select>
                </td>
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td><label for="size">size:</label></td>
                <td>
                    <input type="radio" id="small" name="size" value="Small" required>
                    <label for="small">Small</label>
                    <input type="radio" id="medium" name="size" value="Medium" required>
                    <label for="medium">Medium</label>
                    <input type="radio" id="large" name="size" value="Large" required>
                    <label for="large">Large</label>
                </td>
            </tr>
            <tr>
                <td><label for="description">description:</label></td>
                <td><textarea id="description" name="description" rows="4" cols="50" required></textarea></td>
            </tr>
			<tr>
					<td><label class="">Image</label></td>
			<td><input type="file" name="images" id="images" value=""></td>
				</tr>
        </table>
        <br>
        <input type="submit" value="Men" name="men" action="men.php">
		
		
		 <input type="submit" value="Women" name="women" action="women.php">
		 
		<input type="submit" value="Kids" name="kids" action="kids.php">
		
		 
    
    </form>
	
    
	
    
	<?php
 if(isset($_POST['men']))
  {
	 // header('Location:http://localhost/img/fabric%20fusion/men.php');
	$id = $_POST["id"];
	$productname=$_POST["productname"];
	$price = $_POST["price"];
	$fabric=$_POST["fabric"];
	$size=$_POST["size"];
	$description = $_POST["description"];
	
	//featured Image
	
				$pic = $_FILES["images"]["name"];
			$extension = substr($pic,strlen($pic)-4,strlen($pic));

	
	
	// allowed extensions
	$allowed_extension = array(".jpg","jpeg",".png",".gif");

	// Validation for allowed extensions .in_array() function searches an array for a specific value.
	if(!in_array($extension,$allowed_extension))
			{
				echo "<script>alert('featured image has invalid format. Only jpg/jpeg/png/gif format allowed');
						</script>";
			}
			else
			{
				$pic = md5($pic).time().$extension;
				move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$pic);
				$query=mysqli_query($conn,"insert into men values($id,'$productname',$price,'$fabric','$size','$description','$pic')");
				if($query)
				{
					echo "<script>alert('Photo details has been submitted.');</script>";
					echo "<script>window.location.href='add_product.php'</script>";
					
				}
				
				else
				{
					echo "<script>alert('Somthing went wrong.Please try again');</script>";
				}
			}
		}
		
		else if(isset($_POST['women']))
  {
	 // header('Location:http://localhost/img/fabric%20fusion/women.php');
	$id = $_POST["id"];
	$productname=$_POST["productname"];
	$price = $_POST["price"];
	$fabric=$_POST["fabric"];
	$size=$_POST["size"];
	$description = $_POST["description"];
	
	//featured Image
	
				$pic = $_FILES["images"]["name"];
			$extension = substr($pic,strlen($pic)-4,strlen($pic));

	
	
	// allowed extensions
	$allowed_extension = array(".jpg","jpeg",".png",".gif");

	// Validation for allowed extensions .in_array() function searches an array for a specific value.
	if(!in_array($extension,$allowed_extension))
			{
				echo "<script>alert('featured image has invalid format. Only jpg/jpeg/png/gif format allowed');
						</script>";
			}
			else
			{
				$pic = md5($pic).time().$extension;
				move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$pic);
				$query=mysqli_query($conn,"insert into women values($id,'$productname',$price,'$fabric','$size','$description','$pic')");
				if($query)
				{
					echo "<script>alert('Photo details has been submitted.');</script>";
					echo "<script>window.location.href='add_product.php'</script>";
				}
				
				else
				{
					echo "<script>alert('Somthing went wrong.Please try again');</script>";
				}
			}
		}
		
		else if(isset($_POST['kids']))
  {
	 // header('Location:http://localhost/img/fabric%20fusion/kids.php');
	$id = $_POST["id"];
	$productname=$_POST["productname"];
	$price = $_POST["price"];
	$fabric=$_POST["fabric"];
	$age=$_POST["age"];
	$size=$_POST["size"];
	$description = $_POST["description"];
	
	//featured Image
	
				$pic = $_FILES["images"]["name"];
			$extension = substr($pic,strlen($pic)-4,strlen($pic));

	
	
	// allowed extensions
	$allowed_extension = array(".jpg","jpeg",".png",".gif");

	// Validation for allowed extensions .in_array() function searches an array for a specific value.
	if(!in_array($extension,$allowed_extension))
			{
				echo "<script>alert('featured image has invalid format. Only jpg/jpeg/png/gif format allowed');
						</script>";
			}
			else
			{
				$pic = md5($pic).time().$extension;
				move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$pic);
				$query=mysqli_query($conn,"insert into kid values($id,'$productname',$price,'$fabric','$age','$size','$description','$pic')");
				if($query)
				{
					echo "<script>alert('Photo details has been submitted.');</script>";
					echo "<script>window.location.href='add_product.php'</script>";
				}
				
				else
				{
					echo "<script>alert('Somthing went wrong.Please try again');</script>";
				}
			}
		}
		
		
	

	

	
  ?>
  

</body>
</html>
