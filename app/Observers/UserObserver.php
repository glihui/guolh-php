<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function saving(User $user)
    {
        // 这样写扩展性更高， 只有空的时候才指定默认头像
        if (empty($user->avatar)) {
            $user->avatar = 'http://larabbs.test/uploads/images/avatars/201805/06/1_1525621949_ztDJfbjoYI.jpg';
        }
    }
}
