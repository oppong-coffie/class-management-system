<?php
session_start();

//including the db file
include("../database/db_connection.php");

//creating object from the db
$db = new DB('localhost', 'root', '', 'class_management_system');
$db->connect();


//deleting a row
if(isset($_GET["delete"])){
    $delete = $_GET["delete"];
    //delete query
    $delete_query = mysqli_query($connection,"DELETE FROM teachers WHERE id ='$delete'");

}

if(isset($_POST["addFaculty"])){
    //retrieving data from the database
    $faculty = $_POST["faculty"];

    //insedrting into the databaseif(isset($_POST["addFaculty"])){
    //retrieving data from the database
    $faculty = $_POST["faculty"];
    $date = date("Y-m-d"); 

    //insedrting into the database
    $insert = "INSERT INTO faculty (`name`,`date`) VALUES ('$faculty','$date')";
    $query = $db->query($insert);
    if($query){
        echo"
            <script>;
                alert('Faculty added successfully');
            </script>;
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Faculty Registeration</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
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
    <div class=" ml-[210px] pt-6 pr-4">
        <div class="grid grid-cols-3">
            <div class="col-span-2">
                <p class="text-[25px]">Manage Courses</p>
            </div>
            
            <!-- add teacherg -->
            <!-- add teacher -->
            <a href="course_add.php">
                <div class="flex justify-center -ml-20">
                    <div class="h-10 w-10 bg-blue-600 rounded-md flex justify-center items-center">
                        <i class="fa-solid fa-regular fa-plus text-white"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="mt-10 ">
            <div class=" border border-2 border-dashed border-gray-300 w-[1040px] p-6  rounded-lg">

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

                <table id="myTable" class="shadow-lg rounded-sm w-[1000px]" id="container">
                    <thead class=" bg-blue-600 border rounded-md ">
                        <tr class="text-left h-10  text-white">
                            <th>ID</th>
                            <th>NAME</th>
                            <th>CODE</th>
                            <th>Credit Hours</th>
                            <th>LEVEL</th>
                            <th>FACULTY</th>
                            <th>DEPARTMENT</th>
                            <th>SEMESTER</th>
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <?php
                       
                        // Selecting teachers detail from the database
                        $teacher_details =  "SELECT * FROM courses";
                        $query = $db->query($teacher_details);
                        while ($row = $db->fetchArray($query)) {
                        ?>
                    <tbody>
                        <tr class="even:bg-[#e9e3ff] h-10">
                            <td><?php echo $row["Id"] ?></td>
                            <td><?php echo $row["Name"] ?></td>
                            <td><?php echo $row["Code"] ?></td>
                            <td><?php echo $row["creditHours"] ?></td>
                            <td><?php echo $row["level"] ?></td>
                            <td><?php echo $row["faculty"] ?></td>
                            <td><?php echo $row["department"] ?></td>
                            <td><?php echo $row["semester"] ?></td>
                            <td><?php echo $row["date"] ?></td>
                            <td class="text-center">
                                <?php
                                        echo '
                                            <div class="flex gap-2 ">
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
                        ?>
                </table>

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