<?php
include_once './server/connection.php';
if(isset($_GET['user']))
{
  $id = $_GET['user'];
  $sql="SELECT * FROM students WHERE userName = '$id'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $batchNo=$row['batchNo'];
  $email = $row['email'];
  $fname= $row['firstName'];
  $gender = $row['gender'];
  $lname= $row['lastName'];
  $mname= $row['middleName'];
  $mnumber=$row['mobileNumber'];
  $pass = $row['password'];
}
?>
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
    <link href="../img/main-logo.png"   rel="icon">
    <!-- Main Body Css -->
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="./dash.css">
    
  </head>
  <body>
    <header>
        <div class="top">
            <div class="logo" id="header-logo">
              <i class="material-symbols-outlined">school</i>
              <h2 id="header-logo-h2">MU<span class="green-text">LE</span></h2>
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
                        <p>Hey,<b class="user-name"><?php echo $fname  ?></b></p>
                        <small class="text-muted" id="role">Student</small>
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
            <a href="./index.php?user=<?php echo $id; ?>" class="active" id="dash" >
                <span class="material-symbols-outlined">dashboard</span>
                <h3 data-text="&nbsp;&nbsp;&nbsp;Dashboard">&nbsp;&nbsp;&nbsp;Dashboard</h3>
            </a>
            <a href="./app/app.php?user=<?php echo $id; ?>" id="app" >
                <span class="material-symbols-outlined" >apps</span>
                <h3 data-text="&nbsp;&nbsp;&nbsp;Apps">&nbsp;&nbsp;&nbsp;Apps</h3>
            </a>
            <a href="./settings/settings.php?user=<?php echo $id; ?>" id="sett" >
                <span class="material-symbols-outlined" >settings</span>
                <h3 data-text="&nbsp;&nbsp;&nbsp;Settings">&nbsp;&nbsp;&nbsp;Settings</h3>
            </a>
            <a href="../login/login.php" id="logout">
                <span class="material-symbols-outlined">logout</span>
                <h3 data-text="&nbsp;Logout&nbsp;" >&nbsp;Logout&nbsp;</h3>
            </a>
        </div>
      </aside>
      <main>
       
      <div class="courses">
          <h1 class="title">
            <span class="material-symbols-outlined">view_list</span>My Learning
          </h1>
          <ul class="tabs">
            <li data-tab-target="#course" class="active tab">
              <span class="material-symbols-outlined">book</span>My Courses
            </li>
            <li data-tab-target="#resource" class="tab">
              <span class="material-symbols-outlined">view_list</span>Course Material
            </li>
          </ul>
          <div class="tab-content">
            <div id="course" data-tab-content class="active">
              <h1>courses</h1>
            </div>
            <div id="resource" data-tab-content>
              <h1>resourses</h1>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="./tab.js"></script>
    <script src="./index.js"></script>
  </body>
</html>
