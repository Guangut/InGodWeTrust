<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supporter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'address',
        'phone_number',
        'email',
        'support_type',
        'contribution_amount',
        'commit_duration',
        'start_date',
        'bank_details',
        'testimonial_content',
        'photo_url',
    ];

    // Example relationships:
    public function donationAgreements()
    {
        return $this->hasMany(DonationAgreement::class);
    }

    public function donationTransactions()
    {
        return $this->hasMany(DonationTransaction::class);
    }
}
