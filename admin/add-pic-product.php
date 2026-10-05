<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $aid=$_SESSION['agmsaid'];
    $title=$_POST['title'];
    $dimension=$_POST['dimension'];
    $orientation=$_POST['orientation'];
    $size=$_POST['size'];
    $photographer=$_POST['artist'];
    $pictype=$_POST['arttype'];
    
    $sprice=$_POST['sprice'];
    $description=$_POST['description'];
    $refno=mt_rand(100000000, 999999999);
//featured Image
$pic=$_FILES["images"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}

else
{

$pic=md5($pic).time().$extension;

     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$pic);
    $query=mysqli_query($con, "insert into tblpicproduct(Title,Dimension,Orientation,size,photographer,pictype,SellingPricing,Description,Image1) values('$title','$dimension','$orientation','$size',$photographer,$pictype,$sprice,'$description','$pic')");
    if ($query) {
echo "<script>alert('Photo  details has been submitted.');</script>";
echo "<script>window.location.href ='add-pic-product.php'</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }

  }
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Add Photo Product | Snap Hub</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>
<body>
  <section id="container" class="">
    <!--header start-->
    <?php include_once('includes/header.php');?>
    <!--header end-->

    <!--sidebar start-->
   <?php include_once('includes/sidebar.php');?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content" style="color:#000">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Add Photo Product Detail</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Photo Product</li>
              <li><i class="fa fa-file-text-o"></i>Photo Product Detail</li>
            </ol>
          </div>
        </div>
        <div class="row">      
          <form class="form-horizontal " method="post" action="" enctype="multipart/form-data">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Add Photo Product Detail
              </header>
              <div class="panel-body">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="title" name="title"  type="text" required="true" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"> Image</label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="images" id="images" value="" required="true">
                    </div>
                  </div>

   
<div class="form-group">
                    <label class="col-sm-2 control-label">Dimension</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="dimension" name="dimension"  type="text" required="true">
                    </div>
                  </div>
 </div>
</section>
</div>
                  <div class="col-lg-6">
                        <section class="panel">
                     <div class="panel-body">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Orientation</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="orientation" name="orientation"  required="true">
                        <option value="">Choose orientation</option>
                        <option value="Potrait">Potrait</option>
                        <option value="Landscape">Landscape</option>
                        
                      </select>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Size</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="size" name="size"  required="true">
                        <option value="">Choose Size</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Photographer</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="artist" id="artist">
                                <option value="">Choose Photographer</option>
                                <?php $query=mysqli_query($con,"select * from tblphotographer");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ID'];?>"><?php echo $row['Name'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Photo Type</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="arttype" id="arttype">
                                <option value="">Choose Photo Type</option>
                                <?php $query=mysqli_query($con,"select * from tblpictype");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ID'];?>"><?php echo $row['picType'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Selling Price</label>
                    <div class="col-sm-10">
                      <input class="form-control " id="sprice" type="text" name="sprice" required="true">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Photo Product Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control " id="description" type="text" name="description" rows="12" cols="4" required="true"></textarea>
                    </div>
                  </div>
              </div>
            </section>
            
          </div>
               <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Submit</button></p>
              </form>
        </div>
      
      </section>
    </section>
 <?php include_once('includes/footer.php');?>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>
<?php  } ?>