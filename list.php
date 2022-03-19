<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="mb-3 title"> <h3>Web Developement Test Two</h1></div>
        <div class="tableContainer">
          <?php if(isset($_SESSION['successMsg'])){?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $_SESSION['successMsg']; unset($_SESSION['successMsg']);?></strong> 
          <button  class="close" data-bs-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php }?>
        <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Gender</th>
                  <th>Hobby</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  require "db_connect.php";
                  $sql="SELECT * FROM users";
                  $results = mysqli_query($conn, $sql);
                  foreach($results as $result):
                    $id=$result['id'];
                    $name=$result['name'];
                    $phone=$result['phone'];
                    $gender=$result['gender'];
                    $hobby=$result['hobby'];

                  ?>
                <tr>
                  <td><?=$name?></td>
                  <td><?=$phone?></td>
                  <td><?=$gender?></td>
                  <td><?=$hobby?></td>
                  <td ><a href="edit.php?id=<?=$id?>" class="btnEdit text-warning">Edit</a></td>
                  <td ><a href="delete.php?id=<?=$id?>" class="btnEdit text-danger">Delete</a></td>
                </tr>
                <?php
                endforeach;
                ?>
                
              
              </tbody>
            </table>

      </div>
      <button type="button" class="btn btn-outline-primary"><a href="index.php" class="btnEdit ">Add more users</a></button>
    
    </div>
    
</body>
</html>