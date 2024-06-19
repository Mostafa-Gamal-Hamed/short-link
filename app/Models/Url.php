<?php

namespace App\Models;

use App\Models\Admin\LinkUsage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $fillable = ['original_url','short_url','user_id'];
}
