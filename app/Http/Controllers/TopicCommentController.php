<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicComment;
use App\Models\User;
use Illuminate\Http\Request;

class TopicCommentController extends Controller
{
    public function comment(Request $request, Topic $topic, User $user)
    {
        $input = $request->validate([
            'comment' => 'string|required'
        ]);

        $input['user_id'] = $user->id;
        $input['topic_id'] = $topic->id;

        TopicComment::create($input);
        return back()->with('success', 'Comentário excluído com sucesso');
        // return view('topicPage', [
        //     'topic' => $topic
        // ]);
    }

    public function delete(TopicComment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comentário excluído com sucesso');
    }

    public function edit(Request $request, TopicComment $comment)
    {
        $input = $request->validate([
            'editComment' => 'string|required'
        ]);

        $comment->comment = $input['editComment'];
        $comment->save();

        return back()->with('success', 'Comentário excluído com sucesso');
    }
}
