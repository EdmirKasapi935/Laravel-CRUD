<x-mypagelayout>

    <div class="max-w-6xl mx-auto sm:px-6 md:px-8 mt-10 bg-red-50 dark:bg-slate-700 rounded-lg">
        
        <div>
            <br>
            <h1 class="text-3xl text-red-800 dark:text-indigo-400 font-semibold"  style="font-size: 50px;">{{ $vehicle->make }} {{ $vehicle->model }}</h1>
        </div>
    
         <div class="flex justify-between">

            <main class="max-w-6xl" style="margin-top: 30px;">
                <strong class="text-gray-700 dark:text-gray-400" style="font-size: 30px;">License Plate: {{ $vehicle->license_plate}} </strong>
                <p class="text-gray-700 dark:text-gray-400"  style="font-size: 25px;">Category: {{$vehicle->category}} </p>
                <p class="text-gray-700 dark:text-gray-400"  style="font-size: 25px;">Transmission: {{$vehicle->transmission}} </p>
                <p class="text-gray-700 dark:text-gray-400"  style="font-size: 25px;">No.of Seats: {{$vehicle->seats}} </p>
             </main>
            
             <div style="width: 400px; height:400px; background-image: url('{{ URL('storage/'.$vehicle->imgsrc) }}'); background-size: 100% 100%;" class="rounded-md">
               
             </div>
            
         </div>
        
    
                <section class="mt-4">
                  <div class="flex justify-end">
                     <div class="flex justify-between">

                           <a href={{ route("vehicle.menu", ["page" => session("page")]) }} > <button type="submit" class="mt-2 text-white bg-gradient-to-r from-purple-300 via-purple-400 to-purple-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> Menu </button>  </a>

                            <a href={{  route('vehicle.edit', $vehicle->id) }}>
                                <button type="submit" class="mt-2 text-black bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> Edit </button> 
                            </a>
                              
                            <form action={{  route('vehicle.delete', $vehicle->id) }} method="Post">
                                @csrf
                                <input hidden type="number" name="currentPage" id="currentPage" value={{ session("page") }}>
                                @method("DELETE")
                                <button type="submit" class="mt-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> Delete </button> 
                            </form> 
                     </div>
                  </div>
                </section>
        
        
    </div>

</x-mypagelayout>