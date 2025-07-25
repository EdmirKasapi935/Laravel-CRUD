<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    
public string $email="";
public string $password="";

public function loginUser()
{

   $credentials = $this->validate([
                     "email" => "required|email",
                     "password" => "required|min:8, string"
                 ]);

    if(Auth::guard("web")->attempt($credentials))
    {
        return redirect()->intended( route("homepage"));
    }
    else 
    {
        $this->addError('email',' ');
        $this->addError('password','Invalid email or password');
    }
}

}; ?>


<div>
    <div style="text-align: center; margin-top:5px; margin-bottom: 10px;">
 
        <h1 style="font-size: 30px">Log in</h1>
       
    </div>

    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg">
    

        <form wire:submit="loginUser" >
          
           <div class="mb-6">
               <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-Mail</label>
               <input type="email" id="email" wire:model="email" class=" @error('email')
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
               <button type="submit" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Log In</button>
           </div>
        </form>

    </div>

    <div style="text-align: center; margin-top:5px; margin-bottom: 10px;">
 
        <h1 style="font-size: 15px">Forgot Password? Click <a href={{ route("auth.reset") }}><strong class="text-blue-700"> Here </strong> </a> </h1>
       
    </div>

    @if (session('reset-message'))
    <div class="p-2 mt-4 mx-auto text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" style="width: 30%" role="alert">
      <span class="font-medium">{{ session('reset-message') }}</span>
    </div>

    {{ session()->forget('reset-message') }}
   @endif

</div>


