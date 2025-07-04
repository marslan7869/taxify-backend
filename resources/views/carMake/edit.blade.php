@extends('layouts.app')



@section('content')

    <div class="page-wrapper">

         

        <div class="row page-titles">

            <div class="col-md-5 align-self-center">

                <h3 class="text-themecolor">{{trans('lang.edit_car_make')}}</h3>

            </div>



            <div class="col-md-7 align-self-center">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>

                    <li class="breadcrumb-item"><a

                                href="{!! route('carMake') !!}">{{trans('lang.car_make')}}</a></li>

                    <li class="breadcrumb-item active">{{trans('lang.edit_car_make')}}</li>

                </ol>

            </div>



            <div class="card-body">

                <div class="error_top"></div>



                <div class="row vendor_payout_create">

                    <div class="vendor_payout_create-inner">

                        <fieldset>

                            <legend>{{trans('lang.car_make')}}</legend>



                            <div class="form-group row width-100">

                                <label class="col-3 control-label">{{trans('lang.name')}}</label>

                                <div class="col-7">

                                    <input type="text" class="form-control title" id="title">

                                </div>

                            </div>



                            <div class="form-group row width-100">

                                <div class="form-check">

                                    <input type="checkbox" class="car_make_active" id="car_make_active">

                                    <label class="col-3 control-label"

                                           for="car_make_active">{{trans('lang.active')}}</label>



                                </div>





                            </div>



                        </fieldset>

                    </div>

                </div>

            </div>



            <div class="form-group col-12 text-center btm-btn">

                <button type="button" class="btn btn-primary  edit-setting-btn"><i

                            class="fa fa-save"></i> {{ trans('lang.save')}}</button>

                <a href="{!! url('carMake') !!}" class="btn btn-default"><i

                            class="fa fa-undo"></i>{{ trans('lang.cancel')}}</a>

            </div>



        </div>



    </div>



@endsection



@section('scripts')



<script type="text/javascript">



var database = firebase.firestore();

var id = "<?php echo $id; ?>";

var ref = database.collection('car_make').where('id', '==', id);





$(document).ready(function () {

    jQuery("#data-table_processing").show();

    ref.get().then(async function (snapshots) {

        var carMake = snapshots.docs[0].data();



        $('.title').val(carMake.name);

        if (carMake.isActive == true) {

            $(".car_make_active").prop('checked', true);

        }



        jQuery("#data-table_processing").hide();

    });

});

$(".edit-setting-btn").click(function () {



    var title = $("#title").val();

    var active = $(".car_make_active").is(":checked");





    if (title == '') {

        $(".error_top").show();

        $(".error_top").html("");

        $(".error_top").append("<p>{{trans('lang.name_error')}}</p>");

        window.scrollTo(0, 0);



    } else {



        jQuery("#data-table_processing").show();

        database.collection('car_make').doc(id).update({

            'id': id,

            'name': title,

            'isActive': active

        }).then(function (result) {

            jQuery("#data-table_processing").hide();

            window.location.href = '{{ route("carMake") }}';

        });

    }



})



</script>



@endsection