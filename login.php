






<?=template_header('login')?>

<div class="text-center container" id="login">
    <form method="post" action="">
        <div id="divlogin " class="col-sm-12">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox box" id="txt_email" name="txt_email" placeholder="Email Address" />
            </div>
            <div>
                <input type="password" class="textbox box" id="txt_pwd" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>

                <button id="loginbtn" class="btn btn-outline-dark regbutton" type="submit" name="but_submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>

<?php




// if submit button is pressed post these details to mysql
if(isset($_POST['but_submit'])){

    $email = mysqli_real_escape_string($con,$_POST['txt_email']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($email != "" && $password != ""){

        $sql_query = "select email, password from users where email='$email'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_assoc($result);


	//hashed passowrd in the row
        $hashed_password = $row['password'];

        //user password and email input is equal to password in database else invalid
        if(password_verify($password,$hashed_password)){
            $_SESSION['email'] = $email;
	    header('Location: index.php?page=userdash');
        }else{
            echo "<p>Invalid username and password</p>";
        }

    }

}

?>

<?=template_footer()?>
