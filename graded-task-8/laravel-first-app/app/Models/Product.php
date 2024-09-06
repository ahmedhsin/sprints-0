<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'price', 'info'];

    public static function getTableColumns()
    {
        return ['id','user_id','name','price','info','created_at'];
    }

    public static function getInputColumns()
    {
        return [
            ['name'=>'name', 'type'=>'text'],
            ['name'=>'price', 'type'=>'text'],
            ['name'=>'info', 'type'=>'text'],
            ['name'=>'images[]', 'type'=>'file', 'attributes'=>['multiple']],
        ];
    }

    public function images()
    {
        return $this->morphMany(Images::class,'imageable');
    }
}
