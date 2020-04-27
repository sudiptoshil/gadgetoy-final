@extends('Client.master')
@section('home-content')

    <!-- cart -->

    <div class="container shadow cart">


        <div class="container-fluid cart-step mb-4">
            <h1 class="text-center mt-4 mb-4"> Checkout Here</h1>
            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">User Info</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Order Info">Order Info</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Comments">Comments        </button>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 m-auto">
                        <form class="multisteps-form__form">
                            <!--single form panel - cart panel-->

                            <div class="multisteps-form__panel p-4 rounded bg-white js-active" data-animation="scaleIn" id="here">
                                <h3 class="text-center mb-2">GADGETOY CART</h3>
                                <!--<p class="text-center lead mb-4">Search Through 1000+ Gadgets, Book Your Desired Product. Get Delivered. </p>-->
                                <h4 style="color:red" align='center'>{{Session::get('message')}}</h4>
                                <table id="cart" class="table table-hover table-condensed mt-4 mb-4">
                                    <thead>
                                    <tr>
                                        <th style="width:50%">Product</th>
                                        <th style="width:10%">Price</th>
                                        <th style="width:8%">Quantity</th>
                                        <th style="width:8%">Discount</th>
                                        <th style="width:22%" class="text-center">Subtotal</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                    </thead>
                                    @php($sum = 0)
                                    @foreach ($cart as $v_cart)
                                        <tbody>
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-2 hidden-xs"><img src="{{$v_cart->options->image}}" alt="..." class="img-responsive"/></div>
                                                    <div class="col-sm-10">
                                                        <h4 class="nomargin">{{$v_cart->name}}</h4>

                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">{{$v_cart->price}} BDT</td>
        
                                            <td data-th="Quantity">
                                                
                                                <input type="number" class="form-control text-center" id="qty" name="qty" value="{{$v_cart->qty}}">
                                                <input type="hidden" class="form-control text-center" id="rowId" name="rowId" value="{{$v_cart->rowId}}">
                                                <input type="submit" class="btn btn-primary" value="update" id="myButton" onclick="updateCart(this)" name="btn">
                                              
                                            </td>
                                            <td data-th="Subtotal" class="text-center">{{$v_cart->options->discount}}%</td>

                                            <td data-th="Subtotal" class="text-center">{{$total = $v_cart->price * $v_cart->qty }}BDT</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-info btn-sm" id="decrease" onclick="decreaseValue()" ><i class="fas fa-minus"></i></button>
                                                <a href="{{route('delete-cart',['id' => $v_cart->rowId ])}}"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                                <button class="btn btn-info btn-sm" id="increase" onclick="increaseValue()"><i class="fas fa-plus"></i></button>


                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                    {{-- <tbody>
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-2 hidden-xs"><img src="assets/images/iphone.jpg" alt="..." class="img-responsive"/></div>
                                                    <div class="col-sm-10">
                                                        <h4 class="nomargin">Macbook Air</h4>
                                                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">50,000.00 BDT</td>
                                            <td data-th="Quantity">
                                                <input type="number" class="form-control text-center" value="1">
                                            </td>
                                            <td data-th="Subtotal" class="text-center">50,000.00 BDT</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    </tbody> --}}

                                    <tfoot>
                                    <tr class="visible-xs">
                                        <!--<td class="text-center"><strong>Total 50,000.00 BDT</strong></td>-->
                                    </tr>
                                    <tr>
                                    <td><a href="{{route('/')}}" class="btn btn-warning text-white"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                        <td colspan="3" class="hidden-xs"></td>
                                        <?php
                                        // $sum = $sum + $total;
                                        ?>
                                        {{-- <td class="hidden-xs text-center"><strong>item total{{$sum}}BDT</strong></td> --}}
                                        {{-- {{$vat = 0}} --}}
                                        <br/>
                                        {{-- <td class="hidden-xs text-center"><strong>garnd total{{$ordertotal = $sum+$vat}}BDT</strong></td> --}}
                                        {{-- <td class="hidden-xs text-center"><strong>Discount-{{Cart::discount()}}BDT</strong></td> --}}
                                    </br>

                                        <td class="hidden-xs text-center"><strong>Total-{{$ordertotal = Cart::priceTotal()}}BDT</strong></td>

                                    {{-- <td class="hidden-xs text-center"><strong>garnd total{{$ordertotal = $sum+$vat}}BDT</strong></td> --}}
                                    <?php
                                    Session::put('ordertotal',$ordertotal);
                                    ?>
                                    <!--<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>-->
                                    </tr>
                                    </tfoot>

                                </table>

                                <div class="button-row d-flex mt-4">
                                    <button class="btn btn-primary ml-auto js-btn-next"  type="button" title="Next">Next</button>
                                </div>
                            </div>

                            <!--cart panel ends-->

                            </form---------------->
                            <!--single form panel shipping details panel-->
                            <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title text-center">Shipping Details</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <div class="col-md-6 form-group">

                                            <input type="text" class="form-control"  name="first_name" id="firstname" placeholder="First Name">
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>

                                        <div class="col-md-6 form-group">

                                            <input type="text" class="form-control" name="last_name" id="lastname" placeholder="Last Name">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <input class="multisteps-form__input form-control" id="txt_cart_address" name="address" type="text" placeholder="city"/>
                                            <input class="multisteps-form__input form-control" id="status" name="status" value="1" type="hidden"/>

                                        </div>
                                    </div>
                                </br>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="multisteps-form__input form-control"   id="phonenumber" name="phone_number" type="text" placeholder="phone number"/>

                                        </div>
                                    </div>
                                </br>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="multisteps-form__input form-control"  id="postcode" name="post_code" type="text" placeholder="postal code"/>

                                        </div>
                                    </div>

                                

                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                    </div>


                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" id="same-adress">
                                        Save this information for next time
                                        <label for="same-adress" class="form-check-label"></label>
                                    </div>

                                </div>
                            </div>
                            <!--shipping details panel ends-->


                            <!--single form panel payment method panel-->
                            <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title text-center">Payment Method</h3>
                                <div class="multisteps-form__content">
                                    <div class="row">
                                        <div class="col-12 mt-4 div_payment_radio">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type" value="1" id="credit" name="payment_type" checked required>
                                                <label for="credit" class="form-check-label">Credit Card</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type" value='2' id="debit" name="payment_type" required>
                                                <label for="debit" class="form-check-label">Debit Card</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type" value="3" id="paypal" name="payment_type"  required>
                                                <label for="paypal" class="form-check-label">PayPal</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type"  value="4" id="bkash" name="payment_type"  required>
                                                <label for="bkash" class="form-check-label">bkash</label>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-6 form-group">
                                                    <label for="card-name">Name on card</label>
                                                    <input type="text" class="form-control" name="card_name" id="card-name" placeholder required>
                                                    <div class="invalid-feedback">
                                                        Name on card is required
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label for="card-no">Card Number</label>
                                                    <input type="text" class="form-control" name="card_number" id="card-no" placeholder required>
                                                    <div class="invalid-feedback">
                                                        Credit card number is required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 form-group">
                                                    <label for="expiration">Expire Date</label>
                                                    <input type="text" class="form-control" name="expireDate" id="expireDate" placeholder required>
                                                    <div class="invalid-feedback">
                                                        Expiration date required
                                                    </div>
                                                </div>


                                                <div class="col-md-6 form-group">
                                                    <label for="ccv-no">Security Number</label>
                                                    <input type="text" class="form-control" name="security_number" id="sec-no" placeholder required>
                                                    <div class="invalid-feedback">
                                                        Security code required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="button-row d-flex mt-4 col-12">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>

                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--payment method panel ends-->

                            <!--single form panel additional comments-->
                            <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Additional Comments</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <textarea class="multisteps-form__textarea form-control" id="comment" name="comment" placeholder="Additional Comments and Requirements"></textarea>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>

                                        <button class="btn btn-success btn-robot ml-auto" onclick="orderCheckout(this)" type="button" title="Send">Checkout</button>

                                    </div>
                                </div>
                            </div>
                            <!--additional comments panel ends-->


                    </div>
                </div>
            </div>
            <!--checkout stepper ends-->
        </div>
    </div>
    <!--container cart-->


    <script>
        //DOM elements
        const DOMstrings = {
            stepsBtnClass: 'multisteps-form__progress-btn',
            stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
            stepsBar: document.querySelector('.multisteps-form__progress'),
            stepsForm: document.querySelector('.multisteps-form__form'),
            stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
            stepFormPanelClass: 'multisteps-form__panel',
            stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
            stepPrevBtnClass: 'js-btn-prev',
            stepNextBtnClass: 'js-btn-next' };
        //remove class from a set of items
        const removeClasses = (elemSet, className) => {
            elemSet.forEach(elem => {
                elem.classList.remove(className);
            });
        };
        //return exect parent node of the element
        const findParent = (elem, parentClass) => {
            let currentNode = elem;
            while (!currentNode.classList.contains(parentClass)) {
                currentNode = currentNode.parentNode;
            }
            return currentNode;
        };
        //get active button step number
        const getActiveStep = elem => {
            return Array.from(DOMstrings.stepsBtns).indexOf(elem);
        };
        //set all steps before clicked (and clicked too) to active
        const setActiveStep = activeStepNum => {
            //remove active state from all the state
            removeClasses(DOMstrings.stepsBtns, 'js-active');
            //set picked items to active
            DOMstrings.stepsBtns.forEach((elem, index) => {
                if (index <= activeStepNum) {
                    elem.classList.add('js-active');
                }
            });
        };
        //get active panel
        const getActivePanel = () => {
            let activePanel;
            DOMstrings.stepFormPanels.forEach(elem => {
                if (elem.classList.contains('js-active')) {
                    activePanel = elem;
                }
            });
            return activePanel;
        };
        //open active panel (and close unactive panels)
        const setActivePanel = activePanelNum => {
            //remove active class from all the panels
            removeClasses(DOMstrings.stepFormPanels, 'js-active');
            //show active panel
            DOMstrings.stepFormPanels.forEach((elem, index) => {
                if (index === activePanelNum) {
                    elem.classList.add('js-active');
                    setFormHeight(elem);
                }
            });
        };
        //set form height equal to current panel height
        const formHeight = activePanel => {
            const activePanelHeight = activePanel.offsetHeight;
            DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;
        };
        const setFormHeight = () => {
            const activePanel = getActivePanel();
            formHeight(activePanel);
        };
        //STEPS BAR CLICK FUNCTION
        /*   DOMstrings.stepsBar.addEventListener('click', e => {
               //check if click target is a step button
               const eventTarget = e.target;
               if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
                   return;
               }
               //get active button step number
               const activeStep = getActiveStep(eventTarget);
               //set all steps before clicked (and clicked too) to active
               setActiveStep(activeStep);
               //open active panel
               setActivePanel(activeStep);

       });*/
        //PREV/NEXT BTNS CLICK
        DOMstrings.stepsForm.addEventListener('click', e => {
            const eventTarget = e.target;
            //check if we clicked on `PREV` or NEXT` buttons
            if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
            {
                return;
            }
            //find active panel
            const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);
            let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);
            isValidStep(activePanelNum,eventTarget,DOMstrings);
            //alert(activePanelNum);
            //set active step and active panel onclick

        });
        //SE    TTING PROPER FORM HEIGHT ONLOAD
        window.addEventListener('load', setFormHeight, false);
        //SETTING PROPER FORM HEIGHT ONRESIZE
        window.addEventListener('resize', setFormHeight, false);
    </script>
    <script src="{{asset('client/assets/js/custom/cart.js')}}"></script>
    <script src="{{asset('client/assets/js/custom/api.js')}}"></script>

    <script> 
        // $(document).ready(function(){
        // setInterval(function(){
        //       $("#here").load(window.location.href + " #here" );
        // }, 3);
        // });

        let auto_refresh =
            setInterval(function(){
              $("#here").load(window.location.href + " #here" );
        },10000);
        


         </script>

    {{-- <script language="javascript">
    setTimeout(function(){
       window.location.reload(1);
    }, 7000);
    </script> --}}

    
</script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    {{-- <script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
        $('#div').load('#div');
    }, 3);
    </script> --}}

{{-- <script src="http://code.jquery.com/jquery-latest.js">
    // <script type="text/javascript">
    //   setInterval("my_function();",3); 
    //   function my_function(){
    //     $('#myrefresh').load(cart.blade.php);
    //   }
    </script> --}}
    


@endsection
