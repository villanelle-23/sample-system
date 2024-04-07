<?php
session_start();
require 'config.php';

if(isset($_POST['submit'])){

    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rpassword = filter_var($_POST['rpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if(!$email){
        $_SESSION['register_error'] = "Email is required" ;
    }elseif(!$fullname){
        $_SESSION['register_error'] = "fullname is required";
    }elseif(!$password){
        $_SESSION['register_error'] = "password is required";
    }elseif(!$rpassword){
        $_SESSION['register_error'] = "Confirm Password is required";
    }elseif(strlen($password) < 8  || strlen($rpassword) < 8){
        $_SESSION['register_error'] = "Password or Confirm password must be 8+ characters";
    }elseif($password !== $rpassword){
        $_SESSION['register_error'] = "Passwords do not match";
    }else{

        //hash password
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        
        // check if username or email already exists
            $statement = $conn->prepare("SELECT * FROM user WHERE email= '$email' ");
            $statement->execute();
            $statement->fetchAll(PDO::FETCH_ASSOC);
            $get_username = $statement->rowcount();

            if ($get_username > 0) {
                $_SESSION['register_error'] = "Email already exist";                
            }
    }

    // redirect to register page if error 
if (isset($_SESSION['register_error'])) {
    //pass form back to register page  
    $_SESSION['registration-data'] = $_POST;
   header('location: ' . DOMAIN . 'register.php');
   die();

}else{
     
    try{
    //insert into users table
    $insert_user_query = $conn->prepare("INSERT INTO user (fullname, email, password) 
    VALUES(:fullname, :email, :hash_password)");

     $insert_user_query->bindValue(':fullname', $fullname);
     $insert_user_query->bindValue(':email', $email);
     $insert_user_query->bindValue(':hash_password', $hash_password);
     $insert_user_query->execute();


        // redirect to login page with sucess message
        $_SESSION['register_success'] = "Successfully Registered. please login";
        header('location: ' . DOMAIN . 'register.php');
        die();

    } catch (PDOException $err) {
        $_SESSION['register_error'] = "Error: " . $err->getMessage();
        header('location: ' . DOMAIN . 'register.php');
        die();
    }

}



}else{
    //if button was not clicked
    header('location: ' . DOMAIN . 'register.php');
    exit();
}