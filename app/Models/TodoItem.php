<?php

namespace App\Models;

use Carbon\Carbon;
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
 * @property bool recurring
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

    public function duplicate()
    {
        $todoItem = new TodoItem();
        $todoItem->title = $this->title;
        $todoItem->description = $this->description;
        $todoItem->category_id = $this->category_id;
        $todoItem->deadline = Carbon::today()->toDateString();
        $todoItem->save();
    }

    public function tomorrow()
    {
        $todoItem = new TodoItem();
        $todoItem->title = $this->title;
        $todoItem->user_id = $this->user_id;
        $todoItem->description = $this->description;
        $todoItem->category_id = $this->category_id;
        $todoItem->deadline = Carbon::tomorrow()->toDateString();
        $todoItem->save();
    }
}
