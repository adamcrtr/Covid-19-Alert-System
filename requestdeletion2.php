<?php
//starts session
session_start();
//includes configuration information
include "config.php";

 // is user logged in or not
if(!isset($_SESSION['email'])){
   header('Location: login.php');
}

// logout for user
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');

}

// delete user data where email matches post data
if (isset($_POST['but_delete']))
{
    $query = "DELETE FROM users WHERE email = '" . $_POST['but_delete'] . "'";
    $result = mysqli_query($con, $query);
    session_destroy();
    header('Location: login.php');
}


//
if (isset($_POST['but_update']))
{
    //
    $query = "UPDATE users SET name = '" . $_POST['firstname'] . "', email = '" . $_POST['email'] . "' WHERE email = '" . $_POST['but_update'] . "'";
    $result = mysqli_query($con, $query);
    $_SESSION['email'] = $_POST['email'];
    //header('Location: login.php');
}

?>




<!doctype html>
<html>
    <head>


    </head>
    <body>
        <h1>Homepage</h1>

<!-- form to post data to server -->
<form method= "post" action = "">
<?php
//sets variable email as current session email
$email = $_SESSION['email'];
// slects name and email from database where email is current user email
$query = "SELECT name, email FROM users WHERE email = '". $email ."' " ;
//execeutes above query and stores data in variables
$result = mysqli_query($con, $query);
//builds table with headers
echo "<table border = '1'>
<tr>
  <th>Name</th>
  <th>Email</th>
  <th>Delete Data</th>

</tr>";
//while loop to return array of fetched data
//note read arrays and loops :-)😎
//also maybe add lname
  while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td><input type=\"text\" class=\"form-control\" name=\"name\" id=\"name\" required=\"required\" maxlength=\"80\" value=\"". $row['name'] ."\">  </td>";
    echo "<td><input type=\"text\" class=\"form-control\" name=\"email\" id=\"email\" required=\"required\" maxlength=\"80\" value=\"". $row['email'] ."\">  </td>";
    echo "<td> <button onclick=\"return confirm('Are you sure you want to delete all of your data?')\" name=\"but_delete\" value=\"" . $row['email'] . "\">Delete Data </button>
     <button onclick=\"return confirm('Are you sure you want to update all of your data?')\" name=\"but_update\" value=\"" . $row['email'] . "\">Update Data </button></td>";
    echo "</tr>";

  }
  echo "</table>";


  ?>

  <button type="submit" value="Login" name="but_logout" id="but_logout" class="btn-primary btnSubmit" > Logout </button>
</form>

    </body>
</html>
