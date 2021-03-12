<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code');            
            $table->string('category');           
            $table->string('category_id');        
            $table->string('category_id_num');    
            $table->string('philhealth_id')->default('N/A');      
            $table->string('pwd_id')->default('N/A');             
            $table->string('last_name');          
            $table->string('first_name');         
            $table->string('middle_name')->default('N/A');        
            $table->string('suffix')->default('N/A');   
            $table->string('current_reside_reg')->default('N/A');          
            $table->string('current_reside_prov');
            $table->string('current_reside_mun'); 
            $table->string('current_reside_brgy');
            $table->string('sex');                
            $table->string('birth_date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
