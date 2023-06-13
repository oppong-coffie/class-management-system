<?php
session_start();

if (isset($_POST["verify"])) {
    // Retrieve the verification code entered by the user
    $enteredCode = $_POST["verification_code"];

    // Retrieve the verification code stored in the session
    $storedCode = $_SESSION['verification_code'];

    if ($enteredCode === $storedCode) {
        // Verification code matched, allow password reset
        // Redirect to the password reset page or perform necessary actions

        // Clear the verification code from the session
        unset($_SESSION['verification_code']);

        echo "
           <script>
                alert('Verification successful. You can now proceed to reset your password.');
                window.location.href='new_password.php';
           </script>
        ";
    } else {
        // Verification code does not match
        echo "
           <script>
                alert('Invalid verification code.');
                window.location.href='verification.php';
           </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verification</title>
</head>
<body>
    <h1>Verification</h1>
    <form method="post" action="">
        <label for="verification_code">Enter the verification code:</label>
        <input type="text" id="verification_code" name="verification_code" required>
        <br>
        <input type="submit" name="verify" value="Verify">
    </form>
</body>
</html>
