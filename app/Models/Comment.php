<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $fillable = ['id_user', 'id_post', 'comment'];

    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $timestamp = true;

    //one to many inverse relationship
    public function commentkeuser(){
        //return $this->belongsTo(User::class, 'id_user');
        return $this->belongsTo(User::class, 'id_user');
    }

    //one to many inverse relationship
    public function commentkepost(){
        //return $this->belongsTo(User::class, 'id_user');
        return $this->belongsTo(Post::class, 'id_post');
    }
}
