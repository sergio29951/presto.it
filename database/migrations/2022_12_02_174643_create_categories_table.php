<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });

        $categories = [
        ['name'=>'Motori', 'name_en'=>'Motors'],
        ['name'=>'Informatica', 'name_en'=>'Technologies'],
        ['name'=>'Elettrodomestici', 'name_en'=>'Domestic appliances'],
        ['name'=>'Sport', 'name_en'=>'Sport'],
        ['name'=>'Telefonia', 'name_en'=>'Smarthpones'],
        ['name'=>'Immobili', 'name_en'=>'Properties'],
        ['name'=>'Giochi', 'name_en'=>'Toys'],
        ['name'=>'Arredamento', 'name_en'=>'Forniture'],
        ['name'=>'Cucina', 'name_en'=>'Kitchen'],
        ['name'=>'Abbigliamento', 'name_en'=>'Clothes'],

        ];

        
        
        foreach($categories as $category){         
            Category::create(['name' => $category['name'],'name_en' => $category['name_en']]);
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
