<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpesaTransactions extends Model
{
    protected $fillable=[
        'TransactionType',
        'TransID',
        'TransTime',
        'TransAmount',
        'BusinessShortCode',
        'CheckOutId',
        'BillRefNumber',
        'InvoiceNumber',
        'OrgAccountBalance',
        'MechantId',
        'MSISDN',
        'FirstName',
        'Email',
        'LastName',
        'Status',
        'Used',
    ];
}
