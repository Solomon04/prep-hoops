<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TodoItem
 * @package App\Models
 * @property int user_id
 * @property string title
 * @property string description
 * @property int category_id
 * @property string deadline
 * @property bool completed
 * @property User user
 * @property Category category
 */
class TodoItem extends Model
{
    protected $table = 'todo_items';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category_id',
        'deadline',
        'completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
