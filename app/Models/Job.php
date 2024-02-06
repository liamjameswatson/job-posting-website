<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters) {
        // if there is tag , if no tag (false) continue
            if($filters['tag'] ?? false) {
            // query the database (sql) 
            // search the tags column for the tag request. if it matches it will return it
                $query->where('tags', 'like', '%' . request('tag') . '%');
            }

            if($filters['search'] ?? false) {
                // search the title column
                $query->where('title', 'like', '%' . request('search') . '%')
                // search the description column
                ->orWhere('description', 'like', '%' . request('search') . '%')
                 // search the tags column
                ->orWhere('tags', 'like', '%' . request('search') . '%');
            }
    } 
    
    // Relationship to User
    public function user() {
        // A listing belongs to a user id from user model
        return $this->belongsTo(User::class, 'user_id');
    }
}
