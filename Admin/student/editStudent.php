<?php
include_once './server/connection.php';
if(isset($_GET['updateid']))
{
  $id = $_GET['updateid'];
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
  <title>Students</title>
  <!-- google icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <!-- Main Body Css -->
  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="./student.css" />
  <link rel="stylesheet" href="./studentForm.css" />
  <link rel="stylesheet" href="./studentTable.css">
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
      <div class="students">
        <h1 class="title">
          <span class="material-symbols-outlined">group</span>Students
        </h1>
        <ul class="tabs">
          <li data-tab-target="#add" class="active tab">
            <span class="material-symbols-outlined">edit</span>Update
          </li>
        </ul>
        <div class="tab-content">
          <div id="add" data-tab-content class="active">
            <div class="Student-form">
              <!-- container -->
              <h2>Student Registration Form</h2>
              <form action="./server/update.php" method="post">
                <div class="formFirst">
                  <!-- first form container-->
                  <div class="personalDetails">
                    <!-- personal details conatiner -->
                    <span class="title">Personal Details</span>
                    <div class="fields">
                      <!--  fields for personal details-->
                      <div class="input-field">
                        <label>First Name</label>
                        <input type="text" placeholder="Enter your Name" name="Fname" required value=<?php echo $fname;?>  />
                      </div>
                      <div class="input-field">
                        <label>Middle Name</label>
                        <input type="text" placeholder="Enter your Name" name="Mname" required value=<?php echo $mname;?> />
                      </div>
                      <div class="input-field">
                        <label>Last Name</label>
                        <input type="text" placeholder="Enter your Name" name="Lname" required value=<?php echo $lname;?> />
                      </div>
                      <div class="input-field">
                        <label>Gender</label>

                        <select name="gender" required value=>
                          <option disabled selected>Select gender</option>
                          <option selected><?php echo $gender;?></option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="input-field">
                        <label>Mobile Number</label>
                        <input type="number" placeholder="Enter mobile number" name="Mnumber" required value=<?php echo $mnumber;?> />
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
                          <option selected><?php echo $batchNo;?></option>
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
                        <input type="text" placeholder="Enter The user's user name " name="Uname" required  value=<?php echo $id;?> />
                      </div>
                      <div class="input-field">
                        <label>Password</label>
                        <input type="password" placeholder="Enter The user's Password " name="password" required value=<?php echo $pass;?> />
                      </div>
                      <div class="input-field">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="confirm user's password " required value=<?php echo $pass;?> />
                      </div>
                      <div class="input-field">
                        <label>Email</label>
                        <input type="email" placeholder="www.example@gmail.com" name="email" required value=<?php echo $email;?> />
                      </div>
                      <div class="input-field">

                      </div>
                      <div class="buttons">
                        <button type="submit" name="submit">
                          <i class="material-symbols-outlined">save</i>
                          <span class="btnText">Save</span>
                        </button>
                        </label>
                        </button>
                      </div>
                      <!-- conainer for permanet Address fields -->
                    </div>
                    <!--permanent address container  -->
                  </div>



                </div>
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
