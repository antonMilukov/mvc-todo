<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
class Task extends Eloquent
{
    protected $table = 'tasks';
    protected $fillable = ['username','email','text', 'status'];

    public static function getInstance()
    {
        return new self();
    }
}