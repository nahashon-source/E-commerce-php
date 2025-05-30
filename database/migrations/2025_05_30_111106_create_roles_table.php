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

        // SCHEMA::CREATEdefines a new database AND blueprintis laravels fluent table definition helper
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); //is shorthand for auto-incrementing primary key
            $table->string('name')->unique(); //creates a varchar field with a unique constraint
            $table->timestamps();//adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
// ALWAYS RUN php artisan migrate during dev to wipe and reseed your db when needed

 