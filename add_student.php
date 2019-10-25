<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=db_student", $username, $password);
    // set the PDO error mode to exception


    if (isset($_POST['btn'])) {


        try {

            $student_name = $_POST['student_name'];
            $student_email = $_POST['student_email'];
            $student_phone = $_POST['student_phone'];
            $address = $_POST['address'];
            
            $sql="INSERT INTO tbl_student(student_name,student_email,student_phone,address) VALUES(:sname,:semail,:sphone,:saddress)";
            $data=$conn->prepare($sql);
            $data->bindParam(":sname",$student_name);
            $data->bindParam(":semail",$student_email);
            $data->bindParam(":sphone",$student_phone);
            $data->bindParam(":saddress",$address);
            $data->execute();
            
            
        } catch (Exception $ex) {
            echo "Student Data Not Save Successfully!: " . $e->getMessage();
        }
    }
} catch (PDOException $e) {
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
                    <div class="jumbotron text-center text-white" style="background-color:red ">
                        <h1>Add Student</h1>
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
                    <div class="jumbotron text-white" style="background-color:black ">

                        <form action="" method="post">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Student Name</label>
                                <input name="student_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Student Email</label>
                                <input name="student_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Student Phone</label>
                                <input name="student_phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea name="address" class="form-control" rows="5" cols="15"></textarea>
                            </div>



                            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
