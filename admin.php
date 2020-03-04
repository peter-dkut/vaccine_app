<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>
    <script src="display.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<nav  class="nav navbar navbar-expand-sm  bg-light" >

<div class="container ">
<a href="#"  class="navbar navbar-brand" id="nab">VACCINATION REMINDER SYSTEM</a>
<ul class="navbar-nav">
<li class="nav-link">
    <a href="login.php" class="nav-item" >SIGNOUT</a>

    
</li>
</ul>

</div>
 </nav>
 <div class="introductory message row  justify-content-center">
 <div class="col-lg-8 my-lg-3  my-sm-3 my-md-4"  >
 <div class=" btn-group " role="group" >
 <button type="button" class="btn btn-info" id="patient">ADD PATIENT</button>
 <button type="button" class="btn btn-success"><a href="uuu.php">SEND REMINDERS</a></button>
 <button type="button" class="btn btn-primary"  id="unvac">VIEW UNVACCINATED</button>
 <button type="button" class="btn btn-info" id="viewall">VIEW ALL  PATIENTS</button>
 <button type="button" class="btn btn-success" id="vac">CONFIRM VACCINATION</button>
 <button type="button" class="btn btn-primary"  id="val" >VIEW VACCINATED</button>
 </div>
 </div>
 </div>
 <?php
 if(isset($_POST['register']))
 {
    $server="localhost";
    $user="root";
    $password="";
    $database="vaccine";
    $connection=mysqli_connect($server,$user,$password,$database);
$fname=$_POST['fname'];
$surname=$_POST['surname'];
$number=$_POST['number'];
$email=$_POST['email'];
$date=$_POST['date'];
$sql_qwery="insert  into parents(fname,surname,number,email,date,status) values ('$fname','$surname','$number','$email','$date','unvaccinated')";
$prepared_qwery=mysqli_query($connection,$sql_qwery);
if($prepared_qwery)
{
    ?>
    <div class="row justify-content-center">
    <div class="col-lg-6">
    <div class="card-header text-center  text-success">DETAILS SUCCESSFULLY SAVED</div>
    </div>
    </div>
    <?php
}
else{ 
    ?>
<div class="row justify-content-center my-2">
    <div class="col-lg-6">
    <div class="card-header text-center   text-success">PLEASE TRY AGAIN WITH VALID DETAILS</div>
    </div>
    </div>
 <?php
}
}
?>
 <!--add new patient block-->
 <div class="row justify-content-center" >
 
 <div  class="col-lg-4" id="add" style="display:none" >
 <div class="card">
 <div  class="card-body">
 <form action="" method="post">
 <label >FIRST NAME</label>
 <input type="text" name="fname" class="form-control text-center my-2 text-primary" placeholder="FIRST NAME OF THE CHILD" required>
 <label >SURNAME</label>
 <input type="text" name="surname" class="form-control text-center my-2  text-primary" placeholder="SURNAME/LASTNAME OF THE  CHILD" required>
 <label >BIRTHCERT NO</label>
 <input type="number" name="number" class="form-control text-center my-2  text-primary" placeholder="BIRTH  CERTIFICATE NUMBER OF THE KID" required>
 <label >PARENT EMAIL</label>
 <input type="email" name="email" class="form-control my-2 text-center text-primary" placeholder="A WORKING PARENTS  EMAIL" required>
 <label >DATE OF BIRTH</label>
 <input type="date" name="date"  class="form-control my-2 text-center text-primary" placeholder="select Birth date" required  >
 <div class="row justify-content-center">
 <button  class="btn btn-primary" name="register">REGISTER</button>
 </div>
 </form>


 </div>
 </div>
 </div>
 </div>
 <!--view all patients info-->
 <div class="row justify-content-center"   >
 <div class="col-10"style="display:none" id="view" >
 <table class="table table-bordered" >
 <tr>
 <th>FNAME</th>
 <th>SURNAME</th>
 <th>BIRTH CERT NO</th>
 <th>email</th>
 <th>DOB</th>
 </tr>
 <?php
$server="localhost";
$user="root";
$password="";
$database="vaccine";
$connection=mysqli_connect($server,$user,$password,$database);
$ask="select * from parents ";
$qwery=mysqli_query($connection,$ask);
$result=mysqli_fetch_assoc($qwery);
while($row = mysqli_fetch_assoc($qwery))
        {
            ?>
  
                               <form  method="post">
                               <tr>
                               <td>
                               <?php      echo $row['fname'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['surname'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['number'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['email'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['date'];       ?>
                               </td>
        
        <?php
        }
                               

                                
?>
 </table>
 </div>
 </div>
            
 <!--confirm vaccination module-->
 <div class="row justify-content-center"   >
 <div class="col-10"   id="vaccinated" >
 <?php    require("confirm.php");                            ?>
 <table class="table table-bordered" >
 <tr>
 <th>FNAME</th>
 <th>SURNAME</th>
 <th>BIRTH CERT NO</th>
 <th>email</th>
 <th>DOB</th>
 <th>Status</th>
 <th>Action</th>
 <th>Confirmation</th>
 </tr>
 <?php
$server="localhost";
$user="root";
$password="";
$database="vaccine";
$connection=mysqli_connect($server,$user,$password,$database);
$ask="select * from parents ";
$qwery=mysqli_query($connection,$ask);
$result=mysqli_fetch_assoc($qwery);
while($row = mysqli_fetch_assoc($qwery))
        {
            ?>
  
                               <form  method="post">
                               <tr>
                               <td>
                               <?php      echo $row['fname'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['surname'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['number'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['email'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['date'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['status'];       ?>
                               </td>
                               <td>
                              <input type="checkbox"  value="<?php      echo  $row['number'];       ?>" required name="confirm">
                               </td>
                               <td>
                               <input type="submit" name="submit" class="btn btn-primary" value="Vaccinated">
                               </td>
                               </form>
        <?php
        }
                               

                                
?>
 </table>
 </div>
 </div>
 
            
 <!--confirm vaccination module-->
 <div class="row justify-content-center"   >
 <div class="col-10"   id="vaccinated" >
<!--script to confirm vaccination-->
<?php
                                  
                                  if(isset($_POST['submit']))
                                  {
                                   require("connectionfile.php"); 
                                   $del=$_POST['confirm'];
                                   $sdql="select * from parents where number= '$del'";
                                   $checked=mysqli_query($connection,$sdql);
                                   if(mysqli_num_rows($checked)>0)
                                   {
                                       $deletingr="update parents set status='vaccinated' where number='$del'";
                                       $action=mysqli_query($connection,$deletingr);
                                       if($action)
                                       {?>
                                             <div class="container">
                                       <div class=" alert alert-warning">
                                       <div>
                                       <p>STATUS OF THE CHILD HAS BEEN SUCCESSFULLY CHANGED</p>
                                       </div>
                                       </div>
                                       </div>
  
  
  
                                       <?php
  
                                       }
                                   }
                                 
                                    else
                                    {
                                        ?>
                                       <div class="container">
                                       <div class=" alert alert-warning">
                                       <div>
                                       <p>THE DETAILS OF  THE CHILD  WERE  NOT FOUND</p>
                                       </div>
                                       </div>
                                       </div>
  
                                        <?php
                                    }
  
  
  
  
  
  
                                  }
  
  
  
  
                                 ?> 
                                 <!--confirmation script ends here-->
<!--view vaccinated module-->
 <!--view  vaccinated children status-->
 <div class="row justify-content-center"   >
 <div class="col-10"  style="display:none" id="vaccinatedchild">
 <table class="table table-bordered" >
 <tr>
 <th>FIRST NAME</th>
 <th>SURNAME</th>
 <th>BIRTH CERT NO</th>
 <th>email</th>
 <th>DOB</th>
 <th>Status</th>
 </tr>
 <?php
$server="localhost";
$user="root";
$password="";
$database="vaccine";
$connection=mysqli_connect($server,$user,$password,$database);
$vaccinated="SELECT * FROM parents WHERE status='vaccinated'";
$vacresults=mysqli_query($connection,$vaccinated);
while($row = mysqli_fetch_assoc($vacresults))
        {
            ?>
  
                               
                               <tr>
                               <td>
                               <?php      echo  $row['fname'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['surname'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['number'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['email'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['date'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['status'];       ?>
                               </td>
        
        <?php
        }
                               

                                
?>
 </table>
 </div>
 </div>
 <!--viewing unvaccinated children-->
 
 <div class="row justify-content-center"   >
 <div class="col-10"  style="display:none" id="unvaccinatedchild">
 <table class="table table-bordered" >
 <tr>
 
 <th>BIRTH CERT NO</th>
 <th>email</th>
 <th>DOB</th>
 </tr>
 <?php
$server="localhost";
$user="root";
$password="";
$database="vaccine";
$connection=mysqli_connect($server,$user,$password,$database);
$unvaccinatedchild="select * from parents where status='unvaccinated'";
$unvaccinated=mysqli_query($connection,$unvaccinatedchild);
while($row = mysqli_fetch_assoc($unvaccinated))
        {
            ?>
  
                               <form  method="post">
                               <tr>
                               <td>
                               <?php      echo  $row['number'];       ?>
                              
                               </td>
                               <td>
                               <?php      echo  $row['email'];       ?>
                               </td>
                               <td>
                               <?php      echo  $row['date'];       ?>
                               </td>
        
        <?php
        }
                               

                                
?>
 </table>
 </div>
 </div>
 <!--admin posting module-->
 
 <script>
 $(document).ready(function() {
    $('#val').click(function() {
        $('#add').css("display", "none");
        $('#vaccinatedchild').css("display", "block");
        $('#vaccinated').css("display", "none");
        $('#view').css("display", "none");
        $('#unvaccinatedchild').css("display", "none");
    });
    $('#patient').click(function() {
        $('#add').css("display", "block");
        $('#vaccinatedchild').css("display", "none");
        $('#view').css("display", "none");
        $('#vaccinated').css("display", "none");
        $('#unvaccinatedchild').css("display", "none");
    });
    $('#viewall').click(function() {
        $('#view').css("display", "block");
        $('#add').css("display", "none");
        $('#vaccinatedchild').css("display", "none");
        $('#vaccinated').css("display", "none");
        $('#unvaccinatedchild').css("display", "none");
    });
    $('#vac').click(function() {
        $('#vaccinated').css("display", "block");
        $('#add').css("display", "none");
        $('#vaccinatedchild').css("display", "none");
        $('#view').css("display", "none");
        $('#unvaccinatedchild').css("display", "none");
    });
    $('#unvac').click(function() {
        $('#unvaccinatedchild').css("display", "block");
        $('#vaccinated').css("display", "none");
        $('#add').css("display", "none");
        $('#vaccinatedchild').css("display", "none");
        $('#view').css("display", "none");
    });
});
 
 </script>
</body >
</html>