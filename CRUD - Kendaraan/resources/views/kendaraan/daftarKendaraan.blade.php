<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                <body>
                        <div class="container mt-2">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            <div class="card-body">
                                <table class="table table-bordered" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kendaraan</th>
                                            <th>Tipe</th>
                                            <th>License</th>
                                            <th>Daily Price</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </body>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#datatable').DataTable({
                            ajax:'{{ url("getAllVehicles") }}',
                            serverSide: false,
                            processing: true,
                            deferRender: true,
                            type: 'GET',
                            destroy: true,
                            columns:[
                                {data: 'id', name: 'id'},
                                {data: 'name', name: 'name'},
                                {data: 'tipe', name: 'tipe'},
                                {data: 'license', name: 'license'},
                                {data: 'dailyPrice', name: 'dailyPrice'}
                            ]
                        });

                    });
                    </script>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
