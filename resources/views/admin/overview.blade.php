<x-admin-layout>
    <div class="grid grid-cols-4 gap-4">
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-4 justify-center items-center">
            <i data-feather="users" class="stroke-sky-500"></i>
            <p class="text-lg text-zinc-600">10 Users</p>
        </div>
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-4 justify-center items-center">
            <i data-feather="shopping-bag" class="stroke-orange-500"></i>
            <p class="text-lg text-zinc-600">14 Products</p>
        </div>
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-4 justify-center items-center">
            <i data-feather="trending-up" class="stroke-lime-500"></i>
            <p class="text-lg text-zinc-600">₱ 19,200.00 Sales</p>
        </div>
        <div class="border border-zinc-400 rounded-lg p-8 flex flex-col gap-4 justify-center items-center">
            <i data-feather="trending-down" class="stroke-red-500"></i>
            <p class="text-lg text-zinc-600">4 Refunds</p>
        </div>
    </div>

    <div class="max-w-[75%]">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Fasteners', 'Power Tools', 'Hand Tools', 'Varnish & Paints', 'Supplies', 'Building Materials'],
            datasets: [{
                label: 'Sales per Categories',
                data: [12, 19, 3, 5, 2, 3],
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
