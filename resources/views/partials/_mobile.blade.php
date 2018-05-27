<div class="mob-right-nav" data-wow-duration="0.5s">
    <div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
    <h5>Business</h5>
    @guest 
        <ul class="mob-menu-icon">
            <li><a href="{{route('login')}}">Login</a> </li>
            <li><a href="{{route('register')}}">Register</a> </li>
            <li><a href="/">Home</a> </li>
        </ul>           
    @else
        <ul class="mob-menu-icon">
            <li><a href="{{route('home')}}">Dashboard</a> </li>
            <li><a href="">Ads</a> </li>
        </ul>

        <h5>Activities</h5>
        <ul>
            <li><a href="{{route('home')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>  My Dashboard</a> </li>
            <li><a href="{{route('account.transfers.create.start')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Transfer Repair & Services</a> </li>
            <li><a href="{{route('account.wallet.create.start')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Fund Wallet</a> </li>
            <li><a href="{{route('account.buy.package.create.start')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Upgrade Package</a> </li>
            <li><a href="{{route('services')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Services</a> </li>
            <li><a href="{{route('account.advert.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> My Daily Ads</a> </li>
            <li><a href="{{route('account.advert.create.start')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Create New Ads</a> </li>
            <li><a href="{{route('account.profile.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Profile</a> </li>
            <li><a href="{{route('account.withdrawal.create.start')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>WithDrawal</a> </li>

            <li><a href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form><i class="fa fa-angle-right" aria-hidden="true"></i> Log Out</a> 
            </li>
        </ul>
    @endguest

    <h5>All Pages</h5>
    <ul>
        <li><a href="{{route('about')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>About</a> </li>
        <li><a href="{{route('tour')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> How it works</a> </li>
        <li><a href="{{route('reward')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Rewards</a> </li>
        <li><a href="{{route('packages')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Packages</a> </li>
        <li><a href="{{route('latest')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Ads</a> </li>
        <li><a href="{{route('contact')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Contacts</a> </li>
    </ul>
</div>