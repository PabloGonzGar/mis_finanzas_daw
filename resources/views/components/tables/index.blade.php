<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                

            @foreach( $table[0] as $key => $column)
                <th scope="col" class="px-6 py-3">
                    {{$key}}
                </th>
                
            @endforeach
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
                        @if($columnKey==0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$column}}
                            </th>

                        @else
                            <td class="px-6 py-4">
                                {{$column}}
                            </td>
                        @endif
                    @endforeach

                </tr>

            @endforeach
        </tbody>
    </table>
</div>