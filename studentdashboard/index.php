<?php
session_start();
if ($_SESSION['user_stat'] === 'student') {
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
  <title>Sidebar Menu for Student Dashboard </title>
  <link rel="stylesheet" href="style.css" />
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
  <nav class="sidebar">
    <a href="#" class="logo">Student</a>

    <div class="menu-content">
      <ul class="menu-items">
        <!-- <div class="menu-title">Your menu title</div> -->

        <li class="item">
          <a href="view_student.php">Student</a>
        </li>
        <li class="item">
          <a href="view_result.php">Result</a>
        </li>
        <li class="item">
          <a href="view_class.php">Class</a>
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

    <img src="stdimage.jpg" alt="" width="1400vw" height="625px" >
    
  </main>

  <script src="script.js"></script>
</body>

</html>