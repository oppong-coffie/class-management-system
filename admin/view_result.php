<?php
session_start();
include("../database/db_connection.php");

//database connection
$db= new DB('localhost', 'root', '', 'class_management_system');
$db->connect();

//deleting a row
if (isset($_GET["delete"])) {
    $delete = $_GET["delete"];
    //delete query
    $delete_query = mysqli_query($connection, "DELETE FROM teachers WHERE id ='$delete'");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Teachers Registeration</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/jquery-3.6.0.min.js"></script>
</head>

<body class=" h-[100vh]" style="font-family: poppins;">
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
    <div class=" ml-[210px] pt-6 pb-10 pr-10">
        <div class="grid grid-cols-3">
            <div class="col-span-2">
                <p class="text-[25px]">View Result</p>
            </div>
        </div>

        <form action="" method="post">

            <div class="mt-8 shadow-md p-6">
                <div class="grid grid-cols-2">
                    <div class="">
                        <select
                            class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-md w-[280px] rounded-md pl-4 outline-none"
                            name="level" id="">
                            <option value="">-- select a level --</option>
                            <?php 
                                 // Selecting teachers detail from the database
                            $teacher_details =  "SELECT * FROM level";
                            $query = $db->query($teacher_details);
                            while ($row = $db->fetchArray($query)) {
                                echo '
                                    <option value="'.$row["Name"].'">'.$row["Name"].'</option>
                                ';
                            }
                        ?>
                            ?>
                        </select><br><br>



                        <select
                            class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md pl-4 outline-none"
                            name="year" id="">
                            <option value="">-- select a year --</option>
                            <?php 
                                 // Selecting teachers detail from the database
                            $teacher_details =  "SELECT * FROM accademicyear";
                            $query = $db->query($teacher_details);
                            while ($row = $db->fetchArray($query)) {
                                echo '
                                    <option value="'.$row["Name"].'">'.$row["Name"].'</option>
                                ';
                            }
                        ?>
                            ?>
                        </select><br><br>

                    </div>

                    <div class="">
                        <select
                            class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md pl-4 outline-none"
                            name="semester" id="">
                            <option value="">-- select semester --</option>
                            <?php 
                                 // Selecting teachers detail from the database
                            $teacher_details =  "SELECT * FROM semesters";
                            $query = $db->query($teacher_details);
                            while ($row = $db->fetchArray($query)) {
                                echo '
                                    <option value="'.$row["Name"].'">'.$row["Name"].'</option>
                                ';
                            }
                        ?>
                            ?>
                        </select><br><br>


                        <input name="indexNumber" type="text" id="myInput" placeholder="Enter index number..."
                            class="bg-blue-50 border border-blue-200 focus:border-blue-600  h-10 shadow-sm w-[280px] rounded-md pl-4 outline-none">
                    </div>


                </div>
                <!-- submit button -->
                <!-- submit button -->
                <div class="mt-8">
                    <input type="submit" name="submit" id="myInput2"
                        class="bg-blue-600 text-white h-10 w-[200px] rounded-md pl-4 outline-none"
                        value="Check Result">
                </div>
            </div>
        </form>

        <div class="mt-10 ">
            <div class=" border border-2 border-dashed border-gray-300 w-[1100px] p-6  rounded-lg">

                <!-- search bar -->
                <!-- search bar -->
                <div class="pb-10">
                    <form class="grid grid-cols-2 " action="" method="post">
                        <input type="search" onkeyup="mySearch()" id="myInput" placeholder="Search by id..."
                            class="bg-blue-100 h-10 shadow-sm w-[400px] rounded-md pl-4 outline-none">
                        <input type="search" onkeyup="mySearch2()" id="myInput2" placeholder="Search by name..."
                            class="bg-blue-100 h-10 w-[400px] rounded-md pl-4 outline-none">
                    </form>
                </div>

                <table id="myTable" class="shadow-md rounded-sm w-[1040px]" id="container">
                    <thead class=" bg-blue-600 border rounded-md ">
                        <tr class="text-left h-10  text-white">
                            <th>ID</th>
                            <th>SUDENT ID</th>
                            <th>LEVEL</th>
                            <th>SEMESTER</th>
                            <th>COURSE CODE</th>
                            <th>CREDIT HOURS</th>
                            <th> SCORE</th>
                            <th>GP</th>
                            <th>GRADE</th>
                            <th>POINTS</th>
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <?php
                      
                        if(isset($_POST["submit"])){
                            //retrieving data from the database
                            $level = $_POST["level"];
                            $year = $_POST["year"];
                            $semester = $_POST["semester"];
                            $index = $_POST["indexNumber"];

                            //selcting from the databsse
                            //selecting from the database 
                        $select = " SELECT * FROM results where `level` = '$level' AND `accademicYear`='$year' AND student_id = '$index'";
                        $filter_query = $db->query($select);
    
                        
                        while ($row = $db->fetchArray($filter_query)) {
                        ?>
                    <tbody>
                        <tr class="even:bg-[#e9e3ff] h-10">
                            <td><?php echo $row["Id"] ?></td>
                            <td><?php echo $row["student_id"] ?></td>
                            <td><?php echo $row["level"] ?></td>
                            <td><?php echo $row["semester"] ?></td>
                            <td><?php echo $row["courseCode"] ?></td>
                            <td><?php echo $row["CreditHours"] ?></td>
                            <td><?php echo $row["score"] ?></td>
                            <td><?php echo $row["scoreGradePoint"] ?></td>
                            <td><?php echo $row["scoreLetterGrade"] ?></td>
                            <td><?php echo $row["totalScoreGradePoint"] ?></td>
                            <td><?php echo $row["date"] ?></td>
                            <td>
                                <?php
                                        echo '
                                            <div class="flex  ">
                                                <a onclick="return confirm("Are you sure you want to delete?")" href="teacher_reg.php?id='.$row['Id'].'">
                                                    <div class=" text-gray-600 w-8 text-center rounded-sm">
                                                        <button>
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                </a>
                                                <a href="teachers_reg.php?delete='.$row['Id'].'">
                                                    <div class=" text-red-600 w-8 text-center rounded-sm"><button onclick="return confirmDelete()"><i class="fa fa-trash"></i></button><div>
                                                </a>
                                            </div>
                                            ';
                                        ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    }
                        ?>
                </table>

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

    <!-- live search -->
    <script>
    function mySearch() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        //getting the search input
        input = document.getElementById("myInput");
        //converting the input to upper case
        filter = input.value.toUpperCase();
        //getting the data in the table
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function mySearch2() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        //getting the search input
        input = document.getElementById("myInput2");
        //converting the input to upper case
        filter = input.value.toUpperCase();
        //getting the data in the table
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
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