<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{

    protected $fillable = [
        'title', 'publication_year', 'author_id'
    ];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

}
