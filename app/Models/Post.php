<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable = ['id_user', 'post', 'desc', 'like'];

    protected $table = 'post';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $timestamp = true;

    //one to many inverse relationship
    public function userkepost(){
        return $this->belongsTo(User::class, 'id_user');
    }

}
