@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">{{trans('lang.send_notification')}}</h3>
            </div>

            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('notification') }}">{{trans('lang.send_notification')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('lang.notification')}}</li>
                </ol>
            </div>

        </div>
        <div>

            <div class="card-body">

                <div class="error_top text-danger font-weight-bold" style="display:none"></div>

                <div class="success_top text-success font-weight-bold" style="display:none"></div>

                <div class="row vendor_payout_create">

                    <div class="vendor_payout_create-inner">

                        <fieldset>
                            <legend>{{trans('lang.notification')}}</legend>


                            <div class="form-group row width-100">
                                <label class="col-3 control-label">{{trans('lang.notification_subject')}}</label>
                                <div class="col-7">
                                    <input type="text" class="form-control" id="subject">
                                </div>
                            </div>

                            <div class="form-group row width-100">
                                <label class="col-3 control-label">{{trans('lang.notification_message')}}</label>
                                <div class="col-7">
                                    <textarea class="form-control" id="message"></textarea>
                                </div>
                            </div>

                            <div class="form-group row width-100">
                                <label class="col-3 control-label">{{trans('lang.notification_send_to')}}</label>
                                <div class="col-7">
                                    <select id='role' class="form-control">
                                        <option value="vendor">{{trans('lang.vendor')}}</option>
                                        <option value="customer">{{trans('lang.customer')}}</option>
                                        <option value="driver">{{trans('lang.driver')}}</option>
                                        <option value="provider">{{trans('lang.provider')}}</option>
                                        <option value="worker">{{trans('lang.worker')}}</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </div>

            </div>
            <div class="form-group col-12 text-center btm-btn">
                <button type="button" class="btn btn-primary save-form-btn"><i
                            class="fa fa-save"></i> {{ trans('lang.send')}}</button>
                <a href="{{url('/notification')}}" class="btn btn-default"><i
                            class="fa fa-undo"></i>{{ trans('lang.cancel')}}</a>
            </div>

        </div>

@endsection

@section('scripts')

<script type="text/javascript">

var id = "<?php echo $id;?>";
var database = firebase.firestore();
var ref = database.collection('notifications').where("id", "==", id);
var users = database.collection('users').where("fcmToken", "!=", "");
var pagesize = 20;
var start = '';
var ref_sections = database.collection('sections');
var sections_list = [];

$(document).ready(function () {

    jQuery("#data-table_processing").show();

    ref_sections.get().then(async function (snapshots) {
        snapshots.docs.forEach((listval) => {
            var data = listval.data();
            sections_list.push(data);
            $('#section_id').append($("<option></option>")
             .attr("value", data.id)
             .text(data.name));
        })
    })

    ref.get().then(async function (snapshots) {
        if (snapshots.docs.length) {
            var np = snapshots.docs[0].data();
            $("#message").val(np.message);
            $("#role").val(np.role);
        }
        jQuery("#data-table_processing").hide();
    });

    $(".save-form-btn").click(async function () {

        $(".success_top").hide();
        $(".error_top").hide();
        
        var message = $("#message").val();
        var subject = $("#subject").val();
        var role = $("#role").val();

        if (subject == "") {

            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.please_enter_subject')}}</p>");
            window.scrollTo(0, 0);
            return false;

        } else if (message == "") {

            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.please_enter_message')}}</p>");
            window.scrollTo(0, 0);
            return false;

        }else{

            jQuery("#data-table_processing").show();
        
            $.ajax({
                method: 'POST',
                dataType: "json",
                url: '<?php echo route('broadcastnotification'); ?>',
                data: {
                    'subject': subject,
                    'message': message,
                    'role': role,
                    '_token': '<?php echo csrf_token() ?>'
                },
                success:function(response) {
                    
                    jQuery("#data-table_processing").hide();

                    if(response.success == true){
                        var id = database.collection("tmp").doc().id;
                        database.collection('notifications').doc(id).set({
                            id: id,
                            message: message,
                            subject: subject,
                            role: role,
                            createdAt: firebase.firestore.FieldValue.serverTimestamp()
                        });
                        $(".success_top").show();
                        $(".success_top").html("");
                        $(".success_top").append("<p>"+response.message+"</p>");    
                        window.scrollTo(0, 0);
                        setTimeout(function(){
                            window.location.href = '{{ route("notification")}}';
                        },3000);
                    }else{
                        $(".error_top").show();
                        $(".error_top").html("");
                        $(".error_top").append("<p>"+response.message+"</p>");
                        window.scrollTo(0, 0);
                    }
                }
            });
        }
    });
});

</script>

@endsection