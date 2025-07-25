<?php

use App\Models\Vehicle;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\attributes\Validate;

new class extends Component {

use Livewire\WithFileUploads;    

public $currentPage;

public Vehicle $vehicle;

public string $make="";
public string $model="";
public string $transmission="manual";
public int $seats=1;
public string $category="Sedan";
public string $license_plate="";
public $imgsrc="";

public function mount()
{
    
    $this->make = $this->vehicle->make;
    $this->model = $this->vehicle->model;
    $this->transmission = $this->vehicle->transmission;
    $this->seats = $this->vehicle->seats;
    $this->category = $this->vehicle->category;
    $this->license_plate = $this->vehicle->license_plate;

   
}

public function adminupdate()
{
   $this->authorize('update', $this->vehicle);

   

   $validated = $this->validate([
                    "make" =>  "required|string|max:40" ,
                    "model" =>  "required|string|max:40" ,
                    "seats" =>  "required" ,
                    "transmission" => "required|string",
                    "category" => "required|string",
                    "license_plate" => "required|string|max:20",
                    "imgsrc" => "sometimes|image",
                                      ]);
         
   
  if($validated["imgsrc"] != "" )
   {
      Storage::delete($this->vehicle->imgsrc);
      $validated['imgsrc'] = Storage::putFile('vehicle_images', $this->imgsrc);
      Storage::deleteDirectory("livewire-tmp");   
   }
   else {
    $validated["imgsrc"] = $this->vehicle->imgsrc;
   }
   
  
   
   $this->vehicle->update($validated);
    
   return to_route("admin.dashboard", ["page" => $this->currentPage]);

   
}
}; ?>

<div>
   
    <h1 style="text-align: center; font-size: 50px;">Please fill the fields below</h1>
  <div class="mx-auto bg-white shadow-sm rounded-lg  p-6 space-x-2" style="width: 30%;"> 
    <form wire:submit="adminupdate" class="max-w-md mx-auto">

     <label style="margin-right:10px;"> Make/Brand: </label> <input type="text" wire:model="make" class="rounded-md shadow-lg focus:border-indigo-300" style="margin-bottom: 5px;" required><br>
     <label style="margin-right:51px;"> Model: </label> <input type="text" wire:model="model" class="rounded-md shadow-lg focus:border-indigo-300 " style="margin-bottom: 5px;" required><br>
     <label style="margin-right:59px"> Seats: </label> <input type="number" wire:model="seats" class="rounded-md shadow-lg focus:border-indigo-300" max="100" min="1" value="1" style="margin-bottom: 5px;"><br>
     <label style="margin-right:5px;">Transmission:</label> <select wire:model="transmission" class="rounded-md shadow-lg focus:border-indigo-300 " style="margin-bottom: 5px;">
                                  <option value="Manual">Manual</option>
                                  <option value="Automatic">Automatic</option>
                                  </select><br>
     <label style="margin-right: 30px;">Category:</label> <select wire:model="category" class="rounded-md shadow-lg focus:border-indigo-300 " style="margin-bottom: 5px;">
                                  <option value="Compact SUV">Compact SUV</option>
                                  <option value="Convertible">Convertible</option>
                                  <option value="Coupe">Coupe</option>
                                  <option value="Crossover">Crossover</option>
                                  <option value="ELectric Vehicle">Electric Vehicle</option>
                                  <option value="Hatchback">Hatchback</option>
                                  <option value="Hybrid">Hybrid</option>
                                  <option value="Hyundai i10">Hyundai i10</option>
                                  <option value="Luxury">Luxury</option>
                                  <option value="Minivan">Minivan</option>
                                  <option value="MUV">MUV</option>      
                                  <option value="Pickup Truck">Pickup Truck</option>
                                  <option value="Sedan">Sedan</option>
                                  <option value="Sports Car">Sports Car</option>
                                  <option value="Station Wagon">Station Wagon</option>
                                  <option value="Suzuki Swift">Suzuki Swift</option>
                                  <option value="SUV">SUV</option>
                                  <option value="Tata">Tata</option>
                                  <option value="Toyota Innova Crysta">Toyota Innova Crysta</option> 
                                  </select><br>

    <label style="margin-right:4px;">License Plate:</label> <input type="text" wire:model="license_plate" class="rounded-md shadow-lg focus:border-indigo-300 " style="margin-bottom: 5px;" required><br>
    <label style="margin-right:51px;">Image:</label> <input type="file" wire:model="imgsrc" class="rounded-md shadow-lg border-black focus:border-indigo-300 "><br>
                              

    <x-primary-button class="mt-4" style="margin-left: 100px;">{{ __('Save') }}</x-primary-button>

    </form>

    <div class="mt-3" style="margin-left: 99px">
        <a href={{ route("admin.dashboard", ["page" => $currentPage]) }}> <x-secondary-button> Cancel </x-secondary-button> </a>
    </div>

   </div> 
</div>

</div>
