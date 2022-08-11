<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
</head>
<body class="h-100 d-flex align-items-center">
<div class="container" style="margin-top: 15%">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="<?php echo base_url('register') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Email cím</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Felhasználónév</label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jelszó</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jelszó újra</label>
                    <input type="password" class="form-control" name="passwordAgain">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-10 col-md-3">
                            <a href="<?php echo base_url('login')?>">
                            <button type="button" id="registerButton" class="btn btn-primary">Vissza</button>
                            </a>
                        </div>
                        <div class="col-10 col-md-3 offset-6">
                            <input type="submit" id="loginButton" value="Regisztráció" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>