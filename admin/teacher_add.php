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


    if (isset($_POST["register"])) {
        // Retrieving data from the form and sanitizing input
        $name = $_POST["name"];
        $email = $_POST["email"];
        $faculty = $_POST["faculty"];
        $level = $_POST["level"];
        $accademicyear = $_POST["accademicyear"];;
        $password = $_POST["password"];
        $phone = $_POST["phone"];
        $studentid = $_POST["studentid"];
        $department = $_POST["department"];
        $gender = $_POST["gender"];
        $dob = $db->$_POST["dob"];
        $role = "student";
        $class = $_POST["class"];
        $image = $_FILES["images"]["name"];
        $img_temp_name = $_FILES['images']['tmp_name'];
        $img_path = "../images/" . $image;
        $date = date("Y-m-d");
    
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($img_temp_name, $img_path)) {
            // Inserting data into the database
            $insert_query =  "INSERT INTO students (`Images`,`Name`,`Email`,`Faculty`,`Level`,`AccademicYear`,`Password`,`Phone`,`StudentId`,`Department`,`Gender`,`Role`,`birthDate`,`Date`,class) VALUES ('$image', '$name', '$email', '$faculty', '$level', '$accademicyear', password('$password'), '$phone','$studentid','$department','$gender','$role','$dob','$date','$class')";
            $query = $db->query($insert_query);
    
    
            if ($query) {
                echo "<script>
                    alert('Registration Successful');
                    window.location.href = 'students_reg.php';
                </script>";
            } else {
                echo "<script>
                    alert('Registration Failed');
                </script>";
            }
        } else {
            echo "<script>
                alert('Failed to upload image');
            </script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Department Registeration</title>
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
    <div class=" ml-60 pt-6 pr-4">
        <div>
            <p class="text-[25px]">Add Teacher</p>
        </div><hr class="border border-blue-500 ">

        <div>
            <div class="flex justify-center items-center h-[90vh]">
                <!-- adding a new department -->
                <!-- adding a new department -->
                <div class="pb-10 ">
                    <form  action="" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-3 gap-10">
                            <!-- grid one -->
                            <!-- grid one -->
                            <div>
                                <!-- name input -->
                                <label for="">Name</label><br>
                                <input type="text" name="name" placeholder="Enter name"
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md  pl-4 outline-none"><br><br>

                                <!-- email input -->
                                <!-- email input -->
                                <label for="name">Email</label><br>
                                <input type="email" name="email" placeholder="Enter email"
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md  pl-4 outline-none"><br><br>

                                <!-- faculty input -->
                                <!-- faculty input -->
                                <label for="faculty">Faculty</label><br>
                                <select
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md pl-4 outline-none"
                                    name="faculty" id="">
                                    <option value="">-- select a faculty --</option>
                                    <?php 
                                 // Selecting teachers detail from the database
                            $teacher_details =  "SELECT * FROM faculty";
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

                            <!-- grid one -->
                            <!-- grid one -->
                            <div>
                               
                              

                                <label for="name">Password</label><br>
                                <input type="text" name="password" id="myInput" placeholder="Add a password"
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md  pl-4 outline-none"><br><br>

                                <label for="name">Phone</label><br>
                                <input type="text" name="phone" id="myInput" placeholder="Add a Department"
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md  pl-4 outline-none"><br><br>

                                    <label for="name">Student Id</label><br>
                                <input type="text" name="studentid" id="myInput" placeholder="Add student id"
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md  pl-4 outline-none"><br><br>

                            </div>

                            <!-- grid one -->
                            <!-- grid one -->
                            <div>
                                <label for="name">Department</label><br>

                                <select
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md pl-4 outline-none"
                                    name="department" id="">
                                    <option value="">-- select department--</option>
                                    <?php 
                                 // Selecting teachers detail from the database
                            $teacher_details =  "SELECT * FROM department";
                            $query = $db->query($teacher_details);
                            while ($row = $db->fetchArray($query)) {
                                echo '
                                    <option value="'.$row["Name"].'">'.$row["Name"].'</option>
                                ';
                            }
                            ?>
                                    ?>
                                </select><br><br>

                                <label for="name">Gender</label><br>
                                <select
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md pl-4 outline-none"
                                    name="gender" id="">
                                    <option class="text-gray-300" value="">-- select gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Male">Female</option>
                                  
                                </select><br><br>

                                <label for="name">Birth Date</label><br>
                                <input type="date" name="dob" id="myInput" placeholder="Add student id"
                                    class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md  pl-4 outline-none"><br><br>
                                    
                                    <label for="name">Image</label><br>
                                    <input type="file" name="images" id="myInput" placeholder="Add student id"
                                        class="bg-blue-50 border border-blue-200 focus:border-blue-600 h-10 shadow-sm w-[280px] rounded-md  pl-4 outline-none"><br><br>
                                
                                    
                                  
                                </select><br><br>
                            </div>
                        </div>
                        <!-- submit button -->
                        <div class="flex justify-center mt-6">
                        <input name="register" value="Register Student"
                        class="h-10 ml-4 text-white w-80 bg-blue-600 rounded-md flex justify-center items-center"
                        type="submit">
                        </div>


                    </form>
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