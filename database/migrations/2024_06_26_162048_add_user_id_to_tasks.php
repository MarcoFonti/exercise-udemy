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
        Schema::table('tasks', function (Blueprint $table) {

            /* CREAZIONE DELLA COLLONA USER_ID NELLA TABELLA TASKS */
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {

            /* DISTRUGGO LA CHIAVE ESTERNA E LA COLLONA */
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
