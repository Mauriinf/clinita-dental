@extends('vuexy.layouts.default', ['activePage' => 'home'])
@section('title','Principal')
@push('css-vendor')

@endpush
@section('content')
<div class="content-wrapper container-xxl p-0">
@role('Doctor|Admin|Asistente')
    <!-- ChartJS section start -->
    <section id="chartjs-chart">

        <div class="row">
            <!-- Donut Chart Starts -->
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Total Hombres y Mujeres Atendidos</h4>
                    </div>
                    <div class="card-body">
                        <canvas class="doughnut-chart-ex chartjs" data-height="275"></canvas>
                        <div class="d-flex justify-content-between mt-3 mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather='users'  class="font-medium-2 text-primary"></i>
                                <span class="fw-bold ms-75 me-25">Total Hombres</span>
                                <span>[ {{$generos[0]->Masculinos}} ]</span>
                            </div>
                            <div>
                                <span>{{$hombres}} %</span>
                                <i data-feather="arrow-up" class="text-success"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather='users'  class="font-medium-2 text-warning"></i>
                                <span class="fw-bold ms-75 me-25">Total Mujeres</span>
                                <span>[ {{$generos[0]->Femeninos}} ]</span>
                            </div>
                            <div>
                                <span>{{$mujeres}} %</span>
                                <i data-feather="arrow-up" class="text-success"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Donut Chart Starts -->
            <!-- Donut Chart Starts -->
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Total Mayores y Menores de Edad Atendidos</h4>
                    </div>
                    <div class="card-body">
                        <canvas class="chartjs" id="mayores-menores" data-height="275"></canvas>
                        <div class="d-flex justify-content-between mt-3 mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="calendar" class="font-medium-2 text-primary"></i>
                                <span class="fw-bold ms-75 me-25">Total Menores de Edad </span>
                                <span>[ {{$menores}} ]</span>
                            </div>
                            <div>
                                <span>{{$porcentajeMenores}} %</span>
                                <i data-feather="arrow-up" class="text-success"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="calendar" class="font-medium-2 text-warning"></i>
                                <span class="fw-bold ms-75 me-25">Total Mayores de Edad</span>
                                <span>[ {{$mayores}} ]</span>
                            </div>
                            <div>
                                <span>{{$porcentajeMayores}} %</span>
                                <i data-feather="arrow-up" class="text-success"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Donut Chart Starts -->

        </div>


    </section>
    <!-- ChartJS section end -->
@endrole
</div>
@endsection
@push('scripts-vendor')
<!-- BEGIN: Page Vendor JS-->
<script src="{!! asset('app-assets/vendors/js/charts/chart.min.js') !!}"></script>
<script src="{!! asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') !!}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<script src="{!! asset('app-assets/js/scripts/charts/chart-chartjs.js') !!}"></script>
<!-- END: Page JS-->
<script>
var hombres=<?php echo $hombres;?>;
var mujeres=<?php echo $mujeres;?>;
var porcMayores=<?php echo $porcentajeMayores;?>;
var porcMenores=<?php echo $porcentajeMenores;?>;
$(document).ready( function () {
    var doughnutChartEx = $('.doughnut-chart-ex');
    var MayoresMenores = $('#mayores-menores');
      // Color Variables
  var primaryColorShade = '#836AF9',
    yellowColor = '#ffe800',
    successColorShade = '#28dac6',
    warningColorShade = '#ffe802',
    warningLightColor = '#FDAC34',
    infoColorShade = '#299AFF',
    greyColor = '#4F5D70',
    blueColor = '#2c9aff',
    blueLightColor = '#84D0FF',
    greyLightColor = '#EDF1F4',
    tooltipShadow = 'rgba(0, 0, 0, 0.25)',
    lineChartPrimary = '#666ee8',
    lineChartDanger = '#ff4961',
    grid_line_color = 'rgba(200, 200, 200, 0.2)'; // RGBA color helps in dark layout
      // Doughnut Chart
  // --------------------------------------------------------------------
  if (doughnutChartEx.length) {
    var doughnutExample = new Chart(doughnutChartEx, {
      type: 'doughnut',
      options: {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        cutoutPercentage: 60,
        legend: { display: false },
        tooltips: {
          callbacks: {
            label: function (tooltipItem, data) {
              var label = data.datasets[0].labels[tooltipItem.index] || '',
                value = data.datasets[0].data[tooltipItem.index];
              var output = ' ' + label + ' : ' + value + ' %';
              return output;
            }
          },
          // Updated default tooltip UI
          shadowOffsetX: 1,
          shadowOffsetY: 1,
          shadowBlur: 8,
          shadowColor: tooltipShadow,
          backgroundColor: window.colors.solid.white,
          titleFontColor: window.colors.solid.black,
          bodyFontColor: window.colors.solid.black
        }
      },
      data: {
        datasets: [
          {
            labels: ['Hombres', 'Mujeres'],
            data: [hombres, mujeres],
            backgroundColor: [warningLightColor, window.colors.solid.primary],
            borderWidth: 0,
            pointStyle: 'rectRounded'
          }
        ]
      }
    });
  }
  if (MayoresMenores.length) {

    var edadesExample = new Chart(MayoresMenores, {
      type: 'doughnut',
      options: {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        cutoutPercentage: 60,
        legend: { display: false },
        tooltips: {
          callbacks: {
            label: function (tooltipItem, data) {
              var label = data.datasets[0].labels[tooltipItem.index] || '',
                value = data.datasets[0].data[tooltipItem.index];
              var output = ' ' + label + ' : ' + value + ' %';
              return output;
            }
          },
          // Updated default tooltip UI
          shadowOffsetX: 1,
          shadowOffsetY: 1,
          shadowBlur: 8,
          shadowColor: tooltipShadow,
          backgroundColor: window.colors.solid.white,
          titleFontColor: window.colors.solid.black,
          bodyFontColor: window.colors.solid.black
        }
      },
      data: {
        datasets: [
          {
            labels: ['Menores de Edad','Mayores de Edad'],
            data: [porcMenores,porcMayores ],
            backgroundColor: [warningLightColor, window.colors.solid.primary],
            borderWidth: 0,
            pointStyle: 'rectRounded'
          }
        ]
      }
    });
  }
});
</script>
@endpush

