<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    

                <form method="POST" action="{{ url('userStore') }}">

                    @csrf
                        <!-- Username -->
                        <div>
                            <x-input-label for="idPeminjam" :value="__('Peminjam')" />

                            <x-text-input id="idPeminjam" class="block mt-1 w-full" type="select" name="idPeminjam" :value="old('idPeminjam')" required autofocus />

                            <x-input-error :messages="$errors->get('idPeminjam')" class="mt-2" />
                        </div>

                        <!-- Fullname -->
                        <div class="mt-4">
                            <x-input-label for="jenisKendaraan" :value="__('Kendaraan')" />
                            
                            <select class="block mt-1 w-full" name="jenisKendaraan" id="jenisKendaraan" :value="old('jenisKendaraan')" required autofocus>
                                <option value="1">Mobil</option>
                                <option value="2">Motor</option>
                                <option value="4">Bus</option>
                            </select>
                            
                            <x-input-error :messages="$errors->get('jenisKendaraan')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="startDate" :value="__('Start')" />

                            <x-text-input id="startDate" class="block mt-1 w-full" type="date" name="startDate" :value="old('startDate')" required />

                            <x-input-error :messages="$errors->get('startDate')" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4">
                            <x-input-label for="endDate" :value="__('End')" />

                            <x-text-input id="endDate" class="block mt-1 w-full" type="date" name="endDate" :value="old('endDate')" required />

                            <x-input-error :messages="$errors->get('endDate')" class="mt-2" />
                        </div>
        
                            <div>
                                <div class="flex items-center mt-4">
                                    <x-primary-button>
                                        {{ __('Ok') }}
                                    </x-primary-button>
                                </div>

                                <div class="flex items-center mt-4">
                                    <x-primary-button>
                                        {{ __('Reset') }}
                                    </x-primary-button>
                                </div>
                            </div>

                                
                            </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
