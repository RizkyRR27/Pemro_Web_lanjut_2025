<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\VarDumper\Exception\ThrowingCasterException;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username', 'password', 'nama', 'level_id', 'created_at', 'updated_at'];

    protected $hidden = ['password']; // jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash


    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function getRoleName(){
        return $this->level->level_nama;
    }
    public function hasRole($role){
        return $this->level->level_kode == $role;
    }
    public function gerRole(){
        return $this->level->level_kode;
    }
}

// class UserModel extends Model
// {
    
//     use HasFactory;

//     protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
//     protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan


//     protected $fillable = ['level_id', 'username', 'nama', 'password'];
//     public function level (): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }
// }