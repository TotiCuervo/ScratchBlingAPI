<?php

namespace App\Http\Controllers\api;

use App\BackScratcher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BackScratcherController extends Controller
{

    public function index()
    {
        //This query builder allows for filtering, sorting, and obtaining only certain fields
        //The AllowedFilter on id makes it so that an id must be exact (if you searched for id=1 you wouldnt want to get 1, 12, 13, etc)
        //The AllowedFilter cost makes it so that when filtering with item_cost, it returns all items who cost is less than the cost given
        $results = QueryBuilder::for(BackScratcher::class)
            ->allowedFilters('item_name', 'item_description', 'item_size', AllowedFilter::exact('id'), AllowedFilter::scope('item_cost'))
            ->allowedFields(['id', 'item_name', 'item_description', 'item_size', 'item_cost'])
            ->allowedSorts('id', 'item_name', 'item_description', 'item_size', 'item_cost')
            ->get();

        return $results;

    }

    public function store(Request $request)
    {
        //validates the data
        $validatedData = $request->validate([
            'item_name' => 'required|unique:back_scratchers,item_name',
            'item_description' => 'required',
            'item_cost' => 'required|numeric',
            'item_size' => 'required|array',
            'item_size.*' => 'exists:item_sizes,size',
        ]);

        $scratcher = BackScratcher::create($request->all());

        return response()->json($scratcher, 201);
    }

    public function show(BackScratcher $backScratcher)
    {
        return response()->json($backScratcher, 200);
    }

    public function update(Request $request, BackScratcher $backScratcher)
    {
        //validates the data
        $validatedData = $request->validate([
            'item_name' => 'sometimes|required|unique:back_scratchers,item_name',
            'item_description' => 'sometimes|required',
            'item_cost' => 'sometimes|required|numeric',
            'item_size' => 'sometimes|required|array',
            'item_size.*' => 'sometimes|exists:item_sizes,size'
        ]);

        $backScratcher->update($request->all());
        return response()->json($backScratcher, 200);
    }

    //if I were to have one
    public function destroy(BackScratcher $backScratcher)
    {
        $backScratcher->delete();

        return response()->json(null, 204);
    }
}
