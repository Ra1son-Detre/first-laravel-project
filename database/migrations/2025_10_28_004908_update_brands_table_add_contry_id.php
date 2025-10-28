<?php
use App\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->foreignIdFor(Country::class);
        });
    }

   
    public function down()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->dropForeignIdFor(Country::class);
        });
    }
};
