<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use Auth;
use Redirect;
use App\Event;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(
            'society', [
                'except' => ['show', 'index', 'store']
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventId = Session::get('eventId');
        if ($eventId != null) {
            $event = Event::find($eventId);
            return $event->toJson();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
            'question' => 'required|max:255',
            'type' => 'required|max:255',
            'level' => 'required|max:255',
            ]
        );

        $questionInput = Input::all();
        $eventId = Session::get('eventId');

        $question = new Question;
        $question->eventId = $eventId;
        $question->question = $questionInput['question'];
        /*$image = array();
        if (isset($questionInput['file'])) {
            if (Input::file('file')->isValid()) {
              $destinationPathvfile = 'uploads';
              $extensionvfile = Input::file('file')->getClientOriginalExtension();
              $fileNamevfile = $event->id.'.'.$extensionvfile; // renaming image
              Input::file('file')->move($destinationPathvfile, $fileNamevfile);
              $question->image = $fileNamevfile;
            }*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}