<?php

include_once './server/connection.php';
if(isset($_GET['updateId']))
{
$id = $_GET['updateId'];
$sql="SELECT * FROM department WHERE departmentID = '$id'";
  $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
 $departmentID=$row["departmentID"];
 $departmentName= $row["departmentName"];
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Department</title>
    <!-- google icons -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link href="../img/main-logo.png"   rel="icon">
    <!-- Main Body Css -->
    <link rel="stylesheet" href="../index.css" />
    <link rel="stylesheet" href="./department.css" />
    <link rel="stylesheet" href="./departmentTable.css">
    <link rel="stylesheet" href="./departmentForm.css" />
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
          <a href="../index.php" id="dash">
            <span class="material-symbols-outlined">dashboard</span>
            <h3>Dashboard</h3>
          </a>
          <a href="./department.php" class="active" id="Dep">
                <span class="material-symbols-outlined">view_list</span>
                <h3>Department</h3>
            </a>
            <a href="../Batch/batch.php"  id="batch">
                <span class="material-symbols-outlined">safety_divider</span>
                <h3>Batch</h3>
            </a>
          <a href="../student/student.php" id="std">
            <span class="material-symbols-outlined">group</span>
            <h3>Students</h3>
          </a>
          <a href="../instructor/instructor.php" id="inst">
            <span class="material-symbols-outlined">groups</span>
            <h3>Instructors</h3>
          </a>
          <a href="../course/course.php"  id="cor">
            <span class="material-symbols-outlined">library_books</span>
            <h3>Courses</h3>
          </a>
          <a href="../app/app.php" id="app">
            <span class="material-symbols-outlined">apps</span>
            <h3>Apps</h3>
          </a>
          <a href="../../login/login.php" id="logout">
            <span class="material-symbols-outlined">logout</span>
            <h3>Logout</h3>
          </a>
        </div>
      </aside>
      <main>
        <div class="courses">
          <h1 class="title">
            <span class="material-symbols-outlined">view_list</span>Department
          </h1>
          <ul class="tabs">
            <li data-tab-target="#add" class="active tab">
              <span class="material-symbols-outlined">edit</span>Update
            </li>
          </ul>
          <div class="tab-content">
            <div id="add" data-tab-content class="active">
              <div class="Course-form">
                <!-- container -->
                <h1>Department Registration Form</h1>
                <form action="./server/editDepartment.php" method="POST">
                  <div class="formFirst">
                    <!-- first form container -->
                    <div class="courseDetails">
                      <!-- courseDetails container -->
                      <span class="title">Department Details</span>
                      <div class="fields">
                        <!-- fields for courseDetails -->
                        <div class="input-field">
                          <label>Department ID</label>
                          <input
                            type="text"
                            name ="id"
                            placeholder="Enter Department Id"
                            readonly
                            value="<?php echo "$departmentID" ?>"
                          />
                        </div>
                        <div class="input-field">
                          <label>Department Name</label>
                          <input
                            type="text"
                            name = "name"
                            placeholder="Enter Department Name"
                            required
                            value="<?php echo "$departmentName" ?>"
                          />
                        </div>
                        <div class="buttons">
                          <div class="submitbutton">
                            <button type="submit" name="submit">
                              <i class="material-symbols-outlined">save</i>
                              <span class="btnText">Save Changes</span>
                            </button>
                          </div>
                        </div>
                        <!-- fields for courseDetails -->
                      </div>
                      <!-- courseDetails container -->
                    </div>

                    <!-- first form container -->
                  </div>
                </form>

                <!-- container -->
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="./department.js"></script>
    <script src="../index.js"></script>
  </body>
</html>
