@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="row page-titles">

        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('lang.rental_plural')}} {{trans('lang.order_plural')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('/rental_orders')}}">{{trans('lang.rental_plural')}}
                        {{trans('lang.order_plural')}}</a>
                </li>
                <li class="breadcrumb-item">{{trans('lang.order_edit')}}</li>
            </ol>
        </div>
    </div>

    <div class="card-body">
        <?php if (in_array('rental-orders.print', json_decode(@session('user_permissions')))) { ?>

        <div class="text-right print-btn">
            <button type="button" class="fa fa-print" onclick="PrintElem('order_detail')"></button>
        </div>
        <?php } ?>

        <div class="row vendor_payout_create" style="max-width:100%;" role="tabpanel">

            <div class="vendor_payout_create-inner tab-content">

                <div role="tabpanel" class="tab-pane active">
                    <div class="order_detail printableArea" id="order_detail">
                        <div class="order_detail-top">
                            <div class="row">
                                <div class="order_edit-genrl col-md-7">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-header-title">{{trans('lang.general_details')}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="order_detail-top-box">

                                                <div class="form-group row widt-100 gendetail-col">
                                                    <label class="col-12 control-label"><strong>{{trans('lang.date_created')}}
                                                            : </strong><span id="createdAt"></span></label>

                                                </div>

                                                <div class="form-group row widt-100 gendetail-col payment_method">
                                                    <label class="col-12 control-label"><strong>{{trans('lang.payment_methods')}}
                                                            : </strong><span id="payment_method"></span></label>

                                                </div>
                                                <div id="statusDiv">
                                                    <div class="form-group row width-100 ">
                                                        <label class="col-3 control-label">{{trans('lang.status')}}:</label>
                                                        <div class="col-7">
                                                            <select id="order_status" class="form-control">
                                                                <option value="Order Placed" id="order_placed">{{ trans('lang.order_placed')}}
                                                                </option>
                                                                <option value="Order Accepted" id="order_accepted">{{
                                                                    trans('lang.order_accepted')}}
                                                                </option>
                                                                <option value="Order Rejected" id="order_rejected">{{
                                                                    trans('lang.order_rejected')}}
                                                                </option>
                                                                <option value="Driver Pending" id="driver_pending">{{
                                                                    trans('lang.driver_pending')}}
                                                                </option>
                                                                <option value="Driver Rejected" id="driver_rejected">{{
                                                                    trans('lang.driver_rejected')}}
                                                                </option>
                                                                <option value="Order Shipped" id="order_shipped">{{ trans('lang.order_shipped')}}
                                                                </option>
                                                                <option value="In Transit" id="in_transit">{{ trans('lang.in_transit')}}
                                                                </option>
                                                                <option value="Order Completed" id="order_completed">{{
                                                                    trans('lang.order_completed')}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row width-100">
                                                        <label class="col-3 control-label"></label>
                                                        <div class="col-7 text-right">
                                                            <button type="button" class="btn btn-primary edit-form-btn"><i class="fa fa-save"></i> {{trans('lang.update')}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="order-data-row order-totals-items mt-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="order-totals">

                                                    <tbody id="order_products_total">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="order_addre-edit col-md-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-header-title">{{ trans('lang.pick_up_details')}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="address order_detail-top-box">


                                                <p>
                                                    <strong>{{trans('lang.date')}}:</strong>
                                                    <span id="pickUpTime"></span><br>
                                                </p>

                                                <p><strong>{{trans('lang.address')}}:</strong>
                                                    <span id="pickUpAddress"></span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h4 class="card-header-title">{{ trans('lang.drop_off_details')}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="address order_detail-top-box">
                                                <p>
                                                    <strong>{{trans('lang.date')}}:</strong>
                                                    <span id="dropOffTime"></span><br>
                                                </p>
                                                <p><strong>{{trans('lang.address')}}:</strong>
                                                    <span id="dropOffAddress"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="order-deta-btm-right mt-4">

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-header-title">{{ trans('lang.user_details')}}</h4>
                                            </div>

                                            <div class="card-body">
                                                <div class="address order_detail-top-box">
                                                    <p>
                                                        <strong>{{trans('lang.name')}}:</strong><span id="user_firstName"></span>
                                                        <span id="user_lastName"></span><br>
                                                    </p>
                                                    <p><strong>{{trans('lang.email_address')}}:</strong>
                                                        <span id="user_email"></span>
                                                    </p>
                                                    <p><strong>{{trans('lang.phone')}}:</strong>
                                                        <span id="user_phone"></span>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_detail-review col-md-12 mt-4 non-printable">
                                        <div class="row">
                                            <div class="rental-review col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-header-title">{{trans('lang.customer_reviews')}}</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="review-inner">
                                                            <div id="customers_rating_and_review">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                            </div>

                        </div>


                        <div class="order-deta-btm mt-4">
                            <div class="row">


                                <div class="col-md-4 order-deta-btm-right driver_details_hide">


                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>


    <div class="form-group col-12 text-center btm-btn">
        <button type="button" class="btn btn-primary edit-form-btn d-none"><i class="fa fa-save"></i> {{trans('lang.save')}}
        </button>
        <a href="{!! route('rental_orders') !!}" class="btn btn-default"><i class="fa fa-undo"></i>{{trans('lang.cancel')}}
        </a>
    </div>

</div>
@endsection

@section('style')

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>

<script type="text/javascript">
    var id_rendom = "<?php echo uniqid(); ?>";
    var adminCommission = 0;
    var id = "<?php echo $id; ?>";
    var fcmToken = '';
    var old_order_status = '';
    var payment_shared = false;
    var vendorname = '';
    var vendorId = '';
    var driverId = '';
    var deliveryChargeVal = 0;
    var tip_amount_val = 0;
    var tip_amount = 0;
    var total_price_val = 0;
    var adminCommission_val = 0;
    var database = firebase.firestore();
    var ref = database.collection('rental_orders').where("id", "==", id);
    var append_procucts_list = '';
    var append_procucts_total = '';
    var total_price = 0;
    var currentCurrency = '';
    var currencyAtRight = false;
    var refCurrency = database.collection('currencies').where('isActive', '==', true);
    var orderPreviousStatus = '';
    var orderPaymentMethod = '';
    var orderCustomerId = '';
    var orderPaytableAmount = 0;
    var orderTakeAwayOption = false;
    var manfcmTokenVendor = '';
    var manname = '';
    var decimal_degits = 0;
    var page_size = 5;
    var refUserReview = database.collection('items_review').where('orderid', '==', id);

    refCurrency.get().then(async function(snapshots) {
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;

        if (currencyData.decimal_degits) {
            decimal_degits = currencyData.decimal_degits;
        }
    });
    var user_permissions = '<?php echo @session('user_permissions') ?>';

    user_permissions = JSON.parse(user_permissions);

    var checkPrintPermission = false;

    if ($.inArray('rental-orders.print', user_permissions) >= 0) {
        checkPrintPermission = true;
    }

    var geoFirestore = new GeoFirestore(database);
    var place_image = '';
    var ref_place = database.collection('settings').doc("placeHolderImage");
    ref_place.get().then(async function(snapshots) {
        var placeHolderImage = snapshots.data();
        place_image = placeHolderImage.image;
    });


    $(document).ready(function() {

        //hide this status for admin
        $('#order_placed').hide();
        $('#driver_pending').hide();
        $('#driver_rejected').hide();
        $('#order_shipped').hide();
        $('#in_transit').hide();
        $('#order_completed').hide();

        var alovelaceDocumentRef = database.collection('vendor_orders').doc();
        if (alovelaceDocumentRef.id) {
            id_rendom = alovelaceDocumentRef.id;
        }

        $(document.body).on('click', '.redirecttopage', function() {
            var url = $(this).attr('data-url');
            window.location.href = url;
        });

        jQuery("#data-table_processing").show();

        ref.get().then(async function(snapshots) {
            var order = snapshots.docs[0].data();
            getUserReview(order);

            append_procucts_total = document.getElementById('order_products_total');
            append_procucts_total.innerHTML = '';


            if (order.pickupDateTime) {
                var date1 = order.pickupDateTime.toDate().toDateString();
                var date = new Date(date1);
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = date.getFullYear();
                var pickUpTimeVal = yyyy + '-' + mm + '-' + dd;
                var time = order.pickupDateTime.toDate().toLocaleTimeString('en-US');

                $('#pickUpTime').text(pickUpTimeVal + ' ' + time);
            }


            if (order.dropDateTime) {
                var date1 = order.dropDateTime.toDate().toDateString();
                var date = new Date(date1);
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = date.getFullYear();
                var dropDateTimeVal = yyyy + '-' + mm + '-' + dd;
                var time = order.dropDateTime.toDate().toLocaleTimeString('en-US');

                $('#dropOffTime').text(dropDateTimeVal + ' ' + time);
            }

            $("#dropOffAddress").text(order.dropAddress);
            $("#pickUpAddress").text(order.pickupAddress);

            if (order.createdAt) {
                var date1 = order.createdAt.toDate().toDateString();
                var date = new Date(date1);
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = date.getFullYear();
                var createdAt_val = yyyy + '-' + mm + '-' + dd;
                var time = order.createdAt.toDate().toLocaleTimeString('en-US');

                $('#createdAt').text(createdAt_val + ' ' + time);
            }

            var payment_method = '';
            if (order.payment_method) {

                if (order.payment_method == "stripe") {
                    image = '{{asset("images/payment/stripe.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "xendit") {
                        image = '{{asset("images/payment/xendit.png")}}';
                        payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'"  width="30%" height="30%">';

                    } else if (order.payment_method == "midtrans") {
                        image = '{{asset("images/payment/midtrans.png")}}';
                        payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                    } else if (order.payment_method == "orangepay") {
                        image = '{{asset("images/payment/orangepay.png")}}';
                        payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                    } else if (order.payment_method == "cod") {
                    image = '{{asset("images/payment/cashondelivery.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "razorpay") {
                    image = '{{asset("images/payment/razorepay.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "paypal") {
                    image = '{{asset("images/payment/paypal.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "payfast") {
                    image = '{{asset("images/payfast.png")}}';
                    payment_method = '<img alt="image" src="' + image + '"onerror="this.onerror=null;this.src=\'' + place_image + '\'"  width="30%" height="30%">';

                } else if (order.payment_method == "paystack") {
                    image = '{{asset("images/payment/paystack.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "flutterwave") {
                    image = '{{asset("images/payment/flutter_wave.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "mercadoPago" || order.payment_method == "mercado pago" || order.payment_method == "mercadopago") {
                    image = '{{asset("images/payment/marcado_pago.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "wallet") {
                    image = '{{asset("images/payment/emart_wallet.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%" >';

                } else if (order.payment_method == "paytm") {
                    image = '{{asset("images/payment/paytm.png")}}';
                    payment_method = '<img alt="image" src="' + image + '"onerror="this.onerror=null;this.src=\'' + place_image + '\'"  width="30%" height="30%">';

                } else if (order.payment_method == "cancelled order payment") {
                    image = '{{asset("images/payment/cancel_order.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';

                } else if (order.payment_method == "refund amount") {
                    image = '{{asset("images/payment/refund_amount.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'"  width="30%" height="30%">';
                } else if (order.payment_method == "referral amount") {
                    image = '{{asset("images/payment/reffral_amount.png")}}';
                    payment_method = '<img alt="image" src="' + image + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" width="30%" height="30%">';
                } else {
                    payment_method = order.payment_method;
                }
            }
            $('#payment_method').html(payment_method);



                $('#user_email').html('<a href="mailto:' + order.author.email + '">' + shortEmail(order.author.email) + '</a>');
                $('#user_firstName').text(order.author.firstName);
                $('#user_lastName').text(order.author.lastName);

                if(order.author.phoneNumber.includes('+')){
                    $('#user_phone').text('+' + EditPhoneNumber(order.author.phoneNumber.slice(1)));
                }else{
                    $('#user_phone').text(EditPhoneNumber(order.author.phoneNumber));
                }

            if (order.driverID != '' && order.driverID != undefined) {
                driverId = order.driverID;
            }

            fcmToken = order.author.fcmToken;

            customername = order.author.firstName;

            old_order_status = order.status;
            if (order.payment_shared != undefined) {
                payment_shared = order.payment_shared;
            }
            var productsListHTML = buildHTMLParcelList(order);
            var productstotalHTML = buildParcelTotal(order);

            if (productstotalHTML != '') {
                append_procucts_total.innerHTML = productstotalHTML;
            }


            orderPreviousStatus = order.status;
            if (order.hasOwnProperty('payment_method')) {
                orderPaymentMethod = order.payment_method;
            }

            $("#order_status option[value='" + order.status + "']").attr("selected", "selected");
            if (order.status == "Order Rejected" || order.status == "Driver Rejected") {
                $("#order_status").prop("disabled", true);
            }
            var price = 0;

            jQuery("#data-table_processing").hide();
        })

        $(".edit-form-btn").click(async function() {

            var orderStatus = $("#order_status").val();
            if (old_order_status != orderStatus) {

                database.collection('rental_orders').doc(id).update({
                    'status': orderStatus
                }).then(async function(result) {
                    if (orderStatus != orderPreviousStatus && payment_shared == false) {
                        if (orderStatus == 'Order Completed') {

                            await database.collection('rental_orders').doc(id).update({
                                'payment_shared': true
                            }).then(async function(result) {
                                window.location.href = '{{ route("rental_orders")}}';
                            });
                        } else {
                            window.location.href = '{{ route("rental_orders")}}';
                        }

                    } else {
                        window.location.href = '{{ route("rental_orders")}}';
                    }
                });
            } else {
                window.location.href = '{{ route("rental_orders")}}';

            }
        })

    });


    function buildHTMLParcelList(snapshotsParcel) {
        var html = '';
        var alldata = [];
        var number = [];
        var totalProductPrice = 0;


        html = html + '<tr>';

        var extra_html = '';

        html = html + '<td class="order-product"><div class="order-product-box">';

        var pickupDateTime = snapshotsParcel.pickupDateTime.toDate().toDateString();
        pickupDateTime = new Date(pickupDateTime);

        var dropDateTime = snapshotsParcel.dropDateTime.toDate().toDateString();
        dropDateTime = new Date(dropDateTime);

        var time_difference = dropDateTime.getTime() - pickupDateTime.getTime();
        var totalDays = time_difference / (1000 * 60 * 60 * 24);

        html = html + '</div><div class="orders-tracking"><h6>' + totalDays + '</h6><div class="orders-tracking-item-details">';

        html = html + '</div></div></td>';

        var subTotal = "";
        var rate = 0;
        var carRate = 0;
        var driverRate = 0;

        carRate = snapshotsParcel.subTotal;
        driverRate = snapshotsParcel.driverRate;

        rate = parseFloat(snapshotsParcel.subTotal) + parseFloat(snapshotsParcel.driverRate);

        subTotal = parseFloat(rate) * totalDays;

        if (currencyAtRight) {
            subTotal = parseFloat(subTotal).toFixed(decimal_degits) + "" + currentCurrency;
            rate = parseFloat(rate).toFixed(decimal_degits) + "" + currentCurrency;
            carRate = parseFloat(carRate).toFixed(decimal_degits) + "" + currentCurrency;
            driverRate = parseFloat(driverRate).toFixed(decimal_degits) + "" + currentCurrency;

        } else {
            subTotal = currentCurrency + "" + parseFloat(subTotal).toFixed(decimal_degits);
            rate = currentCurrency + "" + parseFloat(rate).toFixed(decimal_degits);
            carRate = currentCurrency + "" + parseFloat(carRate).toFixed(decimal_degits);
            driverRate = currentCurrency + "" + parseFloat(driverRate).toFixed(decimal_degits);

        }

        html = html + '<td>' + rate + '<br><small>(' + carRate + ' + ' + driverRate + ')</small></td><td>  ' + subTotal + '</td>';

        html = html + '</tr>';

        return html;
    }


    function buildParcelTotal(snapshotsProducts) {

        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

        var adminCommission = snapshotsProducts.adminCommission;
        var adminCommissionType = snapshotsProducts.adminCommissionType;
        var discount = snapshotsProducts.discount;
        var couponCode = snapshotsProducts.couponCode;
        var discountType = snapshotsProducts.discountType;
        var discountLabel = "";
        var subTotal = snapshotsProducts.subTotal;
        var driverRate = snapshotsProducts.driverRate;
        var notes = snapshotsProducts.note;

        if (driverRate == undefined) {
            driverRate = 0;
        }

        if (subTotal == undefined) {
            subTotal = 0;
        }
        var total_price = parseFloat(subTotal) + parseFloat(driverRate);

        var html = "";
        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

        if (currencyAtRight) {
            var sub_total = parseFloat(total_price).toFixed(decimal_degits) + "" + currentCurrency;
        } else {
            var sub_total = currentCurrency + "" + parseFloat(total_price).toFixed(decimal_degits);
        }
        html = html + '<tr><td class="seprater" colspan="2"><hr><span>{{trans("lang.sub_total")}}</span></td></tr>';

        html = html + '<tr class="final-rate"><td class="label">{{trans("lang.sub_total")}}</td><td class="sub_total" style="color:green">(' + sub_total + ')</td></tr>';

        if (intRegex.test(discount) || floatRegex.test(discount)) {
            html = html + '<tr><td class="seprater" colspan="2"><hr><span>{{trans("lang.discount")}}</span></td></tr>';

            discount = parseFloat(discount).toFixed(decimal_degits);
            total_price -= parseFloat(discount);

            if (currencyAtRight) {
                discount_val = parseFloat(discount).toFixed(decimal_degits) + "" + currentCurrency;
            } else {
                discount_val = currentCurrency + "" + parseFloat(discount).toFixed(decimal_degits);
            }

            couponCode_html = '';
            if (couponCode) {
                couponCode_html = '</br><small>{{trans("lang.coupon_codes")}} :' + couponCode + '</small>';
            }
            html = html + '<tr><td class="label">{{trans("lang.discount")}}' + couponCode_html + '</td><td class="discount" style="color:red">(-' + discount_val + ')</td></tr>';
        }

        var specialDiscount_ = 0;
        specialDiscountlabel = '';
        specialDiscounttype = '';
        try {
            if (snapshotsProducts.hasOwnProperty('specialDiscount')) {
                if (snapshotsProducts.specialDiscount.specialType && snapshotsProducts.specialDiscount.special_discount) {
                    if (snapshotsProducts.specialDiscount.specialType == "percent") {
                        specialDiscount_ = snapshotsProducts.specialDiscount.special_discount;
                        specialDiscounttype = "%";
                    } else {
                        specialDiscount_ = snapshotsProducts.specialDiscount.special_discount;
                        specialDiscounttype = "fix";
                    }
                    specialDiscountlabel = snapshotsProducts.specialDiscount.special_discount_label;
                }
            }
        } catch (error) {

        }
        if (!isNaN(specialDiscount_) && specialDiscount_ != 0) {
            if (currencyAtRight) {
                html = html + '<tr><td class="label">{{trans("lang.special_offer")}}</td><td class="deliveryCharge" style="color:red">(-' + specialDiscount_ + '' + currentCurrency + ')(' + snapshotsProducts.specialDiscount.special_discount + ' ' + specialDiscounttype + ')</td></tr>';
            } else {
                html = html + '<tr><td class="label">{{trans("lang.special_offer")}}</td><td class="deliveryCharge" style="color:red">(-' + currentCurrency + specialDiscount_ + ')(' + snapshotsProducts.specialDiscount.special_discount + ' ' + specialDiscounttype + ')</td></tr>';
            }

            total_price = total_price - specialDiscount_;
        }
        var total_item_price = total_price;

        var tax = 0;
        var taxlabel = '';
        var taxlabeltype = '';
        var total_tax_amount = 0;

        var taxHtml = '';

        if (snapshotsProducts.hasOwnProperty('taxSetting') && snapshotsProducts.taxSetting.length > 0) {
            html = html + '<tr><td class="seprater" colspan="2"><hr><span>{{trans("lang.tax_calculation")}}</span></td></tr>';

            var total_tax_amount = 0;
            for (var i = 0; i < snapshotsProducts.taxSetting.length; i++) {
                var data = snapshotsProducts.taxSetting[i];

                if (data.type && data.tax) {
                    if (data.type == "percentage") {
                        tax = (data.tax * total_price) / 100;
                        taxlabeltype = "%";
                        var taxvalue = data.tax;

                    } else {
                        tax = data.tax;
                        taxlabeltype = "";
                        if (currencyAtRight) {
                            var taxvalue = parseFloat(data.tax).toFixed(decimal_degits) + "" + currentCurrency;
                        } else {
                            var taxvalue = currentCurrency + "" + parseFloat(data.tax).toFixed(decimal_degits);

                        }

                    }
                    taxlabel = data.title;
                }
                total_tax_amount += parseFloat(tax);
                if (!isNaN(tax) && tax != 0) {
                    if (currencyAtRight) {
                        html = html + '<tr><td class="label">' + taxlabel + " (" + taxvalue + taxlabeltype + ')</td><td class="tax_amount" id="greenColor" style="color:green">+' + parseFloat(tax).toFixed(decimal_degits) + '' + currentCurrency + '</td></tr>';
                    } else {
                        html = html + '<tr><td class="label">' + taxlabel + " (" + taxvalue + taxlabeltype + ')</td><td class="tax_amount" id="greenColor" style="color:green">+' + currentCurrency + parseFloat(tax).toFixed(decimal_degits) + '</td></tr>';
                    }


                }
            }
            total_price = parseFloat(total_price) + parseFloat(total_tax_amount);
        }

        var totalAmount = total_price;


        html += '<tr><td class="seprater" colspan="2"><hr></td></tr>';

        orderPaytableAmount = totalAmount;


        if (currencyAtRight) {
            total_price_val = parseFloat(totalAmount).toFixed(decimal_degits) + "" + currentCurrency;
        } else {
            total_price_val = currentCurrency + "" + parseFloat(totalAmount).toFixed(decimal_degits);
        }

        html = html + '<tr class="grand-total"><td class="label">{{trans("lang.total_amount")}}</td><td class="total_price_val">' + total_price_val + '</td></tr>';

        if (intRegex.test(adminCommission) || floatRegex.test(adminCommission)) {
            var adminCommHtml = "";

            if (adminCommissionType == "percentage") {
                adminCommHtml = "(" + adminCommission + "%)";
                var adminCommission_val = parseFloat(parseFloat(total_item_price * adminCommission) / 100).toFixed(decimal_degits);
            } else {
                var adminCommission_val = parseFloat(adminCommission).toFixed(decimal_degits);
            }

            if (currencyAtRight) {

                adminCommission = parseFloat(adminCommission_val).toFixed(decimal_degits) + "" + currentCurrency;
            } else {
                adminCommission = currentCurrency + "" + parseFloat(adminCommission_val).toFixed(decimal_degits);
            }

            html = html + '<tr><td class="label"><small>{{trans("lang.admin_commission")}} ' + adminCommHtml + '</small> </td><td style="color:red"><small>( ' + adminCommission + ' )</small></td></tr>';

        }

        if (notes) {


            html = html + '<tr><td class="label">{{trans("lang.notes")}}</td><td class="adminCommission_val">' + notes + '</td></tr>';
        }


        return html;
    }
    function getUserReview(Order) {
        refUserReview.limit(page_size).get().then(async function (userreviewsnapshot) {
            var reviewHTML = '';
            reviewHTML = buildRatingsAndReviewsHTML(Order, userreviewsnapshot);
            if (userreviewsnapshot.docs.length > 0) {
                jQuery("#customers_rating_and_review").append(reviewHTML);
            } else {
                jQuery("#customers_rating_and_review").html('<h4>No Reviews Found</h4>');
            }
        });
    }

    function buildRatingsAndReviewsHTML(Order, userreviewsnapshot) {
        var allreviewdata = [];
        var reviewhtml = '';
        userreviewsnapshot.docs.forEach((listval) => {
            var reviewDatas = listval.data();
            reviewDatas.id = listval.id;
            allreviewdata.push(reviewDatas);
        });
        reviewhtml += '<div class="user-ratings">';
        allreviewdata.forEach((listval) => {
            var val = listval;
            var review_user_view = '{{route("users.view",":id")}}';
            review_user_view = review_user_view.replace(':id', val.CustomerId);
            rating = val.rating;
            reviewhtml = reviewhtml + '<div class="reviews-members py-3 border mb-3"><div class="media">';
            reviewhtml = reviewhtml + '<a href="' + review_user_view + '"><img alt="#" src="'+val.profile+'" onerror="this.onerror=null;this.src=\'' + place_image + '\'" class=" img-circle img-size-32 mr-2" style="width:60px;height:60px"></a>';
            reviewhtml = reviewhtml + '<div class="media-body d-flex"><div class="reviews-members-header"><h6 class="mb-0"><a class="text-dark" href="' + review_user_view + '">'+val.uname+'</a></h6><div class="star-rating"><div class="d-inline-block" style="font-size: 14px;">';
            reviewhtml = reviewhtml + ' <ul class="rating" data-rating="' + rating + '">';
            reviewhtml = reviewhtml + '<li class="rating__item"></li>';
            reviewhtml = reviewhtml + '<li class="rating__item"></li>';
            reviewhtml = reviewhtml + '<li class="rating__item"></li>';
            reviewhtml = reviewhtml + '<li class="rating__item"></li>';
            reviewhtml = reviewhtml + '<li class="rating__item"></li>';
            reviewhtml = reviewhtml + '</ul>';
            reviewhtml = reviewhtml + '</div></div>';
            reviewhtml = reviewhtml + '</div>';
            reviewhtml = reviewhtml + '<div class="review-date ml-auto">';
            if (val.createdAt != null && val.createdAt != "") {
                var review_date = val.createdAt.toDate().toLocaleDateString('en', {
                    year: "numeric",
                    month: "short",
                    day: "numeric"
                });
                reviewhtml = reviewhtml + '<span>' + review_date + '</span>';
            }
            reviewhtml = reviewhtml + '</div>';
            reviewhtml = reviewhtml + '</div></div><div class="reviews-members-body w-100"><p class="mb-2">' + val.comment + '</p></div>';
            reviewhtml += '</div>';
            reviewhtml += '</div>';


        });

        reviewhtml += '</div>';

        return reviewhtml;
    }

    function PrintElem(elem) {
        // Clone the original element
        var elemClone = $('#' + elem).clone();

        // Remove the statusDiv portion from the clone
        elemClone.find('#statusDiv').remove();

        elemClone.printThis({
            debug: false,
            importStyle: true,
            loadCSS: [
                '<?php echo asset('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>',
                '<?php echo asset('css/style.css'); ?>',
                '<?php echo asset('css/colors/blue.css'); ?>',
                '<?php echo asset('css/icons/font-awesome/css/font-awesome.css'); ?>',
                '<?php echo asset('assets/plugins/toast-master/css/jquery.toast.css'); ?>',
            ],

        });


    }
</script>

@endsection
