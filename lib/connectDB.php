<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'Root123!');
define('DB', 'task_manager');
function connect()
{
    $conn = mysqli_connect(HOST, USER, PASS, DB);

    if (!$conn) {
        exit("Connection error" . mysqli_error($conn));
    }
    return $conn;
}

function get($query)
{
    $conn = connect();
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_all($result, 1);
    mysqli_close($conn);
    return $data;
}

function getUserName($query)
{
    $data = get($query);
    if ($data[0]['userName'] == null) {
        return false;
    } else return $data;

}

function addToDB($query)
{
    $conn=connect();
    $result=mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}