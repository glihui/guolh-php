<?php

namespace App\Transformers;

use App\Models\zan;
use League\Fractal\TransformerAbstract;

class ZanTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user', 'topic'];

    public function transform(zan $zan)
    {
        return [
            'id' => $zan->id,
            'user_id' => (int) $zan->user_id,
            'topic_id' => (int) $zan->topic_id,
            'created_at' => $zan->created_at->toDateTimeString(),
            'updated_at' => $zan->updated_at->toDateTimeString(),
        ];
    }

    public function includeUser(zan $zan)
    {
        return $this->item($zan->user, new UserTransformer());
    }

    public function includeTopic(zan $zan)
    {
        return $this->item($zan->topic, new TopicTransformer());
    }
}