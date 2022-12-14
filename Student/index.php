<?php
include_once './server/connection.php';
if (isset($_GET['user'])) {
  $id = $_GET['user'];
  $sql = "SELECT * FROM students WHERE userName = '$id'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $batchNo = $row['batchNo'];
  $email = $row['email'];
  $fname = $row['firstName'];
  $gender = $row['gender'];
  $lname = $row['lastName'];
  $mname = $row['middleName'];
  $mnumber = $row['mobileNumber'];
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="../img/main-logo.png" rel="icon">
  <!-- Main Body Css -->
  <link rel="stylesheet" href="./index.css" />
  <link rel="stylesheet" href="./dash.css">
  <link rel="stylesheet" href="studentTable.css">

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
        <a href="./index.php?user=<?php echo $id; ?>" class="active" id="dash">
          <span class="material-symbols-outlined">dashboard</span>
          <h3 data-text="&nbsp;&nbsp;&nbsp;Dashboard">&nbsp;&nbsp;&nbsp;Dashboard</h3>
        </a>
        <a href="./app/app.php?user=<?php echo $id; ?>" id="app">
          <span class="material-symbols-outlined">apps</span>
          <h3 data-text="&nbsp;&nbsp;&nbsp;Apps">&nbsp;&nbsp;&nbsp;Apps</h3>
        </a>
        <a href="../login/login.php" id="logout">
          <span class="material-symbols-outlined">logout</span>
          <h3 data-text="&nbsp;Logout&nbsp;">&nbsp;Logout&nbsp;</h3>
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
          <!-- <li data-tab-target="#resource" class="tab">
              <span class="material-symbols-outlined">view_list</span>Course Material
            </li> -->
        </ul>
        <div class="tab-content">
          <div id="course" data-tab-content class="active">


            <div class="dashContainer">



            <div class="table-container">
               <h1>Assigned courses</h1> 
              <table>

                <thead>
                  <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!--  -->
                  <?php
                  include_once './server/connection.php';

                  $sql = "SELECT * from batch_assignment where batchNo = '$batchNo'";

                  $result = mysqli_query($con, $sql);
                  while ($row = $result->fetch_array()) {
                    $courseIDs = $row["courseID"];

                    $sql2 = "SELECT link from uploaded_files where batchNo = '$batchNo' AND courseID = '$courseIDs'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    if ($row2 == NULL) {
                      $sql3 = "SELECT courseName from course where courseID='$courseIDs'";
                      $result3 = mysqli_query($con, $sql3);
                      $row3 = mysqli_fetch_assoc($result3);
                      echo "

                        <tr class='rows'>
                        <td>" . $row["courseID"] . "</td>
                        <td>" . $row3["courseName"] . "</td>
                        <td>No Resources</td>
                        <tr>";
                      } else {
                          $sql3 = "SELECT courseName from course where courseID='$courseIDs'";
                          $result3 = mysqli_query($con, $sql3);
                          $row3 = mysqli_fetch_assoc($result3);
                          echo "
                            <tr class='rows'>
                            <td>" . $row["courseID"] . "</td>
                            <td>" . $row3["courseName"] . "</td>
                            <td> <a href='" . $row2["link"] . "'>Download Resources<a/></td>
                          <tr>";
                    }
                  }

                  ?>
                </tbody>
              </table>

            </div>
          

        <div class="announcment-container" style="flex: 1; ">


        <div class="table-container" style="margin-left: 90px;">

              <h1>Announcements</h1>
          <table>
            <thead>
              <th>Name</th>
              <th>Message</th>
              <th>Actions</th>
            </thead>
          
            
          <tbody>
            <?php
                  $sql = "SELECT * FROM instructor_announcement where studentUsername = '$id'";
                  $result = mysqli_query($con, $sql);
                  while ($row = $result->fetch_array()) 
                  {
                    $instID = $row['intructorID'];
                    $sql2 = "SELECT firstName FROM instructor where intructorID = '$instID' ";
                    $result2 = mysqli_query($con,$sql2);
                    $row2 = mysqli_fetch_array($result2);

                    echo "
                    <tr class='rows'>
                    <td>" . $row2["firstName"] . "</td>
                    <td>" . $row["message"] . "</td>
                    <td> <a href='./server/clearNotification.php?user=".$id."'>Clear<a/></td>      
                    <tr>";
                  }

            ?>
          </tbody>

          </table>

        </div>






        </div>
      



            </div>
      </div>
        </div>
      </div>
    </main>
  </div>
  <script src="./tab.js"></script>
  <script src="./index.js"></script>
</body>

</html>