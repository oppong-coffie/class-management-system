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
    <title>STUDENTS DASHBOARD || DASHBOARD</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="Assets/fonts/fonts.css">
    <link rel="stylesheet" href="Assets/fontawesome/css/all.css">
</head>

<body class="bg-[#fbfbfb]" style="font-family: poppins;">
    <div class="">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute ">
            <div class="p-8">
                <!-- logo -->
                <div>
                    <p class="text-[18px]">logo</p>
                </div>
                <!-- nav links -->
                <div class="mt-8">
                    <li class="list-none active:bg-[#e9e3ff]">
                        <i class="fa-regular fa-house text-gray-500"></i><a class="ml-2 text-gray-500" href="student.php">Dashboard</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Courses</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-square-poll-vertical text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Results</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-comment text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Chat</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-gear text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Settings</a>
                    </li>

                </div>
            </div>

            <!-- logout-->
            <form action="" method="post" onsubmit="return confirmLogout()">
                <div class="h-10 bg-[#8a70d6] bottom-0 fixed w-60 text-black p-2 flex">
                    <div>
                        <input class="h-10 bg-[#8a70d6] bottom-0 fixed text-white p-2 w-40 flex text-[20px]" type="submit" value="LOGOUT" name="logout">
                    </div>
                    <div class="ml-auto ">
                        <i class="fa-solid fa-right-from-bracket text-[22px]  text-blue-50"></i>
                    </div>
                </div>
            </form>
        </div>
        <!-- page content -->
        <!-- page content -->
        <div class=" ml-64 pt-6 grid grid-cols-3">
            <div class="grid grid-cols-3 col-span-2 ">
                <div>
                    <p class="text-[25px]">Dashboard</p>
                </div>
                <!-- search bar -->
                <div>
                    <form action="" method="post">
                        <input type="search" class="bg-[#e9e3ff] h-10 w-80 rounded-md">
                    </form>
                </div>
                <!-- notification -->
                <div class="flex justify-center ">
                    <div class="h-10 w-10 bg-[#e9e3ff] rounded-md">

                    </div>
                </div>
            </div>
            <div class="">
                <!-- profile -->
                <div>

                </div>
                <!-- calender -->
                <div>

                </div>
                <!-- class progress -->
                <div>

                </div>
            </div>
        </div>
    </div>


    <!-- scripts -->
    <!-- scripts -->
    <script src="Assets/tailwind.js"></script>
    <script src="Assets/jquery-3.6.0.min.js"></script>
    <!-- confirm before delete -->
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to logout?");
        }
    </script>
</body>

</html>

<?php
//checking if user is logged in
if (isset($_POST['logout'])) {
    //unset all the session
    session_unset();

    //destroying the session
    session_destroy();

    //redirecting the user to the login page
    header("Location:index.php");
}
?>