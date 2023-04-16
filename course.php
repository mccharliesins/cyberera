<!DOCTYPE html>

<?php require ("db.php"); ?> 
<?php
session_start();
$chapternumber=$_GET['chapter'];
if($chapternumber==4){
    header('Location: '.'dashboard.php');
}
$sql = mysqli_query($conn, "SELECT * FROM `courses` WHERE chapter='$chapternumber'"); 
$row = mysqli_num_rows($sql); 
while ($row = mysqli_fetch_array($sql)){
    $title=$row['title'];
    $content=$row['content'];
}

$sqll = mysqli_query($conn, "SELECT * FROM `courses` WHERE chapter='$chapternumber'"); 
$roww = mysqli_num_rows($sqll); 
while ($roww = mysqli_fetch_array($sqll)){
    $title=$roww['title'];
    $content=$roww['content'];
}














?>









<html lang="en">
<head> 
<link rel="stylesheet" href="sstyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyberera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<nav>
    <div class="logo" id="logo"><h1 data-value="Cyberera" class="logotext">Cyberera</h1></div>
    <div class="menu-items">
      <ul>
        <li><a href="index.php" data-value="home">Home</a></li>
        <li><a href="courses.php" class="active" data-value="courses">Courses</a></li>
        <li><a href="logout.php" data-value="logout">Logout</a></li>
      </ul>
    </div>
    <div class="hamburger" id="hamburger">
      <div id="line1"></div>
      <div id="line3"></div>
    </div>
  </nav>
  <div class="navwhole" id="menuheight">
    <div id="undernav"></div>
  </div>
    <div id="blur"></div>
    <div id="blob"></div>
    <div id="undernav"></div>

    <div class="everything">
    <div class="home">
        <div class="maindsection">
                <div class="allcontent">
                    <!-- course head details -->
            <div class="headercourse">
                <i class="fa fa-arrow-left"></i>  <h2 class="hello"><?php echo $title; ?></h2>
</div>
            <div class="headerimagecourse"><img width="100%" src="course<?php echo $chapternumber;?>.png"/></div>
            <div class="contentcourse"><?php echo $content; ?></div>
            <div class="quiz">
                <h3>
                <?php 
            
            $sqll = mysqli_query($conn, "SELECT * FROM `quizes` WHERE chapterno='$chapternumber'"); 
$roww = mysqli_num_rows($sqll); 
while ($roww = mysqli_fetch_array($sqll)){

    echo $roww['question'];
    echo "<br>";
    echo "<br><input type='radio'>";
    echo $roww['option1'];
    echo "<br><input type='radio'>";
    echo $roww['option2'];
    echo "<br><input type='radio'>";
    echo $roww['option3'];
    echo "<br><input type='radio'>";
    echo $roww['option4'];
    echo "<br>";
    echo "<br>";
    echo "<br>";
}
?></h3></div>


            <div class="footercourse">

            <div class="ford"> <a href="course.php?chapter=<?php echo $chapternumber+1; ?>" class="buttonmainclick">
                <?php if($chapternumber<3){
                    echo "Next Chapter ";
                }else{
                    echo "Complete";
                }
                
                ?></a>
                
            </div>

        </div></div>
</div>
    </div>
<script src="main.js"></script>
</body>
</html>
