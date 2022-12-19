<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    public static $permission;
    public static function updatePermission($data)
    {
        foreach ($data as $item)
        {
            if (permission($item['user_id'], $item['permission'])){
                self::$permission = permission($item['user_id'], $item['permission']);
                self::$permission->value = isset($item['value']) ? $item['value'] : permission($item['user_id'], $item['permission'])->value;
            }
            else
            {
                self::$permission               = new UserPermission();
                self::$permission->user_id      = $item['user_id'];
                self::$permission->permission   = $item['permission'];
                self::$permission->value        = $item['value'];
            }
            self::$permission->save();
        }

    }
}
