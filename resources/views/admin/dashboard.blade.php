@include('components.admNavbar')
<!-- Content Wrapper -->
<div class="content-wrapper p-3">
    <!-- content-header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-8 col-sm-6">
                    <h2 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Dashboard</h2>
                    <small>
                        <script type='text/javascript'>
                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                                'November', 'Desember'
                            ];
                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth();
                            var thisDay = date.getDay(),
                                thisDay = myDays[thisDay];
                            var yy = date.getYear();
                            var year = (yy < 1000) ? yy + 1900 : yy;
                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                            //
                        </script>
                    </small>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-home"></i>
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- main-content start -->
    <section class="content">
        <div class="container-fluid">
            <!-- main-content start -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small Boxes -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h4>{{ $tagihanLunas }}</h4>
                                    <p>Tagihan Lunas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('admin.history') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h4>{{ $tagihanDibatalkan }}</h4>
                                    <p>Tagihan Dibatalkan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('admin.history') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4>{{ $totalTagihanAktif }}</h4>
                                    <p>Tagihan Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('admin.reminder') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h4>Rp. {{ number_format($totalNominalTagihan, 0, ',', '.') }}</h4>
                                    <p>Total Nominal Tagihan Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('admin.reminder') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Small Boxes -->
                </div>
            </section>
            <!-- main-content end -->

            {{-- grafik start --}}
            <div class="row">
                <section class="col-lg-12 connectedSortable ui-sortable">
                    <div class="card cardmin">
                        <div class="card-header cardder ui-sortable-handle">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Statistik
                            </h3>
                            <div class="card-tools ml-auto">
                                <ul class="nav nav-pills ">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Line</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="chart tab-pane active" id="revenue-chart"
                                    style="position: relative; height: 300px; width:100%;">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="revenue-chart-canvas" height="375"
                                        style="height: 300px; display: block; width: 381px" width="476"
                                        class="chartjs-render-monitor"></canvas>
                                </div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="sales-chart-canvas" height="375"
                                        style="height: 300px; display: block; width: 381px" width="476"
                                        class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- main-content end -->
</div>
{{-- grafik --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('revenue-chart-canvas').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Total Tagihan Lunas',
                    data: @json($totals),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 3, // Ketebalan garis
                    pointRadius: 5, // Ukuran titik
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Warna titik
                    pointBorderColor: 'rgba(0, 0, 0, 1)', // Warna tepi titik
                    pointBorderWidth: 2 // Ketebalan tepi titik
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            boxWidth: 20, // Menentukan lebar kotak warna
                            padding: 20 // Menambahkan jarak di bawah label
                        }
                    },
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

{{-- donut --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            var target = $(e.target).attr("href");
            if (target === "#sales-chart") {
                var ctxDonut = document.getElementById('sales-chart-canvas').getContext('2d');
                new Chart(ctxDonut, {
                    type: 'doughnut',
                    data: {
                        labels: ['Total Tagihan Lunas', 'Total Tagihan Dibatalkan'],
                        datasets: [{
                            label: 'Tagihan Status',
                            data: [
                                @json($tagihanLunas),
                                @json($tagihanDibatalkan)
                            ],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, // Membuat grafik menyesuaikan dengan ukuran kontainer
                        plugins: {
                            legend: {
                                position: 'top',
                                align: 'center', // Menempatkan legend di tengah
                                labels: {
                                    boxWidth: 20, // Menentukan lebar kotak warna
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw
                                            .toLocaleString('id-ID');
                                    }
                                }
                            }
                        },
                    }
                });
            }
        });
    });
</script>
{{-- grafik --}}
@include('components.admFooter')
