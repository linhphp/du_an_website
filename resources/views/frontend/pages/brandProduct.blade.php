@extends('frontend.layout.master')
@section('title')
@lang('language.brand')
@endsection
@section('content')

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="index-2.html" title="Home">@lang('language.home') </a></li>
                        <li class="active">@lang('language.brand') </li>
                        <li class="active">{{ $brand->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="lg-margin"></div>
                <div class="row">
                    <div class="col-md-9 padding-right-lg">
                        <div class="category-grid">
                            <div class="row">
                            	@foreach($products as $product)
                                <div class="col-sm-4 md-margin2x">
                                    <div class="product">
                                        <div class="product-top">
                                            <figure class="product-image-container">
                                                <a href="product.html" title="White linen sheer dress"><img src="storage/image/{{ $product->image1 }}" alt="Product image" class="product-image"> <img src="storage/image/{{ $product->image2 }}" alt="Product image hover" class="product-image-hover"></a>
                                            </figure>
                                            <div class="product-action-container">
                                                <div class="product-action-wrapper action-responsive">
                                                	<button href="#" title="Add to Cart" class="btn btn-block p-1 product-add-btn">
                                                		<span class="add-btn-text">@lang('language.add_to_cart') </span>
                                                		<span class="product-btn product-cart">Cart</span>
                                                	</button>
                                                	<a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="product-name"><a href="product.html" title="White linen sheer dress">White linen sheer dress</a></h3>
                                        <div class="product-price-container"><span class="product-price">$187.00</span></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="md-margin2x visible-sm visible-xs"></div>
                    </div>
                    <aside class="col-md-3 sidebar margin-top-up" role="complementary">
                        <div class="widget">
                            <h3>Categories</h3>
                            <ul id="category-widget">
                                <li class="open"><a href="#">Women <span class="category-widget-btn"></span></a>
                                    <ul>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">sportswear</a></li>
                                        <li><a href="#">Maternety</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Men <span class="category-widget-btn"></span></a>
                                    <ul>
                                        <li><a href="#">Suits</a></li>
                                        <li><a href="#">Style</a></li>
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Watches</a></li>
                                        <li><a href="#">Shoes</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Girls <span class="category-widget-btn"></span></a>
                                    <ul>
                                        <li><a href="#">Beauty</a></li>
                                        <li><a href="#">Belts</a></li>
                                        <li><a href="#">Make-up</a></li>
                                        <li><a href="#">Shoes</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <div class="accordion" id="sidebar-collapse-filter">
                                <div class="accordion-group panel">
                                    <div class="accordion-title">Color Filter
                                        <a class="accordion-btn open" data-toggle="collapse" href="#color-filter"></a>
                                    </div>
                                    <div class="accordion-body collapse in" id="color-filter">
                                        <div class="accordion-body-wrapper">
                                            <div class="filter-color-container">
                                                <div class="row">
                                                    <a href="#" data-bgcolor="#ffffff" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#f5edb2" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#f4e6ca" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#f7ce91" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#d5fefd" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#c5c8f4" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#8a9ad6" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#c1a6c9" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#93d0da" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#8fdfa6" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#d8ea9f" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#79a762" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#fed5d4" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#fe8482" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#fe84ab" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#bebfc2" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#a99986" class="filter-color-box"></a>
                                                    <a href="#" data-bgcolor="#5d5954" class="filter-color-box"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group panel">
                                    <div class="accordion-title">Size Filter
                                        <a class="accordion-btn open" data-toggle="collapse" href="#size-filter"></a>
                                    </div>
                                    <div class="accordion-body collapse in" id="size-filter">
                                        <div class="accordion-body-wrapper">
                                            <div class="filter-color-container">
                                                <div class="row"><a href="#" class="filter-size-box active">6</a> <a href="#" class="filter-size-box">8</a> <a href="#" class="filter-size-box">10</a> <a href="#" class="filter-size-box">12</a> <a href="#" class="filter-size-box">14</a>                                                            <a href="#" class="filter-size-box">16</a> <a href="#" class="filter-size-box">xs</a> <a href="#" class="filter-size-box">s</a> <a href="#" class="filter-size-box">m</a> <a href="#" class="filter-size-box">ml</a>                                                            <a href="#" class="filter-size-box">l</a> <a href="#" class="filter-size-box">xl</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group panel">
                                    <div class="accordion-title">Price Filter
                                        <a class="accordion-btn open" data-toggle="collapse" href="#price-filter"></a>
                                    </div>
                                    <div class="accordion-body collapse in" id="price-filter">
                                        <div class="accordion-body-wrapper">
                                            <div class="filter-price">
                                                <div id="price-range"></div>
                                                <div id="filter-range-details" class="row">
                                                    <div class="col-xs-6">
                                                        <div class="filter-price-label">from</div><input type="text" id="price-range-low" class="form-control"></div>
                                                    <div class="col-xs-6">
                                                        <div class="filter-price-label">to</div><input type="text" id="price-range-high" class="form-control"></div>
                                                </div>
                                                <div class="filter-price-action"><a href="#" class="btn btn-custom min-width-xss">Ok</a> <a href="#" class="btn btn-custom-7 min-width-xs">Clear</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3>BestSellers</h3>
                            <div class="owl-carousel bestsellers-slider">
                                <div class="product-group">
                                    <div class="product clearfix">
                                        <figure class="product-image-container">
                                            <a href="product.html" title="White linen sheer dress"><img src="images/products/product2.jpg" alt="Product image" class="product-image"> <img src="images/products/product2-hover.jpg" alt="Product image hover" class="product-image-hover"></a>
                                        </figure>
                                        <div class="product-content">
                                            <h3 class="product-name"><a href="product.html" title="Jacket Suiting Blazer">Jacket Suiting Blazer</a></h3>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="80"></div>
                                                </div>
                                            </div>
                                            <div class="product-price-container"><span class="product-price">$130.00</span></div>
                                        </div>
                                    </div>
                                    <div class="product clearfix">
                                        <figure class="product-image-container">
                                            <a href="product.html" title="White linen sheer dress"><img src="images/products/product1.jpg" alt="Product image" class="product-image"> <img src="images/products/product1-hover.jpg" alt="Product image hover" class="product-image-hover"></a>
                                        </figure>
                                        <div class="product-content">
                                            <h3 class="product-name"><a href="product.html" title="JGap Graphic Cuffed">Gap Graphic Cuffed</a></h3>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="90"></div>
                                                </div>
                                            </div>
                                            <div class="product-price-container"><span class="product-price">$102.00</span></div>
                                        </div>
                                    </div>
                                    <div class="product clearfix">
                                        <figure class="product-image-container">
                                            <a href="product.html" title="Women's Lauren Dress"><img src="images/products/product8.jpg" alt="Product image" class="product-image"> <img src="images/products/product2-hover.jpg" alt="Product image hover" class="product-image-hover"></a>
                                        </figure>
                                        <div class="product-content">
                                            <h3 class="product-name"><a href="product.html" title="Women's Lauren Dress">Women's Lauren Dress</a></h3>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="55"></div>
                                                </div>
                                            </div>
                                            <div class="product-price-container"><span class="product-old-price">$99.00</span> <span class="product-price">$47.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-group">
                                    <div class="product clearfix">
                                        <figure class="product-image-container">
                                            <a href="product.html" title="White linen sheer dress"><img src="images/products/product9.jpg" alt="Product image" class="product-image"> <img src="images/products/product2-hover.jpg" alt="Product image hover" class="product-image-hover"></a>
                                        </figure>
                                        <div class="product-content">
                                            <h3 class="product-name"><a href="product.html" title="Women's Lauren Dressr">Women's Lauren Dress</a></h3>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="95"></div>
                                                </div>
                                            </div>
                                            <div class="product-price-container"><span class="product-price">$67.00</span></div>
                                        </div>
                                    </div>
                                    <div class="product clearfix">
                                        <figure class="product-image-container">
                                            <a href="product.html" title="White Shaund dress"><img src="images/products/product10.jpg" alt="Product image" class="product-image"> <img src="images/products/product1-hover.jpg" alt="Product image hover" class="product-image-hover"></a>
                                        </figure>
                                        <div class="product-content">
                                            <h3 class="product-name"><a href="product.html" title="White Shaund dress">White Shaund dress</a></h3>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="50"></div>
                                                </div>
                                            </div>
                                            <div class="product-price-container"><span class="product-price">$72.50</span></div>
                                        </div>
                                    </div>
                                    <div class="product clearfix">
                                        <figure class="product-image-container">
                                            <a href="product.html" title="White linen sheer dress"><img src="images/products/product11.jpg" alt="Product image" class="product-image"> <img src="images/products/product2-hover.jpg" alt="Product image hover" class="product-image-hover"></a>
                                        </figure>
                                        <div class="product-content">
                                            <h3 class="product-name"><a href="product.html" title="Jacket Suiting Blazer">Women's Suiting Jacket</a></h3>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="70"></div>
                                                </div>
                                            </div>
                                            <div class="product-price-container"><span class="product-price">$114.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="sidebar-banner"><img src="images/banners/banner.jpg" alt="banner" class="img-responsive">
                                <div class="sidebar-banner-content">
                                    <div class="vcenter-container">
                                        <div class="vcenter">
                                            <h5><span>New men</span>Collection</h5><a href="#" class="btn btn-custom-7 min-width-md">Buy it now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x hidden-xs"></div>
    <div class="md-margin2x visible-xs"></div>
</section>

@endsection