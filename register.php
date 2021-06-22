<?php
include "config.php";
?>
<?php
$error_message = "";
$success_message = "";

// Register user
if(isset($_POST['btnsignup'])){
   $firstname = trim($_POST['firstname']);
   $lname = trim($_POST['lname']);
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $confirmpassword = trim($_POST['confirmpassword']);

   $isValid = true;

   // Check fields are empty or not
   if($firstname == '' || $lname == '' || $email == '' || $password == '' || $confirmpassword == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Confirm password not matching";
   }

   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
   }

   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Email already exists.";
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO users(firstname,lname,email,password ) values(?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $hashed_password = password_hash($password,PASSWORD_DEFAULT);
     echo $hashed_password;
     $stmt->bind_param("ssss",$firstname,$lname,$email,$hashed_password);
     $stmt->execute();
     $stmt->close();

     $success_message = "Account created successfully.";
     header('Location: index.php?page=login');

   }
}
?>



    <?php
    //Display Error message
    if(!empty($error_message)){
    ?>
    <div class="alert alert-danger">
      <strong>Error!</strong> <?= $error_message ?>
    </div>



    <?php
    }
    ?>

    <?php
    // Display Success message
    if(!empty($success_message)){
    ?>
    <div class="alert alert-success">
      <strong>Success!</strong> <?= $success_message ?>
    </div>

    <?php
    }
    ?>





<?=template_header('register')?>

    <div class='container' id="register">
      <div class='row'>

        <div class='col-sm-12' >



          <form method='post' action=''>

            <h1 class ="text-center">Register</h1>
            <div class="form-group">
              <label for="firstname">First Name:</label>
              <input type="text" class="form-control" name="firstname" id="firstname" required="required" maxlength="80">
            </div>
            <div class="form-group">
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control" name="lname" id="lname" required="required" maxlength="80">
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" name="email" id="email" required="required" maxlength="80">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80">
            </div>
            <div class="form-group">
              <label for="pwd">Confirm Password:</label>
              <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required="required" maxlength="80">
            </div>

            <button class="btn btn-outline-dark regbutton" type="submit" name="btnsignup" class="btn btn-default">Submit</button>
          </form>
        </div>

     </div>
    </div>

    <?=template_footer()?>
