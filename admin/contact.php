<?php
session_start();

include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$wpaddress=$_POST['address'];	
$wpcnumber=$_POST['contactno'];
$ophrs=$_POST['openinghrs'];
$email=$_POST['emailid'];

$sql="update tblpages set detail=:wpaddress,openignHrs=:ophrs,phoneNumber=:wpcnumber,emailId=:email where type='contact'";
$query = $dbh->prepare($sql);
$query->bindParam(':ophrs',$ophrs,PDO::PARAM_STR);
$query->bindParam(':wpaddress',$wpaddress,PDO::PARAM_STR);
$query->bindParam(':wpcnumber',$wpcnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();

 echo "<script>alert('Details updates successfully');</script>";
 echo "<script>window.location.href ='contact.php'</script>";

}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CWMS | Contact Us info</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head> 
<body>
   <div class="page-container">

   <div class="left-content">
	   <div class="mother-grid-inner">

	   <?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>

				<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Contact us information</li>
            </ol>

			<div class="grid-form">
 

			<div class="grid-form1">
  	       <h3>Update Contact Information</h3>
<?php 
$sql = "SELECT * from tblpages where type='contact'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{       
?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="washingpoint" method="post" enctype="multipart/form-data">

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Adress</label>
									<div class="col-sm-8">
										<textarea class="form-control" name="address" id="address" placeholder="Address" required rows="4"><?php   echo $result->detail; ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Opening Hours</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="openinghrs" id="openinghrs" placeholder="Opening Hour" value="<?php   echo $result->openignHrs; ?>" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email Id</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email Id" required value="<?php   echo $result->emailId; ?>">
									</div>
								</div>


<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="contactno" id="contactno" placeholder="Contact Number" required value="<?php   echo $result->phoneNumber; ?>">
									</div>
								</div>



	


														
	

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="update" class="btn-primary btn">Update</button>
			</div>
		</div>
							
					</div>
					</form>

     <?php }  ?>
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	
	
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		
		
<div class="inner-block">

</div>


<?php include('includes/footer.php');?>

</div>
</div>
 

					<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<script src="js/bootstrap.min.js"></script>

   
</body>
</html>
<?php } ?>