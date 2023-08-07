<?php 
session_start();
require "connection.php";

$email = "";
$name = "";
$errors = array();

// if user signup button is clicked
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $father = mysqli_real_escape_string($con, $_POST['Father']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $amount = mysqli_real_escape_string($con, $_POST['Amount']);
    $room = mysqli_real_escape_string($con, $_POST['room']);
    $timef = mysqli_real_escape_string($con, $_POST['timef']);
    $timet = mysqli_real_escape_string($con, $_POST['timet']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $photo = mysqli_real_escape_string($con, $_POST['photo']);
    $aadhar = mysqli_real_escape_string($con, $_POST['aadhar']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Check if the passwords match
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }

    // Check if email already exists
    $email_check = "SELECT * FROM `student-details` WHERE email = '$email'";
$res = mysqli_query($con, $email_check);
if (mysqli_num_rows($res) > 0) {
    $errors['email'] = "Email that you have entered is already exist!";
}


    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $userType="student";
        $status = "notverified";
        $insert_data = "INSERT INTO `student-details` (name, father, course, year, amount, room, email, phone, timef, timet, password, cpassword,photo,aadhar, address, code,userType, status)
                        VALUES ('$name', '$father', '$course', '$year', '$amount', '$room', '$email', '$phone', '$timef', '$timet', '$password', '$cpassword','$photo','$aadhar', '$address', '$code','$userType','$status')";
        $data_check = mysqli_query($con, $insert_data);

        if ($data_check) {
            echo '<script language="javascript">';
            echo 'alert("Data successfully sent")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Something went wrong")';
            echo '</script>';
        }
    }
    //     if($data_check){
    //         $subject = "Email Verification Code";
    //         $message = "Your verification code is $code";
    //         $sender = "From:abhishek.rawat_bca21@gla.ac.in";
    //         if(mail($email, $subject, $message, $sender)){
    //             $info = "We've sent a verification code to your email - $email";
    //             $_SESSION['info'] = $info;
    //             $_SESSION['email'] = $email;
    //             $_SESSION['password'] = $password;
    //             header('location: user-otp.php');
    //             exit();
    //         }else{
    //             $errors['otp-error'] = "Failed while sending code!";
    //         }
    //     }else{
    //         $errors['db-error'] = "Failed while inserting data into database!";
    //     }
    // }

    // if user click verification code submit button
    // if(isset($_POST['check'])){
    //     $_SESSION['info'] = "";
    //     $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    //     $check_code = "SELECT * FROM student-details WHERE code = $otp_code";
    //     $code_res = mysqli_query($con, $check_code);
    //     if(mysqli_num_rows($code_res) > 0){
    //         $fetch_data = mysqli_fetch_assoc($code_res);
    //         $fetch_code = $fetch_data['code'];
    //         $email = $fetch_data['email'];
    //         $code = 0;
    //         $status = 'verified';
    //         $update_otp = "UPDATE student-details SET code = $code, status = '$status' WHERE code = $fetch_code";
    //         $update_res = mysqli_query($con, $update_otp);
    //         if($update_res){
    //             $_SESSION['name'] = $name;
    //             $_SESSION['email'] = $email;
    //             header('location: index.html');
    //             exit();
    //         }else{
    //             $errors['otp-error'] = "Failed while updating code!";
    //         }
    //     }else{
    //         $errors['otp-error'] = "You've entered incorrect code!";
    //     }
    // }

//     //if user click login button
//     if(isset($_POST['login'])){
//         $email = mysqli_real_escape_string($con, $_POST['email']);
//         $password = mysqli_real_escape_string($con, $_POST['password']);
//         $check_email = "SELECT * FROM student-details WHERE email = '$email'";
//         $res = mysqli_query($con, $check_email);
//         if(mysqli_num_rows($res) > 0){
//             $fetch = mysqli_fetch_assoc($res);
//             $fetch_pass = $fetch['password'];
//             if(password_verify($password, $fetch_pass)){
//                 $_SESSION['email'] = $email;
//                 $status = $fetch['status'];
//                 if($status == 'verified'){
//                   $_SESSION['email'] = $email;
//                   $_SESSION['password'] = $password;
//                     header('location: index.html');
//                 }else{
//                     $info = "It's look like you haven't still verify your email - $email";
//                     $_SESSION['info'] = $info;
//                     header('location: user-otp.php');
//                 }
//             }else{
//                 $errors['email'] = "Incorrect email or password!";
//             }
//         }else{
//             $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
//         }
//     }

//     //if user click continue button in forgot password form
//     if(isset($_POST['check-email'])){
//         $email = mysqli_real_escape_string($con, $_POST['email']);
//         $check_email = "SELECT * FROM student-details WHERE email='$email'";
//         $run_sql = mysqli_query($con, $check_email);
//         if(mysqli_num_rows($run_sql) > 0){
//             $code = rand(999999, 111111);
//             $insert_code = "UPDATE student-details SET code = $code WHERE email = '$email'";
//             $run_query =  mysqli_query($con, $insert_code);
//             if($run_query){
//                 $subject = "Password Reset Code";
//                 $message = "Your password reset code is $code";
//                 $sender = "From: siddhant.sharma_cs21@gla.ac.in";
//                 if(mail($email, $subject, $message, $sender)){
//                     $info = "We've sent a passwrod reset otp to your email - $email";
//                     $_SESSION['info'] = $info;
//                     $_SESSION['email'] = $email;
//                     header('location: reset-code.php');
//                     exit();
//                 }else{
//                     $errors['otp-error'] = "Failed while sending code!";
//                 }
//             }else{
//                 $errors['db-error'] = "Something went wrong!";
//             }
//         }else{
//             $errors['email'] = "This email address does not exist!";
//         }
//     }

//     //if user click check reset otp button
//     if(isset($_POST['check-reset-otp'])){
//         $_SESSION['info'] = "";
//         $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
//         $check_code = "SELECT * FROM student-details WHERE code = $otp_code";
//         $code_res = mysqli_query($con, $check_code);
//         if(mysqli_num_rows($code_res) > 0){
//             $fetch_data = mysqli_fetch_assoc($code_res);
//             $email = $fetch_data['email'];
//             $_SESSION['email'] = $email;
//             $info = "Please create a new password that you don't use on any other site.";
//             $_SESSION['info'] = $info;
//             header('location: new-password.php');
//             exit();
//         }else{
//             $errors['otp-error'] = "You've entered incorrect code!";
//         }
//     }

//     //if user click change password button
//     if(isset($_POST['change-password'])){
//         $_SESSION['info'] = "";
//         $password = mysqli_real_escape_string($con, $_POST['password']);
//         $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
//         if($password !== $cpassword){
//             $errors['password'] = "Confirm password not matched!";
//         }else{
//             $code = 0;
//             $email = $_SESSION['email']; //getting this email using session
//             $encpass = password_hash($password, PASSWORD_BCRYPT);
//             $update_pass = "UPDATE student-details SET code = $code, password = '$encpass' WHERE email = '$email'";
//             $run_query = mysqli_query($con, $update_pass);
//             if($run_query){
//                 $info = "Your password changed. Now you can login with your new password.";
//                 $_SESSION['info'] = $info;
//                 header('Location: password-changed.php');
//             }else{
//                 $errors['db-error'] = "Failed to change your password!";
//             }
//         }
//     }
    
//    //if login now button click
//     if(isset($_POST['login-now'])){
//         header('Location: login-user.php');
  }
?>