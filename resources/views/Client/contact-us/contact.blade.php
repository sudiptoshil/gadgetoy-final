@extends('Client.master')

@section('home-content')
    <section class="contact">
        <div class="container page-bgc">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <p>Get in touch</p>
                        <h2 class="title mt0">With us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="boxed">
                    <div class="col-sm-12">
                        <p class="inner-p">
                            Lorem ipsum dolor sit amet event landing template, consectetur adipisicing elit. Suscipit corrupti facilis event landing template, enim earum numquam minus veritatis nobis accusamus similique.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="map" class="col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.685526980933!2d91.83124331453192!3d22.365499985289688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad277e72d36313%3A0xd262f088f83c069c!2sCursor!5e0!3m2!1sen!2sbd!4v1492231225075"
                            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <!--<div class="boxed">-->
                <div class="col-sm-8">
                    <h4>Message for us</h4>
                    <form action="contact.php" class="contact-form" id="contactForm" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name*" id="fname" name="fname" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email*" id="email" name="email" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Write something..." name="message"></textarea>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->
                            <div class="text-center mt20 col-sm-12">
                                <button type="submit" class="btn btn-robot pull-left" id="cfsubmit">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <div id="contactFormResponse"></div>
                </div> <!-- /.col-sm-8 -->

                <div class="col-sm-4">
                    <h4>Contact details</h4>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}client/assets/images/address.png" alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Address</h5>
                            <p class="contact-detail">
                                11/11 Jobeda Villa, Panchlaish,<br>
                                Chittagong, Bangladesh
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}client/assets/images/phone.png" alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Phone</h5>
                            <p class="contact-detail">
                                01818 010902<br>
                                01812 351155
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}client/assets/images/support.png" alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Support</h5>
                            <p class="contact-detail">
                                support@gadgetoy.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--</div>-->
    </section>
@endsection
