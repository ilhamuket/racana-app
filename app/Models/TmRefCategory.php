<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmRefCategory extends Model
{
    protected $table = 'tm_ref_category';

    protected $fillable = ['name','slug','status'];

    protected $primaryKey = 'id';

    public $timestamps = false;
}
