<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vsitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'method', 'request', 'url', 'referer',
        'languages', 'useragent', 'headers',
        'device', 'platform', 'browser', 'ip',
        'visitor_id', 'visitor_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'request'   => 'array',
        'languages' => 'array',
        'headers'   => 'array',
        'referer'   => 'array',
    ];

    /**
     * Get the owning visitable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function visitable()
    {
        return $this->morphTo('visitable');
    }

    /**
     * Get the owning user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function visitor()
    {
        return $this->morphTo('visitor');
    }
}
