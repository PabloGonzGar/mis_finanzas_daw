
<x-layouts.index :title="$title">
<x-button href="/spending/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
    Agregar nuevo
</x-button>

<div class="mt-5">
<x-table :tableData="$table">
</x-tables>


</x-layouts.index>