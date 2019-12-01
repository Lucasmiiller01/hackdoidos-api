<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Validator;
class EventController extends Controller
{

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $events = $this->eventRepository->getAll(50, false);

            return response()->json(['events' => $events, 'status' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'image' => 'required',
            'lng' => 'required',
            'lat' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {
            try {
                $event = $this->eventRepository->create($request->all());
                if ($event)
                    return response()->json(['event' => $event, 'status' => 'success'], 200);
            } catch (\Exception $exception) {
                return response()->json($exception->getMessage(), 400);
            }
        } else
            return response()->json(['errors' => $validator->errors()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
