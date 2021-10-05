@extends('layouts.master')

@section('title') Matrimonial Add @endsection
@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}"> --}}
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
<link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet"
    type="text/css">
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css">
<!-- Summernote css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}">


<link rel="stylesheet" type="text/css"
   href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css">
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}" type="text/css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@endsection
<style>
    .newboxmedia img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    object-position: top;
}
    </style>
@section('content')
@component('common-components.breadcrumb')
@slot('title') Add Matrimonial @endslot
{{-- @slot('li_1') <a href="{{ route('jobopeninglist') }}" class=''> Question Paper </a> @endslot --}}
@slot('li_1') <a href="" class=''> Matrimonial </a> @endslot

@slot('li_2') Add @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card mb-2">
            <div class="card-body">
            <div class="col-xl-12">
                    <div class="">
                        <div class="mat_detail">

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Matrimonial Detail</h4>
                                    <p class="card-title-desc">{{$row['full_name']}}</p>
                                </div>
                                <div class="col-md-6 align-self-center text-right">
                                    <p class="card-title-desc"><span class="mat_detail_ac_status">
                                        <?php
                                          if($row['private']=='Yes')
                                          {
                                              echo "Private";
                                          }
                                          else {
                                             echo  "Public";
                                          }

                                        ?>

                                    </span></p>
                                </div>
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#basic1" role="tab">
                                    <span class="d-block d-sm-none">  Basic </span>
                                        <span class="d-none d-sm-block">Basic</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#desired1" role="tab">
                                    <span class="d-block d-sm-none"> Desired </span>
                                        <span class="d-none d-sm-block">Desired</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#media1" role="tab">
                                        <span class="d-block d-sm-none"> Media </span>
                                        <span class="d-none d-sm-block">Media</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#education1" role="tab">
                                        <span class="d-block d-sm-none"> Education </span>
                                        <span class="d-none d-sm-block"> Education </span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tab_border_mat p-3 text-muted">
                                <div class="tab-pane active" id="basic1" role="tabpanel">

                                    <div class="row my-3">
                                        <div class="col-md-12">
                                            <h4 class="card-title">  Basic Details</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Full Name</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['full_name']}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> City</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['city']}}</div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Country </div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$countryData[0]['country_name']}}</div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Height</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['height']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Birth Date</div>
                                                </div>
                                                <div class="col-6">
                                                {{-- <div class="mat_desc">{{$row['birth_date']}}</div> --}}
                                                <div class="mat_desc">
                                                    <?php
                                                    if($row['birth_date']=='0000-00-00'){
                                                        echo "N/A";
                                                    }
                                                    else{
                                                        echo $row['birth_date'];
                                                    }
                                                    ?>
                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Age</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['age']}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Caste</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['caste']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Subcaste</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['subcaste']}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Designation</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['designation']}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Other</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['other']}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Annual Income</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['annual_income']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Married</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['married']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Address </div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['address']}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> About</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['about']}}</div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>




                                </div>
                                <div class="tab-pane" id="desired1" role="tabpanel">
                                    <div class="row my-3">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Desire Details</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Desired Religion </div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['desired_religion']}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Desired Mother Tongue</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['desired_mother_tongue']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Desired Age</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['desired_age']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Desired Height</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['desired_height']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Desired Annual Income</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['desired_annual_income']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Desired Country</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$countryData[0]['desired_country_name']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-6">
                                                   <div class="mat_detail_title"> Desired Marital Status</div>
                                                </div>
                                                <div class="col-6">
                                                <div class="mat_desc">{{$row['desired_marital_status']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> <!--  desired1 -->




                                <div class="tab-pane" id="media1" role="tabpanel">
                                <div class="row my-3">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Media Details</h4>
                                        </div>
                                    </div>
                                    @php
                                    if (isset($row['media_json']) && !empty($row['media_json'])) {
                                        $attachmentArray = json_decode($row['media_json'], true);
                                    } else {
                                        $attachmentArray = [];
                                    }

                                    $q = 1;
                                    @endphp


                                       <div class="row">
                                        @if (count($attachmentArray) > 0)
                                        @for ($k = 0; $k < count($attachmentArray); $k++)
                                                <div class="col-md-3 col-sm-6 mb-3 img-fluid newboxmedia">
                                                   <div><img  src="{{ URL::asset('images/matrimonial_image/'.$attachmentArray[$k])}}" class="mat_media_border img-fluid" alt=""/ width="250" height="250"> </div>
                                                </div>
                                        @endfor
                                        @endif
                                        </div>

                                </div>

                                <!-- media1 -->



                                <div class="tab-pane" id="education1" role="tabpanel">
                                    <div class="row my-3">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Education Details</h4>
                                            </div>
                                    </div>
                                    @php
                                    if (isset($row['education_json']) && !empty($row['education_json'])) {
                                        $attachmentArray = json_decode($row['education_json'], true);

                                    } else {
                                        $attachmentArray = [];
                                    }
                                    $q = 1;
                                @endphp
                                   @if (count($attachmentArray) > 0)
                                   @for ($k = 0; $k < count($attachmentArray); $k++)
                                    <div class="row pb-3 edu_detail_mat_row">
                                        <div class="col-md-12 edu_detail_mat_col">
                                            <div class="mat_edu_detail_title pb-2">{{ $attachmentArray[$k]['title'] }}</div>
                                            <div>
                                                {{ $attachmentArray[$k]['description'] }}
                                            </div>
                                        </div>
                                    </div>

                                    @endfor
                                    @endif
                                </div>
                                <!-- education1 -->


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>

<!-- form mask -->
<script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js')}}"></script>

<!-- form mask init -->
<script src="{{ URL::asset('assets/js/pages/form-repeater.int.js')}}"></script>
<script src="{{ URL::asset('assets/libs/datepicker/datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="https://themesbrand.com/skote/layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>





<script>
$( document ).ready(function()
{
    // $('input#title').maxlength({
    //     warningClass: "badge bg-info",
    //     limitReachedClass: "badge bg-warning"
    // });
    // $('textarea#short_description').maxlength({
    //     warningClass: "badge bg-info",
    //     limitReachedClass: "badge bg-warning"
    // });
    // $('input[name*="attached_notes"]').maxlength({
    //     warningClass: "badge bg-info",
    //     limitReachedClass: "badge bg-warning"
    // });
    // $('input[name*="minimum_experience"]').maxlength({
    //     warningClass: "badge bg-info",
    //     limitReachedClass: "badge bg-warning"
    // });
    // $('input[name*="pay_range"]').maxlength({
    //     warningClass: "badge bg-info",
    //     limitReachedClass: "badge bg-warning"
    // });
});

function readURL(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $(input).parent().find('.small-pic').children().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change','.media_file',function(){
        readURL(this);
    });

    function agefinddata()
    {
        var mdate = $("#birth_date").val().toString();
        console.log(mdate);

        var yearThen = parseInt(mdate.substring(0,4), 10);
        var monthThen = parseInt(mdate.substring(5,7), 10);
        var dayThen = parseInt(mdate.substring(8,10), 10);

        console.log('yearThen ::: '+yearThen);
        console.log('monthThen ::: '+monthThen);
        console.log('dayThen ::: '+dayThen);

        var today = new Date();
        var birthday = new Date(yearThen, monthThen-1, dayThen);

        var differenceInMilisecond = today.valueOf() - birthday.valueOf();

        var year_age = Math.floor(differenceInMilisecond / 31536000000);
        var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);

        if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
            alert("Happy B'day!!!");
        }

        var month_age = Math.floor(day_age/30);

        day_age = day_age % 30;
        console.log('year_age :::: '+year_age);

        if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
            $("#age").text("Invalid birthday - Please try again!");
        }
        else
        {
            console.log('year_age :::: '+year_age);
            console.log('month_age :::: '+month_age);
            console.log('day_age :::: '+day_age);

            $("#age").html("You are<br/><span id=\"age\">" + year_age + " years " + month_age + " months " + day_age + " days</span> old");
        }

    }





</script>
@endsection
