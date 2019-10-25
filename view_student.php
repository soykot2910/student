<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=db_student", $username, $password);
    // set the PDO error mode to exception
    
    $sql="SELECT * FROM tbl_student";
    $data=$conn->prepare($sql);
    $data->execute();
    
    
    
//    while ($row=$data->fetch(PDO::FETCH_ASSOC))
//    {
//        echo '<pre>';
//        echo $row['student_name'];   
//    }
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>




<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Basic Crud</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>


        <div class="container-fluid" >
            <div class="row">
                <div class="col-12">
                    <div class="jumbotron text-center text-white" style="background-color:blue ">
                        <h1>View Student</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="add_student.php">Add Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view_student.php">View Student</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <br>
        <br>
        
      

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="jumbotron text-white" style="background-color:black;text-align:center  ">
                        <table class="table-bordered" style="width:100% ">
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Student Email</th>
                                <th>Student Phone</th>
                                <th>Action</th>
                            </tr>
                            
                            
                            <?php 
                            while ($row=$data->fetch(PDO::FETCH_ASSOC))
                            {
                            ?>
                            <tr>
                                <td><?php echo $row['student_id']?></td>
                                <td><?php echo $row['student_name']?></td>
                                <td><?php echo $row['student_email']?></td>
                                <td><?php echo $row['student_phone']?></td>
                                <td>
                                    <a href="edit_student.php?student_id=<?php echo $row['student_id']?>"><button type="button" class="btn btn-info">Edit</button></a>
                                    <a href="delete_student.php?student_id=<?php echo $row['student_id']?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
