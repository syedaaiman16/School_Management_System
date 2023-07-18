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
                        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../includes/insert_data.php" method="POST">
                        <div class="modal-body">
                            <?php
                            $tableName = 'class';
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
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle"> Delete </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../includes/insert_data.php" method="POST">
                        <div class="modal-body">
                            <p>Are you sure you want to delete this data?</p>
                            <input type="hidden" name="delete_id" class="delete-data">
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
                // echo "<th>Action</th> ";
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
                    // echo "<td>
                    //         <a href='edit.php?id=$id&tableName=$tableName' class='btn btn-info btm-sm'>Edit</a>
                    //         <button class='btn btn-danger btm-sm delete-btn' value='$id'>Delete</button>
                    //     </td> ";
                    echo " </tr>";
                }
            }
            ?>


            <div class="mt-5 py-5" style="width: 50vw;">
                <div class="card p-4">
                    <h1 class="col-md-12 text-center" style="color: black">CLASS TABLE</h1>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                ADD
            </button> -->
                    <div class="container col-div-12">
                        <table id="dataTables" class="data-table">
                            <thead>


                                <?php
                                $tableName = 'class';
                                $student_id = $_SESSION['user_id'];
                                $sql1 = "SHOW COLUMNS FROM $tableName WHERE Field != 'T_ID' ";
                                $sql2 = "SELECT C_ID,CLASS_NAME,S_ID FROM $tableName WHERE S_ID = '$student_id'";
                                dataTable($sql1, $sql2, $conn, $tableName);
                                ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>


    </main>
    <script src="script.js"></script>
</body>


<script>
    $(document).ready(function() {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var table_id = $(this).val();
            $('.delete-data').val(table_id);
            $('#delete-modal').modal('show');
        });
    });
</script>

</html>