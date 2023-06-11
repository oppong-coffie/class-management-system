<?php
session_start();

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'class_management_db');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .active {
            background-color: #e9e3ff;
            height: 30px;
            border-radius: 5px;
            padding-left: 4px;
            padding-top: 2px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD || DASHBOARD</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="Assets/fonts/fonts.css">
    <link rel="stylesheet" href="Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="Assets/tailwind.js"></script>
    <script src="Assets/jquery-3.6.0.min.js"></script>
</head>

<body class=" h-[100vh]" style="font-family: poppins;">
    <div class="">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute ">
            <div class="p-8">
                <!-- logo -->
                <!-- logo -->
                <div class=" ">
                    <img class="h-20 w-20 rounded-full" src="images/success-student-consulting_7109-29.avif" alt="">
                    <p></p>
                </div>
                <!-- nav links -->
                <!-- nav links -->
                <div class="mt-8">
                    <li class="list-none active">
                        <i class="fa-regular fa-house text-gray-500 "></i><a class="ml-2 text-gray-500" href="admin.php">Dashboard</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Courses</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="teachers_reg.php">Teachers</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Students</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Parents</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">User</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-square-poll-vertical text-gray-500"></i><a class="ml-2 text-gray-500" href="">Results</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-comment text-gray-500"></i><a class="ml-2 text-gray-500" href="">Chat</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-gear text-gray-500"></i><a class="ml-2 text-gray-500" href="">Settings</a>
                    </li>

                </div>
            </div>

            <!-- logout-->
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
                <!-- search bar -->
                <div class="-ml-10">
                    <form action="" method="post">
                        <input type="search" placeholder="Enter what to search" class="bg-[#e9e3ff] h-10 w-80 rounded-md pl-4 outline-none">
                    </form>
                </div>
                <!-- notification -->
                <!-- notification -->
                <div class="flex justify-center -ml-20">
                    <div class="h-10 w-10 bg-[#e9e3ff] rounded-md flex justify-center items-center">
                        <i class="fa-reqular fa-regular fa-bell "></i>
                    </div>
                </div>


                <div class=" flex-cols-1 mt-6">
                    <div class="grid grid-cols-3 lg:gap-[260px]">
                        <div class="">
                            <div class="h-60 w-40 bg bg-[#e9e3ff] rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-[#8a70d6] rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-regular fa-screen-users text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                    Total Students
                                </p>
                            </div>

                        </div>
                        <div class="">
                            <div class="h-60 w-40 bg bg-blue-100 rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-blue-400 rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-regular fa-person-chalkboard text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                    Total Staffs
                                </p>
                            </div>

                        </div>
                        <div class="">
                            <div class="h-60 w-40 bg bg-yellow-100 rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-[#E8A462] rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-regular fa-briefcase text-gray-500 text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                    Total Courses
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- courses -->
                    <!-- courses -->
                    <div class="mt-20">
                        <table class="mt-4">
                            <pt class="text-[18px]">My Courses</p>
                                <thead>
                                    <tr class="text-left p-60">
                                        <th class=" text-gray-500">ID</th>
                                        <th class="pl-10 text-gray-500">Cousrses</th>
                                        <th class="pl-[80px] text-gray-500">Teacher</th>
                                        <th class="pl-24 text-gray-500">Day</th>
                                        <th class="pl-24 text-gray-500">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">1</td>
                                        <td class="pl-10 ">Social.Studies</td>
                                        <td class="pl-[80px] ">Mr.Benson</td>
                                        <td class="pl-24">Monday</td>
                                        <td class="pl-24">1:30pm</td>
                                    </tr>




                                </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <div class="m-auto flex flex-col justify-center space-y-[90px] -ml-[0px] ">
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
                            <?php
                            $select_query = mysqli_query($connection, "SELECT t.image
                                    FROM teachers t
                                    JOIN links l ON t.id = l.teacher_id
                                    WHERE t.id = " . $_SESSION["userid"]);

                            if ($select_query) {
                                if (mysqli_num_rows($select_query) > 0) {
                                    $row = mysqli_fetch_assoc($select_query);
                                    $image = $row["image"];
                                    echo "<img class='h-[60px] w-[60px] rounded-full' src='images/$image' alt='Teacher Image'>";
                                } else {
                                    echo "<p>Name not found</p>";
                                }
                            } else {
                                echo "Query error: " . mysqli_error($connection);
                            }
                            ?>
                            <!-- the name of the admin -->
                            <p>
                                <?php
                                $select_query = mysqli_query($connection, "SELECT t.name
                                        FROM teachers t
                                        JOIN links l ON t.id = l.teacher_id
                                        WHERE t.id = " . $_SESSION["userid"]);

                                if ($select_query) {
                                    if (mysqli_num_rows($select_query) > 0) {
                                        $row = mysqli_fetch_assoc($select_query);
                                        $name = $row["name"];
                                        echo "<p>$name</p>";
                                    } else {
                                        echo "<p>Name not found</p>";
                                    }
                                } else {
                                    echo "Query error: " . mysqli_error($connection);
                                }
                                ?>

                            </p>
                            <p class="text-[14px] text-gray-500">Admin</p>
                        </div>
                    </div>
                </div>

                <!-- class progress -->
                <!-- class progress -->
                <div>
                    <div class=" ">
                        <p class="text-[19px]">Class Progress</p>
                        <!-- class exercises -->
                        <a href="">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-pen-line text-white"></i>
                                </p>
                                <p class="text-white">
                                    Exercises
                                </p>
                                <p class="ml-auto">
                                    <i class="fa-solid fa-greater-than text-white"></i>
                                </p>
                            </div>
                        </a>
                        <!-- class quize -->
                        <a href="">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-user-pen text-white"></i>
                                </p>
                                <p class="text-white">
                                    Quizes
                                </p>
                                <p class="ml-auto">
                                    <i class="fa-solid fa-greater-than text-white"></i>
                                </p>
                            </div>
                        </a>
                        <!-- class assignment -->
                        <a href="">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-house-person-return text-white"></i>
                                </p>
                                <p class="text-white">
                                    Assignments
                                </p>
                                <p class="ml-auto">
                                    <i class="fa-solid fa-greater-than text-white"></i>
                                </p>
                            </div>
                        </a>
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