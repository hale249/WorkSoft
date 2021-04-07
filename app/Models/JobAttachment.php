<?php


namespace App\Models;


use App\Helpers\FileType;
use Illuminate\Database\Eloquent\Model;

class JobAttachment extends Model
{
    protected $table = 'job_attachments';

    protected $guarded = [];

    public function getTypeIconAttribute(): string
    {
        switch ($this->type) {
            case FileType::PDF:
                return asset('images/icon-pdf.png');

            case FileType::WORD:
                return asset('images/icon-word.png');

            case FileType::EXCEL:
                return asset('images/icon-excel.png');

            case FileType::CSV:
            case FileType::XML:
                return asset('images/icon-data.png');

            case FileType::IMAGE:
                return asset('images/icon-image.png');

            default:
                return asset('images/icon-default.png');
        }
    }

    public static function getFileType(?string $extension): ?string
    {
        $extension = strtolower(trim($extension)) ?? '';

        switch ($extension) {
            case 'pdf':
                return FileType::PDF;

            case 'doc':
            case 'docx':
                return FileType::WORD;

            case 'xls':
            case 'xlsx':
                return FileType::EXCEL;

            case 'ppt':
            case 'pptx':
                return FileType::POWERPOINT;

            case 'xml':
                return FileType::XML;

            case 'csv':
                return FileType::CSV;

            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'svg':
                return FileType::IMAGE;

            default:
                return null;
        }
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'upload_by', 'id');
    }
}
