<?php

namespace App\Http\Controllers\Api;

use App\Models\Topic;
use App\Models\zan;
use Dingo\Api\Auth\Auth;

class zansController extends Controller
{
    public function store(Topic $topic, zan $zan) {
        $zan->topic_id = $topic->id;
        $zan->user_id = $this->user()->id;

        $result = $zan->where('topic_id', $topic->id)
            ->where('user_id', $this->user()->id);

        if ($result->exists()) {
            return ['ok' => '0', 'msg' => '已赞过该话题'];
        } else {
            $zan->save();
            return ['ok' => '1', 'msg' => '成功点赞'];
        }


    }

    public function destroy(Topic $topic, zan $zan) {
        $result = $topic->zan($this->user()->id);
        if ($result->exists()) {

            $result->delete();
            $topic->decrement('zan_count', 1);
            return ['ok' => '1', 'msg' => '取消点赞'];
        } else {
            return ['ok' => '0', 'msg' => '还未点赞过'];
        }


    }


}
