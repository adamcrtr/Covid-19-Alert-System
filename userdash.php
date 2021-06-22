<?php

include "config.php";

 // Check user login or not
if(!isset($_SESSION['email'])){
   header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
	echo "You have logged out";
}

$message = 'Hello - You do not have any Covid isolation alerts';
$messageType = 'success';
$email = $_SESSION['email'];
$query ="SELECT firstname, alert, email from users WHERE email = '". $email. "'";
$result = mysqli_query($con,$query);




if (isset($_POST['but_alert']))
{
    if (isset($_POST['email'])){

      $query = "UPDATE users SET alert = '1' WHERE email = '" . $_POST['email'] . "'";
      mysqli_query($con, $query);
      $message = "Success - Successfully notified the user";
      $messageType = 'success';

      header("Refresh:0");
    }


}



if(isset($_POST['but_reset'])){
  $query = "UPDATE users SET alert = '0' WHERE email = '" . $_POST['email'] . "'";
  mysqli_query($con, $query);

  $message = 'Hello - You do not have any Covid isolation alerts';
  header("Refresh:0");
}

//below is a test
//$query = "UPDATE users SET test = (test - 1) WHERE email = '" . $email . "'";

?>





<?=template_header('userdash')?>

<div class="container headerbanner">
    <div class="row text-center">
      <div class="col-sm-12 ">
          <h4>Dashboard</h4>
        </div>
    </div>
</div>

      <style>


      </style>

      <div class="container headerbanner">
          <div class="row">
            <div class="col-sm-4 imgspace">
                <img class="img-fluid headimg" height="300px" width="300px" src="imgs/hands.jpg" />
                <div class="centered text">Hands</div>
            </div>
              <div class="col-sm-4 imgspace">
                  <img class="img-fluid headimg" height="300px" width="300px" src="imgs/face.jpg" />
                  <div class="centered text">Face</div>
              </div>
              <div class="col-sm-4 imgspace">
                  <img class="img-fluid headimg"  height="300px" width="300px" src="imgs/space2.jpg" />
                  <div class="centered text">Space</div>
              </div>
          </div>
      </div>

      <div class="container headerbanner">
          <div class="row">
            <div class="col-sm-4 imgspace">
                <img class="img-fluid headimg" height="300px" width="300px" src="imgs/hands2.jpg" />
            </div>
              <div class="col-sm-4 imgspace">
                  <img class="img-fluid headimg" height="300px" width="300px" src="imgs/face2.jpg" />
              </div>
              <div class="col-sm-4 imgspace">
                  <img class="img-fluid headimg"  height="300px" width="300px" src="imgs/space.jpg" />
              </div>
          </div>
      </div>

        <form method='post' action="" class="text-center">

        <hr class="space1">

        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
            <div>
              <h1>Dashboard</h1>
              <button class="btn btn-outline-dark"><a href="index.php?page=logout">Log Out</a></button>
              <button class="btn btn-outline-dark"><a href="index.php?page=requestdeletion">Details</a></button>
            </div>


        <?php

        while($row = $result->fetch_assoc()){
          //
          echo "<p>Welcome " . $row['firstname'] . "</p>";

          if ($row['alert'] == 1) {

            $message = "Alert - Someone you have been in contact with has the coronavirus. Please isolate for 10 days. If you have any symptoms seek medical advice.";
            $messageType = 'alert';
          }

        echo "<h1 class=". $messageType . ">" .  $message . "</h1>";
        ?>




        </form>


<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <p class="testinginfo">For testing purposes you can alert yourself by putting in your email and then use the reset button to reset the alert</p>

    </div>
  </div>
</div>


<!-- <iframe src="https://ourworldindata.org/grapher/covid-tests-cases-deaths-per-million?tab=chart&stackMode=absolute&time=2020-03-07..latest&country=~GBR&region=World" loading="lazy" style="width: 100%; height: 600px; border: 0px none;"></iframe>
-->

<form method= "post" action ="" class="text-center">
<?php

//builds table with headers
echo "<table border = '1' class='alerttable' >
<tr>

  <th>Email</th>
  <th>Alert</th>
  <th>Reset</th>

</tr>";



    echo "<tr>";
    echo "<td><input type=\"text\" class=\"form-control\" name=\"email\" id=\"email\" required=\"required\" maxlength=\"80\" value=\"" . "\">  </td>";
    echo "<td> <button class=\"btn btn-outline-dark btnuser\"onclick=\"return confirm('Are you sure you want to alert this user?')\" name=\"but_alert\" value=\"1" . $row['alert'] . "\">Alert User </button> </td>";
    echo "<td> <button class=\"btn btn-outline-dark btnuser\"onclick=\"return confirm('Are you sure you want to reset your alert?')\" name=\"but_reset\" value=\"0" . $row['alert'] . "\">Reset Alert </button> </td>";
    echo "</tr>";

  }
  echo "</table>";



  ?>
</form>

    </div>
  </div>
</div>
<?=template_footer()?>
