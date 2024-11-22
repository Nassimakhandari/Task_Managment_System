<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use HasFactory;

    protected $fillable = ['name_todo', 'description_todo', 'start', 'end', 'priority_todo', 'user_id'];


    public function user()
{
    return $this->belongsTo(User::class);
}

}
