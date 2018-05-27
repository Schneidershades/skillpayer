<section>
<!-- GET QUOTES POPUP -->
<div class="modal fade dir-pop-com" id="list-quo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header dir-pop-head">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Get a Quotes</h4>
                <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
            </div>
            <div class="modal-body dir-pop-body"> 
                <form method="post" class="form-horizontal">
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <label class="col-md-4 control-label">Full Name *</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="fname" placeholder="" required> </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <label class="col-md-4 control-label">Mobile</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="mobile" placeholder=""> </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" placeholder=""> </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <label class="col-md-4 control-label">Message</label>
                        <div class="col-md-8 get-quo">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="SUBMIT"  class="pop-btn"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- GET QUOTES Popup END -->
</section>

<section>
<!-- GET QUOTES POPUP -->
<div class="modal fade dir-pop-com" id="airtime" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header dir-pop-head">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Airtime Recharge</h4>
                <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
            </div>
            <div class="modal-body dir-pop-body">
                <form method="post" class="form-horizontal" action="{{route('process.airtime')}}">
                    <!--LISTING INFORMATION-->
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Network *</label>
                        <div class="col-md-8">
                            <select name="airtime_network" id="airtime_network" required>
                                <option value="">--Please Select Network---</option>
                                @foreach($airtime_services as $service)
                                <option value="{{$service->code}}">{{$service->title}}</option>
                                @endforeach
                            <select>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Amount</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="airtime_amount" id="airtime_amount" placeholder="" required> 
                            <i>Minimum amount is N50</i>
                        </div>

                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Recharge Number</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="airtime_number" id="airtime_number" placeholder="" required> 
                            <i>No country code extension</i>
                        </div>

                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group ">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="airtime_email" id="airtime_email" placeholder="" required> </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="SUBMIT" id="btnAirtimeProcess" class="pop-btn"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- GET QUOTES Popup END -->

<!-- GET QUOTES POPUP -->
<div class="modal fade dir-pop-com" id="data" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header dir-pop-head">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Data Recharge</h4>
                <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
            </div>
            <div class="modal-body dir-pop-body">
                <form method="post" class="form-horizontal" action="{{route('process.data')}}">
                    <!--LISTING INFORMATION-->
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-4">Data Network *</label>
                        <div class="col-md-8">
                            <select name="data_network"  id="data_network" required onchange="showPlans(this.value)">
                                <option value="">--Please Select Network---</option>
                                @foreach($data_services as $service)
                                <option value="{{$service->code}}">{{$service->title}}</option>
                                @endforeach
                            <select>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4">Data plan *</label>
                        <div class="col-md-8">
                            <select name="data_plan" id="datacode" required>

                            <select>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Mobile</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="data_number" name="data_number" placeholder="" required> 
                            <i>No country code extension</i>
                        </div>

                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group ">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" id="data_email" name="data_email" placeholder="" required> </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="SUBMIT" id="btnDataProcess" class="pop-btn"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- GET QUOTES Popup END -->

<!-- GET QUOTES POPUP -->
<div class="modal fade dir-pop-com" id="digitalTv" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header dir-pop-head">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Digital TV Recharge</h4>
                <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
            </div>
            <div class="modal-body dir-pop-body">
                <form method="post" class="form-horizontal" action="{{route('process.tv')}}">
                    {{ csrf_field() }}
                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Digital TV *</label>
                        <div class="col-md-8">
                            <select name="tv_network" name="tv_network"  required onchange="
                                if(this.value=='bd'){ 
                                      $('#cable_amount').fadeIn();
                                      $('#plan_code').fadeOut(); 
                                  }else{ 
                                    $('#cable_amount').fadeOut();
                                    $('#plan_code').fadeIn(); 
                                        showBouquets(this.value);
                        
                                }">
                                <option value="">--Please Select Digital TV Network---</option>
                                @foreach($tv_services as $service)
                                <option value="{{$service->code}}">{{$service->title}}</option>
                                @endforeach
                            <select> 
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group" style="display:none" id="plan_code">
                        <label class="col-md-4 control-label" id="plan_code">Digital TV plan *</label>
                        <div class="col-md-8">
                            
                            <select name="tv_code" id="tvcode">
                                
                            <select>
                        </div>
                    </div>
                    
                    <div class="form-group" id="cable_amount" style="display:none">
                        <label class="col-md-4 control-label" >Startimes Amount *</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="startimes_amount" id="startimes_amount" placeholder="">
                        </div>
                    </div>
                    
                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Smart Card Number</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="tv_smartcard" id="tv_smartcard" placeholder="" required> 
                            <i>Insert Your Smart Card Number</i>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Mobile</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="tv_number" id="tv_number" placeholder="" required> 
                            <i>No country code extension</i>
                        </div>

                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group ">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="tv_email" id="tv_email" placeholder="" required> </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="SUBMIT" id="btnTvProcess" class="pop-btn"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- GET QUOTES Popup END -->

<!-- GET QUOTES POPUP -->
<div class="modal fade dir-pop-com" id="power" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header dir-pop-head">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Eletricity Disco Recharge</h4>
                <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
            </div>
            <div class="modal-body dir-pop-body">
                <form method="post" class="form-horizontal" action="{{route('process.power')}}">
                    {{ csrf_field() }}
                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Eletricity Disco *</label>
                        <div class="col-md-8">
                            <select name="power_disco" id="power_disco" required>
                                <option value="">--Please Select Eletricity Disco---</option>
                                @foreach($discos as $disco)
                                <option value="{{$disco->code}}">{{$disco->title}}</option>
                                @endforeach
                            <select>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Meter Number</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="power_meter" id="power_meter" placeholder="" required> 
                            <i>Insert Your Meter Number</i>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Amount</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="power_amount" id="power_amount" placeholder="" required> 
                            <i>Minimum amount is N1000</i>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Mobile</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="power_number" id="power_number" placeholder="" required> 
                            <i>No country code extension</i>
                        </div>

                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group ">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="power_email" id="power_email" placeholder="" required> 
                        </div>
                    </div>
                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="SUBMIT" id="btnPowerProcess" class="pop-btn"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- GET QUOTES Popup END -->

<!-- GET QUOTES POPUP -->
<div class="modal fade dir-pop-com" id="sms" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header dir-pop-head">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Instant SMS </h4>
                <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
            </div>
            <div class="modal-body dir-pop-body">
                <form method="post" class="form-horizontal" action="{{route('service.sms')}}">
                    {{ csrf_field() }}
                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sender</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="sender" id="sender" placeholder="" value="{{ old('sender') }}"required> 
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Recipient</label>
                        <div class="col-md-8">
                            <textarea name="recipient" style=" width: 450px; height: 150px;" class="form-control"  required>{{ old('recipient') }}</textarea>
                            <i>if its more than one number use commas to seprate the numbers eg. 08084673473, 07038943248</i>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Message</label>
                        <div class="col-md-8">
                            <textarea name="message" style=" width: 450px; height: 150px;" class="form-control" required row="12" col="12" >{{ old('message') }}</textarea>
                            <i>160 characters : 1 page</i>
                        </div>
                    </div>

                    <!--LISTING INFORMATION-->
                    <div class="form-group has-feedback">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="SUBMIT" id="btnPowerProcess" class="pop-btn"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- GET QUOTES Popup END -->
</section>