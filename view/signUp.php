<html>
<head>
    <title>Sign Up</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .status {
            display: inline;
        }

        input {
            display: inline;
        }
        .input{
            display: block;
        }
    </style>
    <script src="view/actions/registration.js"></script>
</head>
<body>
<form action="/addToDB" method="post">
    <div class="input form-group">
        <input type="text" placeholder="Username" name="userName" id="userName">
        <div id="userNameStatus"  class=" form-control status"></div>
    </div>
    <div class="input form-group"">
        <input type="password" placeholder="Password" id="password" name="password">
        <div id="passwordStatus" class="status form-control"></div>
    </div>
    <div class="input form-group"">
        <input type="text" placeholder="Name" id="name" class="form-control" name="name">
    </div>
    <input type="submit" disabled class="btn btn-default" value="Sign up" id="submit">
</form>
</body>
</html>