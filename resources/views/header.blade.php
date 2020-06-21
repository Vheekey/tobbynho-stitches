<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tobbynho Stitches">
    <meta name="keywords" content="Tobbynho, Stitches, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tobbynho | Stitches</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        oluwatobi.ajasa1@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +234 8090930067
                    </div>
                </div>
                <div class="ht-right">
                    @if(\Auth::check())<a href="{{ url('/account') }}" class="login-panel"><i class="fa fa-user"></i>Account</a> @endif
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="https://m.facebook.com/tobbynho.stitches"><i class="ti-facebook"></i></a>
                        <a href="https://mobile.twitter.com/Tobbynho2/with_replies"><i class="ti-twitter-alt"></i></a>
                        <a href="https://www.instagram.com/tobbynhostitches"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ url('/index') }}">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span id="count"></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-button">
                                        <a href="/shopping-cart" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="/checkout" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <div id="cartons"></div>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total" id="select-total"></div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script
        src="https://code.jquery.com/jquery-3.3.0.min.js"
        integrity="sha256-RTQy8VOmNlT6b2PIRur37p6JEBZUE7o8wPgMvu18MC4="
        crossorigin="anonymous"></script>

<script>
toUpper = function(x){
  return x.toUpperCase();
};
console.log("giant")
$.ajax({
  type: 'GET',
  url: '/cart',
  success: function (data) {
      console.log(data);
      var total = 0;
      $.each(data,function(index,value){
        const size = value.size.toUpperCase();
        total += value.total
        $("#cartons").append('<tr><td class="si-pic"><img src="/storage/'+value.image+'" alt=""></td><td class="si-text"><div class="product-selected"><p>&#x20A6;'+value.cost+'.00 x'+value.quantity +' ( '+size +' )</p><h6>'+value.name+'</h6></br></div></td><td class="si-close"><a href="/cart/remove/'+value.product_id+'"><i class="fa fa-close"></i></a></td></tr>');
        });

        $("#select-total").append('<span>total:</span><h5>&#x20A6;'+total+'</h5>');
        $("#count").append(data.length);
    }

  });
</script>
