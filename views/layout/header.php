<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="views/layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/layout/css/normalize.css">
    <link rel="stylesheet" href="views/layout/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/layout/css/icomoon.css">
    <link rel="stylesheet" href="views/layout/css/jquery-ui.css">
    <link rel="stylesheet" href="views/layout/css/owl.carousel.css">
    <link rel="stylesheet" href="views/layout/css/transitions.css">
    <link rel="stylesheet" href="views/layout/css/main.css">
    <link rel="stylesheet" href="views/layout/css/color-purple.css">
    <link rel="stylesheet" href="views/layout/css/responsive.css">
    <script src="views/layout/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body class="tg-home tg-homevtwo">

    <!--************************************
			Wrapper Start
	*************************************-->
    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        <header id="tg-header" class="tg-header tg-headervtwo tg-haslayout">
            <div class="tg-middlecontainer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <strong class="tg-logo"><img src="uploads/logo.png" alt="company name here"></a></strong>

                            <div class="tg-userlogin">
                                <!-- Kiểm tra người dùng đã đăng nhập chưa -->
                                <?php if (isset($_SESSION['user'])): ?>
                                    <!-- Nếu đã đăng nhập -->
                                    <span>Hi, <?php echo $_SESSION['user']['ho_ten']; ?></span>
                                    <a href="?act=logout" class="btn btn-danger ms-2">Đăng xuất</a> <!-- Đăng xuất -->
                                <?php else: ?>
                                    <!-- Nếu chưa đăng nhập -->
                                    <a href="?act=login" class="btn btn-primary ms-2">Đăng nhập</a> <!-- Đăng nhập -->
                                    <a href="?act=register" class="btn btn-primary ms-2">Đăng kí</a> <!-- Đăng kí -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-navigationarea">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-navigationholder">
                                <nav id="tg-nav" class="tg-nav">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                        <ul>

                                            <li class="menu-item-has-children current-menu-item">
                                                <a href="?act=home">Home</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0);">Authors</a>
                                            </li>
                                            <li><a href="products.html">Best Selling</a></li>
                                            <li><a href="products.html">Weekly Sale</a></li>
                                            <li class="menu-item-has-children">
                                            </li>
                                            <li><a href="contactus.html">Contact</a></li>

                                        </ul>
                                    </div>
                                </nav>
                                <div class="tg-wishlistandcart">
                                    <div class="dropdown tg-themedropdown tg-wishlistdropdown">
                                    <a href="?act=orderHistory" id="tg-minicart" class="tg-btnthemedropdown">
                                            <i class="icon-cart"></i>
                                        </a>
                                        <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                            <div class="tg-description">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown tg-themedropdown tg-minicartdropdown">
                                        <a href="?act=cart" id="tg-minicart" class="tg-btnthemedropdown">
                                            <i class="icon-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>