<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatePrix extends Model
{
    use HasFactory;
    protected $fillable = ['proposition_id','value','boutique_id','produit_id'];
}
