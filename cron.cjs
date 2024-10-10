"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var cron = require("node-cron");
var shell = require("shelljs");
// Menjadwalkan perintah untuk dijalankan setiap 5 menit
cron.schedule('*/5 * * * *', function () {
    console.log('Menjalankan php artisan schedule:run');
    // Menjalankan perintah dengan shelljs
    shell.exec('php.exe artisan schedule:run >> /dev/null 2>&1', function (code, stdout, stderr) {
        if (code !== 0) {
            console.error("Error: ".concat(stderr));
        }
        else {
            console.log('Perintah berhasil dijalankan');
        }
    });
});
