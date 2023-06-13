<?php
session_start();

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'class_management_db');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX || LOGIN</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="Assets/fonts/fonts.css">
    <link rel="stylesheet" href="Assets/fontawesome/css/all.css">
</head>

<body class="bg-gray-100 " style="font-family: poppins;">
    <!-- page contents -->
    <!-- page contents -->
    <div class="lg:grid lg:grid-cols-2">
        <!-- login image -->
        <div>
            <img class="lg:w-[50vw] lg:h-[100vh] mix-blend-normal" src="images/login-image.avif" alt="">
        </div>

        <div class="flex justify-center items-center">
            <form action="" method="post">
                <!-- login header -->
                <div class="text-center">
                    <p class="text-[24px] text-gray-500">ENTER YOUR USER ID TO</p>
                    <P class="text-[24px] text-gray-500"> VERIFY YOUR IDENTITY</P>
                </div>

                <!-- email input field -->
                <div class="mt-10">
                    <input class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" name="email" type="text" placeholder="Enter email">
                </div>

                <!-- submit button -->
                <div class="mt-6">
                    <input class="h-9 w-80 bg-[#8a70d6] rounded-md text-white text-[18px]" type="submit" value="SUBMIT" name="submit">
                </div>
        </div>
        </form>
    </div>
    </div>
    <!-- scripts -->
    <!-- scripts -->
    <script src="Assets/tailwind.js"></script>
    <script src="Assets/jquery-3.6.0.min.js"></script>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
    // Retrieving data from the form
    $email = $_POST["email"];

    // Execute the query to check if email exists in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $statement = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($statement);

    if (is_array($row)) {
        // Generate a verification code
        $verificationCode = generateVerificationCode();

        // Store the verification code in the session
        $_SESSION['verification_code'] = $verificationCode;

        // Send the verification email
        sendVerificationEmail($email, $verificationCode);

        // Redirect to the verification page
        echo "
           <script>
                alert('Verification email sent. Check your email to proceed.');
                window.location.href='verification.php';
           </script>
        ";
    } else {
        echo "
           <script>
                alert('Email not found.');
                window.location.href='index.php';
           </script>
        ";
    }
}

function generateVerificationCode() {
    // Generate a random verification code (you can customize the code generation logic)
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codeLength = 6;
    $verificationCode = '';

    for ($i = 0; $i < $codeLength; $i++) {
        $index = mt_rand(0, strlen($characters) - 1);
        $verificationCode .= $characters[$index];
    }

    return $verificationCode;
}

function sendVerificationEmail($email, $verificationCode) {
    // You should implement your own logic to send the verification email
    // Here's an example using PHP's mail() function (make sure your server is properly configured for sending emails)
    $subject = 'Password Reset Verification';
    $message = "Please use the following verification code to reset your password: $verificationCode";
    $headers = 'From: gyankwadwomends2001@gmail.com';

    mail($email, $subject, $message, $headers);
}
?>
