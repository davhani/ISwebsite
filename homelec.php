<!DOCTYPE html>
<?php include('connect.php');
include('test.php');
session_start();
if($_SESSION['type']!="lecturer"){
  echo"Access denied";
  exit();
}
echo "<h1>Welcome Dr. ".$_SESSION['name']."<br></h1>";
$sql="select ID, username,grade,name from users where type='student'";
$result=mysqli_query($conn,$sql);

if(isset($_POST['logout_btn'])){
  session_destroy();
  header("location: home.php");

}

 ?>
<html lang="en" dir="ltr">
  <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title></title>
  </head>
  <body>
    <div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Name</th>
            <th>Grade</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['grade'] . "</td>";
    echo "<td class=\"text-center\"><a class='btn btn-info btn-xs' href=\"edit.php?edit=".$row['ID']."\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</a>";
    echo "</tr>";
    }
    ?>
    </table>
    </div>
</div>
<div>
  <form method="post" action="homelec.php">
  <input type="submit" value=" Logout" name="logout_btn" method="post"/>
</form>
</div>
  </body>
</html>
