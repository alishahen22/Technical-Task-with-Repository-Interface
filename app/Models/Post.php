<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
   protected $fillable =['title','contact','user_id'];
   public function ratings()
   {

       return $this->morphMany(Rating::class, 'ratingable');
   }
  public function user()
  {
      return $this->belongsTo(User::class);
  }



}
