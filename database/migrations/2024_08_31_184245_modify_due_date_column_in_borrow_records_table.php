<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDueDateColumnInBorrowRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrow_records', function (Blueprint $table) {
            // تعديل العمود ليدعم القيم الفارغة
            $table->dateTime('due_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrow_records', function (Blueprint $table) {
            // إعادة العمود إلى حالته السابقة (إن أمكن)
            $table->dateTime('due_date')->nullable(false)->change();
        });
    }
}
