<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    //Relationship with Listings
    public function job() {
        // one user has many Job posts. user_id is field in database connecting them
        return $this->hasMany(Job::class, 'user_id');
    }
}




// Tinker:      
// command line for looking at database
// php artisan tinker - gives the shell 
//\App\Models\Job::first() - returns the first model instance
// \App\Models\Job::find(3) - returns the third model instance
// \App\Models\Job::find(3)->user - returns the user for the third model instance

//Get all the user's listings
// $user = \Apps\Models\User::find(1)   or      // $user = \AppzModels\User::first()
// $user->jobs