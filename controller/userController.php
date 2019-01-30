<?php
include_once "lib/model.php";
include_once "view/templateEngine.php";
function signUp()
{
    render("signUp.php");
}

function addUserToDB()
{
    modelAddUser();

}

function checkUser()
{
    $data = modelCheckUser();
    if (!$data) {
        echo true;
    } else echo false;
}

function loginPage()
{
    render("login.php");
}

function login()
{
    modelLogin();
}

function usersPage()
{
    $users = modelAllUsers();
    render("all_users.php", $users);
}

function editUser($username)
{

    $user = getUserData($username)[0];
//    print_r($user);
    render("userPage.php", $user);
}

function updateUser($id)
{
    $res = modelUpdateUser($id);
    if ($res) {
        header("Location: /usersPage");
    } else header("Location: /editUser/$id");
}
function deleteUser($id)
{
    $response = modelDeleteUser($id);
    $status = $response ? 'success' : 'error';
    header("Location: /users/all?status=$status");

}