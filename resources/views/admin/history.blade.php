@include('components.admNavbar')
<div class="wrapper" style="min-width: 100vh">
    <div class="content-wrapper p-3" style="min-width: 100vh">
        <!-- content-header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-8 col-sm-6">
                        <h5 class="">
                            Selamat Datang Administrator Di Halaman Admin Keuangan
                        </h5>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <i class="nav-icon fas fa-home"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">History</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!--Main Content-->
        <section class="content-header">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">History Payment</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
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
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td>Pending</td>
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>657</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Denied</td>
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>134</td>
                                        <td>Jim Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>494</td>
                                        <td>Victoria Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Pending</td>
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>832</td>
                                        <td>Michael Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>982</td>
                                        <td>Rocky Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Denied</td>
                                        <td>
                                            Bacon ipsum dolor sit amet salami venison chicken
                                            flank fatback doner.
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editData(this)">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially
                                                unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum
                                                passages, and more recently with desktop publishing
                                                software like Aldus PageMaker including versions of
                                                Lorem Ipsum.
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal untuk Edit -->
        <div class="modal" id="editModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <div class="form-group">
                                <label for="edit-customer">Customer</label>
                                <input type="text" class="form-control" id="edit-customer" name="customer" />
                            </div>
                            <div class="form-group">
                                <label for="edit-tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="edit-tanggal" name="tanggal" />
                            </div>
                            <div class="form-group">
                                <label for="edit-status">Status</label>
                                <input type="text" class="form-control" id="edit-status" name="status" />
                            </div>
                            <div class="form-group">
                                <label for="edit-keterangan">Keterangan</label>
                                <textarea class="form-control" id="edit-keterangan" name="keterangan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.admFooter')
