<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'membership_id', 'amount_paid', 'start_date', 'end_date', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
