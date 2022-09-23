<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses</title>
    <!-- google icons -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <!-- Main Body Css -->
    <link rel="stylesheet" href="../index.css" />
    <link rel="stylesheet" href="./course.css" />
    <link rel="stylesheet" href="./courseForm.css" />
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
          <a href="../Department/department.php" id="Dep">
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
          <a href="./course.php" class="active" id="cor">
            <span class="material-symbols-outlined">library_books</span>
            <h3>Courses</h3>
          </a>
          <a href="../app/app.php" id="app">
            <span class="material-symbols-outlined">apps</span>
            <h3>Apps</h3>
          </a>
          <a href="../settings/settings.php" id="sett">
            <span class="material-symbols-outlined">settings</span>
            <h3>Settings</h3>
          </a>
          <a href="./login/login.php" id="logout">
            <span class="material-symbols-outlined">logout</span>
            <h3>Logout</h3>
          </a>
        </div>
      </aside>
      <main>
        <div class="courses">
          <h1 class="title">
            <span class="material-symbols-outlined">book</span>coursess
          </h1>
          <ul class="tabs">
            <li data-tab-target="#add" class="active tab">
              <span class="material-symbols-outlined">add</span>Add
            </li>
            <li data-tab-target="#view" class="tab">
              <span class="material-symbols-outlined">view_list</span>View
            </li>
          </ul>
          <div class="tab-content">
            <div id="add" data-tab-content class="active">
              <div class="Course-form">
                <!-- container -->
                <h1>Course Registration Form</h1>
                <form action="./server/addCourse.php" method="POST">
                  <div class="formFirst">
                    <!-- first form container -->
                    <div class="courseDetails">
                      <!-- courseDetails container -->
                      <span class="title">Course Details</span>
                      <div class="fields">
                        <!-- fields for courseDetails -->
                        <div class="input-field">
                          <label>Course ID</label>
                          <input
                            type="text"
                            name="id"
                            placeholder="Enter your Name"
                            required
                          />
                        </div>
                        <div class="input-field">
                          <label>Course Name</label>
                          <input
                            type="text"
                            name="name"
                            placeholder="Enter your Name"
                            required
                          />
                        </div>
                        <div class="input-field">
                          <label>Department</label>
                          <select required name="dep">
                            <option disabled selected>Select Department</option>
                            <?php
                            include_once './server/connection.php';
                            $sql = "SELECT `departmentName` FROM `department`";
                            $result = mysqli_query($con,$sql);
                            while ($row = $result->fetch_array())
                            {
                              echo "<option>". $row["departmentName"] ."</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="buttons">
                          <div class="submitbutton">
                            <button type="submit" name="submit">
                              <i class="material-symbols-outlined">save</i>
                              <span class="btnText">Submit</span>
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
            <div id="view" data-tab-content>
              <h1>View</h1>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="./course.js"></script>
    <script src="../index.js"></script>
  </body>
</html>
