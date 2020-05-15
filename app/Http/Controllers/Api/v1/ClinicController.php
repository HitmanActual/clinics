<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Clinic;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class ClinicController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clinics = Clinic::all();
        
        return $this->successResponse($clinics);
      
    }

    /**
     * Create one new Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'doctor_id'=>'required|integer',
            'governorate_id'=>'required|integer',
            'district_id'=>'required|integer',
            'address'=>'required|string',
            'lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'long' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'type'=>'required|string',
            'regular_price'=>'required|numeric',
            'urgent_price'=>'required|numeric',
            'phone'=>'required|numeric',
           
        ]);
       
        $clinic = Clinic::create($request->all());          
        return $this->successResponse($clinic,Response::HTTP_CREATED);
       
    }

    /**
     * get one Clinic
     *
     * @return Illuminate\Http\Response
     */
    public function show($clinic)
    {
        //
        $clinic = Clinic::findOrFail($clinic);
        return $this->successResponse($clinic);
        
    }

    /**
     * update an existing one Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$clinic)
    {

        $this->validate($request,[
           
            'doctor_id'=>'integer',
            'governorate_id'=>'integer',
            'district_id'=>'integer',
            'address'=>'string',
            'lat' => ['regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'long' => ['regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'type'=>'string',
            'regular_price'=>'numeric',
            'urgent_price'=>'numeric',
            'phone'=>'numeric',
            
        ]);
        $clinic = Clinic::findOrFail($clinic);
        $clinic->fill($request->all());

        
        if($clinic->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $clinic->save();
        return $this->successResponse($clinic);
    }

     /**
     * remove an existing one clinic
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($clinic)
    {
        $clinic = Clinic::findOrFail($clinic);
        $clinic->delete();
        return $this->successResponse($clinic);
      
    }

}
