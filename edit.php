
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php 
        require "db_connect.php";
        $nameError="";
        $phoneError="";
        $genderError="";
        $hobbyError="";
       if(isset($_GET['id'])){
        $postId=$_GET['id'];
        $post=mysqli_query($conn,"SELECT * FROM users WHERE id=$postId");
                if(mysqli_num_rows($post)==1){
                    foreach($post as $result){
                        $id=$result['id'];
                        $name=$result['name'];
                        $phone=$result['phone'];
                        $gender=$result['gender'];
                        
                    }
                    }
        
       }
       if(isset($_POST['update'])){
          $id=$_POST['postId'];
          $name=$_POST['name'];
          $phone=$_POST['phone'];
          $gender=$_POST['gender'];
            if(isset($_POST['hobby'])){
                if(is_array( $_POST['hobby']) && count( $_POST['hobby']) >0){
                    $hobby=implode(',', $_POST['hobby']);
                }
            }
            if(empty($name)){
            $nameError="Name Require";
            }
            if(empty($phone)){
                $phoneError="Phone number require";
            }
            if(empty($hobby)){
                $hobbyError="Select hobby";
            }
            if(!empty($name)&&!empty($phone)&&!empty($hobby)){

                $sql="UPDATE users SET name='$name',phone='$phone',gender='$gender',hobby='$hobby' WHERE id=$id";
                mysqli_query($conn,$sql);
                $_SESSION['successMsg']=" User updated successfully";
                header("location:list.php");
            }
       }

       
       
        
    

    ?>
    
        <div class="container">
        <form action="edit.php" method="POST" enctype="mulipart/form-data">
            
            <div class="mb-3 title"> <h3>Web Developement Test Two</h1></div>
            <input type="hidden" name="postId" value="<? echo $id?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name?>" >
                <sapn class="text-danger"><?php echo $nameError?></span>
                
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $phone?>" >
                <sapn class="text-danger"><?php echo $phoneError?></span>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Male
                </label>
              </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Female
                </label>
            </div>
            <div class="checkBox">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobby[]" value="swimming" id="hobby">
                    <label class="form-check-label" for="flexCheckDefault">
                    Swimming
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobby[]" value="reading" id="hobby" >
                    <label class="form-check-label" for="flexCheckChecked">
                    Reading
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobby[]" value="cooking" id="hobby" >
                    <label class="form-check-label" for="flexCheckChecked">
                    Cooking
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobby[]" value="travelling" id="hobby" >
                    <label class="form-check-label" for="flexCheckChecked">
                    Travelling
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobby[]" value="goingout" id="hobby" >
                    <label class="form-check-label" for="flexCheckChecked">
                    Going out with friends
                    </label>
                </div>
                <span class="text-danger"><?php echo $hobbyError ?></span>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
           
        </div>
    

    </body>
</html>