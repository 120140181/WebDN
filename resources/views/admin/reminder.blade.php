@include('components.admNavbar')
<div class="wrapper" style="min-width: 100vh;">
    <!-- Content Wrapper -->
    <div class="content-wrapper p-3" style="min-width: 100vh;">
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
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Reminder</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <!-- reminder expandable table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="col-lg">
                            <h3 class="card-title">Payment Info</h3>
                        </div>
                        <button class="btn btn-success" id="addButton">
                            <i class="fa fa-plus" aria-hidden="true"></i><span> Tambah reminder</span>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nasabah</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td>Pending</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>657</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Denied</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>134</td>
                                        <td>Jim Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>494</td>
                                        <td>Victoria Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Pending</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>832</td>
                                        <td>Michael Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>982</td>
                                        <td>Rocky Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Denied</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        <td><button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteData(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- reminder expandle table -->

        <div class="container-fluid">
            <div class="row">
                <!--section-left-->
                <section class="col-12 connectedSortable ui-sortable">
                    <div class="card bg-gradient-success">
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

                        <div class="card-body text-center pt-0">
                            <div id="calendar">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days">
                                                    <table class="table table-sm ">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous">
                                                                    <span class="fa fa-chevron-left"
                                                                        title="Previous Month"></span>
                                                                </th>
                                                                <th class="picker-switch text-center  "
                                                                    data-action="pickerSwitch" colspan="5"
                                                                    title="Select Month">
                                                                    July 2024
                                                                </th>
                                                                <th class="next" data-action="next">
                                                                    <span class="fa fa-chevron-right"
                                                                        title="Next Month"></span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Sunday</th>
                                                                <th class="dow">Monday</th>
                                                                <th class="dow">Tuesday</th>
                                                                <th class="dow">Wednesday</th>
                                                                <th class="dow">Thursday</th>
                                                                <th class="dow">Friday</th>
                                                                <th class="dow">Saturday</th>
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
            </div>
        </div>
        <!-- Modal untuk Tambah dan Edit -->
        <div class="modal" id="dataModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="dataForm">
                            <div class="form-group">
                                <label for="customer">Nasabah</label>
                                <input type="text" class="form-control" id="customer" name="customer" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--section-left-->

        <!--section-right-->

        <!--section-right-->
    </div>

</div>
@include('components.admFooter')
