<?php
use App\Models\UserPermission;
use Illuminate\Support\Facades\Auth;
function permission($user_id, $type)
{
    return UserPermission::where(['user_id' => $user_id,'permission' => $type])->first();
}
function permissionCheck($user_id,$type)
{
    $permission = UserPermission::where(['user_id' => $user_id,'permission' => $type])->first(['value']);
    if ($permission)
    {
        return $permission;
    }
    elseif (Auth::user()->role == 1)
    {
        return [
            'value' => 1
        ];
    }
    else{
        return [
            'value' => 0
        ];
    }
}
