
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
       if(isset($_POST['save'])){
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
        $sql = "INSERT INTO users (name, phone, gender,hobby)
            VALUES ('$name', '$phone', '$gender','$hobby')";
        $_SESSION['successMsg']=" User added successfully";

            if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            header("location:list.php");
        }
            

        }
       
        
    

    ?>
    
        <div class="container">
        <form action="index.php" method="POST" enctype="mulipart/form-data">
            
            <div class="mb-3 title"> <h3>Web Developement Test Two</h1></div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" >
                <sapn class="text-danger"><?php echo $nameError?></span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" >
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
            <button type="submit" name="save" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-primary"><a href="list.php" class="btnEdit text-light">Users List</a></button>
            </form>
            
        </div>
    

    </body>
</html>