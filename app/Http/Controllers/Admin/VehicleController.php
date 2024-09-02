<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleValidate;
use App\Notifications\CarModification;
use App\Helper;
use App\Vehicle;
use App\User;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vehicles', ['vehicles' => Vehicle::orderBy('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_vehicle', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleValidate $request)
    {
        if($request->validated()) {
            Vehicle::create($request->all());
            
            if($request->get('proprietario'))
                User::find($request->get('proprietario'))->notify(new CarModification);
        }
        
        return redirect()->route('admin.vehicles.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('admin.update_vehicle', ['users' => User::all(), 'data' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleValidate $request, Vehicle $vehicle)
    {
        //Caso ocorra uma alteração de dono, notifica o dono atual
        if($vehicle->proprietario && $vehicle->proprietario != $request->input('proprietario'))
            $vehicle->user()->get()[0]->notify(new CarModification);

        $vehicle->update($request->all());

        //Notifica o dono. Caso tenha ocorrido uma alteração de dono, esta notificação será para o novo dono
        //E a de cima, para o antigo.
        //Caso não tenha ocorrido uma alteração de dono, a de cima não será executada, somente essa (para o dono atual)
        if($vehicle->proprietario)
            $vehicle->user()->get()[0]->notify(new CarModification);

        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        if($vehicle->proprietario) {
            $vehicle->user()->get()[0]->notify(new CarModification);
        }

        return redirect()->route('admin.vehicles.index');
    }
}
