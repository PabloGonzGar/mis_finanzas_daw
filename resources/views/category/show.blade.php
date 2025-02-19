<x-layouts.index :title="$title">

    <div class="my-5">
        <x-table :tableData="$table" />
    </div>
    <div class=" my-5">
        <h2  class="text-3xl font-bold tracking-tight text-gray-900">Incomes</h2>
        <x-table :tableData="$table" :tableData="$tableIncome" />
    </div>

    <div class="my-5">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Spending</h2>
        <div class="my-5">
            <x-table :tableData="$table" :tableData="$tableSpending" />
        </div>
    </div>


</x-layouts.index>