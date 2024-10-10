import cron from 'node-cron';
const shell = require('shelljs');

cron.schedule('* * * * *', () => {
    console.log('Running cronjobs...');
    // Menjalankan perintah dengan shelljs
    shell.exec('php artisan schedule:run >> /dev/null 2>&1');
});
