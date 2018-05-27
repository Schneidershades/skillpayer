<!--TOP SEARCH SECTION-->
    <section id="myID" class="bottomMenu hom-top-menu">
        <div class="container top-search-main">
            <div class="row">
                <div class="ts-menu">
                    <!--SECTION: LOGO-->
                    <div class="ts-menu-1">
                        <a href="{{route('home')}}"><img src="{{URL::to('/assets/images/aff-logo.png')}}" alt=""> </a>
                    </div>
                    <!--SECTION: BROWSE CATEGORY(NOTE:IT'S HIDE ON MOBILE & TABLET VIEW)-->

                    <div class="ts-menu-2"><a href="#" class="t-bb">Skill Payer <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        
                        <!--SECTION: BROWSE CATEGORY-->
                        <!-- <div class="cat-menu cat-menu-1">
                            <div class="dz-menu">
                                <div class="dz-menu-inn">
                                    <h4>Frontend Pages</h4>
                                    <ul>
                                        <li><a href="main.html">Home</a></li>
                                        <li><a href="index-1.html">Home 1</a></li>
                                        <li><a href="list.html">All Listing</a></li>
                                        <li><a href="listing-details.html">Listing Details </a> </li>
                                        <li><a href="price.html">Add Listing</a> </li>
                                        <li><a href="list-lead.html">Lead Listing</a></li>
                                        <li><a href="list-grid.html">Listing Grid View</a></li>
                                    </ul>
                                </div>
                                <div class="dz-menu-inn">
                                    <h4>Frontend Pages</h4>
                                    <ul>
                                        <li><a href="new-business.html"> New Listings </a> </li>
                                        <li><a href="nearby-listings.html">Nearby Listings</a> </li>
                                        <li><a href="customer-reviews.html"> Customer Reviews</a> </li>
                                        <li><a href="trendings.html"> Top Trendings</a> </li>
                                        <li><a href="how-it-work.html"> How It Work</a> </li>
                                        <li><a href="advertise.html"> Advertise with us</a> </li>
                                        <li><a href="price.html"> Price Details</a> </li>
                                    </ul>
                                </div>
                                <div class="dz-menu-inn">
                                    <h4>Frontend Pages</h4>
                                    <ul>
                                        <li><a href="about-us.html"> About Us</a> </li>
                                        <li><a href="customer-reviews.html"> Customer Reviews</a> </li>
                                        <li><a href="contact-us.html"> Contact Us</a> </li>
                                        <li><a href="blog.html"> Blog Post</a> </li>
                                        <li><a href="blog-content.html"> Blog Details</a> </li>
                                        <li><a href="elements.html"> All Elements </a> </li>
                                        <li><a href="shop-listing-details.html"> Shop Details </a> </li>
                                        <li><a href="property-listing-details.html"> Property Details </a> </li>
                                    </ul>
                                </div>
                                <div class="dz-menu-inn">
                                    <h4>Dashboard Pages</h4>
                                    <ul>
                                        <li><a href="dashboard.html"> Dashboard</a> </li>
                                        <li><a href="db-invoice.html"> Invoice</a> </li>
                                        <li><a href="db-setting.html"> User Setting</a> </li>
                                        <li><a href="db-all-listing.html"> All Listings</a> </li>
                                        <li><a href="db-listing-add.html"> Add New Listing</a> </li>
                                        <li><a href="db-review.html"> Listing Reviews</a> </li>
                                        <li><a href="db-payment.html"> Listing Payments </a> </li>
                                    </ul>
                                </div>
                                <div class="dz-menu-inn">
                                    <h4>Dashboard Pages</h4>
                                    <ul>
                                        <li><a href="register.html"> User Register</a> </li>
                                        <li><a href="login.html"> User Login</a> </li>
                                        <li><a href="forgot-pass.html"> Forgot Password</a> </li>
                                        <li><a href="db-message.html"> Messages</a> </li>
                                        <li><a href="db-my-profile.html"> Dashboard Profile</a> </li>
                                        <li><a href="db-post-ads.html"> Post Ads </a> </li>
                                        <li><a href="db-invoice-download.html"> Download Invoice </a> </li>
                                    </ul>
                                </div>
                                <div class="dz-menu-inn lat-menu">
                                    <h4>Admin Panel Pages</h4>
                                    <ul>
                                        <li><a target="_blank" href="admin.html"> Admin</a> </li>
                                        <li><a target="_blank" href="admin-all-listing.html"> All Listing</a> </li>
                                        <li><a target="_blank" href="admin-all-users.html"> All Users</a> </li>
                                        <li><a target="_blank" href="admin-analytics.html"> Analytics</a> </li>
                                        <li><a target="_blank" href="admin-ads.html"> Advertisement</a> </li>
                                        <li><a target="_blank" href="admin-setting.html"> Admin Setting </a> </li>
                                        <li><a target="_blank" href="admin-payment.html"> Payments </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dir-home-nav-bot">
                                <ul>
                                    <li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span> </li>
                                    <li><a href="advertise.html" class="waves-effect waves-light btn-large"><i class="fa fa-bullhorn"></i> Advertise with us</a>
                                    </li>
                                    <li><a href="db-listing-add.html" class="waves-effect waves-light btn-large"><i class="fa fa-bookmark"></i> Add your business</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <!--SECTION: SEARCH BOX-->
                    <div class="ts-menu-3">
                        <div class="">
                            <form class="tourz-search-form tourz-top-search-form">
                                <div class="input-field">
                                    <input type="text" id="top-select-city" class="autocomplete">
                                    <label for="top-select-city">Enter city</label>
                                </div>
                                <div class="input-field">
                                    <input type="text" id="top-select-search" class="autocomplete">
                                    <label for="top-select-search" class="search-hotel-type">Search your services like hotel, resorts, events and more</label>
                                </div>
                                <div class="input-field">
                                    <input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn"> </div>
                            </form>
                        </div>
                    </div>
                    <!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->
                    <div class="ts-menu-4">
                        <div class="v3-top-ri">
                            <ul>
                                <li><a href="login.html" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a> </li>
                                <li><a href="db-listing-add.html" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
                            </ul>
                        </div>
                    </div>
                    <!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
                    <div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>
                    <!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
                    
                    @include('partials._mobile')
                </div>
            </div>
        </div>
    </section>