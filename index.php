<?php

include_once "lib/router.php";

router('GET', "/signUp", "signUp");
router("POST", "/addToDB" , "addUserToDB");
router("POST", "/checkUser", "checkUser");
router('GET', "/login", "loginPage");
router("POST", "/loginUser", "login");