<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <link rel="shortcut icon" type="image/x-icon" href="/DoAn1/public/image/iconlogo.png">
    <title><?php echo $args['title'] ?></title>
    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="/DoAn1/public/asset/css/bootstrap.min.css?v=1.1" rel="stylesheet">
    <link href="/DoAn1/public/asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="/DoAn1/public/asset/css/animsition.min.css" rel="stylesheet">
    <link href="/DoAn1/public/asset/css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link  href="/DoAn1/public/asset/css/style.css?v=2.4" rel="stylesheet">
    <link rel="stylesheet" href="DoAn1/public/asset/css/customstyle.css?v=1.1">
    
</head>

<body class="home" id="home-main" style="padding-right: 0px !important;">

    <?php include '../App/Views/Client/Block/Header.php'; ?>
    <main>
        <?php include '../App/Views/Client/Detail/'.$args['page'].'.php'; ?>
    </main>
    
    <?php include '../App/Views/Client/Block/Footer.php'; ?>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/DoAn1/public/asset/js/jquery.min.js"></script>
    <script src="/DoAn1/public/asset/js/tether.min.js"></script>
    <script src="/DoAn1/public/asset/js/bootstrap.min.js"></script>
    <script src="/DoAn1/public/asset/js/animsition.min.js"></script>
    <script src="/DoAn1/public/asset/js/bootstrap-slider.min.js"></script>
    <script src="/DoAn1/public/asset/js/jquery.isotope.min.js"></script>
    <script src="/DoAn1/public/asset/js/headroom.js"></script>
    <script src="/DoAn1/public/asset/js/foodpicky.min.js"></script>
    <script src="/DoAn1/public/asset/js/main.js?v=1.8"></script>


    <div id="eJOY__extension_root" class="eJOY__extension_root_class" style="all: unset;"></div><iframe id="nr-ext-rsicon" style="position: absolute; display: none; width: 50px; height: 50px; z-index: 2147483647; border-style: none; background: transparent;"></iframe>
</body>

</html>