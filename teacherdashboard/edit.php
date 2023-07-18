<?php
    include('header.php');
    include('../includes/db.inc.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <a href="index.php" class="btn btn-danger btn-sm col-sm-1">BACK</a>
        </div>
        <div class="row">
            <form action="../includes/insert_data_tdb.php" method="POST">
                <div class="modal-body">
                    <?php
                        $tableName = $_GET['tableName'];
                        $sql1 = "SHOW COLUMNS FROM $tableName;";
                        $fieldResult = mysqli_query($conn,$sql1);
                        $allRows = mysqli_fetch_assoc($fieldResult);

                        $table_id = $allRows['Field'];
                        $get_id = $_GET['id'];
                        $sql2 = "SELECT * FROM $tableName WHERE $table_id = '$get_id';";
                        $sql2run = mysqli_query($conn, $sql2);
                        $sql2row = mysqli_fetch_row($sql2run);
                        
                        $i = 1;
                        while($row1 = mysqli_fetch_array($fieldResult)){
                            $field = $row1['Field'];
                            echo "<div class='form-group'>
                                    <label><strong>$field</strong></label>
                                    <input type='text' name='id[]' class='form-control' value='$sql2row[$i]'>
                                </div> ";
                            $i += 1;
                        }

                    ?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="tableId" value="<?php echo $get_id; ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="Update" class="btn btn-primary" value=<?php echo $tableName ?>>Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>