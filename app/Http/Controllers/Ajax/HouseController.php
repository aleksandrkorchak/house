<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\HouseFormRequest;
use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{

    /**
     * Find a house according to the given parameters
     *
     * @param HouseFormRequest $request
     * @return false|string
     */
    public function findHouse(HouseFormRequest $request)
    {
        $condition = [];

        if (isset($request->name)) {
            $condition[] = ['name', 'like', "%" . $request->name . "%"];
        }

        if (isset($request->priceMin, $request->priceMax)) {
            $condition[] = ['price', '>=', $request->priceMin];
            $condition[] = ['price', '<=', $request->priceMax];
        }

        if (isset($request->bedroom)) {
            $condition[] = ['bedrooms', $request->bedroom];
        }

        if (isset($request->bathroom)) {
            $condition[] = ['bathrooms', $request->bathroom];
        }

        if (isset($request->storey)) {
            $condition[] = ['storeys', $request->storey];
        }

        if (isset($request->garage)) {
            $condition[] = ['garages', $request->garage];
        }

        $houses = House::where($condition)->get();

        return json_encode($houses);
    }


}
