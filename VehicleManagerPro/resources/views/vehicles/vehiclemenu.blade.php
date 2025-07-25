<x-mypagelayout>



<div class="max-w-6xl mx-auto mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
  
          @foreach ($vehicles as $vehicle)

          <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
             
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $vehicle->make }} {{ $vehicle->model }}</h5>

             <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $vehicle->license_plate }}</p>
             
           <form action={{ route("vehicle.show", $vehicle->id) }} method="HEAD">

            {{ session(["page" => $vehicles->currentPage()]) }}

            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              View Vehicle
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
              </svg>
      </button>
            
           </form>
          
          
         </div>
          
             
    
          @endforeach

    
</div>


<div style="position:fixed; left:5px; bottom:5px;  width:350px;">
  
  {{$vehicles->links()}}

  <a href={{ route("vehicle.create") }}> <button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add vehicle</button> </a>
</div>



</x-mypagelayout>