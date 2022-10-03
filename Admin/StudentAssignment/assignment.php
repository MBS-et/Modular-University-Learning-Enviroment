<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Students</title>
  <!-- google icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="../img/main-logo.png" rel="icon">
  <!-- Main Body Css -->
  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="assignment2.css">
  <link rel="stylesheet" href="./assignmentTab.css">
  <link rel="stylesheet" href="./Table2.css">
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
        <a href="../Batch/batch.php" id="batch">
          <span class="material-symbols-outlined">safety_divider</span>
          <h3>Batch</h3>
        </a>
        <a href="../student/student.php"  class="active"  id="std">
          <span class="material-symbols-outlined">group</span>
          <h3>Students</h3>
        </a>
        <a href="../instructor/instructor.php" id="inst">
          <span class="material-symbols-outlined">groups</span>
          <h3>Instructors</h3>
        </a>
        <a href="../course/course.php" id="cor">
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
        <a href="../../login/login.php" id="logout">
          <span class="material-symbols-outlined">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>
    <main>
      <div class="instructors">
        <h1 class="title">
          <span class="material-symbols-outlined">groups</span>Instructors
        </h1>
        <ul class="tabs">
          <li data-tab-target="#add" class="active tab">
            <span class="material-symbols-outlined">assignment_add</span>Assign
          </li>
        </ul>
        <div class="tab-content">
          <div id="add" data-tab-content class="active">
          <div class="student-assignment-form">
      <!-- container -->
      <h1>Student Assignment</h1>
      <form action="./server/assign.php" method="POST">
        <div class="form-first">
          <!-- form container -->
          <div class="studentAsignmentDetails">
            <!-- student Assignment details -->
            <span class="title">Assignment Details</span>
            <div class="fields">
              <!-- fields for student assignment -->

              <div class="input-field">
                <label>Batch</label>
                <select name="batch" required>
                          <option disabled selected>Select batch</option>
                          <?php
                          include_once './server/connection.php';

                          $sql = "SELECT * FROM student_batchs";
                          $result = mysqli_query($con, $sql);
                          while ($row = $result->fetch_array()) {
                            echo "
                              <option>" . $row["batchNo"] . "</option>
                              ";
                          }
                          ?>
                        </select>
              </div>
              <div class="input-field">
                <label>Course</label>
                <select name="course" required>
                          <option disabled selected>Select Course</option>
                          <?php
                          include_once './server/connection.php';

                          $sql = "SELECT * FROM course";
                          $result = mysqli_query($con, $sql);
                          while ($row = $result->fetch_array()) {
                            echo "
                              <option>" . $row["courseName"] . "</option>
                              ";
                          }
                          ?>
                        </select>
              </div>

              <div class="buttons">
                <button name="submit" class="submit">
                <span class="material-symbols-outlined">assignment_add</span>
                  <span class="btnText">&nbsp; Assign</span>
                </button>
              </div>

              <!-- fields for student assignment -->
            </div>
            <!-- student assignment details -->
          </div>

          <!--form container  -->
        </div>
      </form>

      <!-- container -->
    </div>
    <div class="table-container-assign">
              <table>
                <thead>
                  <tr>
                    <th>Batch No</th>
                    <th>Assigned Date</th>
                    <th>Assigned Course</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once './server/connection.php';
                  $sql = "SELECT assignmentID,batchNo,assignmentDate,courseID FROM batch_assignment";
                  $result = mysqli_query($con, $sql);
                  while ($row = $result->fetch_array()) {
                    $InstaId =  $row["courseID"];
                    $sql2 = "SELECT courseName from course where  courseID = '$InstaId'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
            
                    echo "
            <tr class='rows'>
            <td>" . $row["batchNo"] . "</td>
            <td>" . $row["assignmentDate"] . "</td>
            <td>" . $row2["courseName"] . "</td>
            <td> 
                 <a class='btn btn-primary' role='button' data-bs-toggle='button' href='./server/dropAssignment.php?dropid=" . $row["assignmentID"] . "'>Drop</a>
            </td>
            <tr>
        ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="../index.js"></script>
  <script src="./instructor.js"></script>
</body>

</html>