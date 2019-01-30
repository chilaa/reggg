<?php

include_once "lib/router.php";

router('GET', "/signUp", "signUp");
router("POST", "/addToDB" , "addUserToDB");
router("POST", "/checkUser", "checkUser");
router('GET', "/login", "loginPage");
router("POST", "/loginUser", "login");
router('GET', "/usersPage", 'usersPage');
router("GET", "/editUser/{username}", "editUser");
router("DELETE", "/deleteUser/{username}", "deleteUser");
router("POST", '/updateUser/{id}' , 'updateUser');
