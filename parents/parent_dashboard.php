<?php 
session_start();
$teacherid=$_SESSION['id'];
$std_id=$_SESSION['std_id'];
echo $std_id;
echo $teacherid;


//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

// fetch student data
$sql="SELECT * FROM students WHERE std_id='$std_id'";
$query=mysqli_query($connection, $sql);
$fetch=mysqli_fetch_assoc($query);
$std_class=$fetch['class'];


//START:: MATHS DATA
 //fetch maths exercise from database
 $mathsexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND `subject`='maths' AND type='exercise' AND term =1 AND class='$std_class'";
 $mathsexercisequery=mysqli_query($connection, $mathsexercisesql);
 $mathsexercisefetch=mysqli_fetch_array($mathsexercisequery);
 if ($mathsexercisefetch) {
    $mathsexercise = $mathsexercisefetch['mark'];
} else {
    $mathsexercise = 0;
}

 //fetch maths home work from database
 $mathshomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='maths' AND type='homework' AND term =1 AND class='jhs3'";
 $mathshomeworkquery=mysqli_query($connection, $mathshomeworksql);
 $mathshomeworkfetch=mysqli_fetch_array($mathshomeworkquery);
 if($mathshomeworkfetch) {
    $mathshomework = $mathshomeworkfetch['mark'];
} else {
    $mathshomework = 0;
}

// fetch maths exam from database
$mathsexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='maths' AND type='exam' AND term =1 AND class='jhs3'";
$mathsexamquery = mysqli_query($connection, $mathsexamsql);
$mathsexamfetch = mysqli_fetch_array($mathsexamquery);
if ($mathsexamfetch) {
    $mathsexam = $mathsexamfetch['mark'];
} else {
    $mathsexam = 0;
}
// END::MATHS DATA

//START:: ENGLISH DATA
 //fetch english exercise from database
 $englishexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='exercise' AND term =1 AND class='jhs3'";
 $englishexercisequery=mysqli_query($connection, $englishexercisesql);
 $englishexercisefetch=mysqli_fetch_array($englishexercisequery);
 if ($englishexercisefetch) {
    $englishexercise = $englishexercisefetch['mark'];
} else {
    $englishexercise = 0;
}

 //fetch english home work from database
 $englishhomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='homework' AND term =1 AND class='jhs3'";
 $englishhomeworkquery=mysqli_query($connection, $englishhomeworksql);
 $englishhomeworkfetch=mysqli_fetch_array($englishhomeworkquery);
 if($englishhomeworkfetch) {
    $englishhomework = $englishhomeworkfetch['mark'];
} else {
    $englishhomework = 0;
}

// fetch english exam from database
$englishexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='exam' AND term =1 AND class='jhs3'";
$englishexamquery = mysqli_query($connection, $englishexamsql);
$englishexamfetch = mysqli_fetch_array($englishexamquery);
if ($englishexamfetch) {
    $englishexam = $englishexamfetch['mark'];
} else {
    $englishexam = 0;
}
// END::ENGLISH DATA

//START:: SCIENCE DATA
 //fetch Science exercise from database
 $scienceexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='science' AND type='exercise' AND term =1 AND class='jhs1'";
 $scienceexercisequery=mysqli_query($connection, $scienceexercisesql);
 $scienceexercisefetch=mysqli_fetch_array($scienceexercisequery);
 if ($scienceexercisefetch) {
    $scienceexercise = $scienceexercisefetch['mark'];
} else {
    $scienceexercise = 0;
}

 //fetch science home work from database
 $sciencehomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='science' AND type='homework' AND term =1 AND class='jhs1'";
 $sciencehomeworkquery=mysqli_query($connection, $sciencehomeworksql);
 $sciencehomeworkfetch=mysqli_fetch_array($sciencehomeworkquery);
 if($sciencehomeworkfetch) {
    $sciencehomework = $sciencehomeworkfetch['mark'];
} else {
    $sciencehomework = 0;
}

// fetch science exam from database
$scienceexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='science' AND type='exam' AND term =1 AND class='jhs1'";
$scienceexamquery = mysqli_query($connection, $scienceexamsql);
$scienceexamfetch = mysqli_fetch_array($scienceexamquery);
if ($scienceexamfetch) {
    $scienceexam = $scienceexamfetch['mark'];
} else {
    $scienceexam = 0;
}
// END::SCIENCE DATA

//START:: FRENCH DATA
 //fetch Frence exercise from database
 $frenchexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='frence' AND type='exercise' AND term =1 AND class='jhs1'";
 $frenchexercisequery=mysqli_query($connection, $frenchexercisesql);
 $frenchexercisefetch=mysqli_fetch_array($frenchexercisequery);
 if ($frenchexercisefetch) {
    $frenchexercise = $frenchexercisefetch['mark'];
} else {
    $frenchexercise = 0;
}

 //fetch French home work from database
 $frenchhomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='frence' AND type='homework' AND term =1 AND class='jhs1'";
 $frenchhomeworkquery=mysqli_query($connection, $frenchhomeworksql);
 $frenchhomeworkfetch=mysqli_fetch_array($frenchhomeworkquery);
 if($frenchhomeworkfetch) {
    $frenchhomework = $frenchhomeworkfetch['mark'];
} else {
    $frenchhomework = 0;
}

// fetch French exam from database
$frenchexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='frence' AND type='exam' AND term =1 AND class='jhs1'";
$frenchexamquery = mysqli_query($connection, $frenchexamsql);
$frenchexamfetch = mysqli_fetch_array($frenchexamquery);
if ($frenchexamfetch) {
    $frenchexam = $frenceexamfetch['mark'];
} else {
    $frenchexam = 0;
}
// END::FRENCH DATA

//START:: R M E DATA
 //fetch R M E exercise from database
 $rmeexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='R M E' AND type='exercise' AND term =1 AND class='jhs1'";
 $rmeexercisequery=mysqli_query($connection, $rmeexercisesql);
 $englishexercisefetch=mysqli_fetch_array($englishexercisequery);
 if ($englishexercisefetch) {
    $rmeexercise = $rmeexercisefetch['mark'];
} else {
    $rmeexercise = 0;
}

 //fetch R M E home work from database
 $rmehomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='R M E' AND type='homework' AND term =1 AND class='jhs1'";
 $rmehomeworkquery=mysqli_query($connection, $rmehomeworksql);
 $rmehomeworkfetch=mysqli_fetch_array($rmehomeworkquery);
 if($rmehomeworkfetch) {
    $rmehomework = $rmehomeworkfetch['mark'];
} else {
    $rmehomework = 0;
}

// fetch R M E exam from database
$rmeexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='R M E' AND type='exam' AND term =1 AND class='jhs1'";
$rmeexamquery = mysqli_query($connection, $rmeexamsql);
$rmeexamfetch = mysqli_fetch_array($rmeexamquery);
if ($rmeexamfetch) {
    $rmeexam = $rmeexamfetch['mark'];
} else {
    $rmeexam = 0;
}
// END::R M E DATA

//START:: SOCIAL SYUDIES DATA
 //fetch social esocial from database
 $socialexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='social' AND type='exercise' AND term =1 AND class='jhs1'";
 $socialexercisequery=mysqli_query($connection, $socialexercisesql);
 $socialexercisefetch=mysqli_fetch_array($socialexercisequery);
 if ($socialexercisefetch) {
    $socialexercise = $socialexercisefetch['mark'];
} else {
    $socialexercise = 0;
}

 //fetch social home work from database
 $socialhomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='social' AND type='homework' AND term =1 AND class='jhs1'";
 $socialhomeworkquery=mysqli_query($connection, $socialhomeworksql);
 $socialhomeworkfetch=mysqli_fetch_array($socialhomeworkquery);
 if($socialhomeworkfetch) {
    $socialhomework = $socialhomeworkfetch['mark'];
} else {
    $socialhomework = 0;
}

// fetch social exam from database
$socialexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='social' AND type='exam' AND term =1 AND class='jhs1'";
$socialexamquery = mysqli_query($connection, $socialexamsql);
$socialexamfetch = mysqli_fetch_array($socialexamquery);
if ($socialexamfetch) {
    $socialexam = $socialexamfetch['mark'];
} else {
    $socialexam = 0;
}
// END::SOCIAL STUDIES DATA

//START:: CREATIVE ART DATA
 //fetch Creative Art ecreativeart from database
 $creativeartexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='creativeart' AND type='exercise' AND term =1 AND class='jhs1'";
 $creativeartexercisequery=mysqli_query($connection, $creativeartexercisesql);
 $creativeartexercisefetch=mysqli_fetch_array($creativeartexercisequery);
 if ($creativeartexercisefetch) {
    $creativeartexercise = $creativeartexercisefetch['mark'];
} else {
    $creativeartexercise = 0;
}

 //fetch Creative Art home work from database
 $creativearthomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='creativeart' AND type='homework' AND term =1 AND class='jhs1'";
 $creativearthomeworkquery=mysqli_query($connection, $creativearthomeworksql);
 $creativearthomeworkfetch=mysqli_fetch_array($creativearthomeworkquery);
 if($creativearthomeworkfetch) {
    $creativearthomework = $creativearthomeworkfetch['mark'];
} else {
    $creativearthomework = 0;
}

// fetch Creative ART exam from database
$creativeartexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='creativeart' AND type='exam' AND term =1 AND class='jhs1'";
$creativeartexamquery = mysqli_query($connection, $creativeartexamsql);
$creativeartexamfetch = mysqli_fetch_array($creativeartexamquery);
if ($creativeartexamfetch) {
    $creativeartexam = $creativeartexamfetch['mark'];
} else {
    $creativeartexam = 0;
}
// END::CREATIVE ART DATA

//START:: B D T DATA
 //fetch bdt exercise from database
 $bdtexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='bdt' AND type='exercise' AND term =1 AND class='jhs1'";
 $bdtexercisequery=mysqli_query($connection, $bdtexercisesql);
 $bdtexercisefetch=mysqli_fetch_array($bdtexercisequery);
 if ($bdtexercisefetch) {
    $bdtexercise = $bdtexercisefetch['mark'];
} else {
    $bdtexercise = 0;
}

 //fetch bdt home work from database
 $bdthomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='bdt' AND type='homework' AND term =1 AND class='jhs1'";
 $bdthomeworkquery=mysqli_query($connection, $bdthomeworksql);
 $bdthomeworkfetch=mysqli_fetch_array($bdthomeworkquery);
 if($bdthomeworkfetch) {
    $bdthomework = $bdthomeworkfetch['mark'];
} else {
    $bdthomework = 0;
}

// fetch bdt exam from database
$bdtexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='bdt' AND type='exam' AND term =1 AND class='jhs1'";
$bdtexamquery = mysqli_query($connection, $bdtexamsql);
$bdtexamfetch = mysqli_fetch_array($bdtexamquery);
if ($bdtexamfetch) {
    $bdtexam = $bdtexamfetch['mark'];
} else {
    $bdtexam = 0;
}
// END::B D T DATA

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../Assets/tailwind.js"></script>
    <link rel="stylesheet" href="../css/parent.css">
    <link rel="stylesheet" href="Assets/fontawesome/css/all.css">

</head>
<body>
    <div class="grid grid-cols-3">
        <div class="grid grid-cols-2">
            <img class="w-28" src="./images/login-image.avif" alt="">
           <p class="text-left"><span class="text-slate-400">Hello</span> <span class="md:text-2xl font-semibold">Emmanuel</span>, <span>welcome</span> </p>  
        </div>
        <div class="text-right p-2 text-gray-600 text-3xl"><i class="fa fa-bell"></i></div>
       
    </div>


    <div class="grid md:grid-cols-6 gap-2 p-3">
        <div class=" p-2 bg-slate-400 rounded gap-2 text-center">
            
        <table class="mt-4">
                            <thead>
                                <tr class="text-left p-60">
                                    <th class="pl-10 text-gray-500">SUBJECT</th>
                                    <th class="pl-[80px] text-gray-500">EXERCISE</th>
                                    <th class="pl-24 text-gray-500">HOMEWORKS</th>
                                    <th class="pl-24 text-gray-500">EXAM</th>
                                    <th class="pl-24 text-gray-500">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pl-10 ">ENGLISH</td>
                                    <td class="pl-[80px] "><?php echo $englishexercise; ?></td>
                                    <td class="pl-24"><?php echo $englishhomework; ?></td>
                                    <td class="pl-24"><?php echo $englishexam; ?></td>
                                    <td class="pl-24"><?php echo $englishexercise+$englishhomework+$englishexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-7 ">MATHS</td>
                                    <td class="pl-[80px] "><?php echo $mathsexercise; ?></td>
                                    <td class="pl-24"><?php echo $mathshomework; ?></td>
                                    <td class="pl-24"><?php echo $mathsexam; ?></td>
                                    <td class="pl-24"><?php echo $mathsexercise+$mathshomework+$mathsexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">SCIENCE</td>
                                    <td class="pl-[80px] "><?php echo $scienceexercise; ?></td>
                                    <td class="pl-24"><?php echo $sciencehomework; ?></td>
                                    <td class="pl-24"><?php echo $scienceexam; ?></td>
                                    <td class="pl-24"><?php echo $scienceexercise+$sciencehomework+$scienceexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">S. STUDIES</td>
                                    <td class="pl-[80px] "><?php echo $socialexercise; ?></td>
                                    <td class="pl-24"><?php echo $socialhomework; ?></td>
                                    <td class="pl-24"><?php echo $socialexam; ?></td>
                                    <td class="pl-24"><?php echo $socialexercise+$socialhomework+$socialexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">C. ART</td>
                                    <td class="pl-[80px] "><?php echo $creativeartexercise; ?></td>
                                    <td class="pl-24"><?php echo $creativearthomework; ?></td>
                                    <td class="pl-24"><?php echo $creativeartexam; ?></td>
                                    <td class="pl-24"><?php echo $creativeartexercise+$creativearthomework+$creativeartexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">R M E</td>
                                    <td class="pl-[80px] "><?php echo $rmeexercise; ?></td>
                                    <td class="pl-24"><?php echo $rmehomework; ?></td>
                                    <td class="pl-24"><?php echo $rmeexam; ?></td>
                                    <td class="pl-24"><?php echo $rmeexercise+$rmehomework+$rmeexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">FRENCH</td>
                                    <td class="pl-[80px] "><?php echo $frenchexercise; ?></td>
                                    <td class="pl-24"><?php echo $frenchhomework; ?></td>
                                    <td class="pl-24"><?php echo $frenchexam; ?></td>
                                    <td class="pl-24"><?php echo $frenchexercise+$frenchhomework+$frenchexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">B D T</td>
                                    <td class="pl-[80px] "><?php echo $bdtexercise; ?></td>
                                    <td class="pl-24"><?php echo $bdthomework; ?></td>
                                    <td class="pl-24"><?php echo $bdtexam; ?></td>
                                    <td class="pl-24"><?php echo $bdtexercise+$bdthomework+$bdtexam ?></td>
                                </tr>


                            </tbody>
                        </table>
            
        </div>

        
    </div>

    
    <div class="grid md:grid-cols-2 gap-10 bg-slate-500 m-3">
    <div class="ml-14 md:ml-0 px-5 bg-slate-200 rounded bg-green-500 text-2xl text-white font-bold">
            Best Course
            <h2 class="text-center mt-16 text-slate-200">Java</h2>
            <p class="text-center text-slate-200">90%</p>
        </div>
        <div class="bg-red-700 text-white p-6">
           <h1 class="text-2xl">Bad Score:</h1>
           <li class="text-2xl">Agile</li> 
           <li class="text-2xl">Java</li> 
        </div>

    </div>
</body>
</html>