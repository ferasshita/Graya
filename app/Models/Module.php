<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    const TYPE_VIDEO = 'video';
    const TYPE_PDF = 'pdf';
    const TYPE_TEXT = 'text';

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'type',
        'content',
        'file_path',
        'duration',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'duration' => 'integer',
            'order' => 'integer',
        ];
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}
