<?php
namespace App\Services\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Database manager
 * - init and connect by config params
 * Class Manager
 * @package App\Services\Database
 */
class Manager
{
    /**
     * Init and connect
     * @param $params
     */
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