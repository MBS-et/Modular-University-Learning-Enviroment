
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
                        <p>Hey,<b class="user-name">Peneal</b></p>
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
            <a href="./settings/settings.php" id="sett">
                <span class="material-symbols-outlined">settings</span>
                <h3>Settings</h3>
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
                <div class="dash-Instructors">
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
                    <div class="progress">
                      <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                      </svg>
                      <div class="number">
                        <p class="amt-active-instructors-inPercent">81%</p>
                      </div>
                      <small class="text-muted">Last 24 Hours</small>
                    </div>
                  </div>
                </div>
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
                    <div class="progress">
                      <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                      </svg>
                      <div class="number">
                        <p class="amt-active-Students-inPercent">89%</p>
                      </div>
                      <small class="text-muted">Last 24 Hours</small>
                    </div>
                  </div>
                </div>
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
                    <div class="progress">
                      <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                      </svg>
                      <div class="number">
                        <p class="amt-active-Courses-inPercent">61%</p>
                      </div>
                      <small class="text-muted">Last 24 Hours</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="right">

            </div>
           
            
<!--  -->

 <div class="row">
       <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>


          </div>
          
      </main>
    </div>
    <script src="./index.js"></script>
  </body>
</html>
