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
    <title><?php echo $args['title'] ?></title>
    <!-- Bootstrap core CSS -->
    <link href="/DoAn1/public/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="/DoAn1/public/asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="/DoAn1/public/asset/css/animsition.min.css" rel="stylesheet">
    <link href="/DoAn1/public/asset/css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link  href="/DoAn1/public/asset/css/style.css?v=1.2" rel="stylesheet">
    <link rel="stylesheet" href="DoAn1/public/asset/css/customstyle.css">
</head>

<body class="home">

    <?php include '../App/Views/Client/Block/Header.php'; ?>
    <main>
        <?php include '../App/Views/Client/Detail/'.$args['page'].'.php'; ?>
    </main>
    
    <?php include '../App/Views/Client/Block/Footer.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="/DoAn1/public/asset/js/jquery.min.js"></script>
    <script src="/DoAn1/public/asset/js/tether.min.js"></script>
    <script src="/DoAn1/public/asset/js/bootstrap.min.js"></script>
    <script src="/DoAn1/public/asset/js/animsition.min.js"></script>
    <script src="/DoAn1/public/asset/js/bootstrap-slider.min.js"></script>
    <script src="/DoAn1/public/asset/js/jquery.isotope.min.js"></script>
    <script src="/DoAn1/public/asset/js/headroom.js"></script>
    <script src="/DoAn1/public/asset/js/foodpicky.min.js"></script>
    <script src="/DoAn1/public/asset/js/main.js?v=1.3"></script>


    <div id="eJOY__extension_root" class="eJOY__extension_root_class" style="all: unset;"></div><iframe id="nr-ext-rsicon" style="position: absolute; display: none; width: 50px; height: 50px; z-index: 2147483647; border-style: none; background: transparent;"></iframe>
</body>

</html>