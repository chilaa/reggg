<?php

if (isset($_POST) && !isset($_COOKIE['pass'])) {
    setcookie('pass', password_hash($_POST['password'], PASSWORD_DEFAULT));

}
if (isset($_COOKIE['pass']) && isset($_POST['password'])) {

}
echo $_COOKIE['pass'];
 echo ' '. password_verify($_POST['password'], $_COOKIE['pass']);

?>

<form action="test.php" method="post">
    <input type="password" name="password" id="password">
    <input type="submit" name="submit" id="submit">
</form>
