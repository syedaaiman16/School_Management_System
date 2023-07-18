<!DOCTYPE html>

<?php include_once "db.inc.php"; ?>
<head>
    <title>Data</title>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"> </script>

    <script>
    $(document).ready(function(){
    $('#dataTables').DataTable();
    });
    </script>
</head>
<body>
    <table id="dataTables">
    <thead>
    <?php
    if (isset($_POST['table'])){
        $tableName = $_POST['table'];

        $sql1 = "SHOW COLUMNS FROM $tableName;";
        $fieldResult = mysqli_query($conn,$sql1);
        echo "<tr class='table-fields'> ";
        while($row1 = mysqli_fetch_array($fieldResult)){
            $field = $row1['Field'];
            echo "<th>$field</th> ";
        }
        echo " </tr>";
        echo " </thead>";

        echo " <tbody>";
        $sql2 = "SELECT * FROM $tableName;";
        $loadTableResult = mysqli_query($conn, $sql2);
        // $resultCheck = mysqli_num_rows($loadTableresult);
        $row2 = mysqli_fetch_all($loadTableResult);
        for($i = 0; $i < count($row2); $i++){
            echo "<tr> ";            
            foreach($row2[$i] as $loopData){
                echo "<td>$loopData</td> ";
            }
            echo " </tr>"; 
        }       
    }
    ?>
    </tbody>
    </table>
</body>

<style>
    table{
        width: 970px;
        
    }
    table, th, td{
        border: 2px solid #7061f5;
        border-collapse: collapse;
    }
    th, td{
        padding: 5px;
    }
    th{
        text-align: left;
        font-size: large;
        background-color: #7061f5;
        color: black;
        position: sticky;
        top: 0px;

    }
    body{
        font-family:Arial, Helvetica, sans-serif;
        margin: 0px;
        font-family: system-ui;
        font-weight: 600;
    }
    
</style>

