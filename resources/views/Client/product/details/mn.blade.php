@extends('Client.master')


@section('home-content')


    <div class="container">
        <div class="card mb-4">
            <!--<div class="container-fliud">-->
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            <div class="wrapper row">
                <div class="preview col-md-4">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="{{asset($product->product_image)}}"/></div>
                        <div class="tab-pane" id="pic-2"><img src="{{asset($product->product_image)}}"/></div>
                        <div class="tab-pane" id="pic-3"><img src="{{asset($product->product_image)}}"/></div>
                        <div class="tab-pane" id="pic-4"><img src="{{asset($product->product_image)}}"/></div>
                        <div class="tab-pane" id="pic-5"><img src="{{asset($product->product_image)}}"/></div>
                    </div>


                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                    src="{{asset($product->product_image)}}"/></a></li>
                        <li><a data-target="#pic-2" data-toggle="tab"><img
                                    src="{{asset($product->product_image)}}"/></a></li>
                        <li><a data-target="#pic-3" data-toggle="tab"><img
                                    src="{{asset($product->product_image)}}"/></a></li>
                        <li><a data-target="#pic-4" data-toggle="tab"><img
                                    src="{{asset($product->product_image)}}"/></a></li>
                        <li><a data-target="#pic-5" data-toggle="tab"><img
                                    src="{{asset($product->product_image)}}"/></a></li>
                    </ul>


                </div>

                <div class="details col-md-4">

                    <h4 class="product-details-title mt-4">{{$product->product_name}}</h4>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>

                    <p class="product-description">{{$product->product_description}}</p>
                    <h5 class="price">current price: <span>{{$product->product_price}} BDT</span></h5>
                    <!--<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>-->
                    <!--<h5 class="sizes">Model:-->
                    <!--    <span class="size" data-toggle="tooltip" title="small">S</span>-->
                    <!--    <span class="size" data-toggle="tooltip" title="medium">X</span>-->
                    <!--    <span class="size" data-toggle="tooltip" title="large">XS</span>-->
                    <!--    <span class="size" data-toggle="tooltip" title="xtra large">XXS</span>-->
                    <!--</h5>-->
                    <!--<h5 class="colors">colors:-->
                    <!--    <span class="color orange"></span>-->
                    <!--    <span class="color green"></span>-->
                    <!--    <span class="color blue"></span>-->
                    <!--</h5>-->

                    <div class="quantity input-group">
                            <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-danger btn-number" disabled="disabled"
                                  data-type="minus" data-field="quant[1]">
                              <span class="ion-ios-minus"></span>
                            </button>
                            </span>
                        <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-success btn-number" data-type="plus"
                                  data-field="quant[1]">
                              <span class="ion-ios-plus"></span>
                            </button>
                            </span>
                    </div>

                    <div class="action mt-3">
                        <a href="cart.html" type="button" class="add-to-cart btn btn-default">ORDER NOW</a>

                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="qty" value="1" value="min">
                        <button type="button" class="btn btn-outline-default">ADD TO CART</button>

                        <!-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->
                        {{-- </button> --}}
                    </div>
                </div>


                <div class="delivery-details col-md-2">
                    <p><span class="ion-cash"></span> &nbsp; Cash on delivery</p>
                    <p><span class="ion-ios-rewind"></span>&nbsp; 3 days happy return</p>
                    <p><span class="ion-android-car"></span>&nbsp; Delivery Charge Tk. <br> 50 (Online Order) </p>
                    <p><span class="ion-android-hand"></span>&nbsp; Purchase & Earn</p>


                </div>


            </div>
        </div>
    </div>


    <!--review and specification tab-->
    <div class="container product-tab">
        <div class="row">
            <div class="col-md-10">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#review" role="tab" data-toggle="tab">Product Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#desc" role="tab" data-toggle="tab">Product Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#spec" role="tab" data-toggle="tab">Product Specification</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="review">
                        <div class="review-block">
                            <!--<h2 class="title mt0 text-center mb-5">Customer Review</h2>-->
                            <!--<hr/>-->

                            @foreach($reviews as $review)
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="{{asset('/')}}client/assets/images/user.jpg" class="img-rounded">
                                        <div class="review-block-name"><a href="#">{{$review->full_name}}</a></div>
                                        <div class="review-block-date">{{$review->created_at}}</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="review-block-rate mb-3">


                                            @if($review->rating==1)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>

                                            @elseif($review->rating==2)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @elseif($review->rating==3)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @elseif($review->rating==4)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @elseif($review->rating==5)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                        aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @endif
                                        </div>


                                        <div class="review-block-description">{{$review->description}}
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                            @endforeach


                        </div>
                    </div>
                    <!--1st tab-->

                    <div role="tabpanel" class="tab-pane fade" id="desc">
                        <div class="review-block">
                            <!--<h2 class="title mt0 text-center mb-5">Customer Review</h2>-->
                            <!--<hr/>-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="review-block-description">
                                        Special <br>
                                        Packing Capacity: 5Kg <br>
                                        Brand: Apple <br>
                                        Good Quality Product
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="review-block-description">
                                        Special <br>
                                        Packing Capacity: 5Kg <br>
                                        Brand: Apple <br>
                                        Good Quality Product
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--2nd tab-->

                    <div role="tabpanel" class="tab-pane fade" id="spec">
                        <div class="review-block">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="review-block-description text-center">
                                        Model: KL-202 <br>
                                        Type C USB Dash Data Cable & Adapter <br>
                                        Extremely fast charge speed <br>
                                        60% Charging Capacity in around 30 Minutes <br>
                                        Compact and Tangle-free

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--3rd tab-->
                </div>
            </div>
            <!--tab column-->


            <!--best seller-div-->
            <div class="best-sellers-div col-sm-2">
                <h5> Best Seller</h5>
                <div class="best-sellers">
                    <div class="shop-box">
                        <img class="img-full img-responsive" src="{{asset('/')}}client/assets/images/shop-2.jpg" alt="shop">
                        <div class="shop-box-hover text-center">
                            <div class="c-table">
                                <div class="c-cell">
                                    <a href="product-details.html">
                                        <span class="ion-ios-information"></span>
                                    </a>
                                    <a href="cart.html">
                                        <span class="ion-ios-cart"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-box-title">
                        <div class="row">
                            <div class="col-sm-3">
                                <h4>IPHONE 10</h4>
                                <h4>MO: <span class="thin">#00SS5</span></h4>
                            </div>
                            <div class="col-sm-3">
                                <p class="shop-price">
                                    $ 747
                                </p>
                                <div class="star">
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star-half"></span>
                                    <span class="ion-ios-star-outline"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--best-sellers-->

                <div class="best-sellers">
                    <div class="shop-box">
                        <img class="img-full img-responsive" src="{{asset('/')}}client/assets/images/shop-2.jpg" alt="shop">
                        <div class="shop-box-hover text-center">
                            <div class="c-table">
                                <div class="c-cell">
                                    <a href="product-details.html">
                                        <span class="ion-ios-information"></span>
                                    </a>
                                    <a href="cart.html">
                                        <span class="ion-ios-cart"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-box-title">
                        <div class="row">
                            <div class="col-sm-3">
                                <h4>IPHONE 10</h4>
                                <h4>MO: <span class="thin">#00SS5</span></h4>
                            </div>
                            <div class="col-sm-3">
                                <p class="shop-price">
                                    $ 747
                                </p>
                                <div class="star">
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star-half"></span>
                                    <span class="ion-ios-star-outline"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--best-sellers-->
            </div>
            <!--best seller-div ends-->
        </div>
    </div>




    <!--best seller-div-->

    <!--best seller-div ends-->
    </div>
    </div>
    <!--review and specification tab ends-->

    <section class="contact review">
        <div class="container page-bgc">
            <div class="row">
                <div class="col-sm-12 ">
                    <h4 class="text-center ml-5 mb-3">Write a review</h4>

                    <section class='rating-widget col-md-12'>
                        <div class='rating-stars text-center'>
                            <ul id='stars' class="mr-5">
                                <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>

                            </ul>
                            <span class="text-danger ml-5">{{$errors->has('rating') ? $errors->first('rating') : ' '}}</span>
                        </div>
                    </section>


                    <form action="{{route('product-review')}}" class="contact-form" id="contactForm" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea required class="form-control" rows="2" placeholder="Share your experience..."
                                              name="description"></textarea>
                                    <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ' '}}</span>
                                </div> <!-- /.form-group -->
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">

                                    <input required id="file-upload" type="file" name="image"/>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="client_id" value="{{Session::get('client_id')}}">
                                    <span class="text-danger">{{$errors->has('image') ? $errors->first('image') : ' '}}</span>
                                </div>
                            </div>



                            <div class="col">
                                <div class="">
                                    <div class="">
                                        <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />
                                    </div>
                                </div>
                            </div>


                            {{--<div class='success-box'>
                                <div class='clearfix'></div>
                                <div class='text-message'>
                                    <input id="ratingg" name="rating" type="hidden" value="">
                                </div>
                                <div class='clearfix'></div>
                            </div>--}}

                            <input required id="ratingg" name="rating" type="hidden" value="">
                            @if(Session::get('client_id'))
                                <div class="text-center mt20 col-sm-12">
                                    <button type="submit" class="btn btn-robot pull-left" id="cfsubmit">Submit Review
                                    </button>
                                </div>
                            @else
                                <div class="col-sm-12">
                                    <h4 class="text-danger">Login into your account to write a review</h4>
                                </div>
                            @endif
                        </div>
                    </form>
                    <div id="contactFormResponse"></div>
                </div>

            </div>
        </div>
    </section>




    <!-- Shop -->
    <section class="container shop">
        <div class="page-bgc related">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <!--<p>Get our</p>-->
                        <h2 class="title mt0">Related Products</h2>
                    </div>
                </div>
            </div>

            <!--row-1-->
            <div class="row">
                <!--<div class="boxed">-->
                @foreach($products as $product)
                    <div class="col-sm-3">
                        <div class="shop-box">
                            <img class="img-full img-responsive" src="{{asset($product->product_image)}}"
                                 alt="shop">
                            <div class="shop-box-hover text-center">
                                <div class="c-table">
                                    <div class="c-cell">

                                        <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                            <span class="ion-ios-information"></span>
                                        </a>
                                        <a href="cart.html">
                                            <span class="ion-ios-cart"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-box-title">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4>{{$product->product_name}}</h4>
                                </div>
                                <div class="col-sm-3">
                                    <p class="shop-price">
                                        $ {{$product->product_price}}
                                    </p>
                                    <div class="star">
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star-half"></span>
                                        <span class="ion-ios-star-outline"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <!--row-1-->

            <!--row-2-->


            <!--row-2-->

        </div>
    </section>

    <script>

        $('#blah').hide();


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }

            $('#blah').show();
        }

        $("#file-upload").change(function() {
            readURL(this);
        });

    </script>



@endsection

