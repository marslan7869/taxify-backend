@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="row page-titles">

        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('lang.print_order')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>

                <?php if (isset($_GET['eid']) && $_GET['eid'] != '') { ?>
                    <li class="breadcrumb-item"><a
                                href="{{route('vendors.orders',$_GET['eid'])}}">{{trans('lang.order_plural')}}</a></li>
                <?php } else { ?>
                    <li class="breadcrumb-item"><a href="{!! route('orders') !!}">{{trans('lang.order_plural')}}</a>
                    </li>
                <?php } ?>

                <li class="breadcrumb-item">{{trans('lang.print_order')}}</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card" id="printableArea" style="font-family: emoji;">
            <div class="col-md-12">
                <div class="print-top non-printable mt-3">
                   
                    <div class="text-right print-btn non-printable">
                        <button type="button" class="fa fa-print non-printable"
                                onclick="printDiv('printableArea')"></button>
                    </div>
                </div>

                <hr class="non-printable">
            </div>
            <div class="col-12">
                <div class="text-center pt-4 mb-3">
                    <h2 style="line-height: 1"><label class="storeName"></label></h2>
                    <h5 style="font-size: 20px;font-weight: lighter;line-height: 1">
                        <label class="storeAddress"></label>
                    </h5>
                    <h5 style="font-size: 16px;font-weight: lighter;line-height: 1">
                        {{trans('lang.phone')}} :
                        <label class="storePhone"></label>
                    </h5>
                </div>
                <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
                <div class="row mt-3">
                    <div class="col-6">
                        <h5>{{trans('lang.order_id')}} : <label class="orderId"></label></h5>
                    </div>
                    <div class="col-6">
                        <h5 style="font-weight: lighter">
                            <label class="orderDate"></label>

                        </h5>
                    </div>
                    <div class="col-12">
                        <h5>
                            {{trans('lang.customer_name')}} :
                            <label class="customerName"></label>
                        </h5>
                        <h5>
                            {{trans('lang.phone')}} :

                            <label class="customerPhone"></label>
                        </h5>
                        <h5 class="text-break">
                            {{trans('lang.address')}} :

                            <label class="customerAddress"></label>
                        </h5>
                    </div>
                </div>
                <h5 class="text-uppercase"></h5>
                <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
                <table class="table table-bordered mt-3" style="width: 95%">
                    <thead>
                    <tr>
                        <th>{{trans('lang.item')}}</th>
                        <th>{{trans('lang.price')}}</th>
                        <th>{{trans('lang.qty')}}</th>
                        <th>{{trans('lang.extras')}}</th>
                        <th>{{trans('lang.total')}}</th>
                    </tr>
                    </thead>
                    <tbody id="order_products">

                    </tbody>
                </table>
                <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
                <div class="row justify-content-md-end mb-3" style="width: 97%">
                    <div class="col-md-7 col-lg-7">
                        <dl class="row text-right">
                            <dt class="col-6">{{trans('lang.items_price')}} :</dt>
                            <dd class="col-6"><label class="total_item_price"></label>
                            </dd>
                            <dt class="col-6">{{trans('lang.addon_cost')}} :</dt>
                            <dd class="col-6">
                                <label class="total_addon_price"></label>
                                <hr>
                            </dd>
                            <dt class="col-6">{{trans('lang.sub_total')}} :</dt>
                            <dd class="col-6">
                                <label class="total_price"></label></dd>
                            <dt class="col-6">{{trans('lang.coupon_discount')}} :</dt>
                            <dd class="col-6">
                                -
                                <label class="total_discount_amount"></label>
                            </dd>
                            <dt class="col-6">{{trans('lang.special_offer')}} {{trans('lang.coupon_discount')}}:
                            </dt>
                            <dd class="col-6">
                                -
                                <label class="total_special_discount_amount"></label>
                            </dd>

                            <span class="taxes row w-100 m-0"></span>

                            <dt class="col-6">{{trans('lang.dm_tips')}} :</dt>
                            <dd class="col-6">
                                <label class="total_tip_amount">+ $ 0</label>
                            </dd>
                            <dt class="col-6">{{trans('lang.deliveryFee')}} :</dt>
                            <dd class="col-6">
                                <label class="total_delivery_amount">+ $ 0</label>
                                <hr>
                            </dd>
                            <dt class="col-6" style="font-size: 20px">{{trans('lang.total')}} :
                            </dt>
                            <dd class="col-6" style="font-size: 20px">
                                <label class="total_amount"></label>
                            </dd>
                        </dl>
                    </div>
                </div>
                <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
                <h5 class="text-center pt-3">
                    {{trans('lang.thank_you')}}
                </h5>
                <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
            </div>
        </div>
    </div>

    @endsection

    @section('style')
    <style type="text/css">
        #printableArea * {
            color: black !important;
        }

        @media print {
            @page {
                size: portrait;
            }

            .non-printable {
                display: none;
            }

            .printable {
                display: block;
                font-family: emoji !important;
            }

            #printableArea {
                width: 400px;
            }

            body {
                -webkit-print-color-adjust: exact !important;
                /* Chrome, Safari */
                color-adjust: exact !important;
                font-family: emoji !important;
            }

        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: portrait;
        }

        @page {
            size: auto;
            margin: 2px;
            font-family: emoji !important;
        }

    </style>

    @section('scripts')

    <script type="text/javascript">

        var adminCommission = 0;
        var id_rendom = "<?php echo uniqid();?>";
        var id = "<?php echo $id;?>";
        var driverId = '';
        var fcmToken = '';
        var old_order_status = '';
        var payment_shared = false;
        var deliveryChargeVal = 0;
        var tip_amount_val = 0;
        var tip_amount = 0;
        var total_price = 0;
        var total_item_price = 0;
        var total_addon_price = 0;
        var vendorname = '';
        var place_image = '';
        var ref_place = database.collection('settings').doc("placeHolderImage");
        ref_place.get().then(async function (snapshots) {
            var placeHolderImage = snapshots.data();
            place_image = placeHolderImage.image;
        });
        var database = firebase.firestore();
        var ref = database.collection('vendor_orders').where("id", "==", id);
        var currentCurrency = '';
        var currencyAtRight = false;
        var decimal_degits = 0;
        var refCurrency = database.collection('currencies').where('isActive', '==', true);

        refCurrency.get().then(async function (snapshots) {
            var currencyData = snapshots.docs[0].data();
            currentCurrency = currencyData.symbol;
            currencyAtRight = currencyData.symbolAtRight;

            if (currencyData.decimal_degits) {
                decimal_degits = currencyData.decimal_degits;
            }
        });

        ref.get().then(async function (snapshots) {

            jQuery("#data-table_processing").show();
            var order = snapshots.docs[0].data();

            $(".customerName").text(order.author.firstName + " " + order.author.lastName);
            var billingAddressstring = '';

            $(".orderId").text(id);

            var date = order.createdAt.toDate().toDateString();
            var time = order.createdAt.toDate().toLocaleTimeString('en-US');
            $(".orderDate").text(date + " " + time);

            var billingAddressstring = '';

            if (order.address.hasOwnProperty('address') ) {
            billingAddressstring = billingAddressstring + order.address.address;
            }
           

            if (order.address.hasOwnProperty('locality')) {
            billingAddressstring = billingAddressstring +","+ order.address.locality;
            }
            if (order.address.hasOwnProperty('landmark')) {
            billingAddressstring = billingAddressstring + " " + order.address.landmark;
            }

            if (order.author.hasOwnProperty('phoneNumber')) {

                if(order.author.phoneNumber.includes('+')){
                     $(".customerPhone").text('+' + EditPhoneNumber(order.author.phoneNumber.slice(1)));
                }else{
                     $(".customerPhone").text(EditPhoneNumber(order.author.phoneNumber));
                }
            }

    if(order.takeAway==false){
       $(".customerAddress").text(billingAddressstring);  
    }  

            if (order.address.hasOwnProperty('country')) {

                $("#billing_country").text(order.address.country);

            }

            if (order.address.hasOwnProperty('email')) {
                $("#billing_email").html('<a href="mailto:' + order.address.email + '">' + shortEmail(order.address.email) + '</a>');
            }

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

            if (order.payment_method) {

                if (order.payment_method == 'cod') {
                    $('#payment_method').text('{{trans("lang.cash_on_delivery")}}');
                } else if (order.payment_method == 'paypal') {
                    $('#payment_method').text('{{trans("lang.paypal")}}');
                } else {
                    $('#payment_method').text(order.payment_method);
                }

            }
            if (order.hasOwnProperty('takeAway') && order.takeAway) {
                $('#driver_pending').hide();
                $('#driver_rejected').hide();
                $('#order_shipped').hide();
                $('#in_transit').hide();
                $('#order_type').text('{{trans("lang.order_takeaway")}}');
                $('.payment_method').hide();
                orderTakeAwayOption = true;

            } else {
                $('#order_type').text('{{trans("lang.order_delivery")}}');
                $('.payment_method').show();

            }

            if ((order.driver != '' && order.driver != undefined) && (order.takeAway)) {

                $('#driver_carName').text(order.driver.carName);
                $('#driver_carNumber').text(order.driver.carNumber);
                $('#driver_email').html('<a href="mailto:' + order.driver.email + '">' + order.driver.email + '</a>');
                $('#driver_firstName').text(order.driver.firstName);
                $('#driver_lastName').text(order.driver.lastName);
                if(order.driver.phoneNumber.includes('+')){
                     $('#driver_phone').text('+' + EditPhoneNumber(order.driver.phoneNumber.slice(1)));
                }else{
                     $('#driver_phone').text(EditPhoneNumber(order.driver.phoneNumber));
                }
                

            } else {
                $('.order_edit-genrl').removeClass('col-md-4').addClass('col-md-6');
                $('.order_addre-edit').removeClass('col-md-4').addClass('col-md-6');
                $('.driver_details_hide').empty();

            }

            if (order.driverID != '' && order.driverID != undefined) {
                driverId = order.driverID;
            }
            if (order.vendor && order.vendor.author != '' && order.vendor.author != undefined) {
                vendorAuthor = order.vendor.author;
            }
            fcmToken = order.author.fcmToken;
            vendorname = order.vendor.title;

            fcmTokenVendor = order.vendor.fcmToken;
            customername = order.author.firstName;

            vendorId = order.vendor.id;
            old_order_status = order.status;
            if (order.payment_shared != undefined) {
                payment_shared = order.payment_shared;
            }
            append_procucts_list = document.getElementById('order_products');
            append_procucts_list.innerHTML = '';

            var productsListHTML = buildHTMLProductsList(order.products);
            var productstotalHTML = buildHTMLProductstotal(order);

            if (productsListHTML != '') {
                append_procucts_list.innerHTML = productsListHTML;
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

            if (order.vendorID) {
                var vendor = database.collection('vendors').where("id", "==", order.vendorID);

                vendor.get().then(async function (snapshotsnew) {
                    var vendordata = snapshotsnew.docs[0].data();

                    if (vendordata.id) {
                        var route_view = '{{route("vendors.view",":id")}}';
                        route_view = route_view.replace(':id', vendordata.id);

                        $('#resturant-view').attr('data-url', route_view);
                    }

                    if (vendordata.photo) {
                        $('.resturant-img').attr('src', vendordata.photo);
                    } else {
                        $('.resturant-img').attr('src', place_image);
                    }
                    if (vendordata.title) {
                        $('.storeName').html(vendordata.title);
                    }
                    
                    if(vendordata.phonenumber.includes('+')){
                        $('.storePhone').text('+' + EditPhoneNumber(vendordata.phonenumber.slice(1)));
                    }else{
                        $('.storePhone').text(EditPhoneNumber(vendordata.phonenumber));
                    }
                    
                    if (vendordata.location) {
                        $('.storeAddress').text(vendordata.location);
                    }

                });

            }

            jQuery("#data-table_processing").hide();
        })

        function buildHTMLProductsList(snapshotsProducts) {
            var html = '';
            var alldata = [];
            var number = [];
            var totalProductPrice = 0;

            snapshotsProducts.forEach((product) => {

                var val = product;

                html = html + '<tr>';

                var extra_html = '';
                if (product.extras != undefined && product.extras != '' && product.extras.length > 0) {
                    extra_html = extra_html + '<span>';
                    var extra_count = 1;
                    try {
                        product.extras.forEach((extra) => {

                            if (extra_count > 1) {
                                extra_html = extra_html + ',' + extra;
                            } else {
                                extra_html = extra_html + extra;
                            }
                            extra_count++;
                        })
                    } catch (error) {

                    }

                    extra_html = extra_html + '</span>';

                }

                html = html + '<td class="order-product"><div class="order-product-box">';


                if (val.photo != '') {
                    html = html + '<img class="img-circle img-size-32 mr-2" style="width:60px;height:60px;" src="' + val.photo + '" onerror="this.onerror=null;this.src=\'' + place_image + '\'" alt="image">';
                } else {
                    html = html + '<img class="img-circle img-size-32 mr-2" style="width:60px;height:60px;" src="' + place_image + '" alt="image">';
                }

                html = html + '</div><div class="orders-tracking"><h6>' + val.name + '</h6><div class="orders-tracking-item-details">';
                if (extra_count > 1 || product.size) {
                    html = html + '<strong>{{trans("lang.extras")}} :</strong>';
                }
                if (extra_count > 1) {
                    html = html + '<div class="extra"><span>{{trans("lang.extras")}} :</span><span class="ext-item">' + extra_html + '</span></div>';
                }
                if (product.size) {
                    html = html + '<div class="type"><span>{{trans("lang.type")}} :</span><span class="ext-size">' + product.size + '</span></div>';
                }

                price_item = parseFloat(val.price).toFixed(decimal_degits);

                totalProductPrice = parseFloat(price_item) * parseInt(val.quantity);
                var extras_price = 0;
                if (product.extras != undefined && product.extras != '' && product.extras.length > 0) {
                    extras_price_item = (parseFloat(val.extras_price) * parseInt(val.quantity)).toFixed(decimal_degits);
                    if (parseFloat(extras_price_item) != NaN && val.extras_price != undefined) {
                        extras_price = extras_price_item;
                    }
                    totalProductPrice = parseFloat(extras_price) + parseFloat(totalProductPrice);
                }
                totalProductPrice = parseFloat(totalProductPrice).toFixed(decimal_degits);

                if (currencyAtRight) {
                    price_val = parseFloat(price_item).toFixed(decimal_degits) + "" + currentCurrency;
                    extras_price_val = parseFloat(extras_price).toFixed(decimal_degits) + "" + currentCurrency;
                    totalProductPrice_val = parseFloat(totalProductPrice).toFixed(decimal_degits) + "" + currentCurrency;
                } else {
                    price_val = currentCurrency + "" + parseFloat(price_item).toFixed(decimal_degits);
                    extras_price_val = currentCurrency + "" + parseFloat(extras_price).toFixed(decimal_degits);
                    totalProductPrice_val = currentCurrency + "" + parseFloat(totalProductPrice).toFixed(decimal_degits);
                }

                html = html + '</div></div></td>';
                html = html + '<td>' + price_val + '</td><td>' + val.quantity + '</td><td> + ' + extras_price_val + '</td><td>  ' + totalProductPrice_val + '</td>';

                html = html + '</tr>';
                total_price += parseFloat(totalProductPrice);
                total_addon_price += parseFloat(extras_price);

                total_item_price += parseFloat(price_item);


            });
            totalProductPrice = 0;

            if (currencyAtRight) {
                total_item_price = parseFloat(total_item_price).toFixed(decimal_degits) + "" + currentCurrency;
                total_addon_price = parseFloat(total_addon_price).toFixed(decimal_degits) + "" + currentCurrency;
                $('.total_price').text(parseFloat(total_price).toFixed(decimal_degits) + "" + currentCurrency);
            } else {
                total_item_price = currentCurrency + "" + parseFloat(total_item_price).toFixed(decimal_degits);
                total_addon_price = currentCurrency + "" + parseFloat(total_addon_price).toFixed(decimal_degits);
                $('.total_price').text(currentCurrency + "" + parseFloat(total_price).toFixed(decimal_degits));
            }
            $('.total_item_price').text(total_item_price);
            $('.total_addon_price').text(total_addon_price);


            return html;
        }

        function buildHTMLProductstotal(snapshotsProducts) {
            var html = '';
            var alldata = [];
            var number = [];

            var adminCommission = snapshotsProducts.adminCommission;
            var adminCommissionType = snapshotsProducts.adminCommissionType;
            var discount = snapshotsProducts.discount;
            var couponCode = snapshotsProducts.couponCode;
            var extras = snapshotsProducts.extras;
            var extras_price = snapshotsProducts.extras_price;
            var rejectedByDrivers = snapshotsProducts.rejectedByDrivers;
            var takeAway = snapshotsProducts.takeAway;
            var tip_amount = snapshotsProducts.tip_amount;
            var notes = snapshotsProducts.notes;
            var tax_amount = snapshotsProducts.vendor.tax_amount;
            var status = snapshotsProducts.status;
            var products = snapshotsProducts.products;
            var deliveryCharge = snapshotsProducts.deliveryCharge;
            var specialDiscount = snapshotsProducts.specialDiscount;

            var intRegex = /^\d+$/;
            var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

            if (products) {

                products.forEach((product) => {

                    var val = product;

                });
            }

            var discount_val = 0;

            if (intRegex.test(discount) || floatRegex.test(discount)) {

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
                html = html + '<tr><td class="label">{{trans("lang.discount")}}' + couponCode_html + '</td><td class="discount">-' + discount_val + '</td></tr>';

                $('.total_discount_amount').text(discount_val);


            } else {

                if (currencyAtRight) {
                    discount_val = parseFloat(discount_val).toFixed(decimal_degits) + "" + currentCurrency;
                } else {
                    discount_val = currentCurrency + "" + parseFloat(discount_val).toFixed(decimal_degits);
                }
                $('.total_discount_amount').text(discount_val);

            }



            var special_discount = 0;
            if (specialDiscount != undefined) {

                special_discount = parseFloat(specialDiscount.special_discount).toFixed(decimal_degits);
                total_price = total_price - special_discount;

                if (currencyAtRight) {
                    special_discount = parseFloat(special_discount).toFixed(decimal_degits) + "" + currentCurrency;
                } else {
                    special_discount = currentCurrency + "" + parseFloat(special_discount).toFixed(decimal_degits);
                }

                if (specialDiscount.specialType == "percentage") {
                    $('.total_special_discount_amount').text(special_discount + "(" + specialDiscount.special_discount_label + "%)");

                } else {
                    $('.total_special_discount_amount').text(special_discount);

                }

            } else {
                if (currencyAtRight) {
                    $('.total_special_discount_amount').text(special_discount + "" + currentCurrency);
                } else {
                    $('.total_special_discount_amount').text(currentCurrency + "" + special_discount);
                }
            }

            var total_item_price = total_price;

            var tax = 0;
            taxlabel = '';
            taxlabeltype = '';

            if (snapshotsProducts.hasOwnProperty('taxSetting')) {
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
                            taxlabeltype = " ";
                            if (currencyAtRight) {
                                var taxvalue = parseFloat(data.tax).toFixed(decimal_degits) + "" + currentCurrency;
                            } else {
                                var taxvalue = currentCurrency + "" + parseFloat(data.tax).toFixed(decimal_degits);

                            }

                        }
                        taxlabel = data.title;
                    }
                    total_tax_amount += parseFloat(tax);
                    if (currencyAtRight) {

                        $('.taxes').append("<dt class='col-6'> " + taxlabel + " (" + taxvalue + taxlabeltype + ")</dt><dd class='col-6'><label>" + parseFloat(tax).toFixed(decimal_degits) + " " + currentCurrency + "</label></dt>");
                    } else {
                        $('.taxes').append("<dt class='col-6'> " + taxlabel + " (" + taxvalue + taxlabeltype + ")</dt><dd class='col-6'><label>" + currentCurrency + " " + parseFloat(tax).toFixed(decimal_degits) + "</label></dt>");
                    }


                }
                total_price = parseFloat(total_price) + parseFloat(total_tax_amount);


            }

            if (intRegex.test(deliveryCharge) || floatRegex.test(deliveryCharge)) {

                deliveryCharge = parseFloat(deliveryCharge).toFixed(decimal_degits);
                total_price += parseFloat(deliveryCharge);

                if (currencyAtRight) {
                    deliveryCharge_val = "+ " + parseFloat(deliveryCharge).toFixed(decimal_degits) + "" + currentCurrency;
                } else {
                    deliveryCharge_val = "+ " + currentCurrency + "" + parseFloat(deliveryCharge).toFixed(decimal_degits);
                }
                if (takeAway == '' || takeAway == false) {
                    deliveryChargeVal = deliveryCharge;
                    html = html + '<tr><td class="label">{{trans("lang.deliveryCharge")}}</td><td class="deliveryCharge">+' + deliveryCharge_val + '</td></tr>';
                    $('.total_delivery_amount').text(deliveryCharge_val);
                }
            }


            if (intRegex.test(tip_amount) || floatRegex.test(tip_amount)) {

                tip_amount = parseFloat(tip_amount).toFixed(decimal_degits);
                total_price += parseFloat(tip_amount);
                total_price = parseFloat(total_price).toFixed(decimal_degits);

                if (currencyAtRight) {
                    tip_amount_val = '+' + parseFloat(tip_amount).toFixed(decimal_degits) + "" + currentCurrency;
                } else {
                    tip_amount_val = '+' + currentCurrency + "" + parseFloat(tip_amount).toFixed(decimal_degits);
                }
                if (takeAway == '' || takeAway == false) {
                    html = html + '<tr><td class="label">{{trans("lang.tip_amount")}}</td><td class="tip_amount_val">+' + tip_amount_val + '</td></tr>';
                    $('.total_tip_amount').text(tip_amount_val);
                }
            }

            if (currencyAtRight) {
                total_price_val = parseFloat(total_price).toFixed(decimal_degits) + "" + currentCurrency;
            } else {
                total_price_val = currentCurrency + "" + parseFloat(total_price).toFixed(decimal_degits);
            }

            $('.total_amount').text(total_price_val);
            html = html + '<tr><td class="label">{{trans("lang.total_amount")}}</td><td class="total_price_val">' + total_price_val + '</td></tr>';

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

        function printDiv(divName) {

            var css = '@page { size: portrait; }',
                head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);

            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

    </script>

    @endsection