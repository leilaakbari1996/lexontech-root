
<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{$title}} </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin dashboard,dashboard design htmlbootstrap admin template,html admin panel,admin dashboard html,admin panel html template,bootstrap dashboard,html admin template,html dashboard,html admin dashboard template,bootstrap dashboard template,dashboard html template,bootstrap admin panel,dashboard admin bootstrap,bootstrap admin dashboard">

    <!-- Favicon -->
    <link rel="icon" href="{{\TransferFacade::loadAsset('/root/assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">

    <!-- Choices JS -->
    <script src="{{\TransferFacade::loadAsset('/root/assets/libs/choices.js/assets/scripts/choices.min.js')}}"></script>


    <!-- Main Theme Js -->
    <script src="{{\TransferFacade::loadAsset('/root/assets/js/main.js')}}"></script>

    <!-- Bootstrap Css -->
    <link  href="{{\TransferFacade::loadAsset('/root/assets/libs/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{TransferFacade::loadAsset('/root/assets/css/styles.min.css')}}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{TransferFacade::loadAsset('/root/assets/css/icons.css')}}" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="{{TransferFacade::loadAsset('/root/assets/libs/node-waves/dist/waves.min.css')}}" rel="stylesheet" >

    <!-- Simplebar Css -->
    <link href="{{TransferFacade::loadAsset('/root/assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" >

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{TransferFacade::loadAsset('/root/assets/libs/flatpickr/dist/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{TransferFacade::loadAsset('/root/assets/libs/@simonwep/pickr/dist/themes/nano.min.css')}}">

    <!-- Choices Css -->
    <link href="{{TransferFacade::loadAsset('/root/assets/css/select2.min.css')}}" rel="stylesheet">
{{--    <base href="{{env("APP_URL")}}">--}}
    <link href="{{TransferFacade::loadAsset('/root/assets/css/stylePanel.css')}}" rel="stylesheet" >
    @stack("css")

</head>

