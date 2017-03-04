<?php $__env->startSection('content'); ?>
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

                <?php if($category): ?>
                    <h6><?php echo e($category->title); ?></h6>

                <?php endif; ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                    
                         <a href=<?php echo e(route("frontend.productdetail",$product->id)); ?>>
                                            <img src='<?php echo e(url("images/150x150/products/" . $product->image)); ?>' alt=" " class="img-responsive"/></a>
                                            <p><?php echo e($product->title); ?></p>
                                            <h4><?php echo e($product->price); ?> <lable>Ks</lable></h4>
                                        </div>
                                        <div class="snipcart-details">
                                                    <div class="col-md-12 btn btn-danger">
                                                    <a href='<?php echo e(route("frontend.addtocart",$product->id)); ?>' style="color:#fff" />Add To Cart</a>
                                                    </div>
                                                
                                        </div>


                                    </div>
                                </figure>

                            </div>

                        </div>
                         <br>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      
                    
                    <div class="clearfix"> </div><br>
                </div>
               
            
            </div>
            <br>
        <?php echo Html::style('assets/css/flexslider.css'); ?>

                <?php echo Html::script('assets/js/jquery.flexslider.js'); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('secondary_content'); ?>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>