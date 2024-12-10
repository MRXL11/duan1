
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="/views/layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/layout/css/normalize.css">
    <link rel="stylesheet" href="/views/layout/css/font-awesome.min.css">
    <link rel="stylesheet" href="/views/layout/css/icomoon.css">
    <link rel="stylesheet" href="/views/layout/css/jquery-ui.css">
    <link rel="stylesheet" href="/views/layout/css/owl.carousel.css">
    <link rel="stylesheet" href="/views/layout/css/transitions.css">
    <link rel="stylesheet" href="/views/layout/css/main.css">
    <link rel="stylesheet" href="/views/layout/css/color.css">
    <link rel="stylesheet" href="/views/layout/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/views/layout/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body class="tg-comingsoonpage">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Main Start
		*************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
            <!--************************************
					Coming Soon Start
			*************************************-->
            <div class="tg-comingsoonholder">
                <strong class="tg-logo"><img src="uploads/logo-02.png" alt="image description"></strong>

                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="text-center mb-4">Đăng Ký</h3>
                                    <form method="POST" action="?act=register">
                                        <div class="mb-3">
                                            <label for="ho_ten" class="form-label">Họ và tên</label>
                                            <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập tên" required>
                                        </div>
                                        <!-- <div class="mb-3">
                                                <label for="anh_dai_dien" class="form-label">Ảnh đại diện</label>
                                                <input type="email" class="form-control" id="anh_dai_dien" name="anh_dai_dien" placeholder="Nhập ảnh đại diện" required>
                                            </div> -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                            <input type="number" class="form-control" id="so_dien_thoai" name="so_dien_thoai" placeholder="Nhập số điện thoại" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dia_chi" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mat_khau" class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm_mat_khau" class="form-label">Xác nhận mật khẩu</label>
                                            <input type="password" class="form-control" id="confirm_mat_khau" name="confirm_mat_khau" placeholder="Nhập lại mật khẩu" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
                                        <?php if (!empty($result) && $result !== true): ?>
                                            <p style="color: red;"><?php echo htmlspecialchars($result); ?></p>
                                        <?php endif; ?>
                                    </form>

                                    <div class="text-center mt-3">
                                        <a href="?act=login">Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="tg-formtheme tg-formnewsletter">
                    <fieldset>
                        <div class="form-group">
                            <label>HELLOOOOOOOOOOOOOOO!</label>
                            <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                            <!-- <input type="email" name="email" class="form-control" placeholder="Email Here"> -->
                        </div>
                    </fieldset>
                </form>
            </div>

        </main>

        <footer id="tg-footer" class="tg-footer tg-haslayout">
            <div class="tg-newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h4>Signup Newsletter!</h4>
                            <h5>Consectetur adipisicing elit sed do eiusmod tempor incididunt.</h5>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <form class="tg-formtheme tg-formnewsletter">
                                <fieldset>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email ID">
                                    <button type="button"><i class="icon-envelope"></i></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-footerbar">
                <a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span class="tg-paymenttype"><img src="uploads/paymenticon.png" alt="image description"></span>
                            <span class="tg-copyright">2017 All Rights Reserved By &copy; Book Library</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--************************************
				Footer End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->
    <script src="/views/layout/js/vendor/jquery-library.js"></script>
    <script src="/views/layout/js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
    <script src="/views/layout/js/owl.carousel.min.js"></script>
    <script src="/views/layout/js/jquery.vide.min.js"></script>
    <script src="/views/layout/js/countdown.js"></script>
    <script src="/views/layout/js/jquery-ui.js"></script>
    <script src="/views/layout/js/parallax.js"></script>
    <script src="/views/layout/js/countTo.js"></script>
    <script src="/views/layout/js/appear.js"></script>
    <script src="/views/layout/js/gmap3.js"></script>
    <script src="/views/layout/js/main.js"></script>

</body>

</html>