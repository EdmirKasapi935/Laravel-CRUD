<x-mypagelayout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-red-50 dark:bg-gray-800">
                        Owner
                    </th>
                    <th scope="col" class="px-6 py-3 bg-white">
                        Lincense plate
                    </th>
                    <th scope="col" class="px-6 py-3 bg-red-50 dark:bg-gray-800">
                        Make
                    </th>
                    <th scope="col" class="px-6 py-3 bg-white">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3 bg-red-50 dark:bg-gray-800">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 bg-white">
                        Transmission
                    </th>
                    <th scope="col" class="px-6 py-3 bg-red-50 dark:bg-gray-800">
                        Seats
                    </th>
                    <th scope="col" class="px-6 py-3 bg-white">
                        Image
                    </th>
                    <th class="px-6 py-3 bg-red-50 dark:bg-gray-800"></th>
                    <th class="px-6 py-3 bg-red-50 dark:bg-gray-800"></th>
    
                </tr>
            </thead>
            <tbody>
              @foreach ($vehicles as $vehicle)
              <tr class="border-b border-gray-200 dark:border-gray-700">
                <th class="px-6 py-4 bg-red-50 dark:bg-gray-800">
                    {{ $users->where('id',"=", $vehicle->user_id)->value('name') }}
                </th>
                <td scope="row" class="px-6 py-4 bg-white">
                    {{$vehicle->license_plate }}
                </td>
                <td class="px-6 py-4 bg-red-50 dark:bg-gray-800">
                    {{$vehicle->make }}
                </td>
                <td class="px-6 py-4 bg-white">
                    {{$vehicle->model }}
                </td>
                <td class="px-6 py-4 bg-red-50 dark:bg-gray-800">
                    {{$vehicle->category }}
                </td>
                <td class="px-6 py-4 bg-white">
                    {{$vehicle->transmission }}
                </td>
                <td class="px-6 py-4 bg-red-50 dark:bg-gray-800">
                    {{$vehicle->seats }}
                </td>
                <td class="py-4 bg-white">
                <a href="{{ URL('storage/'.$vehicle->imgsrc) }}"> <strong style="margin-left: 10px" class="text-blue-500"> Click Here </strong> </a> to View 
                </td>
    
                <td class="bg-red-50 dark:bg-gray-800">
                    <div style="margin-left: 35%">
                        <form action={{  route('admin.edit', $vehicle->id) }} method="Post">
                            @csrf
                            <input hidden type="number" name="currentPage" id="currentPage" value={{ $vehicles->currentPage() }}>
                            @method("GET")
                            <button type="submit" class="mt-2 text-black bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> Edit </button> 
                        </form>
                    </div>       
                </td>
    
                <td class="bg-red-50 dark:bg-gray-800">
                    <div  style="margin-left: 20%">
                        <form action={{  route('admin.delete', $vehicle->id) }} method="Post">
                            @csrf
                            <input hidden type="number" name="currentPage" id="currentPage" value={{ $vehicles->currentPage() }}>
                            @method("DELETE")
                            <button type="submit" class="mt-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> Delete </button> 
                        </form>
                    </div>  
                </td>
    
            </tr>
              @endforeach
            </tbody>
        </table>
    </div>


            <div style="position:fixed; bottom:5px; left:5px; width: 350px;">
                {{$vehicles->links()}}
            </div>
            
    
    
    </x-mypagelayout>