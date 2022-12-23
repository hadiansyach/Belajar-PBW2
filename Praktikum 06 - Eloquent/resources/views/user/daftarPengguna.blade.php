<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <a href="{{ route('user.registerPengguna') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md 
                font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 
                focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Registrasi Pengguna</a>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#datatable').DataTable({
                                ajax:'{{url("getAllUsers")}}', 
                                serverSide: false,
                                processing:true,
                                deferRender:true,
                                type:'GET',
                                destroy:true,
                                columns:[
                                    {data: 'id', name:'id'},
                                    {data: 'fullname', name:'fullname'},
                                    {data: 'username', name:'username'},
                                    {data: 'email', name:'email'},
                                    {data: 'birthdate', name:'birthdate'},
                                    {data: 'address', name:'address'},
                                    {data: 'phonenumber', name:'phonenumber'},
                                    {data: 'action', name:'action', orderable: false, searchable:false}
                                ]
                            });
                        })
                    </script>
                    <body>
                        <div class="container-fluid">
                            <nav aria-label="breadcumb" class="navbar navbar-expand-lg navbar-light">
                            </nav>
                            <div class="row form-inline">
                                <table class="table table-stripped table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Birthdate</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </body>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
