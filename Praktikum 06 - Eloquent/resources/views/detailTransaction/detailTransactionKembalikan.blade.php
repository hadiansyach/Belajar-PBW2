<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Transaksi Update') }}
            </h2>
        </x-slot>

    <form method="POST" action="{{ url('detailTransactionUpdate') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="idTransaksi" :value="__('Id Transaksi*')" />

                <x-text-input id="idTransaksi" class="block mt-1 w-full" type="text" name="idTransaksi" :value="$detailTransaction->idTransaksi" required autofocus readonly />

                <x-input-error :messages="$errors->get('idTransaksi')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="idDetailTransaksi" :value="__('Id Detail Transaksi*')" />

                <x-text-input id="idDetailTransaksi" class="block mt-1 w-full" type="text" name="idDetailTransaksi" :value="$detailTransaction->idDetailTransaksi" required autofocus readonly />

                <x-input-error :messages="$errors->get('idDetailTransaksi')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="idPeminjam" :value="__('Peminjam*')" />

                <x-text-input id="idPeminjam" class="block mt-1 w-full" type="text" name="idPeminjam" :value="$detailTransaction->idPeminjam" required autofocus disabled />

                <x-input-error :messages="$errors->get('idPeminjam')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="idPetugas" :value="__('Petugas*')" />

                <x-text-input id="idPetugas" class="block mt-1 w-full" type="text" name="idPetugas" :value="$detailTransaction->idPetugas" required autofocus disabled />

                <x-input-error :messages="$errors->get('idPetugas')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="koleksi" :value="__('Koleksi*')" />

                <x-text-input id="koleksi" class="block mt-1 w-full" type="text" name="koleksi" :value="$detailTransaction->koleksi" required autofocus disabled />

                <x-input-error :messages="$errors->get('koleksi')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="status" :value="__('Status*')" />

                <select name="status" id="status" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                        <option value="1" @if(old('status', $detailTransaction->status) == 1) selected @endif>
                        Pinjam</option>
                        <option value="2" @if(old('status', $detailTransaction->status) == 2) selected @endif>
                        Kembali</option>
                        <option value="3" @if(old('status', $detailTransaction->status) == 3) selected @endif>
                        Hilang</option>
                </select>
            </div>
            
            <!-- Submit -->
            <x-primary-button class="my-4">
                    {{ __('Ok') }}
            </x-primary-button>
            
            <!-- Reset -->
            <x-primary-button class="my-4" type="reset">
                    {{ __('Reset') }}
            </x-primary-button>
        </form>
        </div>
    </div>
</x-app-layout>
