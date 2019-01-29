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