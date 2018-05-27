<!--FOOTER SECTION-->
    <footer id="colophon" class="site-footer clearfix">
        <div id="quaternary" class="sidebar-container " role="complementary">
            <div class="sidebar-inner">
                <div class="widget-area clearfix">
                    <div id="azh_widget-2" class="widget widget_azh_widget">
                        <div data-section="section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4 col-md-3 foot-logo"> <img src="{{URL::to('/assets/images/logo.png')}}" alt="logo">
                                        <p class="hasimg"> Business Directory Website.</p>
                                        <p class="hasimg">SkillPayer is an online application that creates the most comfortable home business for any category of users. It is designed for anyone who can click a button on the computer, use a mobile phone or even with the least of knowledge gadgets. </p>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <h4>Support & Help</h4>
                                        <ul class="two-columns">
                                            <li> <a href="{{route('partners')}}">Partners Page</a> </li>
                                            <li> <a href="{{route('account.advert.create.start')}}">Advertise with us</a> </li>
                                            <li> <a href="{{route('about')}}">About Us</a> </li>
                                            <li> <a href="{{route('tour')}}">How it works </a> </li>
                                            <li> <a href="{{route('account.advert.create.start')}}">Add Business</a> </li>
                                            <li> <a href="{{route('register')}}">Register</a> </li>
                                            <li> <a href="{{route('login')}}">Login</a> </li>
                                            <li> <a href="{{route('latest')}}">Top Trends</a> </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <h4>Popular Services</h4>
                                        <ul class="two-columns">
                                            @foreach($professions as $category)
                                            <li> <a href="">{{$category->name}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <h4>Popular Services</h4>
                                        <ul class="two-columns">
                                            @foreach($professions as $category)
                                            <li> <a href="">{{$category->name}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-section="section" class="foot-sec2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h4>Payment Options</h4>
                                        <p class="hasimg"> <img src="{{URL::to('/assets/images/payment.png')}}" alt="payment"> </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4>Address</h4>
                                        <p>Plot 2, Road 11, off 1st Avenue Gwarimpa, Abuja Nigeria</p>
                                        <p> <span class="strong">Phone: </span> <span class="highlighted">+1 770 906 2740, +234 811 111 4869 </span> </p>
                                    </div>
                                    <div class="col-sm-3 foot-social">
                                        <h4>Follow with us</h4>
                                        <ul>
                                            <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .widget-area -->
            </div>
            <!-- .sidebar-inner -->
        </div>
        <!-- #quaternary -->
    </footer>
    <!--COPY RIGHTS-->
    <section class="copy">
        <div class="container">
            <p>copyrights © 2018 -Team SkillPayer. &nbsp;&nbsp;All rights reserved. </p>
        </div>
    </section>