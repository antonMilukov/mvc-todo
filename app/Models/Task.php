<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
class Task extends Eloquent
{
    protected $fillable = ['username','email','text', 'status'];

    public static function getInstance()
    {
        return new self();
    }

    const STATUS_CREATED = 10,
        STATUS_COMPLETED = 20;

    public static $STATUS_DATA = [
        self::STATUS_CREATED => [
            'title' => 'создана'
        ],
        self::STATUS_COMPLETED => [
            'title' => 'выполнена'
        ]
    ];

    public function getStatusReadableAttribute()
    {
        return isset(self::$STATUS_DATA[$this->status]) ? self::$STATUS_DATA[$this->status]['title'] : '-';
    }
}