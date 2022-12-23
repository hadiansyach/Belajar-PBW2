<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Transaksi') }}
            </h2>
        </x-slot>

    <form method="POST" action="{{ url('/transaksiStore') }}">
            @csrf


            <div class="mt-4">
                <x-input-label for="peminjam" :value="__('Peminjam')" />

                <select name="idPeminjam" id="idPeminjam" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="-1">--Pilih dahulu--</option>
                    @foreach ($users as $user)
                        @if ($user->id == old('idPeminjam'))
                            <option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="mt-4">
                <x-input-label :value="__('Koleksi 1*')" />

                <select name="koleksi1" id="koleksi1" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="-1">--Pilih dahulu--</option>
                    @foreach ($collections as $collection)
                        @if ($collection->id == old('koleksi1'))
                            <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                        @else
                            <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Koleksi 2')" />

                <select name="koleksi2" id="koleksi2" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="-1">--Pilih dahulu--</option>
                    @foreach ($collections as $collection)
                        @if ($collection->id == old('koleksi2'))
                            <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                        @else
                            <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Koleksi 3')" />

                <select name="koleksi3" id="koleksi3" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="-1">--Pilih dahulu--</option>
                    @foreach ($collections as $collection)
                        @if ($collection->id == old('koleksi3'))
                            <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                        @else
                            <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            <!-- Submit -->
            <x-primary-button class="my-4">
                    {{ __('Submit') }}
            </x-primary-button>
            
            <!-- Reset -->
            <x-primary-button class="my-4" type="reset">
                    {{ __('Reset') }}
            </x-primary-button>
        </form>
        </div>
    </div>
    
</x-app-layout>