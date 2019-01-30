<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editing Users</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--    <script src="../public/js/main.js"></script>-->
    <script src="../lib/delete.js"></script>
    <style>
        table, th, td {
            border: 1px solid black;
            border-radius: 5px;
            padding: 10px;
        }

        input {
            width: 180px;
            height: 25px;
            padding: 5px;
            border-radius: 5px;
        }

        input[name=id] {
            pointer-events: none;
        }

    </style>
</head>
<body>

<h1>Edit User</h1>


<form action="/updateUser/<?php echo $data['id'] ?>" method="POST" enctype="multipart/form-data">
    <label for="username">User name</label><br/>
    <input type="text" value="<?php echo $data['userName'] ?>" id="username" name="userName">
    <br/> <br/>


    <label for="id">ID</label><br/>
    <input type="text" id="id" value="<?php echo $data['id'] ?>" name="id">
    <br/> <br/>


    <label for="name">FirstName</label><br/>
    <input type="text" value="<?php echo $data['name'] ?>" id="name" name="name">
    <br/> <br/>

    <input type="submit" value="Save Changes">
</form>

<br/>
<a href="#" onclick="deleteUser("<?php echo $data['id'] ?> ")">Delete User</a>

</body>
</html>