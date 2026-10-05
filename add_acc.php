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
    <form method="post" action="" enctype="multipart/form-data">
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
                <td><label for="metal">metal</label></td>
                <td>
                    <select id="metal" name="metal" required>
					    <option value="Select">Select</option>
						<option value="Copper">Copper</option>
						<option value="Crystal">Crystal</option>
                        <option value="Platiumn">Platiumn</option>
                        <option value="Silver">Silver</option>
						
                        
                    </select>
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
       
		 <input type="submit" value="Accessories" name="accessories" action="">
    
    </form>
	
	
	<?php
 if(isset($_POST['accessories']))
  {
	 // header('Location:http://localhost/img/fabric%20fusion/men.php');
	$id = $_POST["id"];
	$productname=$_POST["productname"];
	$price = $_POST["price"];
	$metal=$_POST["metal"];
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
				echo $id.$productname.$description;
				echo $price.$pic.$metal;
				
				$query=mysqli_query($conn,"insert into accessories values($id,'$productname','$price','$metal','$description','$pic')");
				if($query)
				{
					echo "<script>alert('Photo details has been submitted.');</script>";
					echo "<script>window.location.href='add_acc.php'</script>";
					
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

	
	
