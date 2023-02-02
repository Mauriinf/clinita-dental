@extends('vuexy.layouts.default', ['activePage' => 'curaciones'])
@section('title','Odontograma')
@push('css-vendor')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/animate/animate.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/extensions/sweetalert2.min.css') !!}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') !!}">
<!-- END: Page CSS-->
<script src="{!! asset('js/odontCanvas/core/engine.js" type="text/javascript') !!}"></script>
@endpush
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Odontograma</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Principal</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header text-center">
        <h1 class="fw-bolder">Odontograma</h1>
    </div>
    <canvas id="canvas" width="648" height="420"></canvas>
@endsection
@push('scripts-page')

<!-- BEGIN: Page JS-->
<script src="{!! asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') !!}"></script>
<script src="{!! asset('app-assets/vendors/js/extensions/polyfill.min.js') !!}"></script>
<script src="{!! asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') !!}"></script>
<!-- END: Page JS-->
<script>
    var canvas = document.getElementById('canvas');
    var engine = new Engine();
    engine.setCanvas(canvas);
    engine.init();
    canvas.addEventListener('mousedown', function (event) {
        engine.onMouseClick(event);
    }, false);

    canvas.addEventListener('mousemove', function (event) {
        engine.onMouseMove(event);
    }, false);

    window.addEventListener('keydown', function (event) {
        engine.onButtonClick(event);
    }, false);

    engine.loadPatientData("Magdalena",
                        "Bárður Thomsen",
                        "1002",
                        "hc 001",
                        "26/02/2018",
                        "dentist one",
                        "Test specifications",
                        "Test observations");


    engine.toggleObserverState(true);

    observer = function(id){

        window.alert("Clicked " + id);
    };

    engine.setObserver(observer);
</script>
@endpush
