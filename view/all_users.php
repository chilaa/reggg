<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="view/actions/delete.js"></script>

    <style>
        table, th, td {
            border: 1px solid black;
            border-radius: 5px;
            padding: 10px;
        }
        input{
            width: 180px;
            height: 25px;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>All users</h1>


<table>
    <thead>
    <tr>
        <td>ID</td>
        <td>Photo  </td>
        <td>User Name</td>
        <td>First Name</td>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($data as $user): ?>
        <tr>
            <td><?php echo $user['id']?></td>

            <td><a href="/editUser/<?php echo $user['userName']?>">
                    <?php echo $user['userName'] ?></a></td>

            <td><?php echo $user['name'] ?></td>

            <td><a href="/editUser/<?php echo $user['userName'] ?>">Edit</a> /
                <a  onclick="deleteUser( '<?php echo $user['id']; ?>')"> Delete</a>
            </td>
        </tr>

    <?php endforeach;?>
    </tbody>
</table>
<br/>
<a href="/signUp">Add new user</a>
</body>
</html>