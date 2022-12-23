<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengembalian Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <!-- Id transaksi -->
                <div>
                            <x-input-label for="id" :value="__('ID Transaksi')" />

                            <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id')" required autofocus />

                            <x-input-error :messages="$errors->get('id')" class="mt-2" />
                        </div>

                        <!-- Username -->
                        <div class="mt-4">
                            <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />

                            <x-text-input id="jenisKoleksi" class="block mt-1 w-full" type="text" name="jenisKoleksi" :value="old('jenisKoleksi')" required autofocus />

                            <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
                        </div>

                        <!-- Fullname -->
                        <div class="mt-4">
                            <x-input-label for="jumlahKoleksi" :value="__('Jumlah Koleksi')" />

                            <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="text" name="jumlahKoleksi" :value="old('jumlahKoleksi')" required autofocus />

                            <x-input-error :messages="$errors->get('jumlahKoleksi')" class="mt-2" />
                        </div>

                            <div>
                                <div class="flex items-center mt-4">
                                    <x-primary-button>
                                        {{ __('Reset') }}
                                    </x-primary-button>
                                </div>

                                <div class="flex items-center mt-4">
                                    <x-primary-button>
                                        {{ __('Submit') }}
                                    </x-primary-button>
                                </div>
                            </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
