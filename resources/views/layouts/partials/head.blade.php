<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $setting_name }}</title>
{{--
<title>{{ config('app.name', 'Laravel') }}</title> --}}

<!-- <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon"> -->

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="/template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="/template/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/template/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
<link href="/template/assets/css/layout.min.css" rel="stylesheet" type="text/css">
<link href="/template/assets/css/components.min.css" rel="stylesheet" type="text/css">
<link href="/template/assets/css/colors.min.css" rel="stylesheet" type="text/css">
<!-- /Global stylesheets -->

<!-- Custom Style -->
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<!-- /Custom Style -->

<!-- Core JS files -->
<script src="/js/moment.js"></script>
<script src="/template/global_assets/js/main/jquery.min.js"></script>
<script src="/template/global_assets/js/main/bootstrap.bundle.min.js"></script>
<script src="/template/global_assets/js/plugins/loaders/blockui.min.js"></script>
<!-- /Core JS files -->

<!-- Theme JS files -->
<script src="/template/global_assets/js/plugins/number/jquery.number.min.js"></script>
<script src="/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="/template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>

<!--Forms-->
<script src="/template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
<script src="/template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
<script src="/template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script src="/template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="/template/global_assets/js/plugins/forms/inputs/inputmask.js"></script>
<script src="/template/global_assets/js/plugins/forms/validation/validate.min.js"></script>
<script src="/template/global_assets/js/plugins/forms/wizards/steps.min.js"></script>
<!--/Forms-->

<!--Pickers-->
<script src="/template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="/template/global_assets/js/plugins/pickers/anytime.min.js"></script>
<script src="/template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="/template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="/template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="/template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
<!--/Pickers-->

<!--DataTables-->
<script src="/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="/template/global_assets/js/plugins/tables/datatables/extensions/select.min.js"></script>
<script src="/template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script src="/template/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
<!--/DataTables-->

<script src="/template/assets/js/app.js"></script>
<!-- /Theme JS files -->

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on("wheel", "input[type=number]", function (e) {
    $(this).blur();
});

$(function(){	
    $('.price').number( true );
    $('.price').keyup( () => {
        const value = $('.price');
        value.each((index, element) => {
            let val = element.value;
            val = val.replace(/,/g, '');
            val = parseFloat(val);
        })
    });
});

$(function(){	
    swal.setDefaults({
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-light'
    });
});

</script>
@stack('scripts')