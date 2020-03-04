<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="row justify-content-center mt-5">
     <div class="col-lg-6 col-sm-6 col-md-8">
     <form  method="post">
     <div  class="card">
     <div class="card-header text-center bg-info">LOGIN TO YOUR ACCOUNTS</div>
     <div class="card-body">
     <div class="text-center">
     <label ><b>USERNAME</b></label>
     </div>
     <input type="text" class="form-control my-3" placeholder="ENTER YOUR USERNAME" required  name="username">
     <div class="text-center">
     <label ><b>PASSWORD</b></label>
     </div>
     <input type="password" class="form-control my-3" placeholder="ENTER YOUR PASSWORD" required name="password">
     <div class="text-center">
     <button type="submit" class=" btn-primary  btn-lg text-center" name="login">LOGIN</button>
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
</body>
</html>