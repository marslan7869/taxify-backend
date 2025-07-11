@extends('layouts.app')

@section('content')
<div class="page-wrapper">
  <div class="row page-titles">

    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">{{trans('lang.drivers_payout_plural')}}</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/driversPayouts')}}">{{trans('lang.drivers_payout_plural')}}</a>
        </li>
        <li class="breadcrumb-item">{{trans('lang.drivers_payout_create')}}</li>
      </ol>
    </div>
  </div>

  <div class="card-body">
   
    <div class="error_top"></div>
    <div class="row vendor_payout_create">
      <div class="vendor_payout_create-inner">
        <fieldset>
          <legend>{{trans('lang.drivers_payout_create')}}</legend>

          <div class="form-group row width-50">
            <label class="col-4 control-label">{{ trans('lang.drivers_payout_driver_id')}}</label>
            <div class="col-7">
              <select id="select_vendor" class="form-control">
                <option value="">{{ trans('lang.select_driver') }}</option>
              </select>
              <div class="form-text text-muted">
                {{ trans("lang.drivers_payout_driver_id_help") }}
              </div>
            </div>
          </div>

          <div class="form-group row width-50">
            <label class="col-4 control-label">{{trans('lang.drivers_payout_amount')}}</label>
            <div class="col-7">
              <input type="number" class="form-control payout_amount">
              <div class="form-text text-muted">
                {{ trans("lang.drivers_payout_amount_placeholder") }}
              </div>
            </div>
          </div>

          <div class="form-group row width-100">
            <label class="col-2 control-label">{{ trans('lang.vendors_payout_note')}}</label>
            <div class="col-12">
              <textarea type="text" rows="7" class="form-control form-control payout_note"></textarea>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>

  <div class="form-group col-12 text-center btm-btn">
    <button type="button" class="btn btn-primary save_vendor_payout_btn"><i class="fa fa-save"></i>
      {{trans('lang.save')}}</button>
    <a href="{!! route('driversPayouts') !!}" class="btn btn-default"><i
        class="fa fa-undo"></i>{{trans('lang.cancel')}}</a>
  </div>

</div>
</div>


@endsection

@section('scripts')

<script>
  var database = firebase.firestore();

  async function remainingPrice(driverID) {
    var paid_price = 0;
    var total_price = 0;
    var remaining = 0;
    await database.collection('driver_payouts').where('driverID', '==', driverID).get().then(async function (payoutSnapshots) {
      payoutSnapshots.docs.forEach((payout) => {
        var payoutData = payout.data();
        paid_price = parseFloat(paid_price) + parseFloat(payoutData.amount);
      })

      await database.collection('vendor_orders').where('driverID', '==', driverID).where("status", "in", ["Order Completed"]).get().then(async function (orderSnapshots) {

        orderSnapshots.docs.forEach((order) => {
          var orderData = order.data();

          if (orderData.deliveryCharge != undefined && orderData.tip_amount != undefined) {
            var orderDataTotal = parseInt(orderData.deliveryCharge) + parseInt(orderData.tip_amount);
            total_price = total_price + orderDataTotal;
          } else if (orderData.deliveryCharge != undefined) {
            var orderDataTotal = parseInt(orderData.deliveryCharge);
            total_price = total_price + orderDataTotal;
          } else if (orderData.tip_amount != undefined) {
            var orderDataTotal = parseInt(orderData.tip_amount);
            total_price = total_price + orderDataTotal;
          }

        })

        remaining = total_price - paid_price;

      });
    });
    return remaining;
  }

  $(document).ready(function () {
    $("#data-table_processing").show();
    database.collection('users').where('role', '==', 'driver').get().then(async function (snapshots) {

      snapshots.docs.forEach((listval) => {
        var data = listval.data();
        $('#select_vendor').append($("<option></option>")
          .attr("value", data.id)
          .text(data.firstName + ' ' + data.lastName));
      })

    });
    $("#data-table_processing").hide();

    var payoutId = "<?php echo uniqid(); ?>";
    $(".save_vendor_payout_btn").click(async function () {
      var driverID = $("#select_vendor").val();
      var remaining = await remainingPrice(driverID);

      if (remaining > 0) {
        var amount = parseFloat($(".payout_amount").val());
        var note = $(".payout_note").val();
        var date = new Date(Date.now());
        if (driverID != '' && $(".payout_amount").val() != '') {
          database.collection('driver_payouts').doc(payoutId).set({ 'driverID': driverID, 'amount': amount, 'note': note, 'id': payoutId, 'paidDate': date }).then(function () {

            window.location.href = "{{ route('driversPayouts') }}";
          })
        } else {
          $(".error_top").show();
          $(".error_top").html("");
          $(".error_top").append("<p>{{trans('lang.please_enter_details')}}</p>");
        }
      } else {
        $(".error_top").show();
        $(".error_top").html("");
        $(".error_top").append("<p>{{trans('lang.driver_insufficient_payment_error')}}</p>");
      }

    })

  });

</script>

@endsection