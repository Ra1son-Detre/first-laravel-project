<?php
use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
           $table->dropColumn('brand');
           $table->foreignId('brand_id')->after('deleted_at')->constrained('brands');
        });
    }

   
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Brand::class);
            $table->string('brand');
        });
    }
};
