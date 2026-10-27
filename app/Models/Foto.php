<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $guarded = [];

    public function likefotos()
    {
        return $this->hasMany(LikeFoto::class, 'foto_id');
    }
    
    public function komentarfotos()
    {
        return $this->hasMany(KomentarFoto::class, 'foto_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'foto_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }




}
