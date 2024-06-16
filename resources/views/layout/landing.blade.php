<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RSPON Mahar Mardjono</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="icon" href="{{ asset('compact/images/logo-kemenkes.png') }}" type="image/x-icon">

    <!-- LOAD CSS FILES -->
    <link href="{{ asset('compact/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- color scheme -->
    <link rel="stylesheet" href="{{ asset('compact/switcher/demo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('compact/switcher/colors/blue.css') }}" type="text/css" id="colors">
</head>

<body>
<!-- Preload images start //-->
<div class="images-preloader" id="images-preloader">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- Preload images end //-->

<div id="wrapper">

    <!-- header begin -->
    <header class="site-header-1 site-header">
        <!-- Main bar start -->
        <div id="sticked-menu" class="main-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- logo begin -->
                        <div id="logo-text" class="pull-left">
                            <h4>RSPON Mahar Mardjono</h4>
                        </div>
                        <!-- logo close -->

                        <!-- btn-mobile menu begin -->
                        <a id="show-mobile-menu" class="btn-mobile-menu hidden-lg hidden-md"><i class="fa fa-bars"></i></a>
                        <!-- btn-mobile menu close -->

                        <!-- mobile menu begin -->
                        <nav id="mobile-menu" class="site-mobile-menu hidden-lg hidden-md">
                            <ul></ul>
                        </nav>
                        <!-- mobile menu close -->

                        <!-- desktop menu begin -->
                        <nav id="desktop-menu" class="site-desktop-menu hidden-xs hidden-sm">
                            <ul class="clearfix">
                                <li><a href="{{ route('landing.home') }}">Home</a></li>
                                <li><a href="{{ route('landing.about') }}">Tentang Kami</a></li>
                                <li><a href="{{ route('landing.product') }}">Produk</a></li>
                                <li><a href="{{ route('landing.news') }}">Berita</a></li>
                                <li><a href="{{ route('landing.faq') }}">FAQ</a></li>
                                <li><a href="{{ route('landing.contact') }}">Hubungi Kami</a></li>
                            </ul>
                        </nav>
                        <!-- desktop menu close -->

                        <!-- Header Group Button Right begin -->
                        <div class="header-buttons pull-right hidden-xs hidden-sm">
                            <!-- Top Cart -->
                            <div class="cart-button">
                                <a href="#" class="dropdown-toggle cart-contents" data-toggle="dropdown" ><i class="fa fa-shopping-bag"></i> <span class="mini-cart-counter">3</span></a>
                                <div class="dropdown-menu top_cart_list_product">
                                    <ul class="cart_list product_list_widget clearfix">
                                        <li class="mini_cart_item">
                                            <div class="img-thumb">
                                                <img alt="" class="attachment-shop_thumbnail" src="{{ asset('compact') }}/images/shop/thumb/product-thumb-1.jpg">
                                            </div>
                                            <div class="product-detail">
                                                <a class="remove" href=""><i class="fa fa-times"></i></a>
                                                <a href="#">Bed Dream</a>
                                                <span class="quantity">1 ×
                                                        <span class="amount">$600</span>
                                                    </span>
                                            </div>
                                        </li>
                                        <li class="mini_cart_item">
                                            <div class="img-thumb">
                                                <img alt="" class="attachment-shop_thumbnail" src="{{ asset('compact') }}/images/shop/thumb/product-thumb-2.jpg">
                                            </div>
                                            <div class="product-detail">
                                                <a class="remove" href=""><i class="fa fa-times"></i></a>
                                                <a href="#">Bed Gravida</a>
                                                <span class="quantity">2 ×
                                                        <span class="amount">$550</span>
                                                    </span>
                                            </div>
                                        </li>
                                        <li class="mini_cart_item">
                                            <div class="img-thumb">
                                                <img alt="" class="attachment-shop_thumbnail" src="{{ asset('compact') }}/images/shop/thumb/product-thumb-3.jpg">
                                            </div>
                                            <div class="product-detail">
                                                <a class="remove" href=""><i class="fa fa-times"></i></a>
                                                <a href="#">Bed Wood</a>
                                                <span class="quantity">1 ×
                                                        <span class="amount">$450</span>
                                                    </span>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="total"><strong>Subtotal:</strong> <span class="amount">$2,150</span></p>
                                    <p class="buttons">
                                        <a class="button wc-forward btn btn-primary" href="">View Cart</a>
                                        <a class="button checkout wc-forward btn btn-secondary pull-right" href="">Checkout</a>
                                    </p>
                                </div>
                            </div>

                            <!-- Button Menu OffCanvas right -->
                            <div class="navright-button">
                                <a href="" id="btn-offcanvas-menu"><i class="fa fa-bars"></i></a>
                            </div>

                        </div>
                        <!-- Header Group Button Right close -->

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header close -->
    <div class="gray-line-2"></div>

    <!-- Modal Search begin -->
    <div id="myModal" class="modal fade" role="dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-dialog myModal-search">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <form role="search" method="get" class="search-form" action="">
                        <input type="search" class="search-field" placeholder="Search here..." value="" title="" />
                        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search close -->

    <!-- Menu OffCanvas right begin -->
    <div class="navright-button hidden-sm">
        <div class="compact-menu-canvas" id="offcanvas-menu">
            <h3>menu</h3><a id="btn-close-canvasmenu"><i class="fa fa-close"></i></a>
            <nav>
                <ul class="clearfix">
                    <li><a href="{{ route('landing.home') }}">Home</a></li>
                    <li><a href="{{ route('landing.about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('landing.news') }}">Berita</a></li>
                    <li><a href="{{ route('landing.faq') }}">FAQ</a></li>
                    <li><a href="{{ route('landing.contact') }}">Hubungi Kami</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Menu OffCanvas right close -->
    @yield('content')


    <!-- footer begin -->
    <footer class="footer-1 bg-color-1">

        <!-- main footer begin -->
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="compact-widget">
                            <div class="widget-inner">
                                <img class="logo-footer" src="{{ asset('compact') }}/images/logo-rspon.png" alt="compact company" style="width: 100%">
                                <p class="text-justify">RSPON Mahar Mardjono merukapakan satuan unit kerja Kementerian Kesehatan RI yang ditugaskan untuk memberikan pelayanan kekhususan kepada masayarakat untuk mengatasi masalah kesehatan yang berkaitan dengan penyakit otak dan persyarafan</p>
                                <div class="social-icons clearfix">
                                    <a href="#" class="facebook" ><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter" ><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="google" ><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="youtube" ><i class="fa fa-youtube-play"></i></a>
                                    <a href="#" class="linkedin" ><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="compact-widget">
                            <h3 class="widget-title">Features</h3>
                            <div class="widget-inner">
                                <ul>
                                    <li><a href="#">Kemenkes</a></li>
                                    <li><a href="#">RSPON Mahar Mardjono</a></li>
                                    <li><a href="#">Articles</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Hubungi Kami</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="compact-widget">
                            <h3 class="widget-title">Contact Us</h3>
                            <div class="widget-inner">
                                <p>Jl. MT. Haryono Kavling 11, Cawang <br> Kota Jakarta Timur, DKI Jakarta</p>
                                <p>Phone: 021-29373377</p>
                                <p>Fax: +(112) 345 8796</p>
                                <p>Email: info@rspon.co.id</p>
                            </div>
                        </div>
                    </div>
                    @php
                        use Illuminate\Support\Facades\Session;

                        if(empty(Session::get('myKey'))){
                            Session::put('myKey', uniqid().rand());
                        }
                        $myKey = Session::get('myKey');
                    @endphp

                    <div class="col-md-3">
                        <div class="compact-widget">
                            <h3 class="widget-title">Newsletter</h3>
                            <div class="widget-inner">
                                <div class="newsletter newsletter-widget">
                                    <p>Masukan email anda, jika ingin berlangngganan email seputar info kesehatan</p>
                                    <form action="" method="post">
                                        <p><input class="newsletter-email" type="email" name="email" placeholder="Your email"><i class="fa fa-envelope-o"></i></p>
                                        <p><input class="newsletter-submit" type="submit" value="Subscribe"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- main footer close -->

        <!-- sub footer begin -->
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        Kementerian Kesehatan RI
                    </div>
                </div>
            </div>
        </div>
        <!-- sub footer close -->

    </footer>
    <!-- footer close -->

</div>

<a id="to-the-top" ><i class="fa fa-angle-up"></i></a>

<!-- LOAD JS FILES -->
<script src="{{ asset('compact/js/jquery.min.js') }}"></script>
<script src="{{ asset('compact/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('compact/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('compact/js/easing.js') }}"></script>
<script src="{{ asset('compact/js/owl.carousel.js') }}"></script>
<script src="{{ asset('compact/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('compact/js/wow.min.js') }}"></script>
<script src="{{ asset('compact/js/jquery.magnific-popup.min.js') }}"></script>



<!-- Waypoints-->
<script src="{{ asset('compact/js/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('compact/js/visible.min.js') }}"></script>
<script src="{{ asset('compact/js/sticky.min.js') }}"></script>
<script src="{{ asset('compact/js/compact.js') }}"></script>
<script src="{{ asset('compact/js/about.js') }}"></script>
<script src="{{ asset('compact/js/custom-index1.js') }}"></script>
<script type="text/javascript">
    /* Portfolio Sorting */
    jQuery(document).ready(function($){
        $(".project-slider").owlCarousel({
            singleItem: true,
            lazyLoad: true,
            navigation: true,
            autoPlay : true,
            navigationText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ],
            slideSpeed : 400,
        });
        $("#related-projects").owlCarousel({
            items: 4,
            itemsCustom : false,
            itemsDesktop : [1199, 3],
            itemsDesktopSmall : [979, 2],
            itemsTablet : [768, 2],
            itemsTabletSmall : false,
            itemsMobile : [479, 1],
            navigation: true,
            pagination: false,
            navigationText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
        });
    } )(jQuery);
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI"></script>
<script type="text/javascript" src="{{ asset('compact/js/contact.js') }}"></script>

<script src="{{ asset('compact/js/smk-accordion.js') }}"></script>
<script src="{{ asset('compact/js/custom-element.js') }}"></script>

<!-- SLIDER REVOLUTION SCRIPTS  -->
<script type="text/javascript" src="{{ asset('compact/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('compact/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('compact/js/revslider-custom.js') }}"></script>


<script src="{{ asset('compact/switcher/demo.js') }}"></script>
<div id="switcher">
    <span class="custom-close"></span>
    <span class="custom-show"></span>

    <a class="btn btn-primary width" href="https://rspon.co.id">Buy Now</a>

    <div class="clearfix"></div>

    <span class="sw-title">Layout Style</span>
    <select name="switcher" id="tm-layout-switch">
        <option value="wide" selected="selected">Wide</option>
        <option value="boxed">Boxed</option>
    </select>
    <div class="clearfix spacing-10"></div>

    <span class="sw-title">Boxed Background</span>
    <ul id="tm-boxed-bg">
        <li class="bg1" data-value="01"></li>
        <li class="bg2" data-value="02"></li>
        <li class="bg3" data-value="03"></li>
        <li class="bg4" data-value="04"></li>
        <li class="bg5" data-value="05"></li>
        <li class="bg6" data-value="06"></li>
        <li class="bg7" data-value="07"></li>
        <li class="bg8" data-value="08"></li>
        <li class="jpg9" data-value="09"></li>
        <li class="jpg10" data-value="10"></li>
        <li class="jpg11" data-value="11"></li>
        <li class="jpg12" data-value="12"></li>
        <li class="jpg13" data-value="13"></li>
        <li class="jpg14" data-value="14"></li>
    </ul>
    <div class="clearfix spacing-10"></div>

    <span class="sw-title">Main Colors:</span>
    <ul id="tm-color">
        <li class="color1"></li>
        <li class="color2"></li>
        <li class="color3"></li>
        <li class="color4"></li>
        <li class="color5"></li>
        <li class="color6"></li>
        <li class="color7"></li>
        <li class="color8"></li>
        <li class="color9"></li>
        <li class="color10"></li>
    </ul>
</div>

</body>
</html>
