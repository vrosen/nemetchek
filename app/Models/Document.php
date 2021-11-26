<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public const DOCUMENT_FILE_PATH = 'documents/';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'path'
    ];


    /**
     * @var string
     */
    protected $table = 'documents';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    //protected $with = ['creator', 'updater'];

    /**
     * @var string[]
     */
    protected $guarded = [
        'id',
        'active',
        'deleted',
        'created_at',
        'updated_at',
    ];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function documentTemplate()
    // {
    //     return $this->belongsTo(
    //         DocumentTemplate::class,
    //         'document_template_id',
    //         'document_template_id',
    //     );
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function file()
    // {
    //     return $this->belongsTo(
    //         File::class,
    //         'file_id',
    //         'file_id',
    //     );
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function documentDownloadLog()
    // {
    //     return $this->hasMany(
    //         DocumentDownloadLog::class,
    //         'document_id'
    //     );
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function loan()
    // {
    //     return $this->belongsTo(
    //         Loan::class,
    //         'loan_id',
    //         'loan_id',
    //     );
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id',
            'user_id',
        );
    }
}
