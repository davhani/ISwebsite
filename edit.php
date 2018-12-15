<?php
include('connect.php');
include('test.php');
session_start();
if($_SESSION['type']!="lecturer"){
  echo"Access denied";
  exit();
}
if( isset($_GET['edit']) )
	{
		$id = $_GET['edit'];
		$res= mysqli_query($conn,"SELECT * FROM users WHERE ID='$id'");
		$row= mysqli_fetch_array($res);
	}



if( isset($_POST['grade']) )
	{
		$newName = $_POST['grade'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE users SET grade='$newName' WHERE ID='$id'";
		$res 	 = mysqli_query($conn,$sql)
                                    or die("Could not update".mysqli_error());
		echo "<meta http-equiv='refresh' content='0;url=homelec.php'>";
	}

  ?>
  <form action="edit.php" method="POST">
  Grade: <input type="text" name="grade" ><br />
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
  <input type="submit" value=" Update "/>
  </form>
