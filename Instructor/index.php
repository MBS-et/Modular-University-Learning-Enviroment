<?php
include_once './server/connection.php';
if(isset($_GET['user']))
{
  $id = $_GET['user'];
  $sql="SELECT * FROM instructor WHERE userName = '$id'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $email = $row['email'];
  $fname= $row['firstName'];
  $gender = $row['gender'];
  $lname= $row['lasstName'];
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
    <!-- Main Body Css -->
    <link rel="stylesheet" href="./index.css" />
    
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
                        <p>Hey,<b class="user-name"><?php echo $fname  ?></b></p>
                        <small class="text-muted" id="role">Instructor</small>
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
            <a href="./index.php?user=<?php echo $id; ?>" class="active" id="dash">
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
            </a>
            <a href="./course/course.php?user=<?php echo $id; ?>" id="cor">
                <span class="material-symbols-outlined">library_books</span>
                <h3>Courses</h3>
            </a>
            <a href="./app/app.php?user=<?php echo $id; ?>" id="app">
                <span class="material-symbols-outlined">apps</span>
                <h3>Apps</h3>
            </a>
            <a href="./settings/settings.php?user=<?php echo $id; ?>" id="sett">
                <span class="material-symbols-outlined">settings</span>
                <h3>Settings</h3>
            </a>
            <a href="../../login/login.php?user=<?php echo $id; ?>" id="logout">
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
                <div class="dash-Courses">
                <span class="material-symbols-outlined">menu_book</span>
                  <div class="middle">
                    <div class="left">
                      <h3>Active Courses</h3>
                      <h1 class="amt-active-Courses">43</h1>
                      <a class="text-muted">Details</a>
                    </div>
                  </div>
                </div>
                <div class="dash-Students">
                  <span class="material-symbols-outlined">group</span>
                  <div class="middle">
                    <div class="left">
                      <h3>Active Students</h3>
                      <h1 class="amt-active-Students">600</h1>
                      <a class="text-muted">Details</a>
                    </div>
                    </div>
                  </div>
                </div>
            </div>
                </div>
             
            
            
            
        </div>
      </main>
    </div>
    <script src="./index.js"></script>
  </body>
</html>