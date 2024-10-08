<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'type',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function getTableColumns()
    {
        return ['image', 'id','username','email','phone','type','created_at'];
    }

    public static function getInputColumns()
    {
        return [
            ['name'=>'username', 'type'=>'text'],
            ['name'=>'email', 'type'=>'email'],
            ['name'=>'phone', 'type'=>'text'],
            ['name'=>'type', 'type'=>'text'],
            ['name'=>'image', 'type'=>'file'],
        ];
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
//    protected function casts(): array
//    {
//        return [
//            'email_verified_at' => 'datetime',
//            'password' => 'hashed',
//        ];
//    }
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function questions()
    {
        return $this->hasMany(questions::class,'user_id');
    }

    public function image()
    {
        return $this->morphOne(Images::class,'imageable');
    }
}

