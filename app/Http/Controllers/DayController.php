<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreDayRequest;
use App\Http\Requests\UpdateDayRequest;
use App\Http\Resources\DayResource;

class DayController extends Controller
{
    public function index()
    {

        return new DayResource(Day::with(['employee'])->get());
    }

    public function store(StoreDayRequest $request)
    {
        $workingday = Day::create($request->all());

        return (new DayResource($workingday))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Day $workingday)
    {

        return new DayResource($workingday->load(['employee']));
    }

    public function update(UpdateDayRequest $request, Day $workingday)
    {
        $workingday->update($request->all());

        return (new DayResource($workingday))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Day $workingday)
    {

        $workingday->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
