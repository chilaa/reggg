<?php

require_once "lib/connectDB.php";

function modelAddUser()
{
    if (!checkValidate()) exit("invalid data");
    $data = $_POST;
    print_r($data);
    $passwordHash = $data['password'];
    $query = sprintf("insert into register (userName, password, name) VALUES ('%s', '%s', '%s')",
        $_POST['userName'], $passwordHash, $data['name']);
    if (addToDB($query)) header("Location: /login");
}

function checkValidate()
{
    $userValid = 1;
    $data = $_POST;
    $user = modelCheckUser();
    if ($user) $userValid = false;
    $password = $data['password'];
    $passwordValid = preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/[0-9]/', $password);
    if ($userValid && $passwordValid) return true; else return false;


}

function modelCheckUser()
{
    $username = $_POST['userName'];
    $query = "select * from register where userName='$username'";
    $data = getUserName($query);
    return $data;
}

function modelLogin()
{
    $userName = $_POST['username'];
    $pass = $_POST['password'];
    $keeper = $_POST['remember'];
//    echo $pass;
    $user=getUserData($userName)[0];
    $hashedPassword =$user['password'];
//    if (Password_verify($pass, $hashedPassword)){
//
//    } echo Password_Hash($pass, 1) . "\n <br>";
//    print_r($hashedPassword);

    if ($pass==$hashedPassword){
        session_start();
        $_SESSION['userId']=$user['id'];

    }else echo "not";
}

function getUserData($username)
{

    $query = "select * from register where userName='$username'";
    return getUserName($query);

}