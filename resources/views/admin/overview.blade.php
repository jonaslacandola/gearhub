<x-admin-layout>
    <div class="grid grid-cols-4 gap-4">
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-2 justify-center items-center">
            <i data-feather="users" class="stroke-sky-500"></i>
            <p class="text-lg text-zinc-600">{{ $users }} Users</p>
        </div>
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-2 justify-center items-center">
            <i data-feather="shopping-bag" class="stroke-orange-500"></i>
            <p class="text-lg text-zinc-600">{{ $products }} Products</p>
        </div>
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-2 justify-center items-center">
            <i data-feather="trending-up" class="stroke-lime-500"></i>
            <p class="text-zinc-500">{{ $sales }} Sales</p>
            <p class="text-lg text-zinc-600">&#8369; {{ number_format($revenue, 2, '.', ',') }} Revenue</p>
        </div>
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-2 justify-center items-center">
            <i data-feather="trending-down" class="stroke-red-500"></i>
            <p class="text-zinc-500">{{ $refunds }} Refunds</p>
            <p class="text-lg text-zinc-600">&#8369; {{ number_format($sales_return, 2, '.', ',') }} Return</p>
        </div>
    </div>

    <div class="w-full h-full max-w-[75%] mx-auto">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const revenuePerCategory = @json($revenuePerCategory);

        const colors = [
            '#ef4444', '#3b82f6', '#22c55e', '#eab308', '#a855f7', '#ec4899', '#6366f1'
         ];

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: Object.keys(revenuePerCategory),
            datasets: [{
                label: 'Sales per Categories',
                data: Object.values(revenuePerCategory),
                backgroundColor: colors,
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
        </script>

</x-admin-layout>
