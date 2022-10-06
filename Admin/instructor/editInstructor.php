<?php
include_once './server/connection.php';

if(isset($_GET['updateid']))
{
  $id = $_GET['updateid'];
  $sql = "SELECT * FROM instructor where intructorID = '$id' ";
  $result = mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);
  $roleID= $row['roleID'];
  $sql2 = "SELECT roleType FROM role where roleID = '$roleID'";
  $result2 = mysqli_query($con, $sql2);
  $row2=mysqli_fetch_assoc($result2);

  $userName=$row['userName'];
  $email = $row['email'];
  $fname= $row['firstName'];
  $gender = $row['gender'];
  $lname= $row['lasstName'];
  $mname= $row['middleName'];
  $mnumber=$row['mobileNumber'];
  $role = $row2['roleType'];
  $pass = $row['password'];
}

                  
?>
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
            <span class="material-symbols-outlined">edit</span>Update
          </li>
        </ul>
        <div class="tab-content">
          <div id="add" data-tab-content class="active">
            <div class="Instructor-form">
              <!-- instructor form conatiner -->
              <h1>Instructor Registration Form</h1>
              <form action="./server/editInstructor.php" method="POST">
                <div class="formFirst">
                  <!-- 1st form conatiner -->
                  <div class="personalDetails">
                    <!-- personalDetails conatainer -->
                    <span class="title">Personal Details</span>
                    <div class="fields">
                      <!-- fields for personal details -->
                      <div class="input-field">
                        <label>First Name</label>
                        <input type="text" name="Fname" placeholder="Enter user's First Name" required value="<?php echo $fname;?>" />
                      </div>
                      <div class="input-field">
                        <label>Middle Name</label>
                        <input type="text" name="Mname" placeholder="Enter user's Middle Name" required value=<?php echo $mname;?> />
                      </div>
                      <div class="input-field">
                        <label>Last Name</label>
                        <input type="text" name="Lname" placeholder="Enter user's Last Name" required value=<?php echo $lname;?> />
                      </div>
                      <div class="input-field">
                        <label>Gender</label>
                        <select name="gender" required>
                          <option disabled selected>Select gender</option>
                          <option selected> <?php echo $gender; ?> </option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="input-field">
                        <label>Mobile Number</label>
                        <input type="number" name="Mnumber" placeholder="Enter mobile number" required value=<?php echo $mnumber;?> />
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
                        <input type="text" name="id" placeholder="Enter instructors ID" readonly value=<?php echo $id;?> />
                      </div>
                      <div class="input-field">
                        <label>Role</label>
                        <select name="role" required>
                          <option disabled selected>Select Role</option>
                          <option selected> <?php echo $role;?></option>
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
                        <input type="text" name="Uname" placeholder="Enter The user's user name " required value=<?php echo $userName;?> />
                      </div>
                      <div class="input-field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter  user's Password " required value=<?php echo $pass;?> />
                      </div>
                      <div class="input-field">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="confirm user's password " required  value=<?php echo $pass;?> />
                      </div>
                      <div class="input-field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="www.example@gmail.com" required value=<?php echo $email;?> />
                      </div>
                      <div class="buttons">
                        <button type="submit" name="submit" class="submit">
                          <span class="btnText">Save Changes</span>
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
          
      </div>
    </main>
  </div>
  <script src="../index.js"></script>
  <script src="./instructor.js"></script>
</body>

</html>