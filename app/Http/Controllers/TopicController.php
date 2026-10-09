<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicComment;
use App\Models\TopicImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'images' => 'array',
            'images.*' => 'image'
        ]);

        $input['user_id'] = Auth::user()->id;
        $topic = Topic::create($input);

        if ($request->hasFile('images')) {
            foreach ($input['images'] as $image) {
                $topicImage = [
                    'image' => $image->store('topic_images', 'public'),
                    'topic_id' => $topic->id
                ];

                TopicImage::create($topicImage);
            }
        }

        return Redirect::route('dashboard');
    }

    public function edit(Request $request, Topic $topic)
    {
        $toChange = [];
        $input = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'images' => 'array',
            'images.*' => 'image'
        ]);

        if ($topic->title != $input['title']) {
            $toChange['title'] = $input['title'];
        }

        if ($topic->description != $input['description']) {
            $toChange['description'] = $input['description'];
        }

        if (count($toChange)) {
            $topic->update($toChange);
        }

        if ($request->has('imgToRemove')) {
            foreach ($request['imgToRemove'] as $id) {
                $image = TopicImage::find($id);
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
        }

        if ($request->hasFile('images')) {
            foreach ($input['images'] as $image) {
                $topicImage = [
                    'image' => $image->store('topic_images', 'public'),
                    'topic_id' => $topic->id
                ];

                TopicImage::create($topicImage);
            }
        }

        return redirect()->route('dashboard');
    }

    public function newTopic()
    {
        return view('newTopic');
    }

    public function editTopic(Topic $topic)
    {
        // dd($topic->images);
        return view('newTopic', [
            'topic' => $topic,
        ]);
    }

    public function index(Topic $id)
    {
        $id->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('topicPage', [
            'topic' => $id
        ]);
    }

    public function delete(Topic $topic)
    {
        $topic->delete();
        return back()->with('success', 'Tópico excluído com sucesso');
    }
}
