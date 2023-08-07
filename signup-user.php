<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 form" id="flm1" style=" background-color:#3e87d6">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center mt-4">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                    <div class="col">    
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                </div>       
                </div>          
                <div class="col">       
                        <div class="form-group">
                        <input class="form-control" type="text" name="Father" placeholder="Father's name" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">  
                    <div class="form-group">
                        <input class="form-control" type="text" name="course" placeholder="Course" required>
                </div>
                </div>
                    <div class="col">  
                    <div class="form-group">
                        <input class="form-control" type="text" name="year" placeholder="year" required>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col">  
                <div class="form-group">
                        <input class="form-control" type="text" name="Amount" placeholder="Amount" required>
                    </div>
                </div>
                <div class="col">  
                    <div class="form-group">
                        <input class="form-control" type="text" name="room" placeholder="Room No" required>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col"> 
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-g.-]+\.[a-z]{2,}+\.[a-z]{2,}" placeholder="Email Address" required value="<?php echo $email ?>" title="Please enter an email for entire specified format xxxx_xx@gla.ac.in">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" pattern="[7-9]{1}[0-9]{9}" placeholder="Mobile no"  required>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col">  
                <div class="form-group">
                <span>From</span>
                        <input class="form-control" type="date" name="timef" placeholder="Time" required>
                    </div>
                </div>
                    <div class="col">  
                <div class="form-group">
                <span>To</span>
                        <input class="form-control" type="date" name="timet" placeholder="Time" required>
                    </div>
                </div>
                </div>
                    <!-- pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}-->
                    <div class="row">
                          <div class="col">  
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password"  
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Must contain at least one number and one uppercase and lowercase letter, 
                        and at least 8 or more characters" required> 
                    </div>
                </div>
                <div class="col">  
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>photo</span> 
                <div class="form-group">
                        <input class="form-control" type="file" name="photo" placeholder="photo" required>
                    </div>
                </div>
                <div class="col">
                    <span>aadhar card</span>
                    <div class="form-group">
                        <input class="form-control" type="file" name="aadhar" placeholder="Aadhar card" required>
                    </div>
                </div>
                </div>
                    <textarea  class="mb-4"style="width: 100%; height: 100px;" name="address" placeholder="address"></textarea>

                    <div class="form-group">
                        <input class="form-control button"style=" background-color: #5757d1;color:white;" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a  style="color:white;"href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>