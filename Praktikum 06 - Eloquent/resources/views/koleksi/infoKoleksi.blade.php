<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Isi form disini -->
                    <form method="POST" action="{{ url('koleksiUpdate') }}">
                    @csrf
                        <!-- ID Koleksi -->
                        <div class="mt-4">
                            <x-input-label for="id" :value="__('ID Koleksi')" />

                            <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="($collection->id)" readonly/>

                            <x-input-error :messages="$errors->get('idKoleksi')" class="mt-2" />
                        </div>
                        
                        <!-- Nama Koleksi -->
                        <div class="mt-4">
                            <x-input-label for="namaKoleksi" :value="__('ID Koleksi')" />

                            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="($collection->namaKoleksi)" readonly/>

                            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
                        </div>

                        <!-- Jenis -->
                        <div class="mt-4">
                                <x-input-label for="Jenis Koleksi" :value="__('Jenis Koleksi')" />

                                <select id="jenisKoleksi" name ="jenisKoleksi" class="form-select" required>
                                    <option value="-1" @if(old('jenisKoleksi', $collection->jenisKoleksi) == -1) selected @endif>Pilih satu</option>
                                    <option value="1" @if(old('jenisKoleksi', $collection->jenisKoleksi) == 1) selected @endif>Buku</option>
                                    <option value="2" @if(old('jenisKoleksi', $collection->jenisKoleksi) == 2) selected @endif>Majalah</option>
                                    <option value="3" @if(old('jenisKoleksi', $collection->jenisKoleksi) == 3) selected @endif>Cakram Digital</option>
                                </select>
                        </div>

                        <!-- Jumlah Awal -->
                        <div class="mt-4">
                            <x-input-label for="jumlahAwal" :value="__('Jumlah Awal')" />

                            <x-text-input id="jumlahAwal" class="block mt-1 w-full" type="text" name="jumlahAwal" :value="($collection->jumlahAwal)" readonly/>

                            <x-input-error :messages="$errors->get('jumlahAwal')" class="mt-2" />
                        </div>

                        <!-- Jumlah Sisa -->
                        <div class="mt-4">
                            <x-input-label for="jumlahSisa" :value="__('Jumlah Sisa')" />

                            <x-text-input id="jumlahSisa" class="block mt-1 w-full" type="text" name="jumlahSisa" :value="($collection->jumlahSisa)" readonly/>

                            <x-input-error :messages="$errors->get('jumlahSisa')" class="mt-2" />
                        </div>

                        <!-- Jumlah Keluar -->
                        <div class="mt-4">
                            <x-input-label for="jumlahKeluar" :value="__('Jumlah Keluar')" />

                            <x-text-input id="jumlahKeluar" class="block mt-1 w-full" type="text" name="jumlahKeluar" :value="($collection->jumlahKeluar)"/>

                            <x-input-error :messages="$errors->get('jumlahKeluar')" class="mt-2" />
                        </div>

                        <!-- Submit -->
                        <x-primary-button class="mt-4">
                                {{ __('Submit') }}
                        </x-primary-button>
                        <!-- Reset -->
                        <x-primary-button class="mt-4">
                                {{ __('Reset') }}
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>