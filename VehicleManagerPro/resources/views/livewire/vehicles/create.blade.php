<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehicle;


new class extends Component {

use Livewire\WithFileUploads;

public string $make="";
public string $model="";
public string $transmission="manual";
public int $seats=1;
public string $category="Sedan";
public string $license_plate="";
public $imgsrc="";

public Vehicle $newVehicle;

public function store()
{
    $validated = $this->validate([
                    "make" =>  "required|string|max:40" ,
                    "model" =>  "required|string|max:40" ,
                    "seats" =>  "required" ,
                    "transmission" => "required|string",
                    "category" => "required|string",
                    "license_plate" => "required|string|max:20",
                    "imgsrc" => "required|image",
                                      ]);
 
    $validated['imgsrc'] = $this->imgsrc->store('vehicle_images');

    Storage::deleteDirectory("livewire-tmp");

    $this->newVehicle = auth()->user()->vehicles()->create($validated);

    Session::put('message',"Vehicle added successfully!");

    $this->make="";
    $this->model="";
    $this->transmission="manual";
    $this->seats=1;
    $this->category="Sedan";
    $this->license_plate="";
    $this->imgsrc="";

}



}; ?>


<div style="margin-top:20px">

   

    <form wire:submit="store" class="max-w-md mx-auto">
       
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" wire:model="make" id="make" class="block py-2.5 px-0 w-full text-sm text-red-900 focus:text-white bg-transparent border-0 border-b-2 border-red-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-800 focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required />
            <label for="make" class="peer-focus:font-medium absolute text-sm text-red-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Make/brand</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" wire:model="model" id="model" class="block py-2.5 px-0 w-full text-sm text-red-900 focus:text-white bg-transparent border-0 border-b-2 border-red-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-800 focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required />
            <label for="model" class="peer-focus:font-medium absolute text-sm text-red-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Model</label>
        </div>
      
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" wire:model="seats" id="seats" class="block py-2.5 px-0 w-full text-sm text-red-900 focus:text-white bg-transparent border-0 border-b-2 border-red-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-800 focus:outline-none focus:ring-0 focus:border-white peer" max="100" min="1" value="1" />
            <label for="seats" class="peer-focus:font-medium absolute text-sm text-red-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Seats</label>
        </div>
     
        <div class="relative z-0 w-full mb-5 group">
            <select wire:model="transmission" class="block py-2.5 px-0 w-full text-sm text-red-900 focus:text-white bg-transparent border-0 border-b-2 border-red-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-800 focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required>
                <option value="Manual" class="text-black"> Manual </option>
                <option value="Automatic" class="text-black"> Automatic </option>
                </select>
                <label for="transmission" class="peer-focus:font-medium absolute text-sm text-red-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Transmission</label>
        </div>  

        <div class="relative z-0 w-full mb-5 group">
            <select wire:model="category" class="block py-2.5 px-0 w-full text-sm text-red-900 focus:text-white bg-transparent border-0 border-b-2 border-red-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-800 focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required>
                <option value="Compact SUV" class="text-black"> Compact SUV </option>
                <option value="Convertible" class="text-black"> Convertible </option>
                <option value="Coupe" class="text-black"> Coupe </option>
                <option value="Crossover" class="text-black"> Crossover </option>
                <option value="Electric Vehicle" class="text-black"> Electric Vehicle </option>
                <option value="Hatchback" class="text-black"> Hatchback </option>
                <option value="Hybrid" class="text-black"> Hybrid </option>
                <option value="Hyundai i10" class="text-black"> Hyundai i10 </option>
                <option value="Luxury" class="text-black"> Luxury </option>
                <option value="Minivan" class="text-black"> Minivan </option>
                <option value="MUV" class="text-black"> MUV </option>      
                <option value="Pickup Truck" class="text-black"> Pickup Truck </option>
                <option value="Sedan" class="text-black"> Sedan </option>
                <option value="Sports Car" class="text-black"> Sports Car </option>
                <option value="Station Wagon" class="text-black"> Station Wagon </option>
                <option value="Suzuki Swift" class="text-black"> Suzuki Swift </option>
                <option value="SUV" class="text-black"> SUV </option>
                <option value="Tata" class="text-black"> Tata </option>
                <option value="Toyota Innova Crysta" class="text-black"> Toyota Innova Crysta </option> 
                </select>
                <label for="category" class="peer-focus:font-medium absolute text-sm text-red-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
        </div>    
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" wire:model="license_plate" id="license_plate" class="block py-2.5 px-0 w-full text-sm text-red-900 focus:text-white bg-transparent border-0 border-b-2 border-red-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-800 focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required />
            <label for="license_plate" class="peer-focus:font-medium absolute text-sm text-red-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">License Plate</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="file" wire:model="imgsrc" id="imgsrc" class="block py-2.5 px-0 w-full text-sm text-red-900 focus:text-white bg-transparent border-0 border-b-2 border-red-900 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-800 focus:outline-none focus:ring-0 focus:border-white peer" placeholder=" " required />
            <label for="imgsrc" class="peer-focus:font-medium absolute text-sm text-red-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image</label>
        </div>
        
   
        <x-primary-button class="mt-4" >{{ __('Create') }}</x-primary-button>
        
       
    </form>

    <div class="mx-auto max-w-md mt-4">
        <a href={{ route("vehicle.menu") }}> <x-secondary-button> Back to vehicles</x-secondary-button> </a>
    </div>

    @if (session('message'))
     <div class="p-2 mt-4 mx-auto text-sm rounded-lg bg-green-50 dark:bg-gray-800 " style="width: 30%" role="alert">
       <span class="font-medium text-green-800 dark:text-green-400">{{ session('message') }}</span> <a href={{ route('vehicle.show', $newVehicle->id ) }} ><strong class=" text-blue-700"> View Here</strong> </a>
     </div>

     {{ session()->forget('message') }}
    @endif

   

</div>



