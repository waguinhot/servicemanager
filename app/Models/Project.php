<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'api_url', 'status', 'name'];

    public function History()
    {
        return $this->hasMany(History::class, 'id_project', 'id');
    }
}
