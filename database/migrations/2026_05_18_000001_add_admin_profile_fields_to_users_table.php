<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_photo')->nullable()->after('password');
            $table->string('phone')->nullable()->after('profile_photo');
            $table->text('address')->nullable()->after('phone');
            $table->date('birth_date')->nullable()->after('address');
            $table->string('gender')->nullable()->after('birth_date');
            $table->string('admin_status')->default('approved')->after('role');
            $table->foreignId('approved_by')->nullable()->after('admin_status')->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable()->after('approved_by');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('approved_by');
            $table->dropColumn([
                'profile_photo',
                'phone',
                'address',
                'birth_date',
                'gender',
                'admin_status',
                'approved_at',
            ]);
        });
    }
};
