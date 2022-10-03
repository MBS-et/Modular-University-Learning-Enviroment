<?php
include_once '../server/connection.php';
if(isset($_GET['user']))
{
  $id = $_GET['user'];
  $sql="SELECT * FROM instructor WHERE userName = '$id'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $Iid = $row['intructorID'];
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
    <title>Courses</title>
    <!-- google icons -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <!-- Main Body Css -->
    <link rel="stylesheet" href="../index.css" />
    <link rel="stylesheet" href="./course.css">
     <link rel="stylesheet" href="./instructorAssignedTable.css">
     <link rel="stylesheet" href="./dashlayout.css">
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
            <a href="../index.php?user=<?php echo $id; ?>"  id="dash">
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
            </a>
            <a href="./course.php?user=<?php echo $id; ?>" class="active" id="cor">
                <span class="material-symbols-outlined">home</span>
                <h3>Home</h3>
            </a>
            <a href="../app/app.php?user=<?php echo $id; ?>" id="app">
                <span class="material-symbols-outlined">apps</span>
                <h3>Apps</h3>
            </a>
            <a href="../settings/settings.php?user=<?php echo $id; ?>" id="sett">
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
        <div class="courses">
          <h1 class="title"><span class="material-symbols-outlined">book</span>courses</h1>
        <ul class="tabs">
          <li data-tab-target="#add" class="active tab">
            <span class="material-symbols-outlined">assignment_add</span>Assignment
          </li>
          <li data-tab-target="#view" class="tab">
            <span class="material-symbols-outlined">add</span>Upload
          </li>
        </ul>
        <div class="tab-content">
          <div id="add" data-tab-content class="active">
            <div class="dashContainer">
            <div class="table-container">
              <table>
                <thead>
                  <tr>
                    <th>Assignment Date</th>
                    <th>Assigned Course</th>
                    <th>Assigned Batch</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // include_once './server/connection.php';
                  $sql = "SELECT assignmentDate,courseID,batchNo FROM instructor_assignment where intructorID='$Iid'";
                  $result = mysqli_query($con, $sql);
                  while ($row = $result->fetch_array()) {
                    $Cid =  $row["courseID"];
                    $sql2 = "SELECT courseName from course where  courseID = '$Cid'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo "
            <tr class='rows'>
            <td>" . $row["assignmentDate"] . "</td>
            <td>" . $row2["courseName"] . "</td>
            <td>" . $row["batchNo"] . "</td>
            
            <tr>
        ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="notification-table" >
              
              <table>
                <thead>
                <tr>
                  <td><h2>Notification</h2></td>
                </tr>
                  <tr>
                    <th>Name</th>
                    <th>Meassage</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                  <tr>
                    <td>Administrator</td>
                    <td>No class on Monday and Tuesday</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="make-announcment">
              <h1>Make announcment</h1>
            </div>
            </div>
            <!-- dashContainer -->
          </div>
          <div id="view" data-tab-content>
            <h1>Upload</h1>
          </div>
        </div>
        </div>
      </main>
    </div>
    <script src="./course.js"></script>
    <script src="../index.js"></script>
  </body>
</html>
