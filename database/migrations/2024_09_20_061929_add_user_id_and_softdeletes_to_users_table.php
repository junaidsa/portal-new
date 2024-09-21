<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->unsignedBigInteger('branch_id')->nullable()->after('user_id');
            $table->softDeletes()->after('updated_at');
            $table->string('parent_name')->nullable()->after('name');
            $table->string('data_of_birth')->nullable()->after('parent_name');
            $table->string('cnic')->nullable()->after('data_of_birth');
            $table->string('phone_number')->nullable()->after('cnic');
            $table->string('class_type')->nullable()->after('phone_number');
            $table->text('address')->nullable()->after('phone_number');
            $table->text('subject')->nullable()->after('address');
            $table->text('level')->nullable()->after('subject');
            $table->text('timing')->nullable()->after('level');
            $table->text('date')->nullable()->after('timing');
            $table->text('payment_information')->nullable()->after('date');
            $table->text('role_description')->nullable()->after('payment_information');
            $table->text('note')->nullable()->after('role_description');
            $table->string('profile_pic')->nullable()->after('note');
        });
    }   
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
            $table->dropSoftDeletes();
        });
    }
};
