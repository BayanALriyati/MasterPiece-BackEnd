<?php
session_start();
include_once('../config/connect.php');
include_once('myfunctions.php');

if (isset($_POST['register'])){
 
    // $username=  mysqli_real_escape_string($con,$_POST['name']);
    $username=  $_POST['name'];

    // $email=  mysqli_real_escape_string($con,$_POST['email']);
    $email=  $_POST['email'];
    

    // $password=  mysqli_real_escape_string($con,$_POST['password']);
    $password=  $_POST['password'];

    $hashedPass = sha1($password);
    // $cPassword= mysqli_real_escape_string($con,$_POST['cPassword']);
    $cPassword= $_POST['cPassword'];

    $hashedPass = sha1($cPassword);
    
    // Check if email already registered 
    $check_email_query="SELECT email FROM users WHERE email='$email' ";
    $check_email_run=mysqli_query($con,$check_email_query);
    
    if(mysqli_num_rows($check_email_run)> 0)
    {
            redirect("../register.php","Email already registered");
            // $_SESSION ['message']="Email already registered";
            // header('Location: ../register.php');
    }else
    {
            if($password === $cPassword)
            {
                //Insert user data 
                $register_query = "INSERT INTO users (name,email,password) VALUE ('$username','$email','$password')";
                $register_query_run=mysqli_query($con,$register_query);
                
                if($register_query_run)
                {
                    redirect("../login.php","Register Successfully");
                    // $_SESSION ['message']="Register Successfully";
                    // header('Location: ../login.php');
                }
                else
                {
                    redirect("../register.php","Something went wrong");
                    // $_SESSION ['message'] = "Something went wrong";
                    // header('Location: ../register.php');
                }
            }
            else
            {
                redirect("../register.php","password do not match");  
                 
                   
                // $_SESSION ['message'] = "password do not match";
                // header('Location: ../register.php');
            }
  }
}
else if (isset($_POST['login']))
{
    $email=  $_POST['email'];
    $password=  $_POST['password'];

    $login_query="SELECT * FROM  users WHERE email='$email' AND password='$password'";
    $login_query_run= mysqli_query ($con , $login_query);

if(mysqli_num_rows($login_query_run) > 0)
       {
         $_SESSION ['auth'] = true ;
         $userLogin = mysqli_fetch_array($login_query_run);

        $userId = $userLogin['User_id'];
        $userName = $userLogin['name'];
        $userEmail = $userLogin['email'];
        $image = $userLogin['image'];

        $Role = $userLogin['role'];

        $_SESSION ['auth_user'] = [
              'user_id'=> $userId ,
              'name'=> $userName ,
              'email'=> $userEmail,
              'image'=> $image 

        ];

        $_SESSION ['role_as'] = $Role ;

        if($Role == 1){
            redirect("../admin/index.php","Welcome To Dashboard");
            // $_SESSION ['message'] = "Welcome To Dashboard";
            // header('Location: ../admin/index.php');
        }
        else
        {
            redirect("../index.php","Logged In Successfully");
            // $_SESSION ['message'] = "Logged In Successfully";
            // header('Location: ../index.php');
        }

}
else
{
       redirect("../login.php","Invalid Credentials");
    //    $_SESSION ['message'] = "Invalid Credentials";
    //    header('Location: ../login.php');
}
    

}
?>