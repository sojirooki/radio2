<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'program_id'
        ];

    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::withCount('likes')->with('program')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    
    public function isLikedBy($user): bool {
    return Like::where('user_id', $user->id)->where('timeline_id', $this->id)->first() !==null;
    }
}