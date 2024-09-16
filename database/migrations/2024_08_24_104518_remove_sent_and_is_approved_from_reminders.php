<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reminders', function (Blueprint $table) {
            // Cek apakah kolom 'sent' ada sebelum menghapus
            if (Schema::hasColumn('reminders', 'sent')) {
                $table->dropColumn('sent');
            }

            // Cek apakah kolom 'is_approved' ada sebelum menghapus
            if (Schema::hasColumn('reminders', 'is_approved')) {
                $table->dropColumn('is_approved');
            }
        });
    }

    public function down(): void
    {
        Schema::table('reminders', function (Blueprint $table) {
            // Kembalikan kolom jika migration dibatalkan
            if (!Schema::hasColumn('reminders', 'sent')) {
                $table->boolean('sent')->default(false);
            }

            if (!Schema::hasColumn('reminders', 'is_approved')) {
                $table->boolean('is_approved')->default(false);
            }
        });
    }
};
