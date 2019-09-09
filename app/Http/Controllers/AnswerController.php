<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Thread;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * AnswerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index (Request $request)
    {
        $thread = Thread::findOrFail($request->get('id'));
        return $thread->answers()->with('author')->simplePaginate(7);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thread = Thread::findOrFail($request->get('thread_id'));

        $user = $request->user();

        $answer = new Answer(['body' => $request->body]);

        $thread->answers()->save($answer->author()->associate($user));

        return $answer->toJson();
    }

    /**
     * @param Request $request
     * @param Answer $answer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Answer $answer)
    {
        $this->authorize('updateIfOwner', $answer);

        $request->validate(['body' => 'required|min:5']);

        $answer->body = $request->get('body');
        $answer->save();

        return response()->json([
            'message' => 'Answer updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Answer::destroy($id);

        return response()->json([
            'message' => 'Answer updated!',
        ]);
    }
}
