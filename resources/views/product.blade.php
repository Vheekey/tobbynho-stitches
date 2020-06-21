@if(\Auth::guest()) <script>window.location = "/shop"; alert("Kindly login to customize");</script> @endif
@include('headerlessness')
{{$prod}}
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
                            <li ><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/product') }}">Customize & Order</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li ><a href="{{ url('/') }}" >Home</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li class="active"><a href="{{ url('/product')}}">Customize Order</a> </li>
                        <li ><a href="{{ url('/contact') }}">Contact</a></li>
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
    <!-- Header End -->
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Customize & Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class='contact-widget'>
                        <div class="cw-item">
                            <h4 class="fw-title">New Custom Design</h4>
                            <p><span class="product-details">Create and Order a new custom design</span></p>
                            <form action="/newCustomise" method="post" class="comment-form">
                            @csrf
                                <label for="">Overall Clothing Color</label>
                                <input type="color" name="materColor" id="">
                                <div class="product-details">
                                    <div class="pd-size-choose">
                                        <div class="sc-item">
                                            <input type="radio" name="size" id="sm-size">
                                            <label for="sm-size">s</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" name="size" id="md-size">
                                            <label for="md-size">m</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" name="size" id="lg-size">
                                            <label for="lg-size">l</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" name="size" id="xl-size">
                                            <label for="xl-size">xs</label>
                                        </div>
                                    </div>
                                </div>

                                <label for="">Additional Information</label>
                                <textarea name="addInfo" id="" cols="25" rows="10"></textarea>
                                <p></p>
                                <div class="product-details">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                    <input type="submit" value="Done" class="site-btn">

                                </div>

                            </form>
                        </div>
                    </div>


                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="/storage/{{ $prod->productImage }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="/storage/{{ $prod->productImage1 }}"><img
                                            src="/storage/{{ $prod->productImage1 }}" alt=""></div>
                                    <div class="pt" data-imgbigurl="/storage/{{ $prod->productImage2 }}"><img
                                            src="/storage/{{ $prod->productImage2 }}" alt=""></div>
                                    <div class="pt" data-imgbigurl="/storage/{{ $prod->productImage3 }}"><img
                                            src="/storage/{{ $prod->productImage3 }}" alt=""></div>
                                    <div class="pt" data-imgbigurl="/storage/{{ $prod->productImage4 }}"><img
                                            src="/storage/{{ $prod->productImage4 }}" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                   <h3>Customize this clothing</h3>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{$prod->description}}</p>
                                    <h4>&#x20A6;{{ $prod->discount }}.00 <span>{{ $prod->price }}</span></h4>
                                </div>
                                <div class="pd-size-choose">
                                    <div class="sc-item">
                                        <input type="radio" name="size" id="sm-size">
                                        <label for="sm-size">s</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" name="size" id="md-size">
                                        <label for="md-size">m</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" name="size" id="lg-size">
                                        <label for="lg-size">l</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" name="size" id="xl-size">
                                        <label for="xl-size">xs</label>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>

                                </div>
                                <label for="">Overall Clothing Color</label>
                                <input type="color" name="materialColor" id="" >
                                <label for="">Additional Information</label>
                                <textarea name="customInfo" id="" cols="25" rows="20"></textarea>
                                <p></p>
                                    <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                <div class="pd-share">
                                    <div class="p-code"> <p>Sku : {{ $prod->sku }}</p> </div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                {{ $prod->fullDescription }}
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="/storage/{{ $prod->productImage }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">&#x20A6;{{ $prod->discount }}.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock"><?php $a = $prod->availability == 1 ? 'Available' : 'Out -Of-Stock'; ?> {{$a}} </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">{{ $prod->weight }}kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Material</td>
                                                <td>
                                                    <div class="p-weight">{{ $prod->material }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">S   M   X   XL   XXL</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">{{ $prod->sku }}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->



    @include('footer')


    <!-- Js Plugins -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/jquery.zoom.min.js"></script>
    <script src="/js/jquery.dd.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
