<?php


//includes configuration information
include "config.php";
$email = $_SESSION['email'];
 // is user logged in or not
if(!isset($_SESSION['email'])){
   header('Location: index.php?page=login');
}

// logout for user
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php?page=login');

}

// delete user data where email matches post data
if (isset($_POST['but_delete']))
{
    $query = "DELETE FROM users WHERE email = '" . $_POST['but_delete'] . "'";
    $result = mysqli_query($con, $query);
    session_destroy();
    header('Location: index.php?page=login');
}


//
if (isset($_POST['but_update']))
{
    //
    //$query = "UPDATE users SET name = '" . $_POST['name'] . "', lname = '" . $_POST['lname'] . "', email = '" . $_POST['email'] . "', password = '" . $_POST['password'] . "',   WHERE email = '" . $_POST['but_update'] . "'";
    //$hashed_password = password_hash($password,PASSWORD_DEFAULT);
  //  $result = mysqli_query($con, $query);


  if($_POST['password'] != null)
  {
      $insertSQL = "UPDATE users SET firstname=?, lname=?, email=?, password=?";
      $stmt = $con->prepare($insertSQL);
      $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      $stmt->bind_param("ssss",$_POST['firstname'], $_POST['lname'],$_POST['email'],$hashed_password );
      $stmt->execute();
      $stmt->close();
  }
  else {
      $insertSQL = "UPDATE users SET firstname=?, lname=?, email=?";
      $stmt = $con->prepare($insertSQL);
      //$hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      $stmt->bind_param("sss",$_POST['firstname'], $_POST['lname'],$_POST['email'] );
      $stmt->execute();
      $stmt->close();
  }

  //echo $hashed_password;

  $_SESSION['email'] = $_POST['email'];
    //header('Location: login.php');
}

?>




<?=template_header('requestdeletion')?>
<div class="userdetails container" id="deleteform">
  <div class="row">
    <div class="col-sm-12 text-center" >
        <h1>Your details</h1>

<!-- form to post data to server -->
<form method= "post" action = "">
<?php
//sets variable email as current session email
$email = $_SESSION['email'];
// slects name and email from database where email is current user email
$query = "SELECT firstname, lname, email, password FROM users WHERE email = '". $email ."' " ;
//execeutes above query and stores data in variables
$result = mysqli_query($con, $query);
//builds table with headers
echo "<table border = '1' class='detailstable'>
<tr>
  <th>Name</th>
  <th>Surname</th>
 <th>Email</th>
  <th>Password</th>
  <th>Select</th>

</tr>";
//while loop to return array of fetched data
//note read arrays and loops :-)😎
//also maybe add lname
  while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td><input type=\"text\" class=\"form-control\" name=\"firstname\" id=\"firstname\"  maxlength=\"80\" value=\"". $row['firstname'] ."\">  </td>";
    echo "<td><input type=\"text\" class=\"form-control\" name=\"lname\" id=\"lname\"  maxlength=\"80\" value=\"". $row['lname'] ."\"></td>";
    echo "<td><input type=\"text\" class=\"form-control\" name=\"email\" id=\"email\"  maxlength=\"80\" value=\"". $row['email'] ."\">  </td>";
    echo "<td><input type=\"password\" class=\"form-control\" name=\"password\" id=\"password\"  maxlength=\"80\" value=\"\"> </td>";
    echo "<td> <button class=\"btn btn-outline-dark btnuser\"onclick=\"return confirm('Are you sure you want to delete all of your data?')\" name=\"but_delete\" value=\"" . $row['email'] . "\">Delete Data </button>
     <button class=\"btn btn-outline-dark btnuser\"onclick=\"return confirm('Are you sure you want to update all of your data?')\" name=\"but_update\" value=\"" . $row['email'] . "\">Update Data </button></td>";
    echo "</tr>";

  }
  echo "</table>";


  ?>

  <button type="submit" value="Login" name="but_logout" id="but_logout" class="btn-primary btnSubmit logoutbut" > Logout </button>
</form>
</div>
</div>
</div>
<?=template_footer()?>
