<?php

namespace App\Repository\CarRepository;

use App\Http\FormRequest\CarRequest\CarBaseRequest;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarResourceCollection;
use App\Models\Car;
use App\Models\CarColor;
use App\Models\Support\PaginationHelper;
use App\Repository\CarColorRepository\CarColorRepositoryInterface;

use App\Repository\CarColorRepository\EloquentCarColorRepository;
use App\Services\CarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EloquentCarRepository implements CarRepositoryInterface
{
    use CarService;
    private CarColorRepositoryInterface $carColorRepo;

    public function __construct(EloquentCarColorRepository $carColorRepo)
    {
        $this->carColorRepo = $carColorRepo;
    }

    public function index(Request $request)
    {
        $limit = $request->has('limit')? $request['limit']:10;
        $carCollection = PaginationHelper::paginate(Car::with([
            'author', 'manufacturer','type', 'colors'
        ])->get(),$limit);
        return new CarResourceCollection($carCollection);
    }

    public function show(Car $car)
    {
        return new CarResource($car);
    }

    public function store(CarBaseRequest $request): CarResource
    {
        $payload = $request->only('name', 'description', 'type_id', 'manufacturer_id');
        $payload['created_by'] = Auth::id();

        $carColors = $this->generateCarColorPayload($request['colors']);
        $car = (new Car())->newQuery()->create($payload);
        $car->colors()->saveMany($carColors);

        return new CarResource($car);
    }

    public function update(Car $car, CarBaseRequest $request)
    {
        $payload = $request->only('name', 'description', 'type_id', 'manufacturer_id');
        $newCarColors = $this->generateCarColorPayload($request['new_colors']);
        $car->update($payload);
        $car->colors()->saveMany($newCarColors);

        $this->carColorRepo->update($car, $request);

        return new CarResource($car);
    }

    public function destroy(Car $car)
    {
        $car->delete();
    }
}
