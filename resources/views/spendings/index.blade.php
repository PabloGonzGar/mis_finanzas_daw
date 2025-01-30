
<x-layouts.index :title="$title">
<x-buttons.index  href="/spending/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
    Agregar nuevo
</x-buttons.index>

<div class="mt-5">
<x-tables.index :table="$table"/>

</x-layouts.index>