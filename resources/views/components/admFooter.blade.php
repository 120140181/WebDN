    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    {{-- jspdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
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
        $('#editReminder').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var edire_id = button.data('edire_id')
            var nama = button.data('nama')
            var kwitansi = button.data('kwitansi')
            var nominal_tagihan = button.data('nominal_tagihan')
            var status = button.data('status')
            var keterangan = button.data('keterangan')
            var tanggal = button.data('tanggal')

            // Format nominal_tagihan untuk ditampilkan dengan titik pemisah ribuan
            var formattedNominal = new Intl.NumberFormat('id-ID').format(nominal_tagihan);

            var modal = $(this)
            modal.find('.modal-body #edire_id').val(edire_id);
            modal.find('.modal-body #nama_nasabah').val(nama);
            modal.find('.modal-body #nomor_kwitansi').val(kwitansi);
            modal.find('.modal-body #nominal_tagihan').val(formattedNominal); // Gunakan format
            modal.find('.modal-body #status_pembayaran').val(status);
            modal.find('.modal-body #keterangan').val(keterangan);
            modal.find('.modal-body #tanggal_tagihan').val(tanggal);
        });
    </script>

    <!-- Event Listener untuk tombol PDF -->
    <script>
        document.querySelector('.buttons-pdf').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Ambil tabel dari HTML
            doc.autoTable({
                html: '.table',
                startY: 20,
                theme: 'striped'
            });

            // Tambahkan judul atau teks lainnya
            doc.text('History Payment', 14, 15);

            // Download file PDF
            doc.save('history-paymentWebDN.pdf');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nominalTagihanInput = document.getElementById('nominal_tagihan');

            function formatNumber(value) {
                // Menghapus semua karakter selain angka
                value = value.replace(/\D/g, '');
                // Menambahkan titik setiap 3 digit
                return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            function removeFormatting(value) {
                // Menghapus titik
                return value.replace(/\./g, '');
            }

            // Format input field on input event
            nominalTagihanInput.addEventListener('input', function(e) {
                let unformattedValue = removeFormatting(e.target.value);
                this.value = formatNumber(unformattedValue);
            });

            // Format input field on load
            function formatOnLoad() {
                if (nominalTagihanInput.value) {
                    nominalTagihanInput.value = formatNumber(removeFormatting(nominalTagihanInput.value));
                }
            }

            formatOnLoad();
        });
    </script>




    </body>

    </html>
