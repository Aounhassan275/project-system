@extends('project.layout.index')

@section('title')
    Dashboard
@endsection

<style>
    .card-title-dash {
        font-size: 1.60rem;
        font-weight: 600;
        text-align: center;
        color: #333;
    }

    .card-subtitle-dash {
        font-size: 1.2rem;
        color: #0f0f0f;
    }

    .chart-container {
        position: relative;
        width: 115%;
        height: 378px;
        background: linear-gradient(to right, #26a69a, #26a69a);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    canvas {
        background: #fff;
        border-radius: 8px;
        padding: 7px;
        width: 100%;
        height: 100%;
    }

    .chartjs-legend ul {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 10px 0 0;
    }

    .chartjs-legend ul li {
        margin: 0 10px;
        font-size: 14px;
        color: #333;
    }

    .chartjs-legend ul li span {
        display: inline-block;
        width: 12px;
        height: 12px;
        margin-right: 5px;
        border-radius: 50%;
    }

    .year-selector {
        display: flex;
        justify-content: center;
        margin-bottom: 5px;
        margin-top: -11px;
    }

    .year-selector label {
        margin: 0 10px;
        font-size: 16px;
        color: #fff;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0 text-center">
                            Project System
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-2 shadow-sm">
        <div class="d-sm-flex justify-content-between align-items-start">
            <h2 class="card-title card-title-dash mb-1">Monthly Process</h2>
            <div id="performance-line-legend" class="d-flex align-items-center">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="chart-container mt-1">
                    <div class="year-selector">
                        <label>
                            <input type="radio" name="year" value="{{ $currentYear }}" checked> {{ $currentYear }}
                        </label>
                        <label>
                            <input type="radio" name="year" value="{{ $previousYear }}"> {{ $previousYear }}
                        </label>
                    </div>
                    <canvas id="customGraph" style=" height: 304px;"></canvas>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="chart-container mt-1">
                     <div class="year-selector">
                        <label>
                            <input type="radio" name="year" value="{{ $currentYear }}" checked> {{ $currentYear }}
                        </label>
                        <label>
                            <input type="radio" name="year" value="{{ $previousYear }}"> {{ $previousYear }}
                        </label>
                    </div> 
                    <canvas id="customGraph2" style=" height: 304px;"></canvas>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const currentYearData = @json($registrationsCurrentYear);
        const previousYearData = @json($registrationsPreviousYear);
        const months = @json($months);
        const currentYearLabel = '{{ $currentYear }}';
        const previousYearLabel = '{{ $previousYear }}';

        const ctx = document.getElementById('customGraph').getContext('2d');
        const customGraph = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: `Number of Registered Farmers (${currentYearLabel})`,
                    data: currentYearData,
                    backgroundColor: 'rgba(31, 59, 179, 0.2)',
                    borderColor: '#E91E63',
                    borderWidth: 2,
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#26a69a',
                    pointHoverBorderColor: '#26a69a',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e5e7eb'
                        },
                        title: {
                            display: true,
                            text: 'Number of Registered Farmers'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            font: {
                                size: 16
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: '#E91E63',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#52CDFF',
                        borderWidth: 1
                    }
                }
            }
        });

        // const ctx2 = document.getElementById('customGraph2').getContext('2d');
        // const customGraph2 = new Chart(ctx2, {
        //     type: 'line',
        //     data: {
        //         labels: months,
        //         datasets: [{
        //             label: `Number of Farmer Monthly Report Submitted (${currentYearLabel})`,
        //             data: currentYearData,
        //             backgroundColor: 'rgba(31, 59, 179, 0.2)',
        //             borderColor: '#673AB7',
        //             borderWidth: 2,
        //             pointBorderColor: '#fff',
        //             pointHoverBackgroundColor: '#26a69a',
        //             pointHoverBorderColor: '#26a69a',
        //             tension: 0.4
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //                 grid: {
        //                     color: '#e5e7eb'
        //                 },
        //                 title: {
        //                     display: true,
        //                     text: 'Number of Farmer Monthly Report Submitted'
        //                 }
        //             },
        //             x: {
        //                 grid: {
        //                     display: false
        //                 },
        //                 title: {
        //                     display: true,
        //                     text: 'Months'
        //                 }
        //             }
        //         },
        //         plugins: {
        //             legend: {
        //                 position: 'top',
        //                 labels: {
        //                     usePointStyle: true,
        //                     font: {
        //                         size: 16
        //                     }
        //                 }
        //             },
        //             tooltip: {
        //                 enabled: true,
        //                 backgroundColor: '#673AB7',
        //                 titleColor: '#fff',
        //                 bodyColor: '#fff',
        //                 borderColor: '#52CDFF',
        //                 borderWidth: 1
        //             }
        //         }
        //     }
        // });


        document.querySelectorAll('input[name="year"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                const selectedYear = this.value;
                customGraph.data.datasets[0].label = `Number of Registered Farmers (${selectedYear})`;
                customGraph.data.datasets[0].data = selectedYear === currentYearLabel ? currentYearData :
                    previousYearData;
                customGraph.update();

                // customGraph2.data.datasets[0].label = label;
                // customGraph2.data.datasets[0].data = selectedYear === currentYearLabel ? currentYearData :
                //     previousYearData;
                // customGraph2.update();
            });
        });
    </script>
@endsection
