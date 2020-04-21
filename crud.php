<?php

include_once 'dbconn.php';
if(isset($_POST['btn_save'])){
    
    $username = $_POST['user_name'];
    $useremail = $_POST['email_id'];
    $contact = $_POST['contact_no'];
    $insert = $pdo->prepare("insert into user(username,useremail,contactno)values(:un,:ue,:uc)");
    $insert->bindParam(':un',$username);
    $insert->bindParam(':ue',$useremail);
    $insert->bindParam(':uc',$contact);
    if($insert->execute()){
        echo 'Insertion Succesfully';
    }
    else{
        echo 'Insertion Not Succesfully';
    }
    
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rishikesh Edu Hub | CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
       <center><h3 style="color:red">CRUD USING PHP PDO</h3></center>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                
                    <div class="form-group">
                    
                        <label>User Name</label>
                        <input type="text" name="user_name" class="form-control" required>
                    
                    </div>
                    <div class="form-group">
                    
                        <label>Email Id</label>
                        <input type="email" name="email_id" class="form-control" required>
                    
                    </div>
                    <div class="form-group">
                    
                        <label>Contact No</label>
                        <input type="text" name="contact_no" class="form-control" required>
                    
                    </div>
                    <button type="submit" name="btn_save" class="btn btn-info">Save</button>
                </form>
            </div>
                
            <div class="col-md-8">
               <table class="table table-bordered">
                
                   <thead>
                    <tr>
                       
                       <th>#</th>
                        <th>USER NAME</th>
                        <th>USER EMAIL</th>
                        <th>CONTACT NO</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                       
                        $select = $pdo->prepare("select * from user ORDER BY id DESC");
                       $select->execute();
                       while($row = $select->fetch(PDO::FETCH_OBJ)){
                           echo '
                           
                            <tr>
                                <td>'.$row->id.'</td>
                                 <td>'.$row->username.'</td>
                                  <td>'.$row->useremail.'</td>
                                   <td>'.$row->contactno.'</td>
                            </tr>
                           
                           
                           ';
                       }
                       
                       ?>
                   
                   </tbody>
                
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<!--

C = Create
R = Read
U = Update
D = Delete

-->