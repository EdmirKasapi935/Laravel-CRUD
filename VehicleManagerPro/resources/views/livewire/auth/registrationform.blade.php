<?php

use Livewire\Volt\Component;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

new class extends Component {

public string $username = "";
public string $email = "";
public string $password = "";
public string $password_confirmation="";

public function registerUser()
{
    $this->validate([
        
          "username" => "required|string|min:5|max:50",
          "email" => "required|email|unique:users",
          "password" => ["required","min:8","confirmed", Password::defaults()]
    ]);

 $user = User::create(
        [
            "name" => $this->username,
            "email" => $this->email,
            "password" => Hash::make( $this->password )
        ]);

 auth()->login($user);

 return to_route("homepage");

}

}; ?>


<div class="max-w-6xl mx-auto">
    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg">
        <form wire:submit="registerUser">
           @csrf
           <div class="mb-6">
               <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
               <input type="text" id="username" wire:model="username" class=" @error('username')
                                                        border-red-500  
                                                       @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               @error('name')
                   <span class="text-red-500 text-sm"> {{$message}} </span>
               @enderror          
           </div>
   
           <div class="mb-6">
               <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-Mail</label>
               <input type="email" nid="email" wire:model="email" class=" @error('email')
                                                        border-red-500  
                                                       @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               @error('email')
                   <span class="text-red-500 text-sm"> {{$message}} </span>
               @enderror          
           </div>
   
           <div class="mb-6">
               <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
               <input type="password" id="password" wire:model="password" class=" @error('password')
                                                        border-red-500  
                                                       @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               @error('password')
                   <span class="text-red-500 text-sm"> {{$message}} </span>
               @enderror          
           </div>
   
           <div class="mb-6">
               <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
               <input type="password" id="password_confirmation" wire:model="password_confirmation" class=" @error('password_confirmtion')
                                                        border-red-500  
                                                       @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               @error('password_confirmation')
                   <span class="text-red-500 text-sm"> {{$message}} </span>
               @enderror          
           </div>
   
          
           
           <div class="mb-6">
            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Register</button>
           </div>
        </form>
    </div>
</div>    
