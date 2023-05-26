<?php

namespace App\Models;

use App\Models\TmRefCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TmDataArticle extends Model
{
    protected $table = 'tm_data_article';

    protected $fillable = ['name','slug','description','categories_id','created_by','views','image_url','status','created_at','updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = [
        'updated_at',
        'created_at'
    ];

    public function categories(){
        return $this->belongsTo(TmRefCategory::class, 'categories_id', 'id');
    }

    private function user(String $column)
    {
        return $this->belongsTo(User::class, $column, 'id')
            ->withDefault([
                'id'   => 0,
                'name' => null,
            ]);
    }

    public function createdBy()
    {
        return $this->user('created_by');
    }
}


