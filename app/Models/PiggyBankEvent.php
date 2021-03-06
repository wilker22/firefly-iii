<?php
/**
 * PiggyBankEvent.php
 * Copyright (C) 2016 thegrumpydictator@gmail.com
 *
 * This software may be modified and distributed under the terms of the
 * Creative Commons Attribution-ShareAlike 4.0 International License.
 *
 * See the LICENSE file for details.
 */

declare(strict_types = 1);

namespace FireflyIII\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * FireflyIII\Models\PiggyBankEvent
 *
 * @property integer                 $id
 * @property \Carbon\Carbon          $created_at
 * @property \Carbon\Carbon          $updated_at
 * @property integer                 $piggy_bank_id
 * @property integer                 $transaction_journal_id
 * @property \Carbon\Carbon          $date
 * @property float                   $amount
 * @property PiggyBank               $piggyBank
 * @property-read TransactionJournal $transactionJournal
 * @method static \Illuminate\Database\Query\Builder|\FireflyIII\Models\PiggyBankEvent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\FireflyIII\Models\PiggyBankEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\FireflyIII\Models\PiggyBankEvent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\FireflyIII\Models\PiggyBankEvent wherePiggyBankId($value)
 * @method static \Illuminate\Database\Query\Builder|\FireflyIII\Models\PiggyBankEvent whereTransactionJournalId($value)
 * @method static \Illuminate\Database\Query\Builder|\FireflyIII\Models\PiggyBankEvent whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\FireflyIII\Models\PiggyBankEvent whereAmount($value)
 * @mixin \Eloquent
 */
class PiggyBankEvent extends Model
{

    protected $dates    = ['created_at', 'updated_at', 'date'];
    protected $fillable = ['piggy_bank_id', 'transaction_journal_id', 'date', 'amount'];
    protected $hidden   = ['amount_encrypted'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function piggyBank()
    {
        return $this->belongsTo('FireflyIII\Models\PiggyBank');
    }

    /**
     * @param $value
     */
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = strval(round($value, 2));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactionJournal()
    {
        return $this->belongsTo('FireflyIII\Models\TransactionJournal');
    }

}
