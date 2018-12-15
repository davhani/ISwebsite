<?php
 include('connect.php');
 include('test.php');
 if(isset($_POST['register_btn'])){
   session_start();
   $username = mysqli_real_escape_string($conn,$_POST['username']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
   $password2 = mysqli_real_escape_string($conn,$_POST['password2']);
   $radio = mysqli_real_escape_string($conn,$_POST['radio']);
   $namee = mysqli_real_escape_string($conn,$_POST['namee']);
   if($password == $password2){
     $password = md5($password);
     $sql = "INSERT INTO users(name,username,email,password,type) VALUES ('$namee','$username','$email','$password','$radio')";
     mysqli_query($conn,$sql);
     $_SESSION['message']="You are now logged in";
     $_SESSION['username']=$username;
     $_SESSION['name']=$namee;
     $_SESSION['type']=$radio;
     if($radio=="lecturer"){
     header("location: homelec.php");
   } else if ($radio=="ta"){
     header("location: hometa.php");
   }else {
     header("location: homestu.php");
   }
   }else{
     $_SESSION['message']="The two passwords do not match";
   }

 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="register.php">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!Doctype html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Registration Form</title>
     	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <form method="post" action="register.php">
 <div class="container">
 <!---heading---->
     <header class="heading"> Registration Form</header><hr></hr>
	<!---Form starting---->
	<div class="row ">
	 <!--- For Name---->
   <div class="col-sm-12">
       <div class="row">
     <div class="col-xs-4">
               <label class="lastname">Name :</label> </div>
       <div class="col-xs-8">
           <input  type="text" name="namee" id="fname" placeholder="Enter your name" class="form-control " required>
       </div>
    </div>
</div>

         <div class="col-sm-12">
             <div class="row">
			     <div class="col-xs-4">
          	         <label class="firstname">Username :</label> </div>
		         <div class="col-xs-8">
		             <input  type="text" name="username" id="lname" placeholder="Enter your username" class="form-control " required>
             </div>
		      </div>
		 </div>

     <!-----For email---->
		 <div class="col-sm-12">
		     <div class="row">
			     <div class="col-xs-4">
		             <label class="mail" >Email :</label></div>
			     <div class="col-xs-8"	>
			          <input type="email" name="email"  id="email"placeholder="Enter your email" class="form-control" required >
		         </div>
		     </div>
		 </div>
	 <!-----For Password and confirm password---->
          <div class="col-sm-12">
		         <div class="row">
				     <div class="col-xs-4">
		 	              <label class="pass">Password :</label></div>
				  <div class="col-xs-8">
			             <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control" required>
				 </div>
          </div>
		  </div>
      <div class="col-sm-12">
         <div class="row">
         <div class="col-xs-4">
                <label class="pass">Confirm Password:</label></div>
      <div class="col-xs-8">
               <input type="password" name="password2" id="password" placeholder="Confirm your Password" class="form-control" required>
     </div>
      </div>
  </div>

         <div class="col-sm-10">
		     <div class ="row">
                 <div class="col-xs-4 ">
			       <label class="gender">Type:</label>
				 </div>
         <div id="lec">
				     <input type="radio" name="radio"   value="lecturer" required>Lecturer</input>

           <input type="radio" name="radio"   value="ta">Teacher Assistant</input>

            <input type="radio"  name="radio"  value="student">Student</input>

          </div>
		  	 </div>
		     <div class="col-sm-12">
		         <input type="submit" name="register_btn" class="textInput" value="Register">
		   </div>
		 </div>
	 </div>


</div>
</form>
</body>
</html>


  </form>
</body>
<style>
/*-----Background-----*/

body{
 /* background-image: url('https://blog.visme.co/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-05.jpg'); */
 background-repeat:no-repeat;
 background-size:cover;
 width:100%;
 height:100vh;
 overflow:auto;

}

/*-----for border----*/
.container{
font-family:Roboto,sans-serif;
  background-image:url(https://image.freepik.com/free-vector/dark-blue-blurred-background_1034-589.jpg) ;

   border-style: 1px solid grey;
   margin: 0 auto;
   text-align: center;
   opacity: 0.8;
   margin-top: 67px;
 box-shadow: 2px 5px 5px 0px #eee;
   max-width: 600px;
   padding-top: 10px;
   height: 400px;
   margin-top: 166px;
}
/*--- for label of first and last name---*/
.lastname{
 margin-left: 1px;
   font-family: sans-serif;
   font-size: 14px;
   color: white;
   margin-top: 10px;
}
.firstname{
 margin-left: 1px;
   font-family: sans-serif;
   font-size: 14px;
   color: white;
   margin-top: 5px;
}
#lname{
 margin-top:5px;
}


/*---for heading-----*/
.heading{
 text-decoration:bold;
 text-align : center;
 font-size:30px;
 color:#F96;
 padding-top:10px;
}
/*-------for email----------*/
/*------label----*/
#email{
  margin-top: 5px;
}
/*-----------for Password--------*/
   /*-------label-----*/
.mail{
 margin-left: 44px;
   font-family: sans-serif;
   color: white;
   font-size: 14px;
   margin-top: 13px;
}
.pass{
 color: white;
   margin-top: 9px;
   font-size: 14px;
   font-family: sans-serif;
   margin-left: 6px;
   margin-top: 9px;
}
#password{
margin-top: 6px;
}
/*------------for phone Number--------*/
    /*----------label--------*/
.pno{
 font-size: 18px;
   margin-left: -13px;
   margin-top: 10px;
   color: #ff9;

}

/*--------------for Gender---------------*/
   /*--------------label---------*/
.gender {
  color: white;
   font-family: sans-serif;
   font-size: 14px;
   margin-left: 28px;
   margin-top: 8px;

}

   /*---------- for Input type--------*/

   #lec{

      color: white;
      font-size: 14px;
      margin-top: 9px;
      padding-bottom: 16px;
}


/*------------For submit button---------*/
.sbutton{
 color: white;
   font-size: 20px;
   border: 1px solid white;
   background-color: #080808;
   width: 32%;
   margin-left: 41%;
   margin-top: 16px;
 box-shadow: 0px 2px 2px 0px white;

 }
.btn.btn-warning:hover {
  box-shadow: 2px 1px 2px 3px #99ccff;
background:#5900a6;
color:#fff;
transition: background-color 1.15s ease-in-out,border-color 1.15s ease-in-out,box-shadow 1.15s ease-in-out;

}

</style>
</html>
