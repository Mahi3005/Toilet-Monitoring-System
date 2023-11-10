
    <?php
// Start the session
session_start();

// Check if the variable is set in the session
if(isset($_SESSION['otp'])) {
    // Retrieve the variable from the session
    $otp = $_SESSION['otp'];
    // LOGIC TO COMPARE 

        $UserOtp = $_POST['otp_1'];

        if($UserOtp==$otp)
         {
            header("Location: newPassword.php");
            exit();

         }
         else{
            echo "OTP NOT MATCHED!";
         }
} else {
    echo "Variable not set!";
}
?>
