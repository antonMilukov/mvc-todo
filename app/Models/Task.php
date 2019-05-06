<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Task model
 * Class Task
 * @package App\Models
 */
class Task extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['username','email','text', 'status'];

    public static function getInstance()
    {
        return new self();
    }

    const STATUS_CREATED = 10,
        STATUS_COMPLETED = 20;

    /**
     * Array with data for statuses
     * @var array
     */
    public static $STATUS_DATA = [
        self::STATUS_CREATED => [
            'title' => 'создана'
        ],
        self::STATUS_COMPLETED => [
            'title' => 'выполнена'
        ]
    ];

    /**
     * Return human readable string for status param
     * @return string
     */
    public function getStatusReadableAttribute()
    {
        return isset(self::$STATUS_DATA[$this->status]) ? self::$STATUS_DATA[$this->status]['title'] : '-';
    }

    /**
     * Return state for status
     * @return bool
     */
    public function getIsCompletedTaskAttribute()
    {
        return $this->status == self::STATUS_COMPLETED;
    }
}