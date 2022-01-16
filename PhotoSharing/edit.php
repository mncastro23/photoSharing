<?php 

session_start();

   if(!isset($_SESSION['userlogin'])){
      header("Location: index.php");
   }

   if(isset($_GET['logout'])){
      session_destroy();
      unset($_SESSION);
      header("Location: index.php");
   }

?>
<?php 
//Databse Connection file
include('config.php');
if(isset($_POST['submit']))
  {
   //getting the post values
  	$eid=$_GET['editid'];
    $imgCap=$_POST['imgCapt'];

    //Query for data updation
   $sql = "update  tUpload set imgCap= ? where imgID='$eid'";
    $stmtinsert = $db->prepare($sql);
        
      $result = $stmtinsert->execute([$imgCap]);
    
     
    if ($result) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='gallery.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #fff;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
	 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">InstaShot</label>
      <ul>
        <li><a href="main.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li ><a href="upload-photo.php">Upload</a></li>
        <li><a id='btnSetting' href="#">Setting</a></li>
        <li><a id='btnLogout'  href="#" >Logout</a></li>
      </ul> 
    </nav>
<div class="signup-form">
    <form  method="POST">
 <?php
$eid=$_GET['editid'];
$stmt = $db->query("SELECT imgID,imgPath,imgCap,UCASE(CONCAT(firstname,SPACE(1),lastname)) as imgCrtBy,tupload.imgCrtDt FROM tupload INNER join users on tupload.imgcrtby = users.id where imgID =$eid");
foreach ($stmt as $img) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update your info.</p>

	<div class="form-group">
<img src="uploadpic/<?php  echo $img['imgPath'];?>" width="120" height="120" class="centerimg">
<center><a href="change-image.php?userid=<?php echo $img['imgID'];?>">Change Image</a></center>
		</div>

        
				<div class="form-group">
         <div class="row">
         	
            <div class="col"><input type="text" class="form-control" name="imgCapt" value="<?php  echo $img['imgCap'];?>" required="true"></div>
         </div>         
        </div> 

<?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>

</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
           $('#btnLogout').click(function(e){
              Swal.fire({
                title: 'Are you sure to logout?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
              }).then((result) => {
                if (result.isConfirmed) {
                  setTimeout(' window.location.href =  "main.php?logout=true"', 1000);
                }
              })
           });
           $('#btnSetting').click(function(e){
              Swal.fire({
              icon: 'info',
              title: 'Sorry',
              text: 'Work in Progress' ,
                                
             })
           });
          });
    </script>
</body>
</html>