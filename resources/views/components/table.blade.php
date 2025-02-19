<div class="relative overflow-x-auto shadow shadow-lg">
    <x-alert></x-alert>
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                @foreach ($tableData['heading'] as $heading)
                <th scope="col" class="px-6 py-3">
                    {{$heading}}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData['data'] as $index => $row)
            
            <!-- Alternating row colors between white and light blue -->

            <tr class="{{ $loop->even ? 'bg-white' : 'bg-blue-100' }} border-b">
                @foreach ($row as $key => $cell)
                @if(($key != 'id'))
                <!-- First index as <th> and others as <td> -->
                @if ($loop->first)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$cell}}
                </th>
                @else
                <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                    {{$cell}}
                </td>
                @endif
                @endif
                @endforeach
                <td class="px-6 py-4  flex flex-row items-center justify-center gap-1 ">
                    <x-button href="{{ url(request()->segment(1) . '/' . $row['id']) }}" class="mx-1  bg-emerald-500 hover:bg-emerald-600 text-white font-bold hover:text-white py-2 px-4 border border-emerald-500 hover:border-transparent rounded">
                        Ver 
                    </x-button>


                    <x-button href="{{ url(request()->segment(1) . '/' . $row['id']) .'/edit' }}" class="m-0  bg-yellow-500 hover:bg-yellow-600 text-white font-bold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                        Editar 
                    </x-button>
                    <div class="mt-5"></div>

                    <form action="{{ url(request()->segment(1) . '/' . $row['id']) }}" method="post" class="border  my-0">
                    @csrf
                    @method('DELETE')
                        <x-button type="submit" name="eliminar" class="bg-red-500 hover:bg-red-700 text-white font-bold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                            Borrar
                        </x-button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>