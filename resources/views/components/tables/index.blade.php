<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>


                @foreach( $table[0] as $key => $column)
                @if($key!='id')
                <th scope="col" class="px-6 py-3">
                    {{$key}}
                </th>
                @endif
                @endforeach

                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>

            </tr>
        </thead>
        <tbody>

            @foreach ( $table as $rowKey =>$row)
            @if (($rowKey+1)%2==0)
            <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                @else
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                @endif
                @foreach ($row as $columnKey => $column)

                @if($columnKey != 'id')
                <td class="px-6 py-4">
                    {{$column}}
                </td>
                @else
                <td class="px-6 py-4">
                    <x-buttons.index href="{{ url(request()->segment(1) . '/edit/' . $column) }}" class="bg-info-500 hover:bg-yellow-700 text-white font-bold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                        Editar 
                    </x-buttons.index>
                    <div class="mt-5"></div>

                    <form action="{{ url(request()->segment(1) . '/delete/' . $column) }}" method="post">
                    @csrf
                    @method('DELETE')
                        <x-buttons.index type="submit" name="eliminar" class="bg-red-500 hover:bg-red-700 text-white font-bold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                            Borrar
                        </x-buttons.index>
                    </form>
                </td>

                @endif

                @endforeach



            </tr>

            @endforeach
        </tbody>
    </table>
</div>