<?php




function pdo_connect_mysql() {
    // Mysql database details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'covidsystem';

    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error
    	exit('Failed to connect to database!');
    }
}



function template_header($covidsystem) {

//is email set EMAIL equals email else empty
$EMAIL = isset($_SESSION['email']) ? $_SESSION['email'] : '';

//if its set true else false, display relevant buttons if user logged in or not
$loginVisible =  isset($_SESSION['email']) ? "none" : "inline";
$dashboardVisible =  isset($_SESSION['email']) ? "inline" : "none";



// echo below between EOT and EOT displays all relevant stylesheets and the navigation bar which i displayed on each page
echo <<<EOT

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>$covidsystem | $EMAIL </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="imgs/favicon512.png"/>

	</head>
	<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a href="index.php" class="navbar-brand">Liverpool Covid-19 Alert System</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                  <a href="index.php" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                  <a href="index.php?page=covidsymptoms" class="nav-link">Covid-19 Information</a>
              </li>
              <li class="nav-item">
                  <a href="https://www.smartsurvey.co.uk/s/GKBWKM/" class="nav-link" target="_blank" rel="noopener noreferrer">Questionnaire</a>
              </li>
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item">

                  <a href="index.php?page=login" class="nav-link" style="display:$loginVisible">Login</a>

              </li>
              <li class="nav-item">
                  <a href="index.php?page=register" class="nav-link" style="display:$loginVisible">Register</a>
              </li>
              <li class="nav-item">

                 <a href="index.php?page=userdash" class="nav-link" style="display:$dashboardVisible">Dashboard</a>

               </li>
              <li class="nav-item">
                  <a href="index.php?page=logout" class="nav-link" style="display:$dashboardVisible">Logout</a>
              </li>
          </ul>
      </div>

  </nav>



        <main>
EOT;
}
// this section the echo EOT included is for the footer which displayes on each page
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer class="col-sm-12">
            <div class="text-center col-sm-12">
                <hr class="footerspace">
                <p>&copy; $year Covid System</p>
                <hr class="footerspace">
                <div class="container">
  <div class="row">
    <div class="col"><a href="index.php?page=adminlogin">Admin Log in</a></div>
    <div class="col"></div>
    <div class="w-100"></div>
    <div class="col"><a href="index.php?page=admindash">Admin Dash</a></div>
    <div class="col"></div>
  </div>
</div>
        </footer>
        <script src="script.js"></script>

    </body>
</html>
EOT;
}
?>
