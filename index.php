<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    *{margin: 0px;
     padding: 0px;}
    #team .card:hover{
background-color: blue;

    }
    
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
  <nav  class="nav navbar navbar-expand-sm  bg-light" >

<div class="container ">
<a href="#"  class="navbar navbar-brand" id="nab">VACCINATION REMINDER SYSTEM</a>
<ul class="navbar-nav">
<li class="nav-link">
    <a href="login.php" class="nav-item" >LOGIN</a>

    
</li>

<li class="nav-link">
        <a href="#" class="nav-item">SIGNUP</a>
    
        
    </li>
   
</ul>

</div>
 </nav>

<section>
    <div class="container text-centre   my-3 py-3     " >
    <div    class="row   mb-3">
    <div  class="col ">
    <h2 class="bg-info text-center">SEND REMINDERS TO PARENTS </h2>
    <p   class="my-3"> 
        <h5  class="text-center text-primary">The system is responsible for reminding parents to bring their children for  immunization</h5>
    </p>
    </div>
     </div>
     <!--begining of a login form here-->
     <div class="row justify-content-center mt-0">
     <div class="col-lg-5 col-sm-5 col-md-5">
     <form  method="post">
     <div  class="card">
     <div class="card-body">
     <div class="text-center text-info">
     <label ><b>USERNAME</b></label>
     </div>
     <input type="text" class="form-control my-3 text-center" placeholder="ENTER YOUR USERNAME">
     <div class="text-center text-info">
     <label ><b>PASSWORD</b></label>
     </div>
     <input type="password" class="form-control my-3 text-center" placeholder="ENTER YOUR PASSWORD">
     <div class="text-center">
     <button type="submit" class="  btn-lg text-center"><a href="login.php" name="login" class="nav-item" >LOGIN</a></button>
     </div>
     </form>
     </div>
     </div>
    </div>
    </div>
    <?php
    if(isset($_POST['login']))
                    {
                    require('connectionfile.php');
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $ask="select *  from   doctors  where  username='$username' and password='$password'";
                    $asked=mysqli_query($connection,$ask);
                    $row=mysqli_fetch_assoc($asked);
                    if($username==$row['username'] &&  $password==$row['password'])
                    {
                       header('location:admin.php');
                    }
                    else
                    {
                        ?>
                            <div class="row justify-content-center my-3">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="card-header text-center bg-warning">
                            <h3>INCORRECT USER DETAILS</h3>
                            </div>
                            </div>
                            </div>
                        <?php
                    }
                }
                    ?>
    <!--ending of a login form here-->
    <div class="row">
        <!--column one begins here-->
        <div class="col-md-6 my-3">
            <div class="card ">
                <div class="card-header text-info  text-center">
                    POSTING
                </div>
                <div class="card-body">
                    POSTS YOU  MAKE  HERE WILL BE SENT TO  PARENTS REGISTERED IN THE SYSTEM
                </div>
                <div class="  text-center">
                <button class="btn text-center btn-info my-3">POST YOUR NOTIFICATIONS</button>
                </div>
            </div>
        </div>
        <!--column two begins here-->
        <div class="col-md-6 my-3">
            <div class="card ">
                <div class="card-header text-info  text-center">
                    ADDING PARENTS
                </div>
                <div class="card-body">
                    PARENTS ADDED IN THE SYSTEM WILL START RECEIVING EMAILED NOTIFICATIONS
                </div>
                <div class="  text-center">
                <button class="btn text-center btn-info my-3">REGISTER NEW PARENT</button>
                </div>
            </div>
        </div>
        </div>
        <!--column two ends here-->
       
        <div    class="row   mb-3">
    <div  class="col ">
    <h3 class="bg-info  mt-5 text-center">YOU ARE REQUIRED TO PROVIDE A VALID USERNAME AND PASSWORD TO USE THE SYSTEM </h3>
    <p   class="my-3"> 
        <h5  class="text-center"></h5>
    </p>
    </div>
     </div>
    
    
</section>
</body>
</html>