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
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            modal.find('.modal-body #nominal_tagihan').val(formattedNominal);
            modal.find('.modal-body #status_pembayaran').val(status);
            modal.find('.modal-body #keterangan').val(keterangan);
            modal.find('.modal-body #tanggal_tagihan').val(tanggal);
        });
    </script>

    <script>
        document.getElementById('nominal_tagihan').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, ''); // Hanya izinkan angka
        });

        function formatNumber(value) {
            // Menghilangkan karakter selain angka
            value = value.replace(/\D/g, '');

            // Menambahkan format ribuan
            return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const nominalInputs = document.querySelectorAll('#nominal_tagihan');

            nominalInputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.value = formatNumber(this.value);
                });
            });
        });
    </script>

    <!-- Event Listener untuk tombol PDF -->
    <script>
        document.querySelector('.buttons-pdf').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Ambil data dari tabel yang hanya baris yang terlihat (tidak tersembunyi)
            const rows = document.querySelectorAll('#table2 tbody tr');
            const tableData = [];

            rows.forEach((row, index) => {
                // Cek apakah baris tersembunyi, jika tersembunyi lewati
                if (row.style.display === 'none' || row.hidden) return;

                const cells = row.querySelectorAll('td');
                const rowData = {
                    no: cells[0].textContent.trim(),
                    nama_nasabah: cells[1].textContent.trim(),
                    nomor_kwitansi: cells[2].textContent.trim(),
                    nominal_tagihan: cells[3].textContent.trim(),
                    tanggal_tagihan: cells[4].textContent.trim(),
                    status_pembayaran: cells[5].textContent.trim(),
                    keterangan: cells[6].textContent.trim()
                };
                tableData.push(rowData);
            });

            // Tambahkan judul atau teks lainnya
            doc.text('History Payment', 14, 15);

            // Tambahkan tabel ke PDF
            doc.autoTable({
                columns: [{
                        header: 'No',
                        dataKey: 'no'
                    },
                    {
                        header: 'Nama Nasabah',
                        dataKey: 'nama_nasabah'
                    },
                    {
                        header: 'Nomor Kwitansi',
                        dataKey: 'nomor_kwitansi'
                    },
                    {
                        header: 'Nominal Tagihan',
                        dataKey: 'nominal_tagihan'
                    },
                    {
                        header: 'Tanggal',
                        dataKey: 'tanggal_tagihan'
                    },
                    {
                        header: 'Status',
                        dataKey: 'status_pembayaran'
                    },
                    {
                        header: 'Keterangan',
                        dataKey: 'keterangan'
                    }
                ],
                body: tableData,
                startY: 20,
                theme: 'striped'
            });

            // Download file PDF
            doc.save('history-paymentWebDN.pdf');
        });
    </script>
    {{-- search bar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchButton = document.getElementById('searchButton');
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('table1');
            const tableRows = table.querySelectorAll('tbody tr');

            // Fungsi pencarian
            function searchTable() {
                const searchTerm = searchInput.value.toLowerCase();

                tableRows.forEach(row => {
                    const cells = row.getElementsByTagName('td');
                    let rowText = '';
                    for (let i = 0; i < cells.length; i++) {
                        rowText += cells[i].textContent.toLowerCase() + ' ';
                    }
                    if (rowText.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Event listener untuk tombol pencarian
            searchButton.addEventListener('click', searchTable);

            // Optional: Pencarian langsung saat mengetik
            searchInput.addEventListener('keyup', searchTable);
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchButton = document.getElementById('searchButton');
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('table2');
        const tableRows = table.querySelectorAll('tbody tr');

        // Fungsi pencarian
        function searchTable() {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                let rowText = '';
                for (let i = 0; i < cells.length; i++) {
                    rowText += cells[i].textContent.toLowerCase() + ' ';
                }
                if (rowText.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchButton.addEventListener('click', searchTable);

        searchInput.addEventListener('keyup', searchTable);
    });
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.querySelector('#table1');
            const tbody = table.querySelector('tbody');
            const sortDropdownItems = document.querySelectorAll('.dropdown-item');

            function sortTable(columnIndex, ascending) {
                const rows = Array.from(tbody.querySelectorAll('tr'));
                rows.sort((rowA, rowB) => {
                    const cellA = rowA.children[columnIndex].innerText.trim();
                    const cellB = rowB.children[columnIndex].innerText.trim();

                    const valueA = isNaN(cellA) ? cellA : parseFloat(cellA.replace(/[^0-9.-]/g, ''));
                    const valueB = isNaN(cellB) ? cellB : parseFloat(cellB.replace(/[^0-9.-]/g, ''));

                    return ascending ? valueA > valueB ? 1 : -1 : valueA < valueB ? 1 : -1;
                });

                rows.forEach(row => tbody.appendChild(row));
            }

            sortDropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    const sortType = this.getAttribute('data-sort');
                    let columnIndex;
                    let ascending;

                    switch (sortType) {
                        case 'nomor-asc':
                            columnIndex = 0; // Nomor column
                            ascending = true;
                            break;
                        case 'nomor-desc':
                            columnIndex = 0; // Nomor column
                            ascending = false;
                            break;
                        case 'tanggal-asc':
                            columnIndex = 6; // Tanggal column
                            ascending = true;
                            break;
                        case 'tanggal-desc':
                            columnIndex = 6; // Tanggal column
                            ascending = false;
                            break;
                    }

                    sortTable(columnIndex, ascending);
                });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function() {
                const sortType = this.getAttribute('data-sort');
                const table = document.getElementById('table2');
                const tbody = table.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                let compareFunction;

                // Filter untuk "Lunas" dan "Canceled"
                if (sortType === 'Lunas' || sortType === 'Canceled') {
                    rows.forEach(row => {
                        const status = row.cells[5].innerText.trim();
                        if (status === sortType) {
                            row.style.display = ''; // Tampilkan baris
                        } else {
                            row.style.display = 'none'; // Sembunyikan baris
                        }
                    });
                    return;
                }

                // Fungsi sorting untuk nomor dan tanggal
                switch (sortType) {
                    case 'nomor-asc':
                        compareFunction = (a, b) => parseInt(a.cells[0].innerText) - parseInt(b.cells[0]
                            .innerText);
                        break;
                    case 'nomor-desc':
                        compareFunction = (a, b) => parseInt(b.cells[0].innerText) - parseInt(a.cells[0]
                            .innerText);
                        break;
                    case 'tanggal-asc':
                        compareFunction = (a, b) => new Date(a.cells[4].innerText.split('-').reverse().join(
                            '-')) - new Date(b.cells[4].innerText.split('-').reverse().join('-'));
                        break;
                    case 'tanggal-desc':
                        compareFunction = (a, b) => new Date(b.cells[4].innerText.split('-').reverse().join(
                            '-')) - new Date(a.cells[4].innerText.split('-').reverse().join('-'));
                        break;
                    default:
                        compareFunction = null;
                        break;
                }

                if (compareFunction) {
                    rows.sort(compareFunction);
                    rows.forEach(row => {
                        row.style.display = ''; // Tampilkan semua baris sebelum sorting
                        tbody.appendChild(row);
                    });
                } else {
                    // Tampilkan semua baris untuk "Show All"
                    rows.forEach(row => {
                        row.style.display = ''; // Tampilkan semua baris
                    });
                }
            });
        });
    </script>

    </body>

    </html>
