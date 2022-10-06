<?php
include_once '../server/connection.php';
if (isset($_GET['user'])) {
  $id = $_GET['user'];
  $sql = "SELECT * FROM instructor WHERE userName = '$id'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $Iid = $row['intructorID'];
  $email = $row['email'];
  $fname = $row['firstName'];
  $gender = $row['gender'];
  $lname = $row['lasstName'];
  $mname = $row['middleName'];
  $mnumber = $row['mobileNumber'];
  $pass = $row['password'];
}


include 'config.php';

$link = "/uploads";
$link_status = "display: none;";

if (isset($_POST['upload'])) { // If isset upload button or not
	// Declaring Variables
	$location = "uploads/";
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"]; // Get uploaded file size
  $batch = $_POST['batch'];
  $course = $_POST['course'];
 
	$sql2 = "SELECT courseID from course where  courseName = '$course'";
  $result2 = mysqli_query($con, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $couresId = $row2["courseID"];

    $link2 = "http://localhost/MULE2/Modular-University-Learning-Enviroment-1/Instructor/course/uploads/" . $file_new_name;
		$sql = "INSERT INTO uploaded_files (intructorID,batchNo,courseID,name, new_name,link)
				VALUES ('$Iid','$batch','$couresId','$file_name','$file_new_name','$link2')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
			
			// Select id from database
			$sql = "SELECT id FROM uploaded_files ORDER BY id DESC";
			$result = mysqli_query($conn, $sql);
			if ($row = mysqli_fetch_assoc($result)) {
				$link = $base_url . "download.php?id=" . $row['id'];
				$link_status = "display: block;";
			}
		} else {
			
		}
	
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Main Body Css -->
  
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="./AssignForm.css">
  <link rel="stylesheet" href="./course.css">
  <link rel="stylesheet" href="./instructorAssignedTable.css">
  <link rel="stylesheet" href="./dashlayout2.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .input-field input,
select {
  outline: none;
  font-size: 14px;
  font-weight: 400;
  color: #333;
  border-radius: 5px;
  border: 1px solid #aaa;
  padding: 0 15px;
  height: 42px;
  margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus {
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
}
  </style>
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
        <a href="../index.php?user=<?php echo $id; ?>" id="dash">
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
              <div class="notification-table">

                <table>
                  <thead>
                    <tr>
                      <td>
                        <h2>Notification</h2>
                      </td>
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
              <div class="Instructor-form">
                  <form action="./server/announcement.php" method="POST">
                    <span class="title">Make Announcement</span>
                    <div class="fields">
                      <div class="input-field">
                        <label>Batch Number</label>
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
                        <label style="margin-left: 90px; margin-bottom: 15px;">Message</label>
                        <textarea name="message" class="textarea" cols="50" rows="4" placeholder="Message"></textarea>
                      </div>
                      <div class="buttons">
                        <button type="submit" name="submit" class="submit">
                        <span class="material-symbols-outlined">send</span>
                          <span class="btnText">Send</span>
                        </button>
                      </div>
                      <div class="input-field">
                       <input type="text" name="id" value="<?php echo $Iid; ?>" style="display:none">
                      </div>
                  </form>
                </div>

              </div>
            </div>
            </div>
            <!-- dashContainer -->
          </div>
          <div id="view" data-tab-content>
            <div style="display: flex; justify-content:center;align-items:center">
            <div class="file__upload" >
              <div class="header">
                <p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>
              </div>
              
              <form action="" method="POST" enctype="multipart/form-data" class="body">
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
                        <label>course</label>
                        <select name="course" required>
                          <option disabled selected>Select Course</option>
                          <?php
                          include_once './server/connection.php';

                          $sql = "SELECT courseID FROM instructor_assignment where intructorID = '$Iid'";
                          $result = mysqli_query($con, $sql);
                          while ($row = $result->fetch_array()) {
                            $couresid = $row["courseID"];
                            $sql2 = "SELECT courseName FROM course where courseID = '$couresid'";
                            $result2 = mysqli_query($con,$sql2);
                            $row2 = mysqli_fetch_array($result2);
                            echo "
                              <option>" . $row2[0] . "</option>
                              ";
                          }


                          ?>
                        </select>
                      </div>
                <!-- Sharable Link Code -->
                <input type="checkbox" id="link_checkbox">
                

                <input type="file" name="file" id="upload" required>
                <label for="upload">
                  <i class="fa fa-file-text-o fa-3x"></i>
                  <p>
                    <strong>Drag and drop</strong> files here<br>
                    or <span>browse</span> to begin the upload
                  </p>
                </label>
                <button name="upload" class="btn">Upload</button>
              </form>
            </div>
            </div>
            
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="./course.js"></script>
  <script src="../index.js"></script>
</body>

</html>