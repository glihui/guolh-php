<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Transformers\CategoryTransformer;
use App\Transformers\TopicTransformer;

class CategoriesController extends Controller
{
    public function index()
    {
        return $this->response->collection(Category::all(), new CategoryTransformer());
    }

    public function show(Category $category, Request $request, Topic $topic)
    {
        $topics = $topic->where('category_id', $category->id)
            ->paginate(20);
        return $this->response->paginator($topics, new TopicTransformer());
    }
}
