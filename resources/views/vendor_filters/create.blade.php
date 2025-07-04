@extends('layouts.app')

@section('content')
<div class="page-wrapper">
  <div class="row page-titles">

    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">{{trans('lang.vendor_filter')}}</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/vendorFilters')}}">{{trans('lang.vendor_filter')}}</a>
        </li>
        <li class="breadcrumb-item">{{trans('lang.vendor_filter_create')}}</li>
      </ol>
    </div>
  </div>

  <div class="card-body">

    <div class="row vendor_payout_create">

      <div class="vendor_payout_create-inner">

        <fieldset>
          <legend>{{trans('lang.vendor_filter_create')}}</legend>
          <div class="form-group row width-100">
            <label class="col-3 control-label">{{ trans('lang.vendor_filter_name')}}</label>
            <div class="col-7">
              <input type="text" class="form-control filter_name">
            </div>
          </div>

          <div class="form-group row width-100">
            <label class="col-3 control-label">{{ trans('lang.add_new_option')}}</label>
            <div class="col-7">
              <input type="text" class="form-control add_option_name">&nbsp;&nbsp;
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-primary add_option_btn">{{ trans('lang.add_option')}}</button>
            </div>
          </div>

          <div class="form-group row width-100">
            <label class="col-3 control-label">{{trans('lang.vendor_filter_options')}}</label>
            <div class="filter_options col-7">

            </div>
          </div>

        </fieldset>
      </div>

    </div>

    <div class="form-group col-12 text-center btm-btn">
      <button type="button" class="btn btn-primary save_coupon_btn"><i class="fa fa-save"></i> {{
        trans('lang.save')}}</button>
      <a href="{!! route('vendorFilters') !!}" class="btn btn-default"><i class="fa fa-undo"></i>{{
        trans('lang.cancel')}}</a>
    </div>

  </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">

  var database = firebase.firestore();
  var ref = database.collection('vendor_filters');
  $(document).ready(function () {
    var id = "<?php echo uniqid(); ?>";

    $(".save_coupon_btn").click(function () {

      var filterName = $(".filter_name").val();
      var RButtons = [];
      $("input:checkbox[name=action]:checked").each(function () {
        RButtons.push($(this).val());
      });
      if (filterName != '' && RButtons.length) {
        database.collection("vendor_filters").doc(id).set({ 'name': filterName, 'options': RButtons, 'id': id }).then(function (result) {

          window.location.href = '{{ route("vendorFilters") }}';
        })
      } else {
        alert("Filter name or filter options should not be blank");
      }


    })

    $(".add_option_btn").click(function () {
      var optionname = $(".add_option_name").val();
      if (optionname != '') {
        $(".filter_options").append('<input checked type="checkbox" name="action" id="' + optionname + '" value="' + optionname + '" /><label for="' + optionname + '">' + optionname + '</label><br />');
      }
    })



  });

</script>

@endsection