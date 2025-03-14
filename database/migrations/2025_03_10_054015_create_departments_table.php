<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/xxxx_xx_xx_xxxxxx_create_departments_table.php
public function up()
{
    Schema::create('tbl_department', function (Blueprint $table) {
        $table->id();
        $table->string('department_name', 50);
        $table->timestamp('created_on')->useCurrent();
        $table->foreignId('created_by')->nullable()->constrained('users');
        $table->timestamp('updated_on')->useCurrent()->nullable();
        $table->foreignId('updated_by')->nullable()->constrained('users');
        $table->primary('id');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
