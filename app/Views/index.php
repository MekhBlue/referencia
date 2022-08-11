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
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</head>
<body class="h-100 d-flex align-items-center">

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-md-8 d-flex justify-content-center">
            <p class="user-information">Felhasználónév: <?php echo session()->get('user')['username']?></p>
            &emsp;
            <p class="user-information">Email cím: <?php echo session()->get('user')['email']?></p>
        </div>
        <div class="row">
            <div class="col-2 col-md-2 offset-3">
                <button id="postSubmit" name="postSubmit" class="btn btn-secondary">Kijelentkezés</button>
            </div>
            <div class="col-10 col-md-5 d-flex justify-content-center">
                <button class="p-2 color-button color-button-default">

                </button>
                <button class="p-2 color-button color-button-red">

                </button>
                <button class="p-2 color-button color-button-yellow">

                </button>
                <button class="p-2 color-button color-button-green">

                </button>
                <button class="p-2 color-button color-button-white">

                </button>
                <button class="p-2 color-button color-button-black">

                </button>
                <button class="p-2 color-button color-button-grey">

                </button>
                <button class="p-2 color-button color-button-blue">

                </button>
                <button class="p-2 color-button color-button-brown">

                </button>
            </div>
        </div>
        <div class="col-10 col-md-8 d-flex justify-content-center p-3 color-button-default blog-post-bg" id="blog-post">
            <form method="post">
                <textarea id="postText" name="postText" class="blog-post-text p-3" type="text" placeholder="Ide írd a posztolni kívánt üzenetet!"></textarea>
                <button type="button" id="postSubmit" name="postSubmit" class="btn btn-primary">Posztolás</button>
            </form>
        </div>
        <?php foreach($posts as $d): ?>
        <div class="row mt-5">
            <div class="col-4 col-md-2 offset-2 grey-bg d-flex justify-content-center">
                <p><?php echo $d['username']?></p>
            </div>
            <div class="col-4 col-md-2 grey-bg d-flex justify-content-center">
                <p><?php echo $d['date']?></p>
            </div>
        </div>
        <div class="col-10 col-md-8 d-flex justify-content-center pt-3 <?php echo $d['color']?>" id="blog-post">
                <p class="blog-post-text p-3 full-width"><?php echo $d['posttext']?></p>
        </div>
        <?php endforeach;?>
    </div>
</div>
<script>
    var color = "color-button-default";
    (function( $ ){
        $.fn.removeColor = function() {
            $(".blog-post-bg").removeClass("color-button-default");
            $(".blog-post-bg").removeClass("color-button-red");
            $(".blog-post-bg").removeClass("color-button-yellow");
            $(".blog-post-bg").removeClass("color-button-green");
            $(".blog-post-bg").removeClass("color-button-white");
            $(".blog-post-bg").removeClass("color-button-black");
            $(".blog-post-bg").removeClass("color-button-grey");
            $(".blog-post-bg").removeClass("color-button-blue");
            $(".blog-post-bg").removeClass("color-button-brown");
        };
    })( jQuery );
    $('.color-button-default').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-default");
        color = "color-button-default";
    });
    $('.color-button-red').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-red");
        color = "color-button-red";
    });
    $('.color-button-yellow').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-yellow");
        color = "color-button-yellow";
    });
    $('.color-button-green').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-green");
        color = "color-button-green";
    });
    $('.color-button-white').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-white");
        color = "color-button-white";
    });
    $('.color-button-black').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-black");
        color = "color-button-black";
    });
    $('.color-button-grey').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-grey");
        color = "color-button-grey";
    });
    $('.color-button-blue').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-blue");
        color = "color-button-blue";
    });
    $('.color-button-brown').click(function(){
        $(".blog-post-bg").removeColor();
        $('.blog-post-bg').addClass("color-button-brown");
        color = "color-button-brown";
    });
    $("#postSubmit").click(function (e){
        e.preventDefault();
        console.log(color);
        $.ajax({
            url: "/post",
            method: "POST",
            data: {
                postText: $('#postText').val(),
                color: color,
            },
            success: function(res){
                console.log('siker');
            }
        });
    });
</script>
</body>
</html>