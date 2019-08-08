<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCreateRequest;
use App\Http\Resources\TopicResource;
use App\Post;
use App\Topic;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TopicController extends Controller
{

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $topics = Topic::latestFirst()->paginate(6);
        return TopicResource::collection($topics);
    }


    /**
     * @param TopicCreateRequest $request
     * @return TopicResource
     */
    public function store(TopicCreateRequest $request)
    {
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->user()->associate($request->user());

        $post = new Post;
        $post->body = $request->body;
        $post->user()->associate($request->user());

        $topic->save();
        $topic->posts()->save($post);

        return new TopicResource($topic);
    }

    /**
     * @param Topic $topic
     * @return TopicResource
     */
    public function show(Topic $topic)
    {
        return new TopicResource($topic);
    }
}
