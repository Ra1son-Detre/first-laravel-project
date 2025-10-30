<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class Tags extends Seeder
{
   
    public function run()
    {
        Tag::firstOrCreate(['url'=>'sale', 'title'=>'Sales']);
        Tag::firstOrCreate(['url'=>'damaged', 'title'=>'Crush']);
        Tag::firstOrCreate(['url'=>'tuning', 'title'=>'Tuned']);
        Tag::firstOrCreate(['url'=>'sport', 'title'=>'Sport car']);
    }
}
