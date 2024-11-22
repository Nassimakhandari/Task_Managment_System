<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];


    public function users()
    {
        return $this->belongsToMany(User::class , 'group_user')->withPivot('role');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
