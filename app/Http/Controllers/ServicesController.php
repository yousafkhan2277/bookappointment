<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    public function index()
    {

        return new ServiceResource(Service::all());
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Service $service)
    {

        return new ServiceResource($service);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Service $service)
    {

        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
