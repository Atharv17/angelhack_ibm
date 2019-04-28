<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Thermize</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="admin.css" rel="stylesheet" type="text/css">

</head>





<?php
  $conn = mysqli_connect("localhost", "root", "", "ibm_hack");
  $results = mysqli_query($conn, "SELECT * FROM excel_data ORDER BY BlockCat,Dam  desc");
  $road = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
<body>

<form method="POST" action="">
   <?php foreach ($road as $user): 
      
         ?>
          <div class="blog-card">
    <div class="meta">
      <div class="photo" style="text-align: center;"></div>
    </div>
    <div class="description">
      <h1><input type="radio" name="name" value=" <?php echo $user['Landmark']; ?>"><?php echo $user['Landmark']; ?></h1>
      <h2>Problem:Detected By Analytics</h2>
      <p> Area:<?php echo $user['Area']; ?> <br>Road: <?php echo $user['Road']; ?></p>
      <button class="btn btn-info but" name="button_pressed">Under Review</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success but" name="delete_pressed">Approve</button>
    </div>
  </div>
 <br>


<?php
if(isset($_POST['button_pressed']))
{

   header("Location: thankyou.html");
die();
}
?>

 <hr>
   <?php endforeach ?>
   
</form>

<?php
if(isset($_POST['delete_pressed']))
{
        
            $sql = "DELETE FROM excel_data WHERE Landmark='IIT Madras'";
if(mysqli_query($conn, $sql)){
    ;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
            
}
?>
<a class="btn btn-info" href="adminmain.php" style="margin-left: 50px;">Back</a>
</body>
</html>
