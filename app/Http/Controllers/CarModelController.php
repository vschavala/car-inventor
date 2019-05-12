<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Carmodel;
use Illuminate\Support\Facades\Storage;
use Validator;

class CarModelController extends Controller
{

    private $MODELNAME = 'model_name';
    private $MANFACUTURERID = 'manufacturer_id';
    private $COLOR = 'color';
    private $YEAR = 'year';
    private $REGNUMBER = 'registration_number';
    private $IMAGE1 = 'image1';
    private $IMAGE2 = 'image2';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::select('name','id')->get();

       return view('carmodel')->with('items',$manufacturers);
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
       $data = $request->all();
        Validator::make($data, [
            $this->MODELNAME => 'required|unique:carmodels',
            $this->REGNUMBER => 'required',
            
        ])->validate();
        $manufacturer_name = Manufacturer::where('id',1)->first();
        $carmodel = new Carmodel();
        $carmodel->model_name = $request->model_name;
        $carmodel->manufacturer_id = $request->manufacturer_id;
        $carmodel->color = $request->color;
        $carmodel->year = $request->year;
        $carmodel->registration_number = $request->registration_number;
        if($request->file('image1')){
         $image1Name = $request->file('image1')->getClientOriginalName();
        $carmodel->image1 = $image1Name;
        request()->image1->move(storage_path('manufacturers/'.str_slug($manufacturer_name->name)), $image1Name);
        }
        if($request->file('image2')){
         $image2Name = $request->file('image2')->getClientOriginalName();
        $carmodel->image2 = $image2Name;
        request()->image2->move(storage_path('manufacturers/'.str_slug($manufacturer_name->name)), $image2Name);
        }
        $carmodel->save();
        return $carmodel;

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

     public function Manufacturers()
    {
         $manufacturers = Manufacturer::get();

         return $manufacturers;
    }
}
