<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class CheckPremiumExpiration extends Command
{
    protected $signature = 'check:premium-expiration';
    protected $description = 'Check and update user premium status based on expiration date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('type', 'premium')->get();

        foreach ($users as $user) {
            $this->checkAndUpdateUserType($user);
        }

        $this->info('Premium expiration check completed.');
    }

    private function checkAndUpdateUserType(User $user)
    {
        if ($user->isPremiumExpired()) {
            $user->type = 'free';
            $user->premium_expires_at = null;
            $user->save();
        }
    }
}
