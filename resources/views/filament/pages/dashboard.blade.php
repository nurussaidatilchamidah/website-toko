<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-filament::stat
            label="Total Produk"
            value="{{ $totalProduk }}"
            icon="heroicon-o-archive-box"
        />

        <x-filament::stat
            label="Stok Menipis (< 5)"
            value="{{ $stokMenipis }}"
            description="Segera lakukan restok!"
            icon="heroicon-o-exclamation-circle"
            color="danger"
        />
    </div>
</x-filament::page>
