@extends('Client.master')


@section('home-content')

    <section class="shop shop-1 sub-cat">
        <div class="container-fluid page-bgc">
            <div class="row">


                <!--left column-->
                <div class="col-3">



                    <div class="sidebar-head mt-3">



                        <!-- Main sidebar -->
                        <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">

                            <div class="range-box mb-2">
                                <h5 class="text-center">Let us know your budget in ৳</h5>
                                <div class="d-flex my-4">
                                    <div class="w-75">
                                        <input type="range" class="custom-range" id="customRange11" min="0" max="10000">
                                    </div>
                                    <span class="font-weight-bold ml-2 valueSpan2"></span>
                                </div>

                            </div>
                            <div class="sidebar-content">

                                <div class="sidebar-category sidebar-default sub-category">
                                    <div class="category-title">
                                        <span>PRODUCT CATEGORIES</span>
                                    </div>
                                    <div class="category-content">
                                        <ul id="fruits-nav-sub" class="nav flex-column">
                                            @foreach($categories as $category)
                                            <li class="nav-item">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    {{$category->category_name}}
                                                </label> <br>
                                            </li>
                                            @endforeach


                                        </ul>
                                        <!-- /Nav -->
                                    </div>
                                    <!-- /Category Content -->
                                </div>
                                <!--sidebar-category-product categories-->
                            </div>

                            <!--brands sidebar-->
                            <div class="sidebar-category sidebar-default sub-category">
                                <div class="category-title ">
                                    <span>PRODUCT BRANDS</span>
                                </div>
                                <div class="category-content">
                                    <ul id="fruits-nav-sub" class="nav flex-column">
                                        @foreach($brands as $brand)
                                        <li class="nav-item">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">{{$brand->brand_name}}</label> <br>
                                        </li>
                                        @endforeach



                                    </ul>
                                    <!-- /Nav -->
                                </div>
                                <!-- /Category Content -->
                            </div>
                            <!--brands-->
                        </div>
                    </div>
                </div>
                <!--left column-->

                <div class="col-9">
                    <div class="col-12">
                        <div class="title-box mt-4">
                            <p>Get our</p>
                            <h2 class="title mt0">Products</h2>
                        </div>
                    </div>




                    <!--<div class="container-fluid">-->
                    <div class="row">
                        <!--<div class="boxed">-->
                        @foreach($products as $product)
                        <div class="col-sm-3">
                            {{-- <form action="{{route('add-to-cart')}}" method="post">
                                @csrf --}}
                            <div class="shop-box">
                                <div class="product-badge">10% OFF</div>
                                <img class="img-full img-responsive" src="{{asset($product->product_image)}}" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <h4>{{$product->product_name}}</h4>
                                          
                                            <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                <span class="ion-ios-information"></span>
                                            </a>
                                            <input type="hidden" id="proid-{{$product->id}}" name="proid" value="{{$product->id}}">
                                            <input type="hidden" id="qty-{{$product->id}}" name="qty" value="1" value="min">
                                            <button data-id="{{$product->id}}" onclick="addToCart(this)">
                                                <span class="ion-ios-cart"></span>
                                            </button>
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
                                            ${{$product->product_price}}
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
                            {{-- </form> --}}
                        </div>
                        @endforeach

                    </div>






                    <!--<div class="row">-->
                    <!--    <div class="col-9">-->
                    <!--        <nav aria-label="Page navigation" class="pager justify-content-center">-->
                    <!--          <ul class="pagination">-->
                    <!--            <li class="page-item">-->
                    <!--              <span class="page-link">Previous</span>-->
                    <!--            </li>-->
                    <!--            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                    <!--            <li class="page-item">-->
                    <!--              <span class="page-link">-->
                    <!--                2-->
                    <!--                <span class="sr-only">(current)</span>-->
                    <!--              </span>-->
                    <!--            </li>-->
                    <!--            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                    <!--            <li class="page-item">-->
                    <!--              <a class="page-link" href="#">Next</a>-->
                    <!--            </li>-->
                    <!--          </ul>-->
                    <!--         </nav>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div> <!-- boxed -->
            </div>
            <!--right-column-->
        </div>
    </section>
    <script src="{{asset('client/assets/js/custom/cart.js')}}"></script>
    {{-- <script src="{{asset('client/assets/js/custom/api.js')}}"></script> --}}
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


@endsection
