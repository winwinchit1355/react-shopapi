<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Responses\ResponseFormat;

class ProductApiController extends Controller
{
    use ResponseFormat;
    /**
     * Display a listing of the resource.
     */
    protected $fieldSearchable = [
        'name',
        'price'
    ];

    public function index(Request $request)
    {
        $orderBy = $request->orderBy ?? 'id';
        $orderDirection = $request->orderDirection ?? 'DESC';
        $perPage = $request->perPage ?? null;
        $currentPage = $request->currentPage ?? 1;
        $input = $request->all();
        $products = Product::with(['images', 'category'])
            ->where(function ($query) use ($input) {
                if (isset($input['is_feature'])) {
                    $query->where('is_feature', $input['is_feature']);
                    unset($input['is_feature']);
                }
                foreach ($input as $key => $value) {
                    if (in_array($key, $this->fieldSearchable)) {
                        $query->where($key, 'like', '%' . $value . '%');
                    }
                }
            })
            ->orderBy($orderBy, $orderDirection)
            ->paginate($perPage, ['*'], 'page', $currentPage);
        return  $this->apiSuccessResponse($products, 'Successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function productDetail(Request $request, $slug)
    {
        $product = Product::with(['images', 'category'])
            ->where('slug', $slug)
            ->first();
        return  $this->apiSuccessResponse($product, 'Successfully', 200);
    }

    public function shop(Request $request)
    {
        $orderBy = $request->orderBy ?? 'id';
        $orderDirection = $request->orderDirection ?? 'DESC';
        $perPage = $request->perPage ?? null;
        $currentPage = $request->currentPage ?? 1;
        $input = $request->all();

        $products = Product::with(['images', 'category'])
            ->where('status', 'active')
            ->where(function ($query) use ($input) {
                foreach ($input as $key => $value) {
                    if (in_array($key, $this->fieldSearchable)) {
                        $query->where($key, 'like', '%' . $value . '%');
                    }
                }
            })
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', function ($result) use ($request) {
                    $result->where('slug', $request->category);
                });
            })
            ->orderBy($orderBy, $orderDirection)
            ->paginate($perPage, ['*'], 'page', $currentPage);
        return  $this->apiSuccessResponse($products, 'Successfully', 200);
    }
}
