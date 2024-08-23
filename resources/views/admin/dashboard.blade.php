@include('components.admNavbar')
<!-- Content Wrapper -->
<div class="content-wrapper p-3">
    <!-- content-header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-8 col-sm-6">
                    <h5 class="">Selamat Datang Administrator Di Halaman Admin Keuangan</h5>
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
            <!-- Small Boxes -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Small Boxes -->

            <div class="row">
                <!--section-left-->
                <section class="col-lg-7 connectedSortable ui-sortable">
                    <div class="card cardmin">
                        <div class="card-header ui-sortable-handle" style="cursor: move">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
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
                                    style="position: relative; height: 300px">
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
                <!--section-left-->

                <!--section-right-->
                <section class="col-lg-5 connectedSortable ui-sortable">
                    <div class="card cardmin bg-gradient-success">
                        <div class="card-header border-0 ui-sortable-handle" style="cursor: move">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>

                            <div class="card-tools">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                        data-toggle="dropdown" data-offset="-52" fdprocessedid="xmyko">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0" style="display: block">
                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous">
                                                                    <span class="fa fa-chevron-left"
                                                                        title="Previous Month"></span>
                                                                </th>
                                                                <th class="picker-switch text-center"
                                                                    data-action="pickerSwitch" colspan="5"
                                                                    title="Select Month">
                                                                    July 2024
                                                                </th>
                                                                <th class="next" data-action="next"
                                                                    style="text-align: right;">
                                                                    <span class="fa fa-chevron-right"
                                                                        title="Next Month"></span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Su</th>
                                                                <th class="dow">Mo</th>
                                                                <th class="dow">Tu</th>
                                                                <th class="dow">We</th>
                                                                <th class="dow">Th</th>
                                                                <th class="dow">Fr</th>
                                                                <th class="dow">Sa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="06/30/2024"
                                                                    class="day old weekend">
                                                                    30
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/01/2024"
                                                                    class="day">
                                                                    1
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/02/2024"
                                                                    class="day">
                                                                    2
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/03/2024"
                                                                    class="day">
                                                                    3
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/04/2024"
                                                                    class="day">
                                                                    4
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/05/2024"
                                                                    class="day">
                                                                    5
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/06/2024"
                                                                    class="day weekend">
                                                                    6
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="07/07/2024"
                                                                    class="day weekend">
                                                                    7
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/08/2024"
                                                                    class="day">
                                                                    8
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/09/2024"
                                                                    class="day">
                                                                    9
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/10/2024"
                                                                    class="day">
                                                                    10
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/11/2024"
                                                                    class="day">
                                                                    11
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/12/2024"
                                                                    class="day">
                                                                    12
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/13/2024"
                                                                    class="day weekend">
                                                                    13
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="07/14/2024"
                                                                    class="day weekend">
                                                                    14
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/15/2024"
                                                                    class="day">
                                                                    15
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/16/2024"
                                                                    class="day">
                                                                    16
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/17/2024"
                                                                    class="day">
                                                                    17
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/18/2024"
                                                                    class="day">
                                                                    18
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/19/2024"
                                                                    class="day">
                                                                    19
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/20/2024"
                                                                    class="day weekend">
                                                                    20
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="07/21/2024"
                                                                    class="day weekend">
                                                                    21
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/22/2024"
                                                                    class="day">
                                                                    22
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/23/2024"
                                                                    class="day">
                                                                    23
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/24/2024"
                                                                    class="day">
                                                                    24
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/25/2024"
                                                                    class="day">
                                                                    25
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/26/2024"
                                                                    class="day">
                                                                    26
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/27/2024"
                                                                    class="day weekend">
                                                                    27
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="07/28/2024"
                                                                    class="day weekend">
                                                                    28
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/29/2024"
                                                                    class="day">
                                                                    29
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/30/2024"
                                                                    class="day active today">
                                                                    30
                                                                </td>
                                                                <td data-action="selectDay" data-day="07/31/2024"
                                                                    class="day">
                                                                    31
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/01/2024"
                                                                    class="day new">
                                                                    1
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/02/2024"
                                                                    class="day new">
                                                                    2
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/03/2024"
                                                                    class="day new weekend">
                                                                    3
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="08/04/2024"
                                                                    class="day new weekend">
                                                                    4
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/05/2024"
                                                                    class="day new">
                                                                    5
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/06/2024"
                                                                    class="day new">
                                                                    6
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/07/2024"
                                                                    class="day new">
                                                                    7
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/08/2024"
                                                                    class="day new">
                                                                    8
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/09/2024"
                                                                    class="day new">
                                                                    9
                                                                </td>
                                                                <td data-action="selectDay" data-day="08/10/2024"
                                                                    class="day new weekend">
                                                                    10
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous">
                                                                    <span class="fa fa-chevron-left"
                                                                        title="Previous Year"></span>
                                                                </th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Year">
                                                                    2024
                                                                </th>
                                                                <th class="next" data-action="next">
                                                                    <span class="fa fa-chevron-right"
                                                                        title="Next Year"></span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7">
                                                                    <span data-action="selectMonth"
                                                                        class="month">Jan</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Feb</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Mar</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Apr</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">May</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jun</span><span
                                                                        data-action="selectMonth"
                                                                        class="month active">Jul</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Aug</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Sep</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Oct</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Nov</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Dec</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-years" style="display: none">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous">
                                                                    <span class="fa fa-chevron-left"
                                                                        title="Previous Decade"></span>
                                                                </th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Decade">
                                                                    2020-2029
                                                                </th>
                                                                <th class="next" data-action="next">
                                                                    <span class="fa fa-chevron-right"
                                                                        title="Next Decade"></span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7">
                                                                    <span data-action="selectYear"
                                                                        class="year old">2019</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2020</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2021</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2022</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2023</span><span
                                                                        data-action="selectYear"
                                                                        class="year active">2024</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2025</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2026</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2027</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2028</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2029</span><span
                                                                        data-action="selectYear"
                                                                        class="year old">2030</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-decades" style="display: none">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous">
                                                                    <span class="fa fa-chevron-left"
                                                                        title="Previous Century"></span>
                                                                </th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5">
                                                                    2000-2090
                                                                </th>
                                                                <th class="next" data-action="next">
                                                                    <span class="fa fa-chevron-right"
                                                                        title="Next Century"></span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7">
                                                                    <span data-action="selectDecade"
                                                                        class="decade old"
                                                                        data-selection="2006">1990</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2006">2000</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2016">2010</span><span
                                                                        data-action="selectDecade"
                                                                        class="decade active"
                                                                        data-selection="2026">2020</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2036">2030</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2046">2040</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2056">2050</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2066">2060</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2076">2070</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2086">2080</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2096">2090</span><span
                                                                        data-action="selectDecade" class="decade old"
                                                                        data-selection="2106">2100</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="picker-switch accordion-toggle"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--section-right-->
            </div>
        </div>
    </section>
    <!-- main-content end -->
</div>
@include('components.admFooter')
