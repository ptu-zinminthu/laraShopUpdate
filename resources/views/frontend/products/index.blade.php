@extends('frontend.layouts.app')

@section('content')
 <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="w3l_banner_nav_right_banner">
                                <h3>Make your <span>food</span> with Spicy.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3l_banner_nav_right_banner1">
                                <h3>Make your <span>food</span> with Spicy.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3l_banner_nav_right_banner2">
                                <h3>upto <i>50%</i> off.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <div class="w3ls_w3l_banner_nav_right_grid">
                <h3>Popular Brands</h3>
                <div class="w3ls_w3l_banner_nav_right_grid1">

                @if($category)
                    <h6>{{$category->title}}</h6>

                @endif
                    @foreach($products as $product)
                    <div class="col-md-3 w3ls_w3l_banner_left">
                        <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                    
                         <a href={{route("frontend.productdetail",$product->id)}}>
                                            <img src='{{url("images/150x150/products/" . $product->image)}}' alt=" " class="img-responsive"/></a>
                                            <p>{{$product->title}}</p>
                                            <h4>{{$product->price}} <lable>Ks</lable></h4>
                                        </div>
                                        <div class="snipcart-details">
                                                    <div class="col-md-12 btn btn-danger">
                                                    <a href='{{ route("frontend.addtocart",$product->id) }}' style="color:#fff" />Add To Cart</a>
                                                    </div>
                                                
                                        </div>


                                    </div>
                                </figure>

                            </div>

                        </div>
                         <br>
                        </div>
                    </div>
                    @endforeach
                      
                    
                    <div class="clearfix"> </div><br>
                </div>
               
            
            </div>
            <br>
        {!! Html::style('assets/css/flexslider.css') !!}
                {!! Html::script('assets/js/jquery.flexslider.js') !!}
                <script type="text/javascript">
                $(window).load(function(){
                  $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                      $('body').removeClass('loading');
                    }
                  });
                });
              </script>  
@endsection
@section('secondary_content')
    

@endsection