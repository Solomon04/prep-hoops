<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @property int user_id
 * @property string name
 * @property string description
 * @property string color
 * @property User user
 * @property TodoItem todoItem
 */
class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'color'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function todoItem()
    {
        return $this->hasMany(TodoItem::class);
    }
}
