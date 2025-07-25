<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function dashboard()
    {
       $vehicles = Vehicle::orderBy('created_at','desc')->paginate(8);
       $users = User::all();

       return view("admin.dashboard", ["vehicles" => $vehicles, "users" => $users]);
    }

    public function adminEdit(Vehicle $vehicle, Request $request): View
    {
        return view("admin.editform", ["vehicleToEdit"=>$vehicle, "currentPage" => $request->currentPage]);
    }
     
    public function adminDestroy(Vehicle $vehicle, Request $request)
    { 
       
       Gate::authorize('delete',$vehicle);
       Storage::delete($vehicle->imgsrc);
       $vehicle->delete();
       return to_route('admin.dashboard',["page" => $request->currentPage]);  
    }
}
