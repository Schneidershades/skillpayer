<!--LEFT SECTION-->
        <div class="tz-l">
            <div class="tz-l-1">
                <ul>
                    <!-- <li><img src="{{URL::to('/assets/images/db-profile.jpg')}}" alt="" /> </li> -->
                    <li><img src="{{Auth::user()->profile->avatar  ? Auth::user()->profile->avatar : URL::to('/assets/images/db-profile.jpg')}}" alt="" /> </li>
                    <li><span style="font-size:17px">{{ number_format( Auth::user()->wallet->skill_coin_balance , 2, '.', ',') }}</span> SKC</li>
                    <li><span style="font-size:17px">{{Auth::user()->wallet->pv_balance}}</span> SP</li>
                    <div class=-"col-md-12">
                        <h3 class="text-center">{{Auth::user()->username}}</h3>
                    </div>
                </ul>
                
            </div>

            @if(Auth::user()->admin)
            <div class="tz-l-2">
                <h4>Admin</h4>
                <ul>
                    <li>
                        <a href="{{route('admin.users.index')}}"><img src="{{URL::to('/assets/images/icon/db21.png')}}" alt="" />Users</a>
                    </li>
                    <li>
                        <a href="{{route('admin.withdrawal.index')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> Pending Withdrawals</a>
                    </li>
                    
                    <li>
                        <a href="{{route('admin.package-transactions')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> All Users Package Transactions</a>
                    </li>
                     <li>
                        <a href="{{route('admin.wallet.history')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> User Wallet History</a>
                    </li>
                    
                    <li>
                        <a href="{{route('admin.agric-loan.history')}}"><img src="{{URL::to('/assets/images/icon/dbl11.png')}}" alt="" /> Agric Loans Transactions</a>
                    </li>

                     <li>
                        <a href="{{route('admin.airtime.history')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> Airtime Transactions</a>
                    </li>

                     <li>
                        <a href="{{route('admin.power.history')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> Power Transactions</a>
                    </li>

                    <li>
                        <a href="{{route('admin.data.history')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> Data Transactions</a>
                    </li>

                    <li>
                        <a href="{{route('admin.tv.history')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> Digital TV Transactions</a>
                    </li>

                    <li>
                        <a href="{{route('admin.partner.index')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> Manage Partners</a>
                    </li>
                    
                </ul>
            </div>
            @endif

            <div class="tz-l-2">
                <ul>
                    <li>
                        <a href="{{route('home')}}" class="tz-lma"><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> My Dashboard</a>
                    </li>

                    <li>
                        <a href="{{route('account.history.index')}}"><img src="{{URL::to('/assets/images/icon/db21.png')}}" alt="" /> History</a>
                    </li>
                    
                    <li>
                        <a href="{{route('agric-loan.index')}}"><img src="{{URL::to('/assets/images/icon/dbl11.png')}}" alt="" /> Agric Loans</a>
                    </li>
                    
                    

                    @if (Auth::user()->packageTransactions)
                    <li>
                        <a href="{{route('account.buy.package.index')}}" ><img src="{{URL::to('/assets/images/icon/db21.png')}}" alt="" />Package Transactions</a>
                    </li>
                    @endif
                    
                    <li>
                        <a href="{{route('account.transfers.create.start')}}" ><img src="{{URL::to('/assets/images/icon/db21.png')}}" alt="" />Transfer</a>
                    </li>
                    
                    <li>
                        <a href="{{route('account.wallet.create.start')}}"><img src="{{URL::to('/assets/images/icon/dbl9.png')}}" alt="" />Fund Wallet</a>
                    </li>
                    
                    @if (Auth::user()->package_id == 5)
                    
                    @else
                    <li>
                        <a href="{{route('account.buy.package.create.start')}}" ><img src="{{URL::to('/assets/images/icon/dbl1.png')}}" alt="" /> Upgrade Package</a>
                    </li>
                    @endif
                    
                    

                    <li>
                        <a href="{{route('account.network.index')}}"><img src="{{URL::to('/assets/images/icon/db21.png')}}" alt="" /> My Team</a>
                    </li> 

                    <li>
                        <a href="{{route('services')}}"><img src="{{URL::to('/assets/images/icon/dbl2.png')}}" alt="" /> Services</a>
                    </li>
                    <li>
                        <a href="{{route('account.advert.index')}}"><img src="{{URL::to('/assets/images/icon/dbl3.png')}}" alt="" /> My Adverts</a>
                    </li>
                    <li>
                        <a href="{{route('account.advert.create.start')}}"><img src="{{URL::to('/assets/images/icon/dbl14.png')}}" alt="" />Create Advert</a>
                    </li>
                    <!-- <li>
                        <a href=""><img src="{{URL::to('/assets/images/icon/dbl13.png')}}" alt="" /> My Network</a>
                    </li> -->
                    <li>
                        <a href="{{route('account.profile.index')}}"><img src="{{URL::to('/assets/images/icon/dbl6.png')}}" alt="" /> Profile </a>
                    </li>
                     <li>
                        <a href="{{route('account.security.edit')}}"><img src="{{URL::to('/assets/images/icon/dbl7.png')}}" alt="" /> Security </a>
                    </li>
                    <li>
                        <a href="{{route('account.withdrawal.create.start')}}"><img src="{{URL::to('/assets/images/icon/dbl9.png')}}" alt="" /> WithDrawal </a>
                    </li>

                    <li>
                        <a href="{{route('account.partner.index')}}"><img src="{{URL::to('/assets/images/icon/dbl11.png')}}" alt="" /> Our Partners </a>
                    </li>
                    <!-- <li>
                        <a href=""><img src="{{URL::to('/assets/images/icon/dbl11.png')}}" alt="" /> Notification</a>
                    </li>
                    <li>
                        <a href=""><img src="{{URL::to('/assets/images/icon/dbl9.png')}}" alt=""> Check Out</a>
                    </li>
                    <li>
                        <a href=""><img src="{{URL::to('/assets/images/icon/db21.png')}}" alt="" /> Invoice</a>
                    </li>                       
                    <li>
                        <a href=""><img src="{{URL::to('/assets/images/icon/dbl7.png')}}" alt="" /> Claim & Refund</a>
                    </li>
                    <li>
                        <a href=""><img src="{{URL::to('/assets/images/icon/dbl210.png')}}" alt="" /> Setting</a>
                    </li> -->
                    <li>
                        <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <img src="{{URL::to('/assets/images/icon/dbl12.png')}}" alt="" /> Log Out</a>
                    </li>
                </ul>
            </div>
        </div>