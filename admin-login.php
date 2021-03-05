<?php

error_reporting(0);
session_start();
// Kullanıcı zaten login olmuşsa anasayfaya gidelim
/*if ( isset( $_SESSION[ "loggedin" ] ) && $_SESSION[ "loggedin" ] === true ) {
    header( "location: welcome.php" );
    exit;
}*/

// Ayar dosyası
require_once "config.php";


// Form gönderildiğinde veri kontrolleri yapılacka. Burası login formunda çalışacak
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST"
    and $_POST[ "inputtype" ] == "login" ) {

    // Kullanıcı adı boş mu?
    if ( empty( trim( $_POST[ "username" ] ) ) ) {
        $username_err = "Please enter username.";
    } else {

        if ( !filter_var( trim( $_POST[ "username" ] ), FILTER_VALIDATE_EMAIL ) ) {
            $username_err = "Please enter a valid email address.";
        } else {
            $username = trim( $_POST[ "username" ] );
        }
    }


    // Parola boş mu
    if ( empty( trim( $_POST[ "password" ] ) ) ) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim( $_POST[ "password" ] );
    }

    // Doğrula
    if ( empty( $username_err ) && empty( $password_err ) ) {
        // Select sorgusu hazırla
        $sql = "SELECT id, username, password  FROM users WHERE username = ?";

        if ( $stmt = mysqli_prepare( $link, $sql ) ) {
            // sorguya eğişkenleri gönderelim
            mysqli_stmt_bind_param( $stmt, "s", $param_username );

            // parametre ayarla
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ( mysqli_stmt_execute( $stmt ) ) {
                // Store result
                mysqli_stmt_store_result( $stmt );

                // Check if username exists, if yes then verify password
                if ( mysqli_stmt_num_rows( $stmt ) == 1 ) {
                    // Bind result variables
                    mysqli_stmt_bind_result( $stmt, $id, $username, $hashed_password );
                    if ( mysqli_stmt_fetch( $stmt ) ) {
                        if ( password_verify( $password, $hashed_password ) ) {
                            // Password is correct, so start a new session
                            //session_start();

                            // Store data in session variables
                            $_SESSION[ "loggedin" ] = true;
                            $_SESSION[ "id" ] = $id;
                            $_SESSION[ "username" ] = $username;

                            // Redirect user to welcome page
                            header( "location: index.php" );
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close( $stmt );
        }
    }

    // Close connection
    mysqli_close( $link );
	
	
	
	
}
	



// Define variables and initialize with empty values
$username = $password = $confirm_password = $name=$surname="";
$username_err = $password_err = $confirm_password_err = $name_err=$surname_err="";


?>
<?php
include "top.php";

?>
<div id="sayfabilgisi" adi="login" style="display: none;"></div>
<div class="icerik">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-5 col-lg-5">

      </div>
      <div class="col-sm-12 col-md-2 col-lg-2"></div>
      <div class="col-sm-12 col-md-5 col-lg-5">
		  <div class="login-baslik-buyuk">Login</div>
		  <div class="login-baslik-kucuk">Login to your account and vote for competitors or be a competitor</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>E-Mail</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span> </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span> </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary register-buton" value="Login">
          </div>
          <input value="login" type="hidden" name="inputtype">
        </form>
      </div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php


include "bottom.php";
?>
