<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Students</title>
  <!-- google icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <!-- Main Body Css -->
  <!-- <link rel="stylesheet" href="./studentAssinment2.css"> -->
  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="./student.css" />
  <link rel="stylesheet" href="./studentForm.css" />
  <link rel="stylesheet" href="./studentTable.css" />
  <link href="../img/main-logo.png" rel="icon">

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
        <a href="./student.php" class="active" id="std">
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
        <a href="../../login/login.php" id="logout">
          <span class="material-symbols-outlined">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>
    <main>
      <div class="students">
        <h1 class="title">
          <span class="material-symbols-outlined">group</span>Students
        </h1>
        <ul class="tabs">
          <li data-tab-target="#add" class="active tab">
            <span class="material-symbols-outlined">add</span>Add
          </li>
          <li data-tab-target="#view" class="tab">
            <span class="material-symbols-outlined">view_list</span>View
          </li>
          <li  class="tab">
            <span class="material-symbols-outlined">assignment_add</span><a href="../StudentAssignment/assignment.php">Assign</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="add" data-tab-content class="active">
            <div class="Student-form">
              <!-- container -->
              <h2>Student Registration Form</h2>
              <form action="./server/addStudents.php" method="post">
                <div class="formFirst">
                  <!-- first form container-->
                  <div class="personalDetails">
                    <!-- personal details conatiner -->
                    <span class="title">Personal Details</span>
                    <div class="fields">
                      <!--  fields for personal details-->
                      <div class="input-field">
                        <label>First Name</label>
                        <input type="text" placeholder="Enter your Name" name="Fname" required />
                      </div>
                      <div class="input-field">
                        <label>Middle Name</label>
                        <input type="text" placeholder="Enter your Name" name="Mname" required />
                      </div>
                      <div class="input-field">
                        <label>Last Name</label>
                        <input type="text" placeholder="Enter your Name" name="Lname" required />
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
                        <input type="number" placeholder="Enter mobile number" name="Mnumber" required />
                      </div>
                      <div class="input-field">

                      </div>

                      <!-- fields for personal details  -->
                    </div>
                    <!-- personal details container -->
                  </div>
                  <div class="permanentAddress">
                    <!-- permanent address container -->
                    <span class="title">Account Details</span>
                    <div class="fields">
                      <!-- conainer for permanet Address fields -->

                      <div class="input-field">
                        <label>Student Batch Number</label>
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
                        <label>User Name</label>
                        <input type="text" placeholder="Enter The user's user name " name="Uname" required />
                      </div>
                      <div class="input-field">
                        <label>Password</label>
                        <input type="password" placeholder="Enter The user's Password " name="password" required />
                      </div>
                      <div class="input-field">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="confirm user's password " required />
                      </div>
                      <div class="input-field">
                        <label>Email</label>
                        <input type="email" placeholder="www.example@gmail.com" name="email" required />
                      </div>
                      <div class="input-field">

                      </div>
                      <div class="buttons">
                        <button type="submit" name="submit">
                          <i class="material-symbols-outlined">save</i>
                          <span class="btnText">Submit</span>
                        </button>
                        </label>
                        </button>
                      </div>
                      <!-- conainer for permanet Address fields -->
                    </div>
                    <!--permanent address container  -->
                  </div>



                </div>
                </form>
                <!-- container -->
              </form>
            </div>

          </div>
          <div id="view" data-tab-content>
            <div class="table-container">
              <table>
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Moblie</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Batch</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once './server/connection.php';
                  $sql = "SELECT userName,firstName,middleName,lastName,mobileNumber,gender,email,batchNo FROM students";
                  $result = mysqli_query($con, $sql);
                  while ($row = $result->fetch_array()) {
                    echo "
            <tr class='rows'>
            <td>" . $row["userName"] . "</td>
            <td>" . $row["firstName"] . "</td>
            <td>" . $row["middleName"] . "</td>
            <td>" . $row["lastName"] . "</td>
            <td>" . $row["mobileNumber"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["batchNo"] . "</td>
            <td> 
                 <a class='btn btn-primary' role='button' data-bs-toggle='button' href='./editStudent.php?updateid=" . $row["userName"] . "'>Edit</a>
                 <a class='btn btn-primary' role='button' data-bs-toggle='button' href='./server/delete.php?updateid=" . $row["userName"] . "'>Delete</a>
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
            <div class="student-assignment-form">
              <!-- container -->
              <h1>Student Assignment</h1>
              <form class="myForm" action="#">
                <div class="form-second">
                  <!-- form container -->
                  <div class="studentAsignmentDetails">
                    <!-- student Assignment details -->
                    <span class="title">Assignment Details</span>
                    <div class="fields">
                      <!-- fields for student assignment -->

                      <div class="input-field">
                        <label>Search By </label>
                        <select required>
                          <option disabled selected>by batch or by text field</option>
                          <option>By Batch</option>
                          <option>By ID</option>
                        </select>
                      </div>
                      <div class="input-field">
                        <label>By Batch</label>
                        <input type="text" placeholder="Enter Batch to Search" required />
                      </div>

                      <div class="input-field">
                        <label>By ID</label>
                        <input type="text" placeholder="Enter Id to Search" required />
                      </div>

                      <div class="buttons">
                        <button class="submit">
                          <span class="btnText">Search</span>
                          <i class="uil uil-save"></i>
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
          </div>
        </div>
      </div>
  </main>
  </div>
  <script src="../index.js"></script>
  <script src="./student.js"></script>
</body>

</html>