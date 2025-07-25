<?php

use Livewire\Volt\Component;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;

new class extends Component {
    
  public string $email = "";
  public string $password = "";
  public string $password_confirmation="";


  public function resetPassword()
  {
    $validated= $this->validate([

        "email" => "required|email|exists:users",
        "password" => ["required","min:8","confirmed", Password::defaults()]
    ]);

    $newPassword = Hash::make($validated['password']);
    $emailToReset = $validated['email'];

    DB::update(" update users set password ='$newPassword' where email = '$emailToReset' ");

    Session::put('reset-message',"Password changed successfully!");

    return to_route("auth.loginform");

  }

}; ?>

<div>
    <div style="text-align: center; margin-top:5px; margin-bottom: 10px;">
 
        <h1 style="font-size: 30px">Enter your email and the new password in the fields below</h1>
       
    </div>

    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg">
    

        <form wire:submit="resetPassword" >
          
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
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
            <input type="password" id="password" wire:model="password" class=" @error('password')
                                                     border-red-500  
                                                    @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('password')
                <span class="text-red-500 text-sm"> {{$message}} </span>
            @enderror          
        </div>

        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm New Password</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" class=" @error('password_confirmtion')
                                                     border-red-500  
                                                    @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('password_confirmation')
                <span class="text-red-500 text-sm"> {{$message}} </span>
            @enderror          
        </div>
           
           <div class="mb-2">
               <button type="submit" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Reset Password</button>
           </div>
        </form>

        <div class="mb-2">
          <a href={{ route("auth.loginform") }}>
            <button type="submit" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> Cancel </button>
          </a>
        </div>

    </div>
</div>
