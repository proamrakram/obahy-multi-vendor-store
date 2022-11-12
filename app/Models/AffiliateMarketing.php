<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AffiliateMarketing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'link',
        'link_type',
        'link_reference',
        'issue_date',
        'affiliate_type',
        'apply_affiliate',
        'affiliate_value',
        'affiliate_currency',
        'store_id',
    ];
    protected $dates = ['issue_date'];


    /**
     * Get the user that owns the AffiliateMarketing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the user that owns the AffiliateMarketing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Get the user that owns the AffiliateMarketing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'affiliate_currency', 'id');
    }
}
