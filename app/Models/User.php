<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * User model
 * Class User
 * @package App\Models
 */
class User extends Eloquent
{
    public static function getInstance()
    {
        return new self();
    }

}