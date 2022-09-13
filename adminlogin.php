
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="adminlogin.css">
    <script src="assets/script/jquery.min.js"></script>
    
</head>
<body>
    

<?php
include 'db.php';
?>
<section class="user">

    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form" method="post">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Reg.No" oninput="this.value = this.value.toUpperCase()" class="forms_field-input" name="uname" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="submit"  class="forms_buttons-action" name="login">Log In </button>
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <div class="profile-container">
          <label for="imageUpload" class="profile-image-container">
      <img src="assets/img/profile.png" alt="" id="profile">
</label>
      </div>
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" method="post" enctype="multipart/form-data">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Reg.No"  oninput="this.value = this.value.toUpperCase()" class="forms_field-input" name="regno" required />
            </div>
            <div class="forms_field">
              <input type="text" placeholder="Name"  oninput="this.value = this.value.toUpperCase()" class="forms_field-input" name="name" required />
            </div>
            <div class="forms_field">
              <input type="text" placeholder="Mobile Number" class="forms_field-input" name="number" maxlength="10" required />
            </div>
            <div class="forms_field">
              <input type="email" placeholder="Email" class="forms_field-input" name="email" required />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" name="pwd" required />
            </div>
            <div class="forms_field">
              <label  class="image" style="display:none;">Upload Profile
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0]);"/>
            </label><br>
            
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="submit" class="forms_buttons-action" name="signup">Sign up </button>
          </div>
    
        </form>
      </div>
    </div>

</section>
<?php

if (isset($_POST['login'])) {
    $uname=$_POST['uname'];
    $password=base64_encode($_POST['password']);
    $sql="select * from adminlogin where admin_reg_no='$uname' AND pwd='$password'";
    $result = $con->query($sql);
 
    if ($result->num_rows == 1) {
         $row = $result->fetch_assoc();
        if($row["status"] == ""){
          echo "<script>alert('Your Account is Waiting List');</script>";  
        }
        else if($row["status"] == "0"){
          session_start();
          $_SESSION["kshaktriya"] = "$uname";
          header("location:superadminpage.php");
        }
        else if($row["status"] == "9"){
          echo "<script>alert('Your Account is Removed From Chairman');</script>";
          
        }
        else{
            session_start();
            $_SESSION["kshaktriya"] = "$uname";
            // header("location:adminpage.php");
          }
        
    }
    else{
        echo "<script>alert('Username or Password Wrong');</script>";
    }
    // $count=$sqlrun->mysqli_num_rows();
    // print_r($count);
}
if (isset($_POST['signup'])) {
   $regno=$_POST['regno'];
   $name=$_POST['name'];
   $number=$_POST['number'];
   $email=$_POST['email'];
   $pwd=base64_encode($_POST['pwd']);
   $image=$_FILES['image']['tmp_name'];
   $image_name=$_FILES['image']['name'];
   $image=file_get_contents($image);
   $image=base64_encode($image);
   $sql="INSERT INTO adminlogin(admin_reg_no , admin_name ,admin_number,admin_email,pwd,admin_image,status) VALUES ('$regno','$name','$number','$email','$pwd','$image','5')";
   $sqlrun=$con->query($sql);
   if ($sqlrun) {
    echo "<script>alert('Your Account is Waiting List');</script>";
   }
   else{
    echo "<script>alert('Some Issues Found');</script>";
   }
}
?>
<script>
     $('input').attr('autocomplete','off');
    </script>
</body>
</html>