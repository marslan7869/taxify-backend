<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"

      <?php if(str_replace('_', '-', app()->getLocale()) == 'ar' || @$_COOKIE['is_rtl'] == 'true'){ ?> dir="rtl" <?php } ?>>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-light-icon.png') }}">

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <style type="text/css">



    </style>

    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <?php if(str_replace('_', '-', app()->getLocale()) == 'ar' || @$_COOKIE['is_rtl'] == 'true'){ ?>

    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet">

    <?php } ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

   

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <?php if(str_replace('_', '-', app()->getLocale()) == 'ar' || @$_COOKIE['is_rtl'] == 'true'){ ?>

    <link href="{{asset('css/style_rtl.css')}}" rel="stylesheet">

    <?php } ?>

    <link href="{{ asset('css/icons/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

    <link href="{{ asset('css/colors/blue.css') }}" rel="stylesheet">

    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

     <!-- Datatable css -->


     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


<!-- @yield('style') -->

    <?php if(isset($_COOKIE['admin_panel_color'])){ ?>

    <style type="text/css">



        .topbar {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .left-sidebar {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .sidebar-nav ul li a {

            border-bottom: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .sidebar-nav {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .sidebar-nav ul li a:hover i {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .vendor_payout_create-inner fieldset legend {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        a {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        a:hover, a:focus {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        a.link:hover, a.link:focus {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        html body blockquote {

            border-left: 5px solid<?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .text-warning {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>  !important;

        }



        .text-info {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>  !important;

        }



        .sidebar-nav ul li a:hover {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .btn-primary {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

            border: 1px solid<?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .sidebar-nav > ul > li.active > a {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

            border-left: 3px solid<?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .sidebar-nav > ul > li.active > a i {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .bg-info {

            background-color: <?php echo $_COOKIE['admin_panel_color']; ?>  !important;

        }



        .bellow-text ul li > span {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>

        }



        .table tr td.redirecttopage {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>

        }



        ul.rating {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .nav-tabs.card-header-tabs .nav-link.active, .nav-tabs.card-header-tabs .nav-link:hover {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

            border-color: <?php echo $_COOKIE['admin_panel_color']; ?> <?php echo $_COOKIE['admin_panel_color']; ?> #fff;

        }



        .btn-warning, .btn-warning.disabled {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

            border: 1px solid<?php echo $_COOKIE['admin_panel_color']; ?>;

            box-shadow: none;

        }



        .payment-top-tab .nav-tabs.card-header-tabs .nav-link.active, .payment-top-tab .nav-tabs.card-header-tabs .nav-link:hover {

            border-color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .nav-tabs.card-header-tabs .nav-link span.badge-success {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .nav-tabs.card-header-tabs .nav-link.active span.badge-success, .nav-tabs.card-header-tabs .nav-link:hover span.badge-success, .sidebar-nav ul li a.active, .sidebar-nav ul li a.active:hover, .sidebar-nav ul li.active a.has-arrow:hover, .topbar ul.dropdown-user li a:hover {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .sidebar-nav ul li a.has-arrow:hover::after, .sidebar-nav .active > .has-arrow::after, .sidebar-nav li > .has-arrow.active::after, .sidebar-nav .has-arrow[aria-expanded="true"]::after, .sidebar-nav ul li a:hover {

            border-color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        [type="checkbox"]:checked + label::before,[type="radio"]:checked + label::before {

            border-right: 2px solid <?php echo $_COOKIE['admin_panel_color']; ?>;

            border-bottom: 2px solid <?php echo $_COOKIE['admin_panel_color']; ?>;

        }

         .radio-form [type="radio"]:checked + label::before{background: <?php echo $_COOKIE['admin_panel_color']; ?>;}

        .btn-primary:hover, .btn-primary.disabled:hover {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

            border: 1px solid<?php echo $_COOKIE['admin_panel_color']; ?>;

            color: white;

        }



        .btn-primary.active, .btn-primary:active, .btn-primary:focus, .btn-primary.disabled.active, .btn-primary.disabled:active, .btn-primary.disabled:focus, .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary.focus:active, .btn-primary:active:focus, .btn-primary:active:hover, .open > .dropdown-toggle.btn-primary.focus, .open > .dropdown-toggle.btn-primary:focus, .open > .dropdown-toggle.btn-primary:hover, .btn-primary.focus, .btn-primary:focus, .btn-primary:not(:disabled):not(.disabled).active:focus, .btn-primary:not(:disabled):not(.disabled):active:focus, .show > .btn-primary.dropdown-toggle:focus, .btn-warning:hover, .btn-warning:hover, .btn-warning.disabled:hover, .btn-warning.active.focus, .btn-warning.active:focus, .btn-warning.active:hover, .btn-warning.focus:active, .btn-warning:active:focus, .btn-warning:active:hover, .open > .dropdown-toggle.btn-warning.focus, .open > .dropdown-toggle.btn-warning:focus, .open > .dropdown-toggle.btn-warning:hover, .btn-warning.focus, .btn-warning:focus {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

            border-color: <?php echo $_COOKIE['admin_panel_color']; ?>;

            box-shadow: 0 0 0 0.2rem<?php echo $_COOKIE['admin_panel_color']; ?>;

            color: white;

        }



        .language-options select option, .pagination > li > a.page-link:hover {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .mini-sidebar .sidebar-nav #sidebarnav > li:hover a i, .mini-sidebar .sidebar-nav ul li a, .sidebar-nav ul li a.active i, .sidebar-nav ul li a.active:hover i, .sidebar-nav ul li.active a:hover i {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .cat-slider .cat-item a.cat-link:hover, .cat-slider .cat-item.section-selected a.cat-link {

            border-color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .cat-slider .cat-item a.cat-link {

            border-bottom-color: <?php echo $_COOKIE['admin_panel_color']; ?> ;

        }



        .cat-slider .cat-item.section-selected a.cat-link:after {

            border-color: <?php echo $_COOKIE['admin_panel_color']; ?>;

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .cat-slider {

            border-color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .business-analytics .card-box i {

            background: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        .order-status .data i, .order-status span.count {

            color: <?php echo $_COOKIE['admin_panel_color']; ?>;

        }



        @media screen and ( max-width: 767px ) {



            .mini-sidebar .sidebar-nav ul li a:hover, .sidebar-nav > ul > li.active > a {

                color: <?php echo $_COOKIE['admin_panel_color']; ?>  !important;

            }

        }

    </style>

    <?php } ?>

</head>



<body>



<div id="app" class="fix-header fix-sidebar card-no-border">

    <div id="main-wrapper">
        <div id="data-table_processing" class="page-overlay" style="display:none;">
            <div class="overlay-text">
                <img src="{{asset('images/spinner.gif')}}">
            </div>
        </div>
        <header class="topbar non-printable">

            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                @include('layouts.header')

            </nav>

        </header>

        <aside class="left-sidebar non-printable">

            <div class="scroll-sidebar">

                @include('layouts.menu')

            </div>

        </aside>

    </div>

    <main class="py-4">

        @yield('content')

    </main>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('js/waves.js') }}"></script>

<script src="{{ asset('js/sidebarmenu.js') }}"></script>

<script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>

<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>

<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js')}}"></script>

<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-storage.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-database.js"></script>

<script src="https://unpkg.com/geofirestore@5.2.0/dist/geofirestore.js"></script>

<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/chosen.jquery.js') }}"></script>

<script src="{{ asset('js/jquery.resizeImg.js') }}"></script>

<script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>

<script src="{{ asset('js/crypto-js.js') }}"></script>

<script src="{{ asset('js/jquery.cookie.js') }}"></script>

<script src="{{ asset('js/jquery.validate.js') }}"></script>

<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>

<script src="{{ asset('js/jquery.masking.js') }}"></script>


<!-- Datatable script -->

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>





<script type="text/javascript">

    jQuery(window).scroll(function () {

        var scroll = jQuery(window).scrollTop();

        if (scroll <= 60) {

            jQuery("body").removeClass("sticky");

        } else {

            jQuery("body").addClass("sticky");

        }

    });

</script>



<script type="text/javascript">

    var languages_list_main = [];

    var database = firebase.firestore();

    var geoFirestore = new GeoFirestore(database);

    var createdAtman = firebase.firestore.Timestamp.fromDate(new Date());

    var createdAt = {_nanoseconds: createdAtman.nanoseconds, _seconds: createdAtman.seconds};

    var mapType = 'ONLINE';

    var ref = database.collection('settings').doc("globalSettings");

    ref.get().then(async function (snapshots) {

        var globalSettings = snapshots.data();

        $("#app_name").html(globalSettings.applicationName);

        $("#logo_web").attr('src', globalSettings.appLogo);

    });



    function setCookie(cname, cvalue, exdays) {

        const d = new Date();

        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

        let expires = "expires=" + d.toUTCString();

        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

    }



    function getCookie(cname) {

        let name = cname + "=";

        let ca = document.cookie.split(';');

        for (let i = 0; i < ca.length; i++) {

            let c = ca[i];

            while (c.charAt(0) == ' ') {

                c = c.substring(1);

            }

            if (c.indexOf(name) == 0) {

                return c.substring(name.length, c.length);

            }

        }

        return "";

    }





    var langcount = 0;

    var languages_list = database.collection('settings').doc('languages');

    languages_list.get().then(async function (snapshotslang) {

        snapshotslang = snapshotslang.data();

        if (snapshotslang != undefined) {

            snapshotslang = snapshotslang.list;

            languages_list_main = snapshotslang;

            snapshotslang.forEach((data) => {

                if (data.isActive == true) {

                    langcount++;

                    $('#language_dropdown').append($("<option></option>").attr("value", data.slug).text(data.title));



                }

            });

            if (langcount > 1) {

                $("#language_dropdown_box").css('visibility', 'visible');

            }

            <?php if(session()->get('locale')){ ?>

            $("#language_dropdown").val("<?php echo session()->get('locale'); ?>");

            <?php } ?>

        }

    });



    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function () {

        var slug = $(this).val();



        languages_list_main.forEach((data) => {

            if (slug == data.slug) {

                if (data.is_rtl == undefined) {

                    setCookie('is_rtl', 'false', 365);

                } else {

                    setCookie('is_rtl', data.is_rtl.toString(), 365);

                }

                window.location.href = url + "?lang=" + slug;

            }

        });

    });



    var version = database.collection('settings').doc("Version");



    version.get().then(async function (snapshots) {

        var version_data = snapshots.data();



        if (version_data == undefined) {

            database.collection('settings').doc('Version').set({});

        }

        try {



            $('.web_version').html("V:"+version_data.web_version);



        } catch (error) {



        }



    });



    async function sendEmail(url, subject, message, recipients) {



        var checkFlag = false;



        await $.ajax({



            type: 'POST',

            data: {

                subject: subject,

                message: btoa(message),

                recipients: recipients

            },

            url: url,

            headers: {



                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },

            success: function (data) {

                checkFlag = true;

            },

            error: function (xhr, status, error) {

                checkFlag = true;

            }

        });



        return checkFlag;



    }

    database.collection('settings').doc('DriverNearBy').get().then(async function (snapshots) {

        var data = snapshots.data();

        if (data && data.selectedMapType && data.selectedMapType == "osm") {

            mapType = "OFFLINE"

        }

    });



    async function loadGoogleMapsScript() {

        var googleMapKeySnapshotsHeader = await database.collection('settings').doc("googleMapKey").get();

        var placeholderImageHeaderData = googleMapKeySnapshotsHeader.data();

        googleMapKey = placeholderImageHeaderData.key;

        const script = document.createElement('script');

        if (mapType == "OFFLINE" ){

            script.src = "https://unpkg.com/leaflet@1.7.1/dist/leaflet.js";

        }else{

            script.src = "https://maps.googleapis.com/maps/api/js?key=" + googleMapKey + "&libraries=places";

        }

        script.onload = function () {

            navigator.geolocation.getCurrentPosition(GeolocationSuccessCallback,GeolocationErrorCallback);

            if(typeof window['InitializeGodsEyeMap'] === 'function') {

                InitializeGodsEyeMap();

            }

        };

        document.head.appendChild(script);

    }



    const GeolocationSuccessCallback = (position) => {

        if(position.coords != undefined){

            default_latitude = position.coords.latitude

            default_longitude = position.coords.longitude

            setCookie('default_latitude', default_latitude, 365);

            setCookie('default_longitude', default_longitude, 365);

        }

    };



    const GeolocationErrorCallback = (error) => {

        console.log('Error: You denied for your default Geolocation',error.message);

        setCookie('default_latitude', '23.022505', 365);

        setCookie('default_longitude','72.571365', 365);

    };



    loadGoogleMapsScript();



    database.collection('settings').doc("notification_setting").get().then(async function (snapshots) {

        var data = snapshots.data();

        serviceJson = data.serviceJson;

        if(serviceJson != '' && serviceJson != null){

            $.ajax({

                type: 'POST',

                data: {

                    serviceJson: btoa(serviceJson),

                },

                url: "{{ route('store-firebase-service') }}",

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },

                success: function (data) {

                    checkFlag = true;

                }

            });

        }

    });



      //On delete item delete image also from bucket general code

      const deleteDocumentWithImage = async (collection, id, singleImageField, arrayImageField,profileImageField,carProofPictureURL,driverProofPictureURL) => {

        // Reference to the Firestore document

        const docRef = database.collection(collection).doc(id);

        try {

            const doc = await docRef.get();

            if (!doc.exists) {

                console.log("No document found for deletion");

                return;

            }



            const data = doc.data();



            // Handle single image deletion

                   // Deleting single image field

                   if (singleImageField) {

                    if (Array.isArray(singleImageField)) {

                        for (const field of singleImageField) {

                            const imageUrl = data[field];

                            if (imageUrl) await deleteImageFromBucket(imageUrl);

                        }

                    } else {

                        const imageUrl = data[singleImageField];

                        if (imageUrl) await deleteImageFromBucket(imageUrl);

                    }

                }

                // Deleting array image field

                if (arrayImageField) {

                    if (Array.isArray(arrayImageField)) {

                        for (const field of arrayImageField) {

                            const arrayImages = data[field];

                            if (arrayImages && Array.isArray(arrayImages)) {

                                for (const imageUrl of arrayImages) {

                                    if (imageUrl) await deleteImageFromBucket(imageUrl);

                                }

                            }

                        }

                    } else {

                        const arrayImages = data[arrayImageField];

                        if (arrayImages && Array.isArray(arrayImages)) {

                            for (const imageUrl of arrayImages) {

                                if (imageUrl) await deleteImageFromBucket(imageUrl);

                            }

                        }

                    }

                }



            // Handle variant images deletion

            const item_attribute = data.item_attribute || {};  // Access item_attribute

            const variants = item_attribute.variants || [];    // Access variants array inside item_attribute

            if (variants.length > 0) {

                for (let i = 0; i < variants.length; i++) {

                    const variantImageUrl = variants[i].variant_image;

                    if (variantImageUrl) {

                        await deleteImageFromBucket(variantImageUrl);

                    }

                }

            }





              // Handle profile_file_name image deletion

            const profile_file_name = data[profileImageField] || '';  // profile image field

            if (profile_file_name) {

                await deleteImageFromBucket(profile_file_name);

            }



            // Handle carproof_file_name image deletion

            const carproof_file_name = data[carProofPictureURL] || '';  // carproof image field

            if (carproof_file_name) {

                await deleteImageFromBucket(carproof_file_name);

            }



            // Handle driverproof_file_name image deletion

            const driverproof_file_name = data[driverProofPictureURL] || '';  // driverproof image field

            if (driverproof_file_name) {

                await deleteImageFromBucket(driverproof_file_name);

            }



            // Optionally delete the Firestore document after image deletion

            await docRef.delete();

            console.log("Document and images deleted successfully.");

        } catch (error) {

            console.error("Error deleting document and images:", error);

        }

    };



    const deleteImageFromBucket = async (imageUrl) => {

        try {

            const storageRef = firebase.storage().ref();



            // Check if the imageUrl is a full URL or just a child path

            let oldImageUrlRef;

            if (imageUrl.includes('https://')) {

                // Full URL

                oldImageUrlRef = storageRef.storage.refFromURL(imageUrl);

            } else {

                // Child path, use ref instead of refFromURL

                oldImageUrlRef = storageRef.storage.ref(imageUrl);

            }

            var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";

            var imageBucket = oldImageUrlRef.bucket;

            // Check if the bucket name matches

            if (imageBucket === envBucket) {

                // Delete the image

                await oldImageUrlRef.delete();

                console.log("Image deleted successfully.");

            }

        } catch (error) {



        }

    };

    function exportData(dt, format, config) {
        const {
            columns,              
            fileName = 'Export',    
        } = config;

        const filteredRecords = dt.ajax.json().filteredData;

        const fieldTypes = {};
        const dataMapper = (record) => {
            return columns.map((col) => {
                const value = record[col.key];
                if (!fieldTypes[col.key]) {
                    if (value === true || value === false) {
                        fieldTypes[col.key] = 'boolean';
                    } else if (value && typeof value === 'object' && value.seconds) {
                        fieldTypes[col.key] = 'date'; 
                    } else if (typeof value === 'number') {
                        fieldTypes[col.key] = 'number';
                    } else if (typeof value === 'string') {
                        fieldTypes[col.key] = 'string';
                    } else {
                        fieldTypes[col.key] = 'string'; 
                    }
                }

                switch (fieldTypes[col.key]) {
                    case 'boolean':
                        return value ? 'Yes' : 'No'; 
                    case 'date':
                        return value ? new Date(value.seconds * 1000).toLocaleString() : '-';
                    case 'number':
                        return typeof value === 'number' ? value : 0;
                    case 'string':
                    default:
                        return value || '-';
                }
            });
        };

        const tableData = filteredRecords.map(dataMapper);

        const data = [columns.map(col => col.header), ...tableData];

        const columnWidths = columns.map((_, colIndex) =>
            Math.max(...data.map(row => row[colIndex]?.toString().length || 0))
        );

        if (format === 'csv') {
            const csv = data.map(row => row.map(cell => {
                if (typeof cell === 'string' && (cell.includes(',') || cell.includes('\n') || cell.includes('"'))) {
                    return `"${cell.replace(/"/g, '""')}"`;
                }
                return cell;
            }).join(',')).join('\n');

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            saveAs(blob, `${fileName}.csv`);
        } else if (format === 'excel') {
            const ws = XLSX.utils.aoa_to_sheet(data, { cellDates: true });

            ws['!cols'] = columnWidths.map(width => ({ wch: Math.min(width + 5, 30) })); 

            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Data');
            XLSX.writeFile(wb, `${fileName}.xlsx`);
        } else if (format === 'pdf') {
            
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('l', 'mm', 'a4'); // Landscape for more width

            doc.setFontSize(12);
            doc.text(fileName, 14, 16);

            doc.autoTable({
                head: [columns.map(col => col.header)],
                body: tableData,
                startY: 20,
                theme: 'striped',
                styles: {
                    cellPadding: 1,
                    fontSize: 8,
                    overflow: 'linebreak',
                },
                columnStyles: {
                    0: { cellWidth: 'auto' }, // Adjust first column automatically
                },
                margin: { top: 30, bottom: 30 },
                pageBreak: 'auto', // Ensures page break for long content
            });

            doc.save(`${fileName}.pdf`);

        } else {
            console.error('Unsupported format');
        }
    }



</script>



@yield('scripts')



</body>



</html>

