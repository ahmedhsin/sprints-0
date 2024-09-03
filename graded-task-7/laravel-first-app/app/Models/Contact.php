<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'title',
        'message'];

    public static function getTableColumns()
    {
        return ['id','username','title','message','created_at'];
    }

    public static function getInputColumns()
    {
        return [
            ['name'=>'username', 'type'=>'text'],
            ['name'=>'title', 'type'=>'text'],
            ['name'=>'message', 'type'=>'text'],
        ];
    }
}
