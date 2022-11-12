<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployessRequest;
use App\Http\Requests\UpdateEmployessRequest;
use App\Http\Resources\EmployessResource;
use App\Models\Employess;
use Symfony\Component\HttpFoundation\Response;

class EmployessController extends Controller
{
    public function index()
    {

        return new EmployessResource(Employess::with(['services'])->get());
    }

    public function store(StoreEmployessRequest $request)
    {
        $employess = Employess::create($request->all());
        $employess->services()->sync($request->input('services', []));

        return (new EmployessResource($employess))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Employess $employess)
    {

        return new EmployessResource($employess->load(['services']));
    }

    public function update(UpdateEmployessRequest $request, Employess $employess)
    {
        $employess->update($request->all());
        $employess->services()->sync($request->input('services', []));

        return (new EmployessResource($employess))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Employess $employess)
    {

        $employess->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
