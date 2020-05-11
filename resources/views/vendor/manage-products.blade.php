@include('headerless')

<div class="nav-item">
            <div class="container">

                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="{{ url('/vendor/dashboard') }}" >Home</a></li>
                        <li class="active"><a href="{{ url('/vendor/manage') }}">Manage Products</a></li>

                        @if(\Auth::guard('vendor'))
                       <li><a href="/vendor/logout">Logout</a></li> @endif
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>

<div class="container mt-3 mb-3">
@include('flashmessage')
    <div class="row">
        <div class="col-lg-4">
            <div class='contact-widget'>
                <div class="cw-item">
                    <h4 class="fw-title">New Product</h4>
                    <p><span class="product-details">Upload new product</span></p>
                    <form action="upload" method="post" class="comment-form mr-5" enctype="multipart/form-data">
                    @csrf
                        <label for="">Product Image</label>
                        <input type="file" name="productImage" id="" class="form-control">

                        <label for="">Product Name</label>
                        <input type="text" name="product_name" id="" class="form-control">

                        <label for="">Product Material</label>
                        <input type="text" name="product_material" id="" class="form-control">

                        <label for="">Product Price</label>
                        <input type="text" name="price" id="" class="form-control">

                        <label for="">Discount Price</label>
                        <input type="text" name="discount" id="" class="form-control">

                        <label for="">Product Description</label>
                        <textarea name="desc" id="" cols="25" rows="10" class="form-control"></textarea>
                        <p></p>

                        <input type="submit" value="Create" class="site-btn">

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-5">
                <div class="product-list">
                    <div class="row">
                        @foreach ($all as $key => $value)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/storage/{{ $value->productImage }}" alt="">
                                    <div class="sale pp-sale">{{ $value->status }}</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="quick-view"><a href="/vendor/product/{{$value->id}}/edit">Quick Edit</a></li>
                                    <li class="w-icon"><a href="/vendor/product/{{$value->id}}/delete"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $value->material }}</div>
                                    <a href="#">
                                        <h5>{{ $value->product }}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{ $value->discount }}
                                        <span>{{ $value->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


        </div>
    </div>

</div>

    @include('footer')

<!-- Js Plugins -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/jquery.dd.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
</body>

</html>
