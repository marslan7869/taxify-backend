@extends('layouts.app')



@section('content')

    <div class="page-wrapper">

        <div class="row page-titles">

            <div class="col-md-5 align-self-center">

                <h3 class="text-themecolor">{{trans('lang.footer_template')}}</h3>

            </div>



            <div class="col-md-7 align-self-center">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>

                    <li class="breadcrumb-item active">{{trans('lang.footer_template')}}</li>

                </ol>

            </div>

            <div>





            </div>



        </div>



        <div class="card-body">

            <div class="error_top"></div>



            <div class="row vendor_payout_create">

                <div class="vendor_payout_create-inner">

                    <fieldset>

                        <legend>{{trans('lang.footer_template')}}</legend>



                        <div class="form-group width-100">

                            <textarea class="form-control col-7" name="footerTemplate" id="footerTemplate"></textarea>

                        </div>





                    </fieldset>



                </div>

            </div>

        </div>



        <div class="form-group col-12 text-center btm-btn">

            <button type="button" class="btn btn-primary  edit-setting-btn"><i

                        class="fa fa-save"></i> {{ trans('lang.save')}}</button>

            <a href="{!! route('users') !!}" class="btn btn-default"><i class="fa fa-undo"></i>{{ trans('lang.cancel')}}

            </a>

        </div>



    </div>



@endsection



@section('scripts')



<script type="text/javascript">



var database = firebase.firestore();

var photo = "";

var ref = database.collection('settings').doc('footerTemplate');

$(document).ready(function () {

    try {

        jQuery("#data-table_processing").show();

        ref.get().then(async function (snapshots) {

            var footerTemplateData = snapshots.data();



            if (footerTemplateData == undefined) {

                database.collection('settings').doc('footerTemplate').set({"footerTemplate": ""});

            }

            if (footerTemplateData.footerTemplate != undefined) {

                $('#footerTemplate').summernote("code", footerTemplateData.footerTemplate);

            }
            jQuery("#data-table_processing").hide();

        });

    } catch (error) {

        jQuery("#data-table_processing").hide();

    }



 



    $('#footerTemplate').summernote({

        height: 400,

        width: 1024,

        toolbar: [

            ['style', ['bold', 'italic', 'underline', 'clear']],

            ['font', ['strikethrough', 'superscript', 'subscript']],

            ['fontsize', ['fontsize']],

            ['color', ['color']],

            ['forecolor', ['forecolor']],

            ['backcolor', ['backcolor']],

            ['para', ['ul', 'ol', 'paragraph']],

            ['height', ['height']],

            ['view', ['fullscreen', 'codeview', 'help']],

        ]

    });

    $(".edit-setting-btn").click(function () { 



        var footerTemplate = $('#footerTemplate').summernote('code');



        if (footerTemplate == '') {

            $(".error_top").show();

            $(".error_top").html("");

            $(".error_top").append("<p>{{trans('lang.footer_template_error')}}</p>");

            window.scrollTo(0, 0);



        } else {



            database.collection('settings').doc('footerTemplate').update({'footerTemplate': footerTemplate}).then(function (result) {

                window.location.href = '{{ route("footerTemplate")}}';

            })



        }

    })

});



</script>



@endsection