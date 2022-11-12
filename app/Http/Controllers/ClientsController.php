<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    public function index()
    {


         return new ClientResource(Client::all());
    }

    public function store(StoreClientRequest $request)
    {

        $client = Client::create($request->all());

        return (new ClientResource($client))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return (new ClientResource($client))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Client $client)
    {

        $client->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
