<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Group;

define('ROLE_GUEST', 0);
define('ROLE_MODERATOR', 1);
define('ROLE_ADMIN', 2);
define('ROLE_SUPERADMIN', 3);
define('ROLE_OWNER', 4);

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 16)->unique();
            $table->integer('inherits_from')->nullable();
            $table->smallInteger('role')->default(0);
            $table->timestamps();

            $table->foreign('inherits_from')->references('id')->on('groups');
        });

        Group::create([
            'name' => 'Guest',
            'role_type' => ROLE_GUEST
        ]);

        Group::create([
            'name' => 'Owner',
            'role' => ROLE_OWNER
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
