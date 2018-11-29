<?php 

    extract($_POST);
    if(isset($regis)) {
        if(is_dir("users/$email")) {
            ?>
                <script>
                    alert("email already register !try another");
                </script>
            <?php
        }
        else {
            mkdir("users/$email");
            file_put_contents("users/$email/details.txt","$password\n$name\n$email\n$phone");
            header("location:index.php");
        }
    }

    if(isset($login)) {
        if(is_dir("users/$email")) {
            $fo = fopen("users/$email/details.txt","r");
            $pass1 = trim(fgets($fo));
            if($password === $pass1) {
                session_start();
                $_SESSION['sid'] = $email;
                header("location:dashboard.php");
            }
            else {
                ?>
                    <script>
                        alert("password is incorrect");
                    </script>
                <?php
            }
        }
        else {
            ?>
                <script>
                    alert("email is incorrect");
                </script>
            <?php
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Handling in PHP</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>File Handling in php</h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3>Login Here</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-success" value="Login">
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <h3>Registration Here</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="regis" class="btn btn-primary" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>