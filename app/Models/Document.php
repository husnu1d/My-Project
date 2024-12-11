<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key tabel
    public $timestamps = true; // Jika tabel memiliki kolom created_at dan updated_at
    protected $fillable = [
        'original_name',
        'file_path',
        'unmerged_file_path',
        'upload_date',
        'is_unmerged',
    ];

    protected $casts = [
        'upload_date' => 'date',
        'is_unmerged' => 'boolean',
    ];

}
