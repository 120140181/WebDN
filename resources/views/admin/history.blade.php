@include('components.admNavbar')
<div class="wrapper" style="min-width: 100%;">
    <div class="content-wrapper p-3">
        <!-- content-header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-8 col-sm-6">
                        <h2 class="">History</h2>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <i class="nav-icon fas fa-home"></i>
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">History</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <blockquote class="quote-primary">
                            <h5 id="tip">Total Tagihan Lunas :</h5>
                            <p>Rp. {{ number_format($totalTagihanLunas, 0, ',', '.') }}</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content-header">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h3 class="card-title mb-2 mb-md-0">History Payment</h3>
                            <div class="d-flex flex-column flex-md-row align-items-center ml-md-auto">
                                <!-- Sort and Filter Dropdown -->
                                <div class="dropdown mx-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort and Filter
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                        <li><a class="dropdown-item" href="#" data-sort="all">Show All</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="Lunas">Lunas</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="Canceled">Canceled</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#" data-sort="nomor-asc">Number (Lowest to Highest)</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="nomor-desc">Number (Highest to Lowest)</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="tanggal-asc">Date (Newest to Oldest)</a></li>
                                        <li><a class="dropdown-item" href="#" data-sort="tanggal-desc">Date (Oldest to Newest)</a></li>
                                    </ul>
                                </div>
                                <!-- Search Input -->
                                <div class="input-group input-group-md mb-2 mb-md-0" style="width: 250px;">
                                    <input type="text" id="searchInput" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="button" id="searchButton" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Print PDF Button -->
                                <div class="ml-md-2">
                                    <button class="btn btn-outline-danger buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button">
                                        <span class="iconify mr-1" data-icon="vscode-icons:file-type-pdf2" data-inline="false" style="font-size: 24px;"></span>Print PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="table2" class="table table-bordered table-hover text-nowrap" aria-describedby="table2-info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Nasabah</th>
                                        <th>Nomor Kwitansi</th>
                                        <th>Nominal Tagihan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $d)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $d->nama_nasabah }}</td>
                                            <td>{{ $d->nomor_kwitansi }}</td>
                                            <td>Rp. {{ number_format($d->nominal_tagihan, 0, ',', '.') }}</td>
                                            <td>{{ date('d-m-Y', strtotime($d->tanggal_tagihan)) }}</td>
                                            <td>{{ $d->status_pembayaran }}</td>
                                            <td>{{ $d->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('components.admFooter')
