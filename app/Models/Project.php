<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    public $fillable = [
        'titolo', 'contenuto',
        // aggiunto 'cover_image' di COVERIMAGE
        'cover_image',
        // aggiunto 'nome' di TYPE
        'type_id'
    ];

    // relazione one to many
    public function type(): BelongsTo{
        return $this->belongsTo( Type::class );
    }

    // relazione many to many
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

}
