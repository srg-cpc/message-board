<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\CreateThreadRequest;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * ThreadController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.threads.index');
    }

    public function fetch()
    {
        return Thread::with('author')->orderByDesc('created_at')->simplePaginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateThreadRequest $request)
    {
        $thread = new Thread($request->all());

        $user = $request->user();
        $user->threads()->save($thread);

        return redirect()->route('threads.index');
    }

    /**
     * @param Thread $thread
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Thread $thread)
    {
        return view('pages.threads.show', compact(['thread']));
    }
}
