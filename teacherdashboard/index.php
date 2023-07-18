<?php
include('header.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu for Teacher Dashboard </title>
  <link rel="stylesheet" href="style.css" />
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
  <nav class="sidebar">
    <a href="#" class="logo">Teacher</a>

    <div class="menu-content">
      <ul class="menu-items">
        <li class="item">
          <a href="view_teacher.php">My Details</a>
        </li>

        <li class="item">
          <div class="submenu-item">
            <span>Student</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">

            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Student
            </div>
            <li class="item">
              <a href="view_student.php">View Student Details</a>
            </li>
            <li class="item">
              <a href="add_exam.php">Add Exam Marks</a>
            </li>
            <li class="item">
              <a href="view_result.php">View Result</a>
            </li>
          </ul>
        </li>

        <li class="item">
          <div class="submenu-item">
            <span>Class</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Class
            </div>
            <li class="item">
              <a href="view_class.php">View Class Details</a>
            </li>
            <li class="item">
              <a href="add_class.php">Add Class</a>
            </li>
            <li class="item">
              <a href="view_subject.php">View Subject</a>
            </li>
          </ul>
        </li>

        <li class="item">
          <a href="../secure_login_system/logout.php">Log Out</a>
        </li>
        <!-- <li class="item">
            <a href="view_subject.php">View Subject</a>
          </li> -->


      </ul>
    </div>
  </nav>

  <nav class="navbar">
    <i class="fa-solid fa-bars" id="sidebar-close"></i>
  </nav>

  <main class="main">
    <img src="teachimg.jpg" alt="" width="1550vw" height="625px">
  </main>

  <script src="script.js"></script>
</body>

</html>