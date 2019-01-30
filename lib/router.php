<?php

include_once "controller/userController.php";

function router($method, $url, $action)
{
    if (strpos($url, '{') !== false) {

        $paths = explode('/', $_SERVER['PATH_INFO']);
        $requests = explode('/', $url);
        if ($paths[1] == $requests[1] && $_SERVER['REQUEST_METHOD'] == $method) {
            $username = $paths[2];
            $action($username);
        }
    } else if (check($method, $url)) {
        $action();
    }
}

function check($method, $url)
{
    if (!(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == $method)) {
        return false;
    }
    if (!(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == $url)) {
        return false;
    }
    return true;
}