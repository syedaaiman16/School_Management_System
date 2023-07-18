<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navigation</title>
    <link rel="stylesheet" href="frontpg.css">

     <!-- bootstrap -->
     <link
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
     crossorigin="anonymous"
   />



    <!-- footer -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <header>
        <nav class="navbar">
        
            <ul>
                <li>
                    <div><img
                        src="logof.PNG"
                        alt="Logo"
                        width="30"
                        height="25"
          
                      /></div>
                </li>
                <li><a class="navbar-logoname" style="color: white"  href="#">NEDThinker School</a></li>
                <li><a style="font-size: 20px" href="#"  class="active">Home</a></li>
                <li><a style="font-size: 20px" href="./secure_login_system/login.php">Admin</a></li>
                <li><a style="font-size: 20px" href="./secure_login_system/login.php">Teacher</a></li>
                <li><a style="font-size: 20px" href="./secure_login_system/login.php">Student</a></li>
                <!-- <div class="right-corner">
                    <ul>
                        <li><a style="font-size: 20px" href="#">Teacher</a></li>
                        <li><a style="font-size: 20px" href="#">Student</a></li>
                    </ul>
                </div> -->
            </ul>
        </nav>
        
        <div
      id="carouselExampleDark"
      class="carousel carousel-dark slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleDark"  style="background-color: white;"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide-to="1"
          aria-label="Slide 2"
          style="background-color: white;"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide-to="2"
          aria-label="Slide 3"
          style="background-color: white;"
        ></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="images/M1.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-none d-md-block" style="color: white">
            <h2>NEDThinker Learner Profile</h2>
            <p style="font-size: medium">The NEDThinker Learner Profile translates our mission of benefitting students, the community and the wider world into a set of attributes essential for holistic development.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="images/M2.jpg" class="d-block w-100" alt="..."  />
          <div class="carousel-caption d-none d-md-block" style="color: white">
            <h2>Education Programmes</h2>
            <p style="font-size: medium">The NEDThinker curriculum is designed to meet the needs of the 21st century, of individual students as well as the needs of local and global communities.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/M3.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-none d-md-block" style="color: white">
            <h2>Co- and Extracurricular Activities</h2>
            <span></span>
            <p style="font-size: medium">NEDThinker aims to provide a balance between academics and extracurricular activities to develop well-rounded individuals. </p>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleDark"
        data-bs-slide="prev"
        
      >
        <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
        <span class="visually-hidden" >Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleDark"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"  ></span>
        <span class="visually-hidden" >Next</span>
      </button>
    </div>

    </header>

    <footer>

        <p>
          <a href="https://facebook.com/" class="fa fa-facebook"></a>
          <a href="https://api.whatsapp.com/" class="fa fa-whatsapp"></a>
          <a href="https://instagram.com/" class="fa fa-instagram"></a>
          <a href="https://twitter.com/" class="fa fa-twitter"></a>
        </p>
        <div >
          <!-- <div class="row">
            <div class="col-md-12 col-sm-12">
              <div style="color:#ffffff;" class="wow fadeInUp footer-copyright"> -->
                <p>Copyright &copy; 2023 NEDThinker </p>
              <!-- </div>
            </div>
          </div> -->
        </div>
      </footer>


    
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"
      ></script>



  


</body>

</html>
