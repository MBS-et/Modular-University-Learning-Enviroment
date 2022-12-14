<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Instructors</title>
  <!-- google icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="../img/main-logo.png" rel="icon">
  <!-- Main Body Css -->
  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="./instructor.css" />
  <link rel="stylesheet" href="./instructorForm.css" />
  <link rel="stylesheet" href="./instructorTable.css" />
  <link rel="stylesheet" href="./Assignment.css">
  <link rel="stylesheet" href="./test.css">
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
        <a href="../student/student.php" id="std">
          <span class="material-symbols-outlined">group</span>
          <h3>Students</h3>
        </a>
        <a href="./instructor.php" class="active" id="inst">
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
            <span class="material-symbols-outlined">add</span>Add
          </li>
          <li data-tab-target="#view" class="tab">
            <span class="material-symbols-outlined">view_list</span>View
          </li>
          <li data-tab-target="#assign" class="tab">
            <span class="material-symbols-outlined">assignment_add</span>Assign
          </li>
        </ul>
        <div class="tab-content">
          <div id="add" data-tab-content class="active">
            <div class="Instructor-form">
              <!-- instructor form conatiner -->
              <h1>Instructor Registration Form</h1>
              <form action="./server/addInstructor.php" method="POST">
                <div class="formFirst">
                  <!-- 1st form conatiner -->
                  <div class="personalDetails">
                    <!-- personalDetails conatainer -->
                    <span class="title">Personal Details</span>
                    <div class="fields">
                      <!-- fields for personal details -->
                      <div class="input-field">
                        <label>First Name</label>
                        <input type="text" name="Fname" placeholder="Enter user's First Name" required />
                      </div>
                      <div class="input-field">
                        <label>Middle Name</label>
                        <input type="text" name="Mname" placeholder="Enter user's Middle Name" required />
                      </div>
                      <div class="input-field">
                        <label>Last Name</label>
                        <input type="text" name="Lname" placeholder="Enter user's Last Name" required />
                      </div>
                      <div class="input-field">
                        <label>Gender</label>
                        <select name="gender" required>
                          <option disabled selected>Select gender</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="input-field">
                        <label>Mobile Number</label>
                        <input type="number" name="Mnumber" placeholder="Enter mobile number" required />
                      </div>
                      <div class="input-field"></div>
                    </div>
                    <!-- personalDetails conatainer -->
                  </div>
                  <div class="AccountDetails">
                    <!-- AccountDetails conatainer -->
                    <span class="title">Account Details</span>
                    <div class="fields">
                      <!-- field for acocunt details -->
                      <div class="input-field">
                        <label>Instructor ID</label>
                        <input type="text" name="id" placeholder="Enter instructors ID" />
                      </div>
                      <div class="input-field">
                        <label>Role</label>
                        <select name="role" required>
                          <option disabled selected>Select Role</option>
                          <?php
                          include_once './server/connection.php';
                          $sql = "SELECT `roleType` FROM `role`";
                          $result = mysqli_query($con, $sql);
                          while ($row = $result->fetch_array()) {
                            echo "<option>" . $row["roleType"] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="input-field">
                        <label>User Name</label>
                        <input type="text" name="Uname" placeholder="Enter The user's user name " required />
                      </div>
                      <div class="input-field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter  user's Password " required />
                      </div>
                      <div class="input-field">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="confirm user's password " required />
                      </div>
                      <div class="input-field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="www.example@gmail.com" required />
                      </div>
                      <div class="buttons">
                        <button type="submit" name="submit" class="submit">
                          <span class="btnText">Submit</span>
                          <i class="uil uil-save"></i>
                        </button>
                      </div>
                      <!-- field for acocunt details -->
                    </div>
                    <!-- AccountDetails conatainer -->
                  </div>
                  <!-- 1st form conatiner -->
                </div>
              </form>
              <!-- instructor form conatiner -->
            </div>
          </div>
          <div id="view" data-tab-content>
            <div class="table-container">
              <table>
                <thead>
                  <tr>
                    <th>Instructor ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Moblie</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once './server/connection.php';
                  $sql = "SELECT intructorID,userName,firstName,middleName,lasstName,mobileNumber,gender,email,roleID FROM instructor";
                  $result = mysqli_query($con, $sql);
                  while ($row = $result->fetch_array()) {
                    $roleId =  $row["roleID"];
                    $sql2 = "SELECT roleType from role where  roleID = '$roleId'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo "
            <tr class='rows'>
            <td>" . $row["intructorID"] . "</td>
            <td>" . $row["userName"] . "</td>
            <td>" . $row["firstName"] . "</td>
            <td>" . $row["middleName"] . "</td>
            <td>" . $row["lasstName"] . "</td>
            <td>" . $row["mobileNumber"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row2["roleType"] . "</td>
            <td> 
                 <a class='btn btn-primary' role='button' data-bs-toggle='button' href='./editInstructor.php?updateid=" . $row["intructorID"] . "'>Edit</a>
                 <a class='btn btn-primary' role='button' data-bs-toggle='button' href='./server/deleteInstructor.php?updateid=" . $row["intructorID"] . "&username=".$row["userName"]."'>Delete</a>
            </td>
            <tr>
        ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div id="assign" data-tab-content>
            <div class="Assignment-form">
              <form action="./server/FindAssignment.php" method="POST">
                <span class="title">Instructor Assignment</span>
                <div class="fields">
                  <div class="input-field">
                    <label>Instructor ID</label>
                    <input type="text" name="InID" placeholder="Search here" required />
                  </div>
                  <div class="buttons">
                    <button type="submit" name="submit" class="submit">
                      <span class="btnText">Search</span>
                      <i class="uil uil-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <hr>
            <div class="table-container-assign">
              <table>
                <thead>
                  <tr>
                    <th>Instructor ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Assignment Date</th>
                    <th>Assigned Batch</th>
                    <th>Assigned Course</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once './server/connection.php';
                  $sql = "SELECT assignmentID,intructorID,assignmentDate,batchNo,courseID FROM instructor_assignment";
                  $result = mysqli_query($con, $sql);
                  while ($row = $result->fetch_array()) {
                    $InstaId =  $row["intructorID"];
                    $sql2 = "SELECT firstName,middleName,lasstName from instructor where  intructorID = '$InstaId'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $CourseID =  $row["courseID"];
                    $sql3 = "SELECT courseID from course where  courseID = '$CourseID'";
                    $result3 = mysqli_query($con, $sql3);
                    $row3 = mysqli_fetch_assoc($result3);
                    echo "
            <tr class='rows'>
            <td>" . $row["intructorID"] . "</td>
            <td>" . $row2["firstName"] . "</td>
            <td>" . $row2["middleName"] . "</td>
            <td>" . $row2["lasstName"] . "</td>
            <td>" . $row["assignmentDate"] . "</td>
            <td>" . $row["batchNo"] . "</td>
            <td>" . $row3["courseID"] . "</td>
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
    </main>
  </div>
  <script src="../index.js"></script>
  <script src="./instructor.js"></script>
</body>

</html>