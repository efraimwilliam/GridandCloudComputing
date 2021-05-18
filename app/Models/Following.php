<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;

    public $fillable = ['id_user', 'follow'];

    protected $table = 'following';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $timestamp = true;


    //one to many inverse relationship
    public function followingkeuser(){
        //return $this->belongsTo(User::class, 'id_user');
        return $this->belongsTo(User::class, 'id_user');
    }

}
