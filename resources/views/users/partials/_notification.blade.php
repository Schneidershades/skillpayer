<!--RIGHT SECTION-->
<div class="tz-3">
    <!-- @if(Auth::user()->admin)
        <h4>Transactions({{$admin_notifications->count()}})</h4>
        <ul>
            @if($admin_notifications->count() > 0)
                @foreach($notifications as $transaction)
                <li>
                    <a href="#!"> <img src="/assets/images/icon/dbr1.jpg" alt="" />
                        <h5>ef</h5>
                        <p>{{$transaction->details}}</p>
                    </a>
                </li>
                @endforeach
            @else
                <li>
                    <a href="#!"> <img src="/assets/images/icon/dbr1.jpg" alt="" />
                        <h5>No Notification at the moment</h5>
                </li>
            @endif


        </ul>
    @else -->

        <h4>Transactions({{$notifications->count()}})</h4>
        <ul>
            @if($notifications->count() > 0)
                @foreach($notifications as $transaction)
                <li>
                    <a href="#!"> <img src="{{URL::to('/assets/images/icon/dbr1.jpg')}}" alt="" />
                        <h5>ytr</h5>
                        <p>ryyt</p>
                    </a>
                </li>
                @endforeach
            @else

                <li>
                    <a href="#!"> <img src="{{URL::to('/assets/images/icon/dbr1.jpg')}}" alt="" />
                        <h5>No Notification at the moment</h5>
                </li>
            @endif
        </ul>
    <!-- @endif -->
</div>