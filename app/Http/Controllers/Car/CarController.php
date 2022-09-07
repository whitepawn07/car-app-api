<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\FormRequest\CarRequest\CarBaseRequest;
use App\Models\Car;
use App\Repository\CarRepository\CarRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    private $repository;
    public function __construct(CarRepositoryInterface $repository) {
//        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($this->repository->index($request), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarBaseRequest $request)
    {
        return response()->json($this->repository->store($request), Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return response()->json($this->repository->show($car), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarBaseRequest $request, Car $car)
    {
        $this->authorize('update', $car );
        return response()->json($this->repository->update($car, $request), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $this->repository->destroy($car);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
