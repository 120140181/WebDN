    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- Carousel JS -->
    <script src="assets/vendor/node_modules/owl-carousel/js/owl.carousel.min.js"></script>
    <!-- jquery -->
    <script src="assets/vendor/node_modules/jquery/dist/jquery.js"></script>
    <script src="assets/vendor/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/node_modules/jquery/src/jquery.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#editReminder').on('show.bs.modal', function (event) {
            var button =$(event.relatedTarget)
            var edire_id = button.data('edire_id')
            var nama = button.data('nama')
            var kwitansi = button.data('kwitansi')
            var status = button.data('status')
            var keterangan = button.data('keterangan')
            var tanggal = button.data('tanggal')

            var modal =$(this)
            modal.find('.modal-body #edire_id').val(edire_id);
            modal.find('.modal-body #nama_nasabah').val(nama);
            modal.find('.modal-body #nomor_kwitansi').val(kwitansi);
            modal.find('.modal-body #status_pembayaran').val(status);
            modal.find('.modal-body #keterangan').val(keterangan);
            modal.find('.modal-body #tanggal_tagihan').val(tanggal);
        })
    </script>
    </body>

    </html>
