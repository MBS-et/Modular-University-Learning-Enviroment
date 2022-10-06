
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main Project</title>
    <!-- google icons -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link href="img/main-logo.png"   rel="icon">
    <!-- Main Body Css -->
    <link rel="stylesheet" href="./index.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  
  <body>
    
    <header>
        <div class="top">
            <div class="logo" id="header-logo">
              <i class="material-symbols-outlined">school</i>
              <h2 id="header-logo-h2">M.U<span class="green-text">.L.E</span></h2>
            </div>
            <div class="Untoggle" id="unToggle-btn">
                    <span class="material-symbols-outlined">menu</span>
            </div>
            <div class="top-right">
                <div class="theme">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="user-information">
                        <p>Hey,<b class="user-name">Admin</b></p>
                        <small class="text-muted" id="role">Admin</small>
                    </div>
                    <div class="profile-picture">
                        <span class="material-symbols-outlined"> account_circle</span>
                    </div>
                </div>
              </div>
          </div>
           
    </header>
    <div class="container">
      <aside>   
        <div class="sidebar">
            <a href="./index.php" class="active" id="dash">
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
            </a>
            <a href="./Department/department.php" id="Dep">
                <span class="material-symbols-outlined">view_list</span>
                <h3>Department</h3>
            </a>
            <a href="./Batch/batch.php"  id="batch">
                <span class="material-symbols-outlined">safety_divider</span>
                <h3>Batch</h3>
            </a>
            <a href="./student/student.php" id="std">
                <span class="material-symbols-outlined">group</span>
                <h3>Students</h3>
            </a>
            <a href="./instructor/instructor.php" id="inst">
                <span class="material-symbols-outlined">groups</span>
                <h3>Instructors</h3>
            </a>
            <a href="./course/course.php" id="cor">
                <span class="material-symbols-outlined">library_books</span>
                <h3>Courses</h3>
            </a>
            <a href="./app/app.php" id="app">
                <span class="material-symbols-outlined">apps</span>
                <h3>Apps</h3>
            </a>
            
            <a href="../login/login.php" id="logout">
                <span class="material-symbols-outlined">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
      </aside>
      <main>
        <div class="dashboard">
            <div class="left">
                <h1>Dashboard</h1>
            <div class="insights">
              <!-- insights -->
                <div class="dash-Instructors">
                  <!-- instruct -->
                  <span class="material-symbols-outlined">groups</span>
                  <div class="middle">
                    <div class="left">
                      <h3>Active Instructors</h3>
                      

                      
<?php
 include_once './server/connection.php';
$query="SELECT * FROM instructor ";
$select_all=mysqli_query($con,$query);
$instructor_count=mysqli_num_rows($select_all);
echo "<h1 class='amt-active-instructors'>{$instructor_count}</h1> ";
?>


                    </div>
                    
                  </div>
                </div>
                <!-- student -->
                <div class="dash-Students">
                  <span class="material-symbols-outlined">group</span>
                  <div class="middle">
                    <div class="left">
                      <h3>Active Students</h3>
                        <?php
 include_once './server/connection.php';
$query="SELECT * FROM students ";
$select_all=mysqli_query($con,$query);
$student_count=mysqli_num_rows($select_all);
echo "<h1 class='amt-active-Students'>{$student_count}</h1> ";
?>

                      
                    </div>
                    

                  </div>

                </div>
                <!-- courses -->
                <div class="dash-Courses">
                  <span class="material-symbols-outlined">menu_book</span>
                  <div class="middle">
                    <div class="left">
                      <h3>Active Courses</h3>
                       <?php

 include_once './server/connection.php';
$query="SELECT * FROM course ";
$select_all=mysqli_query($con,$query);
$course_count=mysqli_num_rows($select_all);
echo "<h1 class='amt-active-Courses'>{$course_count}</h1>"
?>

                    </div>
                   
                    <!-- courses -->
                  </div>
               
                </div>
 
<div class="dash-Departments">
                  <!-- depart -->
                  <span class="material-symbols-outlined">group</span>
                  <div class="middle">
          <!-- middle -->
            <div class="right">
              <!--  -->
                      <h3>Active Departments</h3>
<?php
 include_once './server/connection.php';
$sql="SELECT * FROM department";
$select_all=mysqli_query($con,$sql);
$depart_count=mysqli_num_rows($select_all);

echo "<h1 class='amt-active-Students'>{$depart_count}</h1>";
?>


                      
                <!--  -->
              </div>
                <!-- middle -->
                </div>

                 <!-- depart -->

                     </div>

<div class="dash-Batchs">
                  <!-- depart -->
                  <span class="material-symbols-outlined">group</span>
                  <div class="middle">
          <!-- middle -->
            <div class="right">
              <!--  -->
                      <h3>Active Batchs</h3>
<?php
 include_once './server/connection.php';
$sql="SELECT * FROM student_batchs";
$select_all=mysqli_query($con,$sql);
$batch_count=mysqli_num_rows($select_all);

echo "<h1 class='amt-active-Students'>{$batch_count}</h1>";
?>
                      
                <!--  -->
              </div>
                <!-- middle -->
                </div>

                 <!-- depart -->

                     </div>
                 <!-- insights -->
              </div>
            </div>

            
            <!-- <div class="right">

            </div> -->
<!-- <<<<<<< HEAD -->
            <!-- <div>
              <H1>Hello World</H1>
            </div> -->
        </div>
<!-- ======= -->
           
            
<!--  -->

 <div class="row">
       <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Total'],

                          <?php
$element_text=['Active Instructors','Active Students','Active Courses','Active Departments','Active Batchs'];
$element_count=[$instructor_count,$student_count,$course_count,$depart_count,$batch_count];

for($i=0;$i<5;$i++){

  echo "['{$element_text[$i]}'" .","."{$element_count[$i]}],";
}

  ?>





         
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
         
          },colors:['#6941c6','#6941c6','#6941c6','#6941c6','#6941c6'],
          
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="  padding: 10px;  "></div>


          </div>
          
<!-- >>>>>>> 40e60ddb0bbd31b6046c14f2bc036bb697acda68 -->
      </main>
    </div>
    <script src="./index.js"></script>
  </body>
</html>
