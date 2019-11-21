<?php

namespace App\Http\Controllers;

use App\Repositories\ClothRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClothController extends Controller
{
    private $clothRepository;

    public function __construct(ClothRepositoryInterface $clothRepository)
    {
        $this->clothRepository = $clothRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $clothes = $this->clothRepository->getClothes();
        $brads = $this->clothRepository->getBrands();

        if($request->ajax()){
            return response()->json(view('cloth.table', compact('clothes'))->render());
        }

        return view('cloth.index')->with(['clothes' => $clothes, 'brands' => $brads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'product_code' => 'required',
            'cost' => 'required',
            'brand_id' => 'required|int'
        ]);

        if (!$validator->fails()) {
            $result = $this->clothRepository->createClothes($request);
            return response()->json(['success'=> $result, 'message' => 'Cloth has been created '], 200);
        }

        return response()->json(['success'=> false, 'message' => 'Failed'], 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
