<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'pseudo',
        'email',
        'birthdate',
        'password',
        'banner',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles ()
    {
        return $this->belongsToMany(Role::class);
    }

    //Un utilisateur peut créé plusieurs topic
    public function topics ()
    {
        return $this->hasMany(Topic::class);
    }


    //Fonction pour vérifier si l'utilisateur connecté est admin
    public function isAdmin()
    {
        return $this->roles()->where('name', 'administrateur')->first();
    }

    public function hasAnyRole(array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->first();
    }
}
