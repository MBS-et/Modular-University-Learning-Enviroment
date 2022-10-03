<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apps</title>
    <!-- google icons -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link href="../img/main-logo.png"   rel="icon">
    <!-- Main Body Css -->
    <link rel="stylesheet" href="../index.css" />
    <link rel="stylesheet" href="./calander.css" />
    <link rel="stylesheet" href="./todo.css" />
    <link rel="stylesheet" href="./app.css" />
    <link rel="stylesheet" href="./message.css" />
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
          <a href="../course/course.php" id="cor">
            <span class="material-symbols-outlined">library_books</span>
            <h3>Courses</h3>
          </a>
          <a href="./app.php" class="active" id="app">
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
        <div class="apps">
          <h1 class="title">
            <span class="material-symbols-outlined">apps</span>Apps
          </h1>
          <ul class="tabs">
            <li data-tab-target="#to-do" class="active tab">
              <span class="material-symbols-outlined">checklist</span>To-do list
            </li>
            <li data-tab-target="#calanders" class="tab">
              <span class="material-symbols-outlined">calendar_month</span
              >Calendar
            </li>
            <li  class="tab">
              <span class="material-symbols-outlined">chat</span>
              <a href="../../ChatApp/">Message
              </a>
            </li>
            <li  class="tab">
              <span class="material-symbols-outlined">video_chat</span><a href="./Stream/lobby.html">Video</a>
            </li>
          </ul>
          <div class="tab-content">
            <div id="to-do" data-tab-content class="active">
              <div class="holder">
                <div class="wrapper">
                  <div class="task-input">
                    <input
                      type="text"
                      placeholder="type and hit enter to add a task"
                    />
                  </div>
                  <div class="controls">
                    <div class="filters">
                      <span class="active" id="all">All</span>
                      <span id="pending">Pending</span>
                      <span id="completed">Completed</span>
                    </div>
                    <button class="clear-btn">Clear All</button>
                  </div>
                  <ul class="task-box"></ul>
                </div>
              </div>
            </div>
            <div id="calanders" data-tab-content>
              <div class="main-body">
                <div class="cal">
                  <div id="container">
                    <div id="header">
                      <div id="monthDisplay"></div>
                      <div>
                        <button id="backButton">
                          <span class="material-symbols-outlined"
                            >arrow_back_ios</span
                          >
                        </button>
                        <button id="nextButton">
                          <span class="material-symbols-outlined"
                            >arrow_forward_ios</span
                          >
                        </button>
                      </div>
                    </div>

                    <div id="weekdays">
                      <div>Sunday</div>
                      <div>Monday</div>
                      <div>Tuesday</div>
                      <div>Wednesday</div>
                      <div>Thursday</div>
                      <div>Friday</div>
                      <div>Saturday</div>
                    </div>

                    <div id="calendar"></div>
                  </div>

                  <div id="newEventModal">
                    <h2>New Event</h2>
                    <input id="eventTitleInput" placeholder="Event Title" />
                    <button id="saveButton">Save</button>
                    <button id="cancelButton">Cancel</button>
                  </div>

                  <div id="deleteEventModal">
                    <h2>Event</h2>

                    <p id="eventText"></p>

                    <button id="deleteButton">Delete</button>
                    <button id="closeButton">Close</button>
                  </div>

                  <div id="modalBackDrop"></div>
                </div>
              </div>
            </div>
            <div id="message" data-tab-content>
             </div>
            <div id="video" data-tab-content>
              <h1>Video Chat</h1>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="../index.js"></script>
    <script src="./calander.js"></script>
    <script src="./todo.js"></script>
    <script src="./app.js"></script>
  </body>
</html>
