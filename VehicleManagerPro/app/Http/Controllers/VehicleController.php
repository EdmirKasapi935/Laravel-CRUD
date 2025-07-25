<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\support\Facades\Storage;


class VehicleController extends Controller
{
    public function index(): View
    {
        $vehicles = Vehicle::orderBy('created_at','desc')->where('user_id',auth()->user()->id)->paginate(6);

        return view('vehicles.vehiclemenu',["vehicles" => $vehicles]);
    }

    public function showcreate(): View
    {
        return view("vehicles.creationform");
    }

    public function display(Vehicle $vehicle, Request $request)
    {
        return view("vehicles.show", ["vehicle" => $vehicle]);
    }

    public function edit(Vehicle $vehicle, Request $request): View
    {
        return view("vehicles.editform", ["vehicleToEdit"=>$vehicle]);
    }
     
    public function destroy(Vehicle $vehicle, Request $request)
    { 
       
       Gate::authorize('delete',$vehicle);
       Storage::delete($vehicle->imgsrc);
       $vehicle->delete();
       return to_route('vehicle.menu',["page" => $request->currentPage]);  
    }
}
