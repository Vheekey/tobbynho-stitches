@include('header')

<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>All </span>
                <ul class="depart-hover">
                    <li ><a href="#">Home</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Login</a></li>
                    <li class="active"><a href="#">Shop</a></li>
                </ul>
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                <li><a href="{{ url('/') }}" >Home</a></li>
                <li class="active"><a href="{{ url('/shop') }}">Shop</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
                <li><a href="{{ url('/faq') }}">Faq</a></li>
                @if(\Auth::guest())
                <li><a href="#">Login</a>
                    <ul class="dropdown">

                        <li><a href="{{ url('/register') }}">Register</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/vendor/signup') }}">Become a Vendor</a></li>
                    </ul>
                </li>

                @else <li><a href="/logout">Logout</a></li> @endif
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>
</header>



    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
                    <div class="product-list">
                        <div class="row">
                            @foreach($prod as $value)
                            <div class="col-lg-3 col-sm-4">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="/storage/{{ $value->productImage }}" alt="" height="270px">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active" title="Add to cart"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="/product/{{$value->id}}/details">+ Quick View</a></li>
                                        <li class="w-icon" title="Customize & Order"><a href="/product/customize/{{$value->id}}"><i class="fa fa-pencil"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{ $value->material }}</div>
                                        <a href="#">
                                            <h5>{{ $value->product }}</h5>
                                        </a>
                                        <div class="product-price">
                                             &#x20A6;{{ $value->discount }}.00
                                            <span> &#x20A6;{{ $value->price }}.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="loading-more">
                        {{-- <a class="btn btn-sm btn-default" href="{{ $prod['first_page_url'] }}">1</a>
                        <a href="{{ $prod['prev_page_url'] }}"><i class="fa fa-arrow-left"></i></a>
                        <a href="{{ $prod['next_page_url'] }}"><i class="fa fa-arrow-right"></i></a>
                        <a class="btn btn-sm btn-default" href="{{ $prod['last_page_url'] }}">{{ $prod['last_page'] }}</a> --}}
                        {{ $prod->links() }}
                    </div>
                </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

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
