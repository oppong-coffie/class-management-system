<?php
session_start();
// Including the db file
require_once "./database/db_connection.php";
require_once "./database/LoginAuth.php";

// Creating object from the db
$db = new DB('localhost', 'root', '', 'class_management_system');
$db->connect();

// Creating an object of the LoginAuth
$loginauth = new LoginAuth($db);

if (isset($_POST["login"])) {
    // Retrieving data from the form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $user = $loginauth->loginLogic($email, $password, $role);

    if ($user) {
        // Set the appropriate session variable based on user role
        $_SESSION["email"] = $email;
    }
}
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

    <!-- scripts -->
    <!-- scripts -->
    <script src="Assets/tailwind.js"></script>
    <script src="Assets/jquery-3.6.0.min.js"></script>
</head>

<body class="" style="font-family: poppins;">
    <!-- page contents -->
    <!-- page contents -->
    <div class="lg:grid lg:grid-cols-2 ">
        <!-- login image -->
        <div class="md:flex md:justify-center md:items-center">
            <img class="lg:w-[50vw] lg:h-[100vh] mix-blend-normal" src="images/africa.avif" alt="">
        </div>

        <div class="flex justify-center items-center">
            <form action="" method="post">
                <!-- login header -->
                <div class="flex justify-center">
                    <div>
                        <p class="text-[40px] lg:text-[30px] "> CLASS <br> MANAGEMENT</p>
                    </div>
                </div>

                <!-- role input field -->
                <div class="mt-8">
                    <label class="text-[18px] lg:text-[18px] md:text-[25px]" for="role">Role</label><br>
                    <select class="h-10 w-80 lg:h-10 rounded-md lg:w-[400px] outline-none md:w-[600px] md:h-14 w-80 bg-blue-100 border focus:border-blue-600" name="role">
                        <option md:text-[25px] value="">-- select role --</option>
                        <option md:text-[25px] value="admin">admin</option>
                        <option md:text-[25px] value="teacher">teacher</option>
                        <option md:text-[25px] value="student">student</option>
                        <option md:text-[25px] value="parent">parent</option>
                    </select>
                </div>

                <!-- email input field -->
                <div class="mt-4">
                    <label class="text-[18px] lg:text-[18px] md:text-[25px]" for="email">Email</label><br>
                    <input class="w-80 h-10 lg:h-10 rounded-md outline-none lg:w-[400px] border focus:border-blue-600 bg-blue-100 p-2 md:w-[600px] md:h-14  " name="email" type="text" placeholder="Enter email">
                </div>

                <!-- password input field -->
                <div class="mt-4 flex">
                    <div>
                        <label class="text-[18px] lg:text-[18px] md:text-[25px]" for="password">Password</label><br>
                        <input id="password" class="h-10 w-80 lg:h-10 rounded-md outline-none lg:w-[400px] border focus:border-blue-600 bg-blue-100 p-2 md:w-[600px] md:h-14" name="password" type="password" placeholder="Enter password">
                    </div>
                    <div>
                        <p onclick="showPassword()">
                            <i id="icon" class="mt-10 fa-regular fa-eye -ml-6 lg:mt-10 md:mt-14"></i>
                        </p>
                    </div>
                </div>

                <!-- forget password link -->
                <div class="lg:text-[14px] text-right mt-4 ">
                    <a href="password-reset/confirm_email.php">
                        <p class="text-red-600 ]">Forgot password?</p>
                    </a>
                </div>

                <!-- submit button -->
                <div class="mt-6 pb-6">
                    <input class="h-10 w-80 lg:h-10 rounded-md outline-none lg:w-[180px] border focus:border-blue-600 bg-blue-600 text-white text-lg  md:w-[600px] md:h-14" type="submit" value="LOGIN" name="login">
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("icon");
            if (passwordField.type === "password") {
                passwordField.type = "text"
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password"
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>