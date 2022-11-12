<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkinghourRequest;
use App\Http\Requests\UpdateWorkinghourRequest;
use App\Http\Resources\WorkinghourResource;
use App\Models\Workingtime;
use Symfony\Component\HttpFoundation\Response;

class WorkingtimeController extends Controller
{
    public function index()
    {

        return new WorkinghourResource(Workingtime::with(['employee'])->get());
    }

    public function store(StoreWorkinghourRequest $request)
    {
        $workinghour = Workingtime::create($request->all());

        return (new WorkinghourResource($workinghour))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Workingtime $workinghour)
    {

        return new WorkinghourResource($workinghour->load(['employee']));
    }

    public function update(UpdateWorkinghourRequest $request, Workingtime $workinghour)
    {
        $workinghour->update($request->all());

        return (new WorkinghourResource($workinghour))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Workingtime $workinghour)
    {

        $workinghour->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
