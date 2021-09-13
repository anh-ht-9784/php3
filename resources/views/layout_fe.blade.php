<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('storage/theme/css/layoutmain.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    @stack('scripts')
</head>


<body>
    <header>


        <div class="top-header">
            <div style="padding-left: 40px;"> ANHHTPH10133</div>

        </div>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="{{ route('frontend.index') }}">D I Ệ N T H O Ạ I S T O R E</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('frontend.product') }}">SẢN PHẨM </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">THƯƠNG HIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">GIỚI THIỆU</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('frontend.cart') }}" class="nav-link">Giỏ Hàng</a>
                        </li>
                    @endauth


                </ul>


            </div>

            </div>
            <div class="login-header" style="margin-left: 300px">

                <div class="" style="float: left !important;">
                    @auth
                        <a href="{{ route('auth.logout') }}" class="text-decoration">Đăng xuất</a> / <a
                            href="{{ route('admin.users.index') }}" class="text-decoration">Quản Trị</a>
                    @endauth
                    @if (Auth::check() == false)
                        <a href="{{ route('auth.login') }}" class="text-decoration">Đăng Nhập</a>
                    @endif


                </div>
            </div>
            </div>
        </nav>


    </header>

    <article style="padding-top:200px">
        @yield('content')
    </article>


    <div class="footer-banner">
        <img width="100%" height="200" src="{{ asset('storage/images/banner/banner.png') }}" alt="" />
    </div>

    <footer style="padding-left: 150px ; height: 250px; padding-top: 30px;">
        <div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="" class="text-reset">Trang Chủ</a></li>
                <li class="list-group-item"><a href="" class="text-reset">Sản Phẩm</a></li>
                <li class="list-group-item"><a href="" class="text-reset">Giới Thiệu</a></li>
                <li class="list-group-item"><a href="" class="text-reset">Liên Hệ</a></li>

            </ul>
        </div>
        <div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="" class="text-reset">Hướng Dẫn mua Hàng</a></li>
                <li class="list-group-item"><a href="" class="text-reset">Chính Sách Đổi Trả</a></li>
                <li class="list-group-item"><a href="" class="text-reset">Câu Hỏi Thường Gặp</a></li>

            </ul>
        </div>
        <div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Phương Thức Thanh Toán</li>
                <div class="foot-icon">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-paypal"></i>
                </div>
            </ul>
        </div>
        <div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Phương Tiện Kết Nối</li>
                <div class=" foot-icon">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-google-plus"></i>
                    <i class="fab fa-twitter-square"></i>
                    <i class="fab fa-instagram-square"></i>

                </div>
            </ul>
        </div>
        <div>
            <form action="">
                <label for="">Nhận tin tức</label> <br>
                <input type="email">
            </form>
        </div>
    </footer>

    <div class="footer-tt">
        Chính Sách | Quy Chế Hoạt Động | Điều Khoản và Điều Kiện | Chủ Sở Hữu
    </div>






</body>

</html>
