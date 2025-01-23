<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($table['heading'] as $thead)
                <th scope="col" class="px-6 py-3">
                    {{$thead}}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>

            @for ($i = 0 ; $i < count($table['content']) ; $i++)
                @if (($i+1)%2==0)
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                @endif
                    @for ($j = 0 ; $j < count($table['content'][$i]) ; $j++)
                        @if($j==0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$table['content'][$i][$j]}}
                            </th>

                        @else
                            <td class="px-6 py-4">
                                {{$table['content'][$i][$j]}}
                            </td>

                        @endif
                    @endfor

                </tr>

            @endfor
        </tbody>
    </table>
</div>