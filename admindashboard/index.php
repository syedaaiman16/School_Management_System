<?php
session_start();
if ($_SESSION['user_stat'] == 'admin') {
} else {
  header("Location: ../secure_login_system/login.php");
}
?>


<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu for Admin Dashboard </title>
  <link rel="stylesheet" href="style.css" />
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
  <nav class="sidebar">
    <a href="#" class="logo">Admin</a>

    <div class="menu-content">
      <ul class="menu-items">

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
              <a href="add_student.php">Add Student</a>
            </li>
            <li class="item">
              <a href="view_result.php">View Result</a>
            </li>
          </ul>
        </li>

        <li class="item">
          <div class="submenu-item">
            <span>Teacher</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Teacher
            </div>
            <li class="item">
              <a href="view_teacher.php">View Teacher Details</a>
            </li>
            <li class="item">
              <a href="add_teacher.php">Add Teacher</a>
            </li>
          </ul>
        </li>

        <li class="item">
          <div class="submenu-item">
            <span>Subject</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Subject
            </div>
            <li class="item">
              <a href="view_subject.php">View Subject Details</a>
            </li>
            <li class="item">
              <a href="add_subject.php">Add Subject</a>
            </li>
          </ul>
        </li>
        <li class="item">
          <a href="../secure_login_system/logout.php">Log Out</a>
        </li>

      </ul>
    </div>
  </nav>

  <nav class="navbar">
    <i class="fa-solid fa-bars" id="sidebar-close"></i>
  </nav>

  <main class="main">
    <img src="adminimg.jpg" alt="" width="1270vw" height="622px">
  </main>

  <script src="script.js"></script>
</body>

</html>