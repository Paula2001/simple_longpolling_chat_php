
<html>
<head>
    <script src="js/jquery.js"></script>

    <link rel="stylesheet" href="vendor/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/index.css">

    <script src="vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
    <h1 class="col-md-5 text-dark text-center mx-auto">Welcome to the long polling / chat app </h1>
</div>
<form action="/chatProject/home/chat" method="POST">
    <div class="row">
        <div class="col-md-4 text-center mx-auto">
            <input type="text" class="m-2 form-control"  placeholder="NAME" name="name">
            <button type="submit" class="btn btn-danger m-3" name="submit">Enter</button>
        </div>
    </div>
</form>
</body>
</html>