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
            <form action="<?php echo base_url('login') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Email cím</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div class="form-text">Kérlek, létező Email címet adj meg!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jelszó</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-10 col-md-3 d-flex justify-content-center">
                            <a href="<?php echo base_url('register')?>">
                            <button type="button" id="toRegisterButton" class="btn btn-primary">Regisztráció</button>
                            </a>
                        </div>
                        <div class="col-10 col-md-3 offset-md-6 mt-md-0 mt-4 d-flex justify-content-center">
                            <input type="submit" id="loginButton" value="Bejelentkezés" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>