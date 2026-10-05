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
   
    $title=$_POST['title'];
    $dimension=$_POST['dimension'];
    $orientation=$_POST['orientation'];
    $size=$_POST['size'];
    $artist=$_POST['artist'];
    $arttype=$_POST['arttype'];
    $artmed=$_POST['artmed'];
    $sprice=$_POST['sprice'];
    $description=$_POST['description'];
    $eid=$_GET['editid'];
    $query=mysqli_query($con, "update tblpicproduct set Title='$title',
	Dimension='$dimension',Orientation='$orientation',Size='$size',photographer='$artist',
	picType='$arttype',SellingPricing='$sprice',Description='$description' where ID='$eid'");
    if ($query) {
  
    echo "<script>alert('Photo product has been updated.');</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
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
            <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select tblpictype.ID as atid,tblpictype.picType as typename,
tblpicproduct.ID as apid,tblphotographer.ID as arid,tblphotographer.Name,
tblpicproduct.Title,tblpicproduct.Dimension,tblpicproduct.Orientation,
tblpicproduct.Size,tblpicproduct.photographer,tblpicproduct.picType,
tblpicproduct.SellingPricing,tblpicproduct.Description,
tblpicproduct.Image1,tblpicproduct.picType from tblpicproduct join tblpictype 
on tblpictype.ID=tblpicproduct.picType join 
 tblphotographer on tblphotographer.ID=tblpicproduct.photographer where 
 tblpicproduct.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Update Photo Product Detail
              </header>
              <div class="panel-body">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="title" name="title"  type="text" required="true" value="<?php  echo $row['Title'];?>" />
                    </div>
                  </div>
                  
    <div class="form-group">
                    <label class="col-sm-2 control-label">Photo Product Image1</label>
                    <div class="col-sm-10">
                      <img src="images/<?php echo $row['Image1'];?>" width="200" height="150" value="<?php  echo $row['Image1'];?>"><a href="changeimagepic.php?editid=<?php echo $row['apid'];?>"> &nbsp; Edit Image</a>
                    </div>
                  </div>

  
<div class="form-group">
                    <label class="col-sm-2 control-label">Dimension</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="dimension" name="dimension"  type="text" required="true" value="<?php  echo $row['Dimension'];?>">
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
                        <option value="<?php  echo $row['Orientation'];?>"><?php  echo $row['Orientation'];?></option>
                        <option value="Potrait">Potrait</option>
                        <option value="Landscape">Landscape</option>
                        
                      </select>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Size</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="size" name="size"  required="true">
                        <option value="<?php  echo $row['Size'];?>"><?php  echo $row['Size'];?></option>
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
                                <option value="<?php  echo $row['arid'];?>"><?php  echo $row['Name'];?></option>
                                <?php $query1=mysqli_query($con,"select * from tblphotographer");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['ID'];?>"><?php echo $row1['Name'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Photo Type</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="arttype" id="arttype">
                                <option value="<?php  echo $row['atid'];?>"><?php  echo $row['typename'];?></option>
                                <?php $query2=mysqli_query($con,"select * from tblpictype");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['ID'];?>"><?php echo $row2['picType'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Selling Price</label>
                    <div class="col-sm-10">
                      <input class="form-control " id="sprice" type="text" name="sprice" required="true" value="<?php  echo $row['SellingPricing'];?>">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Photo Product Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control " id="description" type="text" name="description" rows="12" cols="4" required="true"><?php  echo $row['Description'];?></textarea>
                    </div>
                  </div>
              </div>
            </section>
            
          </div>
          <?php } ?>
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