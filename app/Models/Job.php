<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

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
}
