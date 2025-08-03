<?php
namespace App\Services;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    public static function log($action, $targetType = null, $targetId = null, $status = 'Active')
    {
        $user = Auth::user();

        Activity::create([
            'user_id' => $user?->id,
            'actor_type' => $user?->getRoleNames()->first() ?? 'admin',
            'action' => $action,
            'target_type' => $targetType,
            'target_id' => $targetId,
            'status' => $status,
        ]);
    }
}
