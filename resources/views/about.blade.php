@include('header')    

<div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All </span>
                        <ul class="depart-hover">
                            <li ><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li class="active"><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/product') }}">Customize & Order</a></li>                            
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li ><a href="{{ url('/') }}" >Home</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li><a href="#">Customize Order</a> </li>
                        <li ><a href="{{ url('/contact') }}">Contact</a></li>
                        <li><a href="#">Login</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/faq') }}">Faq</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                                <li><a href="{{ url('/login') }}">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>  
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>Tobbynho Stitches</h2>
                            <p>adire the new vogue</p>
                        </div>

                        <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="ci-text">
                                <p>Tobbynho.stitches is your one stop textile designing hub that projects creative illustrations through tie and dye and batik on fabrics.</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="ci-text">
                                <p>We are on a mission hinged on creating amazing memories for our Shoppers by consistently providing exceptional services.</p>
                            </div>
                        </div>
                    </div>                      
                       
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

 @include('footer')

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>