<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait DisableForeignKeys
{

    protected function DisableForeignKeys()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

    }

    protected function EnableForeignKeys()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

    }

}
