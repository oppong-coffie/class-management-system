<?php
session_start();
$teacherid=$_SESSION['teacherid'];

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

//fetch info about teacher from database
$teachersql="SELECT * FROM teachers WHERE teacher_id='$teacherid'";
$teacherquery=mysqli_query($connection, $teachersql);
$teacherRow=mysqli_fetch_array($teacherquery);
$subject=$teacherRow['subject'];
$class='jhs2';
$term=1;

//update the daily report table
if(isset($_POST['upload'])){
//variables
$std_id=$_POST['std_id'];
$type="exercise";
$mark=$_POST['mark'];
$class='jhs2';

//sql statement to insert into database
$sql = "INSERT INTO scores (`std_id`, `teacher_id`, `subject`, `type`, `mark`, term, `class`) VALUES ('$std_id', '$teacherid', '$subject', '$type', '$mark', '$term', '$class')";
//query
$query=mysqli_query($connection, $sql);

if($query){
    echo "good";
}
else("bad");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHERS DASHBOARD || upload Records</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="Assets/fonts/fonts.css">
    <link rel="stylesheet" href="Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="Assets/tailwind.js"></script>
    <script src="Assets/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-[#fbfbfb] h-[100vh]" style="font-family: poppins;">
<link rel="stylesheet" href="main.css">
    <div class="">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute ">
            <div class="p-8">
                <!-- logo -->
                <!-- logo -->
                <div>
                    <p class="text-[18px]">logo</p>
                </div>
                <!-- nav links -->
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
            <!-- logout-->
            <form action="exerciseReport.php?teacherid=<?php echo $teacherid; ?>" method="post" onsubmit="return confirmLogout()">
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
            <div class=" col-span-2 ">
            
            <div class="grid grid-cols-3">
                <div>
                    <p class="text-[25px]">Manage Teachers</p>
                </div>
                <!-- search bar -->
                <!-- search bar -->
                <div class="-ml-10">
                    <form class="grid grid-cols-2 gap-10" action="" method="POST">
                        <input name="std_id" type="search" onkeyup="mySearch()" id="myInput" placeholder="Enter id..." class="bg-[#e9e3ff] h-10 w-[200px] rounded-md pl-4 outline-none">
                        <input name="mark" type="search" onkeyup="mySearch2()" id="myInput2" placeholder="Enter mark..." class="bg-[#e9e3ff] h-10 w-[200px] rounded-md pl-4 outline-none">
                        <button name="upload" type="submit"><div class="h-10 w-10 bg-[#8a70d6] rounded-md flex justify-center items-center">
                            <i class="fa-solid fa-regular fa-plus text-white"></i>
                        </div></button>
                        
                    </form>
                </div>
                <!-- add teacherg -->
                <!-- add teacher -->
                
            </div>


            <table id="myTable" class="table w-[800px]" id="container">
                        <thead class="p-2 bg-[#8a70d6] pl-2">
                            <tr class="text-center h-10 text-blue-100">
                                
                                
                                <th class="pl-20">INDEX</th>
                                <th class="pl-20">NAME</th>
                                <th class="pl-20">SCORE</th>
                                <th class="pl-20 pr-2">ACTION</th>
                            </tr>
                        </thead>
                        <?php
                        // Selecting teachers detail from the database
                        $roportdetails = mysqli_query($connection, "SELECT scores.*, students.name FROM scores JOIN students ON scores.std_id = students.std_id WHERE scores.subject = '$subject' AND scores.teacher_id = '$teacherid' AND scores.term='$term' AND scores.class='$class'");
                        while ($row = mysqli_fetch_array($roportdetails)) {
                        ?>
                            <tbody>
                                <tr class="even:bg-[#e9e3ff] h-10">
                                    <td class="pl-10"><?php echo $row["std_id"] ?></td>
                                    <td class="pl-10"><?php echo $row["name"] ?></td>
                                    <td class="pl-10"><?php echo $row["mark"] ?></td>
                                    <td class="pl-10 pr-2">
                                        <?php
                                        echo '
                                            <div class="flex gap-2">
                                                <a href="teacher_reg.php?id='.$row['id'].'">
                                                <div class="bg-[#8a70d6] text-white w-8 text-center rounded-sm"><button><i class="fa fa-edit"></i></button></div>
                                            </a>
                                                <a href="teachers_reg.php?delete='.$row['id'].'">
                                                    <div class="bg-red-600 text-white w-8 text-center rounded-sm"><button onclick="return confirmDelete()"><i class="fa fa-trash"></i></button><div>
                                                </a>
                                            </div>
                                            ';
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
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
                            <a href="">
                                <div class="h-8 w-8 bg-gray-100 rounded-md flex justify-center items-center">
                                    <i class="fa-light fa-pen fa-beat"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- profile logo-->
                    <div class="flex justify-center mt-10">
                        <div class="text-center">
                            <img class="h-20 w-20 rounded-full" src="images/login-image.avif" alt="">
                            <p>Mends Gyan</p>
                            <p class="text-[14px] text-gray-500">SHS two(2)</p>
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

    //redirecting the user to the login page
    header("Location:index.php");
}
?>