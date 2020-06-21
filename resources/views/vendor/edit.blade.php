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
        <div class="col-lg-8 offset-lg-2">
            <a href="/vendor/manage" style="color:#e7ab3c"><i class='fa fa-arrow-left fa-2x'></i></a>
            <form action="/vendor/update/{{ $product->id }}/product" method="post" enctype="multipart/form-data">
                @csrf
                <img src="/storage/{{ $product->productImage }}" alt="" height="200px" class="mx-auto d-block">
                <p class="mt-2">Descriptive Images</p>
                <div class="row mb-3">
                    <div class="col-md-3"><img src="/storage/{{ $product->productImage1 }}" alt="" height="100px"></div>
                    <div class="col-md-3"><img src="/storage/{{ $product->productImage2 }}" alt="" height="100px"></div>
                    <div class="col-md-3"><img src="/storage/{{ $product->productImage3 }}" alt="" height="100px"></div>
                    <div class="col-md-3"><img src="/storage/{{ $product->productImage4 }}" alt="" height="100px"></div>
                </div>

                <p>
                    <label for="">Change Product Image</label>
                    <input type="file" name="newImage" class="form-control" id="" value="">
                </p>
                <p>
                    <label for="">Change Descriptive Images</label>
                    <input type="file" name="newImages1" class="form-control" id="">
                    <input type="file" name="newImages2" class="form-control" id="">
                    <input type="file" name="newImages3" class="form-control" id="">
                    <input type="file" name="newImages4" class="form-control" id="">
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
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">&#x20A6;</span>
                        </div>
                        <input type="text" name="newPrice" class="form-control" value="{{ $product->price }}" aria-label="Amount (to the nearest naira)">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                </p>
                <p>
                    <label for="">Discounted Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">&#x20A6;</span>
                        </div>
                        <input type="text" name="newDiscount" class="form-control" value="{{ $product->discount }}" aria-label="Amount (to the nearest naira)">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                </p>
                <p>
                    <label for="">Short Description</label>
                    <textarea name="newDescription" id="" class="form-control" cols="20" rows="5">{{ $product->description }}</textarea>
                </p>
                <p>
                    <label for="">Full Description</label>
                    <textarea name="newFullDescription" id="" class="form-control" cols="20" rows="5">{{ $product->fullDescription }}</textarea>
                </p>
                <p>
                    <label for="">Weight</label>
                    <input type="text" name="newWeight" class="form-control" id="" value="{{$product->weight}}">
                </p>
                <p>
                    <label for="">Category</label>
                    <select name="newCategory" id="">
                        <option value="throw-pillow" {!! $product['category'] == 'throw-pillow' ? "selected='selected'" : "" !!}>Throw Pillow</option>
                        <option value="shirt" {!! $product['category'] == 'shirt' ? "selected='selected'" : "" !!}>Shirt</option>
                        <option value="top" {!! $product['category'] == 'top' ? "selected='selected'" : "" !!}>Top</option>
                        <option value="polo" {!! $product['category'] == 'polo' ? "selected='selected'" : "" !!}>Polo</option>
                        <option value="skirt" {!! $product['category'] == 'skirt' ? "selected='selected'" : "" !!}>Skirt</option>
                        <option value="trouser" {!! $product['category'] == 'trouser' ? "selected='selected'" : "" !!}>Trouser</option>
                        <option value="cardigan/jacket" {!! $product['category'] == 'cardigan/jacket' ? "selected='selected'" : "" !!}>Cardigan/Jacket</option>
                        <option value="short" {!! $product['category'] == 'short' ? "selected='selected'" : "" !!}>Shorts</option>
                    </select>
                </p>

                <p>
                    <label for="">Availability</label>
                    <select name="avail" id="">
                        <option value="1">In Stock</option>
                        <option value="0">Out Of Stock</option>
                    </select>
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

