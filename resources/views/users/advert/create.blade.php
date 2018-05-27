@extends('layouts.users')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{URL::to('/assets/css/tagmanager.css')}}" />
<link href="{{URL::to('/assets/js/dropzone.css')}}" type="text/css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" type="text/css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" type="text/css" rel="stylesheet" />
@endsection

@section('content')
@include('partials._search')
<!--DASHBOARD-->
<section>
    <div class="tz">
        @include('users.partials._user_nav')
        <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Submit Advert Listings</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Adverts</h2>

                            <p>Create an advert</p>
                        </div>
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="">
                                @include('partials._errors')
                                <form action="{{route('account.advert.store', $advert)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title">Category</label>
                                            <select name="category_id" id="categoryId" required onchange="showSubCategory(this.value)">
                                                <option value="" selected>Select Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="title">Sub Category</label>
                                            <select name="sub_category_id" id="subCategoryId">
                                                
                                            </select>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="title">Advert Purpose</label>
                                                <select name="type" id="type" required>
                                                    <option value="sell">I want to sell</option>
                                                    <option value="buy">I want to buy</option>
                                                    <option value="rent">I want to rent</option>
                                                    <option value="hire">I want to hire</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="title">Title</label>
                                             <input id="title" type="text" name="title" class="validate form-control" required>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="description">Description</label>
                                             <textarea name="description" class="form-control" required></textarea>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="amount">Sales Price</label>
                                            <input id="sales_price" type="number" name="sales_price" min="0" class="validate form-control" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="amount">Regular Price</label>
                                            <input id="regular_price" type="number" name="regular_price" min="0" class="validate form-control" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="amount">Phone numbers</label>
                                            <input id="contact" type="number" name="contact" min="0" class="validate form-control" required>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="title">Product status</label>
                                                <select name="status" required>
                                                    <option value="new">New</option>
                                                    <option value="used">Used</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><br>  

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="field">
                                                    <input type="file"  name="featured" />
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>   

                                    <!-- <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="field">
                                                    <input type="file"  name="image2"/>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="field">
                                                    <input type="file" name="image3"  />
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="field">
                                                    <input type="file"  name="image4"  />
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="field">
                                                    <input type="file"  name="image5" />
                                                </div>
                                            </div>
                                        </div>
                                    </div><br> --> 


                                     <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="field">
                                                    <div id="file" class="dropzone">
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="title">Tags</label>
                                                 <input type="text" value="" data-role="tagsinput" id="tags" name="tags" class="form-control">
                                                 <i>Add <code>"tags for more search references"</code> to your input field..</i>
                                            </div>
                                        </div>
                                    </div><br>  

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="amount">Country</label>
                                            <select name="country_id" id="countryId" required onchange="showState(this.value)">
                                                <option value="" selected>Select Country</option>
                                                @foreach($countries as $countries)
                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="amount">State</label>
                                            <select name="state_id" id="stateId" onchange="showCity(this.value)" required>
                                                
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="amount">City</label>
                                            <select name="city_id" id="cityId"  required >
                                                
                                            </select>
                                        </div>
                                    </div><br>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <label for="description">Address</label>
                                             <textarea name="address" class="form-control" required></textarea>
                                        </div>
                                    </div><br>                        
                                                        
                                    <div class="row">
                                        <div class="input-field col s12 v2-mar-top-40"> 
                                            <button class="waves-effect waves-light btn-large full-btn" type="submit">Post Ad</button> 
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--RIGHT SECTION-->
    </div>
</section>
<!--END DASHBOARD-->
<!--MOBILE APP-->
@include('users.partials._padAdvert')
@endsection

@section('scripts')
<script type="text/javascript" src="{{URL::to('/assets/js/tagmanager.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script> -->
<script src="{{URL::to('/assets/js/dropzone.js')}}"></script>
<script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js')}}"></script>
<script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js')}}"></script>
<script>
    
    $('.dropify').dropify();
    
    Dropzone.autoDiscover = false;
    var drop = new Dropzone('#file', {
        createImageThumbnails: true,
        addRemoveLinks: true,
        url: '{{route('upload.store', $advert)}}',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    @foreach($advert->uploads as $upload)
      drop.emit('addedfile', {
          id: '{{ $upload->id }}',
          name: '{{ $upload->filename }}',
          size: '{{ $upload->size }}',
      });
      @endforeach

      // Pull id from Event
      drop.on('success', function(file, response){
        file.id = response.id
      });

      // Event to remove file from front-end
      drop.on('removedfile', function(file){
        $.get('/user/{{ $advert->identifier }}/upload/' + file.id).catch(function(error){
         console.log(error);
        })
      });

    $('$tags').tagsinput({
      maxTags: 10
    });

    function showSubCategory(categoryID) {
        $('#subCategoryId').empty().append('<option value="">--Please select a sub category---</option>');
        //var id = id
        var url = '{{ URL::to("/js/advert-subcategory")}}/' + categoryID;

        console.log(url);
        $.get(url, function (data) {
            console.log(data);
           $.each(data, function (i, data) {
              //alert(data.code);
                $("#subCategoryId").append("<option value='"+data.id+"'>"+data.name+"</option>");
            });
        });
    }

    function showState(stateId) {
        $('#stateId').empty().append('<option value="">--Please select a State---</option>');
        //var id = id;
        var url = '{{ URL::to("/js/states")}}/' + stateId;
        console.log(url);
        $.get(url, function (data) {
            console.log(data);
           $.each(data, function (i, data) {
              //alert(data.code);
                $("#stateId").append("<option value='"+data.id+"'>"+data.name+"</option>");
            });
        });
    }

    function showCity(cityId) {
        $('#cityId').empty().append('<option value="">--Please select a City---</option>');
        //var id = id;
        var url = '{{ URL::to("/js/city")}}/' + cityId;
        console.log(url);
        $.get(url, function (data) {
            console.log(data);
           $.each(data, function (i, data) {
              //alert(data.code);
                $("#cityId").append("<option value='"+data.id+"'>"+data.name+"</option>");
            });
        });
    }

    

</script>
@endsection
