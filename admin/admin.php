<?php
//starting session
session_start();

//including the database
include("../database/db_connection.php");



//database connection
$db = new DB('localhost', 'root', '', 'class_management_system');
$db->connect();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD || DASHBOARD</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/jquery-3.6.0.min.js"></script>
</head>

<body class=" h-[100vh] pt-6  pr-6" style="font-family: poppins;">
    <div class="">
        <!-- side nav -->
        <!-- side nav -->
        <div class="">
            <!-- including the side navigation bar -->
            <!-- including the side navigation bar -->
            <?php
        include("../nav/admin_nav.php")
        ?>

        </div>

    </div>
    <!-- page content -->
    <!-- page content -->
    <div class=" lg:ml-64  lg:grid lg:grid-cols-3 pb-10 lg:pb-0">
        <div class="col-span-2">
            <div class="grid grid-cols-3  bg-blue-600 h-[50px] lg:w-[670px] w-[290px] rounded-lg p-2">
                <div class="col-span-2">
                    <p class="lg:text-[22px] text-[18px] text-white">Admin Dashboard</p>
                </div>
                <!-- notification -->
                <!-- notification -->
                <div class="flex justify-center items-center ml-auto pr-4">
                    <i class="fa-reqular fa-regular fa-bell text-white"></i>
                </div>
            </div>

            <div class=" flex-cols-1 mt-10 lg:mt-20">
                <div class="lg:grid lg:grid-cols-3 lg:gap-[60px]">
                    <div class=" text-center ">
                        <!-- total  students -->
                        <div
                            class="h-60 w-60 ml-8 lg:ml-0 lg:w-40 bg bg-[#e9e3ff] rounded-md flex-cols-1 justify-center pt-4">
                            <div
                                class="w-[120px] h-[120px] bg-violet-400 rounded-md m-auto flex justify-center items-center">
                                <i class="fa-regular fa-screen-users text-[48px] text-white"></i>
                            </div>
                            <p class="ml-4 mt-2 text-[17px] text-gray-700">
                                Faculties
                            </p>
                            <div class="flex justify-center items-center">
                                <p class="text-[35px] text-gray-700">

                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- total  staff -->
                    <!-- total  staff -->
                    <div class="">
                        <div
                            class="h-60 text-center w-60 mt-4 ml-8 lg:ml-0 lg:w-40 bg bg-blue-100 rounded-md flex-cols-1 justify-center pt-4">
                            <div
                                class="w-[120px] h-[120px] bg-blue-400 rounded-md m-auto flex justify-center items-center">
                                <i class="fa-regular fa-person-chalkboard text-[48px] text-white"></i>
                            </div>
                            <p class="ml-4 mt-2 text-[17px] text-gray-700">
                                Departments
                            </p>

                            <div class="flex justify-center items-center">
                                <p class="text-[35px] text-gray-700">
                                    <?php
                                    ?>
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <!-- courses -->
                        <div
                            class="h-60 text-center bg mt-4  w-60 ml-8 lg:ml-0 lg:w-40 bg-gray-200 rounded-md flex-cols-1 justify-center pt-4">
                            <div
                                class="w-[120px] h-[120px] bg-gray-400 rounded-md m-auto flex justify-center items-center">
                                <i class="fa-regular fa-briefcase text-gray-500 text-[48px] text-white"></i>
                            </div>
                            <p class="ml-4 mt-2 text-[17px] text-gray-700">
                                Courses
                            </p>

                            <div class="flex justify-center items-center">
                                <p class="text-[35px] text-gray-700">
                                    <?php
                            ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <div
            class="m-auto flex flex-col justify-center  border border-dashed border-[3px] border-gray-300 rounded-lg w-full p-6 mt-8 lg:mt-0 ">
            <!-- profile -->
            <!-- profile -->
            <div>
                <div class="flex ">
                    <div>
                        <p class="text-[19px]">Profile</p>
                    </div>
                    <div class="ml-auto">
                        <a href="admin_profile_edit.php">
                            <div class="h-8 w-8 bg-gray-100 rounded-md flex justify-center items-center">
                                <i class="fa-light fa-pen fa-beat"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- profile logo-->
                <div class="flex justify-center mt-10">
                    <div class="text-center">
                        <!-- image -->
                        <div class="">
                            <?php
                            /*$email = $_SESSION["email"];
                                    $image_select_query = mysqli_query($connection,"SELECT images FROM registeration WHERE email='$email'");
                                    $row = mysqli_fetch_array($image_select_query);
                                    if(is_array($row)){
                                        $image  = $row["images"];
                                        echo "<img class='h-[60px] w-[60px] rounded-full' src='../images/$image' alt='Admin image'>";
                                    }*/
                            ?>
                        </div>

                        <!-- the name of the admin -->
                        <p class="text-[14px] text-gray-500">
                            <?php
                            /* $email = $_SESSION["email"];
                                    $select_query = mysqli_query($connection,"SELECT name FROM registeration WHERE email = '$email'");
                                    $row = mysqli_fetch_array($select_query);
                                    if(is_array($row)){
                                        echo $row["name"];
                                    }*/
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



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

    //redirect
    echo "
        <script>
            window.location.href='index.php';
        </script>
    ";
}
?>