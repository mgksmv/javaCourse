<?php

use App\Models\Course;
use App\Models\UserLevel;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignIdFor(UserLevel::class)->nullable()->constrained('users__levels')->nullOnDelete();
            $table->foreignIdFor(Course::class, 'prev_course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->foreignIdFor(Course::class, 'next_course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
