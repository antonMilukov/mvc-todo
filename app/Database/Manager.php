<?php
namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Manager
{
    public static function init($params)
    {
        $capsule = new Capsule;
        $capsule->addConnection($params);

        //Make this Capsule instance available globally.
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM.
        $capsule->bootEloquent();
    }

}