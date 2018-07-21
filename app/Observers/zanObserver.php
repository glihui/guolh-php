<?php

namespace App\Observers;

use App\Models\zan;

class zanObserver
{
    public function created(zan $zan)
    {
        $topic = $zan->topic;
        $topic->increment('zan_count', 1);


    }
}
