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

//    public function deleted(zan $zan)
//    {
//        $topic = $zan->topic;
//        $topic->decrement('zan_count', 1);
//    }


}
