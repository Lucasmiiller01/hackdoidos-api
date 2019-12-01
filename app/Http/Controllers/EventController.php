<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Validator;
class EventController extends Controller
{

    private $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $events = $this->repository->getAll(200000, false);

            return response()->json(['events' => $events, 'status' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_event_id' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'image' => 'file'
        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $data = $request->only(['type_event_id', 'lng', 'lat']);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = uniqid(str_random(30)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'),  $imageName);
            $data['image'] = "/uploads/{$imageName}";
        } else {
            $data['image'] = null;
        }

        try {
            $event = $this->repository->create($data);
            if ($event)
                return response()->json(['event' => $event], 201);

        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }
    }
}
