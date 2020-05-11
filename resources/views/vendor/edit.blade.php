@include('headerlessness')

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
        <div class="col-lg-6 offset-lg-3">
            <a href="/vendor/manage" style="color:#e7ab3c"><i class='fa fa-arrow-left fa-2x'></i></a>
            <form action="/vendor/update/{{ $product->id }}/product" method="post">
                @csrf
                <img src="/storage/{{ $product->productImage }}" alt="" height="200px" class="mx-auto d-block">
                <p>
                    <label for="">Change Image</label>
                    <input type="file" name="newImage" class="form-control" id="" value="">
                </p>
                <p>
                    <label for="">Product Name</label>
                    <input type="text" name="newProduct" class="form-control" id="" value="{{ $product->product }}">
                </p>
                <p>
                    <label for="">Product Material</label>
                    <input type="text" name="newMaterial" class="form-control" id="" value="{{$product->material}}">
                </p>
                <p>
                    <label for="">Product Price</label>
                    <input type="text" name="newPrice" class="form-control" id="" value="{{ $product->price }}">
                </p>
                <p>
                    <label for="">Discounted Price</label>
                    <input type="text" name="newDiscount" class="form-control" id="" value="{{ $product->discount }}">
                </p>
                <p>
                    <label for="">Description</label>
                    <textarea name="newDescription" id="" class="form-control" cols="20" rows="5">{{ $product->description }}</textarea>
                </p>

                <p>
                    <input type="submit" value="Update" class="site-btn">
                </p>
            </form>
        </div>
    </div>
</div>

</div>

@include('footerlessness')

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

