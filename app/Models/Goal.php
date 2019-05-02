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
 * @property bool completed
 * @property bool recurring
 * @property User user
 * @property Category category
 */
class Goal extends Model
{
    protected $table = 'goals';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category_id',
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
