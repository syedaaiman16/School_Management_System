<?php
    include("db.inc.php");
    session_start();

    if (isset($_POST['Add'])){
        // $escaped_values = array_map('mysql_real_escape_string', $_POST['id']);
        $firstName = $_POST['id'][1];
        $password = password_hash($firstName, PASSWORD_DEFAULT);
        $fullName = $_POST['id'][1] . ' ' . $_POST['id'][2];
        $values  = implode("', '", $_POST['id']);
        $tableName = $_POST['Add'];
        $sql = "INSERT INTO $tableName VALUES('$values');";
        $query_run = mysqli_query($conn, $sql);
        
        if ($query_run) {
            $inserted_id = $_POST['id'][0]; // Retrieve the inserted ID
            $sql2 = "INSERT INTO users VALUES('$inserted_id', '$fullName', '$firstName@gmail.com', '$password');";
            $query_run2 = mysqli_query($conn, $sql2);
            if ($query_run2){
                $_SESSION['status'] = "User added successfully!";
                header("Location: ../admindashboard/add_$tableName.php?add=$inserted_id");
            }else{
                // If the query fails, display the error message
                $error_message = mysqli_error($conn);
                echo "Error: " . $error_message;
            }
            
        } else {
            $_SESSION['status'] = "User registration failed!";
            header("Location: ../admindashboard/add_$tableName.php");
        }
    }

    if (isset($_POST['Update'])){
        $values  = implode("', '", $_POST['id']);
        $tableName = $_POST['Update'];

        $sql1 = "SHOW COLUMNS FROM $tableName;";
        $fieldResult = mysqli_query($conn,$sql1);
        $allRows = mysqli_fetch_assoc($fieldResult);
        $table_id = $allRows['Field'];
        $value_id = $_POST['tableId'];

        $i = 0;
        $value_array = $_POST['id'];
        $update_text = "";
        while($row1 = mysqli_fetch_array($fieldResult)){
            $field = $row1['Field'];
            $update_text .= $field . " = '$value_array[$i]', ";
            $i += 1;
        }
        $update_text = substr($update_text, 0, -2);
        // echo $update_text;
        $sql = "UPDATE $tableName SET $update_text WHERE $table_id = '$value_id';";
        $query_run = mysqli_query($conn, $sql);

        if ($query_run){
            $_SESSION['status'] = "$value_id updated succesfully!"; 
            header("Location: ../admindashboard/add_$tableName.php?update=$value_id");
        }
        else{
            $_SESSION['status'] = "Updating Failed!!"; 
            header("Location: ../admindashboard/add_$tableName.php?update=$value_id");
        }
    }

    if (isset($_POST['Delete'])){
        $tableName = $_POST['Delete'];
        $value_id = $_POST['delete_id'];

        $sql1 = "SHOW COLUMNS FROM $tableName;";
        $fieldResult = mysqli_query($conn,$sql1);
        $allRows = mysqli_fetch_assoc($fieldResult);
        $table_id = $allRows['Field'];

        $sql = "DELETE FROM $tableName WHERE $table_id = '$value_id';";
        $query_run = mysqli_query($conn, $sql);

        if ($query_run){
            $_SESSION['status'] = "$value_id Deleted succesfully!"; 
            header("Location: ../admindashboard/add_$tableName.php?delete=$value_id");
        }
        else{
            $_SESSION['status'] = "Deleting Failed!!"; 
            header("Location: ../admindashboard/add_$tableName.php?delete=$value_id");
        }
    }
?>