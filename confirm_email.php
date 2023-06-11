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
                    <input class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" name="userid" type="text" placeholder="Enter id number">
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
    //retrieving data from the database
    $userId = $_POST["userid"];

    // Execute the query to check login credentials
    $query = "SELECT * FROM users WHERE userid='$userId'";
    $statement = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($statement);

    if (is_array($row)) {
        $_SESSION['userid'] = $row['userid'];  
        echo"
           <script>
                alert('user id verified successfully.Continue to reset password');
                window.location.href='new_pasword.php';
           </script>
        ";
    }else{
        echo"
           <script>
                alert('incorrect user id');
                window.location.href='index.php';
           </script>
        ";
    }


  
}
?>