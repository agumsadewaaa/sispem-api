<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // public $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'nip_nim', 'role_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'nip_nim' => 'required|required|unique:users',
        'role_id' => 'required',
        'password' => 'required|min:6'
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function peminjam()
    {
        return $this->hasOne('App\Models\Peminjam');
    }

    public function isAdmin()
    {
        if ($this->role->role == 'admin') {
            return true;
        }
        return false;
    }

    public function isKbsd()
    {
        if ($this->role->role == 'kbsd') {
            return true;
        }
        return false;
    }

    public function isKbu()
    {
        if ($this->role->role == 'kbu') {
            return true;
        }
        return false;
    }

    public function isUser()
    {
        if ($this->role->role == 'user') {
            return true;
        }
        return false;
    }

    public function isWr()
    {
        if ($this->role->role == 'wr2') {
            return true;
        }
        return false;
    }

    public function isKsbrt()
    {
        if ($this->role->role == 'ksbrt') {
            return true;
        }
        return false;
    }
    public function isActive()
    {
        if ($this->status == 1) {
            return true;
        }
        return false;
    }

    public function hasPeminjam()
    {
        if ($this->peminjam != null) {
            return true;
        }
        return false;
    }
}
