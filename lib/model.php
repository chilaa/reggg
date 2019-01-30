<?php

require_once "lib/connectDB.php";

function modelAddUser()
{
    if (!checkValidate()) exit("invalid data");
    $data = $_POST;
    print_r($data);
    $username = prepare();


    $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
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
    echo $keeper;
//    echo $pass;
    $user = getUserData($userName)[0];
    $hashedPassword = $user['password'];
    if (Password_verify($pass, $hashedPassword)) {
        session_start();
        $_SESSION['userId'] = $user['id'];
        if ($keeper == 'on') {
            $hour = time() + 3600 * 24 * 30;
            setcookie('username', $userName, $hour);
            setcookie('password', $pass, $hour);
        }
        $_SESSION['userName'] = $userName;
        header("Location: /usersPage");
    } else echo "incorrect username or password";

}

function getUserData($username)
{

    $query = "select * from register where userName='$username'";
    return getUserName($query);

}

function modelAllUsers()
{
    $query = "select * from register ;";
    $users = get($query);
    return $users;
}

function modelUpdateUser($id)
{
    $query = sprintf("update register set  userName='%s',  name='%s' where id=$id ;",
        $_POST['userName'],  $_POST['name']);
    $status=updateToDB($query);
    if ($status) return true; else return false;

}
function modelDeleteUser($id)
{
    $query="delete from register where id = $id";
    return delete($query);
}