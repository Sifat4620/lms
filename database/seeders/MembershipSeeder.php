<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Membership;

class MembershipSeeder extends Seeder
{
    public function run()
    {
        Membership::create([
            'name' => 'Basic',
            'price' => 100.00,
            'features' => json_encode(['Borrow up to 3 books']),
        ]);

        Membership::create([
            'name' => 'Premium',
            'price' => 500.00,
            'features' => json_encode(['Unlimited borrowing', 'Priority support']),
        ]);
    }
}

