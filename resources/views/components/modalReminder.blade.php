{{-- Modal Tambah --}}
<div class="modal fade" id="tambahReminder" tabindex="-1" aria-labelledby="tambahReminderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahReminderLabel">Form Tambah Reminder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.reminder-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_nasabah" class="form-label">Nama Nasabah</label>
                        <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_kwitansi" class="form-label">Nomor Kwitansi</label>
                        <input type="text" class="form-control" id="nomor_kwitansi" name="nomor_kwitansi" required>
                    </div>
                    <div class="mb-3">
                        <label for="nominal_tagihan" class="form-label">Nominal Tagihan</label>
                        <input type="text" class="form-control" id="nominal_tagihan" name="nominal_tagihan" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                        <select class="form-select" id="status_pembayaran" name="status_pembayaran" required>
                            <option value="Belum Lunas">Pending</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_tagihan" class="form-label">Tanggal Tagihan</label>
                        <input type="date" class="form-control" id="tanggal_tagihan" name="tanggal_tagihan" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- //Modal Tambah --}}

{{-- Modal Edit --}}
<div class="modal fade" id="editReminder" tabindex="-1" aria-labelledby="editReminderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editReminderLabel">Form Edit Reminder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.reminder-update', 'test') }}" method="POST"
                    id="editReminderForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="reminder_id" id="edire_id">
                    <div class="mb-3">
                        <label for="nama_nasabah" class="form-label">Nama Nasabah</label>
                        <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_kwitansi" class="form-label">Nomor Kwitansi</label>
                        <input type="text" class="form-control" id="nomor_kwitansi" name="nomor_kwitansi" required>
                    </div>
                    <div class="mb-3">
                        <label for="nominal_tagihan" class="form-label">Nominal Tagihan</label>
                        <input type="text" class="form-control" id="nominal_tagihan" name="nominal_tagihan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                        <select class="form-select" id="status_pembayaran" name="status_pembayaran" required>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Pending</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_tagihan" class="form-label">Tanggal Tagihan</label>
                        <input type="date" class="form-control" id="tanggal_tagihan" name="tanggal_tagihan"
                            required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- //Modal Edit --}}
