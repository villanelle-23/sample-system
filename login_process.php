<?php
session_start();
require 'config.php';

if(isset($_POST['login'])){
 
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


     if (!$email) {
       $_SESSION['login_error'] = "Email is required";
    }elseif(!$password){
        $_SESSION['login_error'] = "password is required";
    }else{

         //get user information from database
    $statement = $conn->prepare('SELECT * FROM user WHERE email = :email ');
    $statement->bindValue(':email', $email); 
    $statement->execute();
    $statement_result = $statement->rowcount();

    if ($statement_result === 1) {
        //convert record to an array
        $get_user = $statement->fetch(PDO::FETCH_ASSOC); 
        
         $database_password = $get_user['password'];

         //compare form password wth database password
         if (password_verify($password, $database_password)) { 
             // set session for access control 
             $_SESSION['user-id-session'] = $get_user['id']; 
             //log the person in
             header('location: ' . DOMAIN . 'home2.php');               
            
            }else {
             $_SESSION['login_error'] = "Incorrect Email or Password"; 
             
                 }
        }else {
        $_SESSION['login_error'] = "Email not found";
        
         }
    }

    // redirect to login page if error 
if (isset($_SESSION['login_error'])) {
    //pass form back to login page  
    $_SESSION['login-data'] = $_POST;
   header('location: ' . DOMAIN . 'register.php');
   exit();

}
}else{
    //if button was not clicked
    header('location: ' . DOMAIN . 'register.php');
    exit();
}