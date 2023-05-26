<?php

namespace App\Models;

use App\Models\TmDataArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TmRefCategory extends Model
{
    protected $table = 'tm_ref_category';

    protected $fillable = ['name','slug','status'];

    protected $primaryKey = 'id';

    public $timestamps = true;


    public function article(){
        return $this->hasMany(TmDataArticle::class, 'id', 'categories_id');
    }
    
}
