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

    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                scrollX: true
            });
        });
    </script>

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
        <!-- page content -->
        <!-- MODAL trigger -->

        <!-- Modal for adding-->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../includes/insert_data_tdb.php" method="POST">
                        <div class="modal-body">
                            <?php
                            $tableName = 'exam';
                            $sql1 = "SHOW COLUMNS FROM $tableName;";
                            $fieldResult = mysqli_query($conn, $sql1);
                            while ($row1 = mysqli_fetch_array($fieldResult)) {
                                $field = $row1['Field'];
                                echo "<div class='form-group'>
                                    <label><strong>$field</strong></label>
                                    <input type='text' name='id[]' class='form-control' placeholder='$field'>
                                </div> ";
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="Add" class="btn btn-primary" value=<?php echo $tableName ?>>Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Modal for Delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../includes/insert_data_tdb.php" method="POST">
                        <div class="modal-body">
                            <div class="modal-body">
                                <p>Are you sure you want to delete this data?</p>
                                <input type="hidden" name="delete_id" class="delete-data">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                            <button type="submit" name="Delete" class="btn btn-primary" value=<?php echo $tableName ?>>YES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <<!-- Data tables -->
            <?php
            function dataTable($sql1, $sql2, $conn, $tableName)
            {
                $fieldResult = mysqli_query($conn, $sql1);
                echo "<tr class='table-fields'> ";
                while ($row1 = mysqli_fetch_array($fieldResult)) {
                    $field = $row1['Field'];
                    echo "<th>$field</th> ";
                }
                echo "<th>Action</th> ";
                echo " </tr>";
                echo " </thead>";

                echo " <tbody>";
                $loadTableResult = mysqli_query($conn, $sql2);
                // $resultCheck = mysqli_num_rows($loadTableresult);
                $row2 = mysqli_fetch_all($loadTableResult);
                for ($i = 0; $i < count($row2); $i++) {
                    $id = $row2[$i][0];
                    echo "<tr> ";
                    foreach ($row2[$i] as $loopData) {
                        echo "<td>$loopData</td> ";
                    }
                    echo "<td>
                            <a href='edit.php?id=$id&tableName=$tableName' class='btn btn-info btm-sm'>Edit</a>
                            <button class='btn btn-danger btm-sm delete-btn' value='$id'>Delete</button>
                        </td> ";
                    echo " </tr>";
                }
            }
            ?>

            <div style="width:70vw;" class="mt-5 py-5">
                <?php
                if (isset($_GET['delete'])) {
                    $deletedId = $_GET['delete'];
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>$deletedId Deleted</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
                }
                ?>

                <?php
                if (isset($_GET['update'])) {
                    $addId = $_GET['update'];
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$addId Updated</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
                }
                ?>

                <?php
                if (isset($_GET['add'])) {
                    $updateId = $_GET['add'];
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$updateId Added</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
                }
                ?>

                <h1 class="col-md-12 text-center" style="color: black">EXAM TABLE</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    ADD
                </button>
                <div class="container col-div-12">
                    <table id="dataTables" class="data-table">
                        <thead>
                            <?php
                            $tableName = 'exam';
                            $teacher_id = $_SESSION['user_id'];
                            $sql1 = "SHOW COLUMNS FROM $tableName;";
                            $sql2 = "SELECT * FROM $tableName WHERE T_ID = '$teacher_id'";
                            dataTable($sql1, $sql2, $conn, $tableName);
                            ?>
                            </tbody>
                    </table>
                </div>
            </div>


    </main>
    <script src="script.js"></script>
</body>


<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var table_id = $(this).val();
            $('.delete-data').val(table_id);
            $('#deleteModal').modal('show');
        });
    });
</script>

</html>