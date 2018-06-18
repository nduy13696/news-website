<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechNews - HTML and CSS Template</title>

    <!-- favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel=icon>

    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- font-awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Mobile Menu Style -->
    <link href="{{ asset('css/mobile-menu.css') }}" rel="stylesheet">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Owl carousel -->
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- Theme Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .entity_content img{
            width:100%;
        }
        .item {
            float: right;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
<!-- preloader -->

<div class="uc-mobile-menu-pusher">
<div class="content-wrapper">

<section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                                            <span class="date" id='clock'>
                                            </span>
                        <!-- Date -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('img\logo.png') }}" alt="Tech NewsLogo"></a>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                            <li class="dropdown lang">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">En <i
                                        class="fa fa-angle-down"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Bn</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Language Section -->

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                                    class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form action="{{action('frontend\FrontendController@search')}}" method='post' role="form">
                                            @csrf
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                           placeholder="Type Something" name='txt_search'> <span class="input-group-btn">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Search
                                                                            </button>
                                                                        </span></div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        </div>
        <!-- Header Section -->

        <div class="navigation-section">
            <nav class="navbar m-menu navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li class="active"><a href="../../">Home</a></li>
                            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories
                                <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                        <?php $record=DB::table('tbl_cateories')->select('*')->get();
                                               $cate=json_decode($record,true);  ?>
                                        @foreach($cate as $item)
                                            <ul class="col-sm-3">
                                                <li class="dropdown-header"><a href="<?=action('frontend\FrontendController@postList',['slug'=>$item['slug']])?>"><?=$item['name']?></a></li>
                                            </ul>
                                        @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="category.html">Popular</a></li>
                            <li><a href="category.html">Contact</a></li>
                            <li><a href="blog.html">About</a></li>
                        </ul>
                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->
        </div>
        <!-- .navigation-section -->
    </div>
    <!-- .container -->
</section>
<!-- header_section_wrapper -->
@yield('feature')
<!-- Feature News Section -->

<section id="category_section" class="category_section">
<div class="container">
<div class="row">
@yield('left_section')
<!-- Left Section -->

<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Lasted News</a></h2>
    </div>
    @foreach($LastedPost as $popular)
    <div class="media">
        <div class="media-left">
            <a href="#"><img width='100px' height='auto' class="media-object" src="{{$popular['avatar']}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="<?=action('frontend\FrontendController@post',['slug'=>$popular['slug']])?>" target="_self">{{$popular['title']}}</a>
            </h3> <span class="media-date"><a href="#">{{ \Carbon\Carbon::parse($popular['create_at'])->format('M-d-Y') }}</a></span>
        </div>
    </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<!-- Popular News -->
<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Editor Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{ asset('img/editor.jpg') }}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!-- Editor News -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Readers Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{asset('img/reader.jpg')}}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!--  Readers Corner News -->
</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>
<!-- Category News Section -->
<section id="footer_section" class="footer_section">
    <div class="container">
        <hr class="footer-top">
        <div class="row">
            <div class="col-md-3">
                <div class="footer_widget_title"><h3><a href="category.html" target="_self">About Tech</a></h3></div>
                <div class="logo footer-logo">
                    <a title="fontanero" href="index.html">
                        <img src="{{asset('img/tech_about.jpg')}}" alt="technews">
                    </a>

                    <p>Competently conceptualize go forward testing procedures and B2B expertise. Phosfluorescently
                        cultivate principle-centered methods.of empowerment through fully researched.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="category.html" target="_self">Discover</a></h3>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <ul class="list-unstyled left">
                            <li><a href="#">Mobile</a></li>
                            <li><a href="#">Tablet</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Camera</a></li>
                            <li><a href="#">Apps</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Membership</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Job</a></li>
                            <li><a href="#">SiteMap</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-8">
                        <ul class="list-unstyled">
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Newsletter Alerts</a></li>
                            <li><a href="#">Podcast</a></li>
                            <li><a href="#">Sms Subscription</a></li>
                            <li><a href="#">Advertisement Policy</a></li>
                            <li><a href="#">Report Technical issue</a></li>
                            <li><a href="#">Complaints and Corrections</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                            <li><a href="#">Securedrop</a></li>
                            <li><a href="#">Archives</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="#" target="_self">Editor Picks</a></h3>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{asset('img/editor_pic1.jpg')}}"
                                         alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html">Apple launches photo-centric wrist watch for Android</a>
                        </h3>
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </span>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{asset('img/editor_pic2.jpg')}}"
                                         alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html">Apple launches photo-centric wrist watch for Android</a>
                        </h3>
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </span>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{asset('img/editor_pic3.jpg')}}"
                                         alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html">Apple launches photo-centric wrist watch for Android</a>
                        </h3>
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="category.html" target="_self">Tech Photos</a></h3>
                </div>
                <div class="widget_photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo1.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo2.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo3.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo4.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo5.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo6.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo7.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo8.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo9.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo10.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo11.jpg') }}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{ asset('img/tech_photo12.jpg') }}" alt="Tech Photos">
                </div>

            </div>
        </div>
    </div>

    <div class="footer_bottom_Section">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">
                        <p>&copy; Copyright 2018 by Nhat Duy . Credit by: <a href="https://uicookies.com">uiCookies</a> </p>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- #content-wrapper -->

</div>
<!-- .offcanvas-pusher -->

<a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
    </div>
</div>
<!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->

<!-- jquery Core-->
<script src="{{ asset('js\jquery-2.1.4.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('js\bootstrap.min.js') }}"></script>

<!-- Theme Menu -->
<script src="{{ asset('js\mobile-menu.js') }}"></script>

<!-- Owl carousel -->
<script src="{{ asset('js\owl.carousel.min.js') }}"></script>

<!-- Theme Script -->
<script src="{{ asset('js\script.js') }}"></script>
<!-- Current Date -->
<script src="{{ asset('js\date.js') }}"></script>
</body>
</html>
