<!DOCTYPE html>

<?php
include_once "../includes/db.inc.php";
include('header.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu for Admin Dashboard </title>
    <!-- Data Tables -->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="view_style.css">
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

    <nav class="navbar" style="z-index: 10;">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>

    <main class="main">
        <section class="mt-5 pt-5 container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-5 mb-3 card">
                        <h1 class="d-flex justify-content-between">Results </span>
                        </h1>
                        <div class="table-responsive">
                            <table id="dataTables" class="table table-hover responsive nowrap align-middle mb-0 table table-borderless table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>S_ID</th>
                        
                                        <th>Name</th>
                                        <th>Percentage</th>
                                        <th>T_ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $sql = "SELECT exam.*, COUNT(exam.E_MARKS) as total_sub,SUM(exam.E_MARKS) as total, student.* FROM exam JOIN student on student.S_ID = exam.S_ID GROUP BY exam.S_ID";
                                    $res = $conn->query($sql);
                                    if ($res && $res->num_rows > 0) {
                                        $i = 0;
                                        while ($row = $res->fetch_assoc()) {
                                            // echo print_r($row);
                                            $percentage = ($row['total'] * 100) / ($row['total_sub'] * 100);
                                            $i++;
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['S_ID'] ?></td>
                                                <td><?php echo $row['S_FNAME'] . ' ' . $row['S_LNAME'] ?></td>
                                                <td><?php echo $percentage ?>%</td>
                                                <td><?php echo $row['T_ID'] ?></td>
                                            
                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Data tables -->
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                scrollX: true,
                paging: true,
                fixedHeader: {
                    header: true
                },
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Excel <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>'
                    },

                    'copy',
                    'pdf',
                    'colvis'
                ],

            });
        });
    </script>
    <script src="script.js"></script>
</body>

</html>