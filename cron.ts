import * as cron from 'node-cron';
import * as shell from 'shelljs';

// Menjadwalkan perintah untuk dijalankan setiap 5 menit
cron.schedule('*/5 * * * *', () => {
    console.log('Menjalankan php artisan schedule:run');

    // Menjalankan perintah dengan shelljs
    shell.exec('php artisan schedule:run >> /dev/null 2>&1', (code, stdout, stderr) => {
        if (code !== 0) {
            console.error(`Error: ${stderr}`);
        } else {
            console.log('Perintah berhasil dijalankan');
        }
    });
});
