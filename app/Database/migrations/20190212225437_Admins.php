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
                'admin_super',
                'admin_one',
                'admin_two'
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
