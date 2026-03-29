<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('menu_settings', function (Blueprint $table) {
            $table->string('admin_password')->nullable()->after('whatsapp_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_settings', function (Blueprint $table) {
            $table->dropColumn('admin_password');
        });
    }
};
