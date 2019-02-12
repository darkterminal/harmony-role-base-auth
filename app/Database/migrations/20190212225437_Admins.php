<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class Admins extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Capsule::schema()->create('admins', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->enum('role', [
                'super', 
                'admin_partner',
                'admin_merchant',
                'admin_marketing',
                'admin_surveyor',
                'admin_financial',
                'admin_partner_officer'
            ]);
            $table->string('password');
            $table->string('password_reset');
            $table->timestamps();
        });

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->drop('admins');
    }
}