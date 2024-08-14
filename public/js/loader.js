var loader = document.getElementById("preloader");

window.addEventListener("load", function () {
    setTimeout(function () {
        loader.style.opacity = "0"; // Ubah opacity menjadi 0 untuk memulai transisi
        setTimeout(function () {
            loader.style.display = "none"; // Sembunyikan preloader setelah transisi selesai
        }, 1000); // Waktu sesuai dengan durasi transisi CSS (1 detik)
    }, 2000); // Delay sebelum memulai transisi (2 detik)
});
