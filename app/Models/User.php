<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 * @property string email_verified_at
 * @property Category category
 * @property TodoItem todoItem
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function todoItem()
    {
        return $this->hasMany(TodoItem::class);
    }

    public function getStats()
    {
        $stats = [];
        $stats['total_tasks'] = $this->todoItem()->count();
        $stats['completed_tasks'] = $this->todoItem()->where('completed', '=', true)->count();
        if($stats['total_tasks'] > 0){
            $stats['success_rate'] = number_format( $stats['completed_tasks']/$stats['total_tasks'] * 100, 2 ) . '%';
        }else{
            $stats['success_rate'] = '0%';
        }

        return $stats;
    }
}
