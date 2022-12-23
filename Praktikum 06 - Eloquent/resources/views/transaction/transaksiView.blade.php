<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
                    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
                    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#datatable').DataTable({
                                ajax: "{{ url('getAllDetailTransactions') }}" + '/' + '{{ $transactions->id }}',
                                serverSide: false,
                                processing: true,
                                deferRender: true,
                                type: "GET",
                                destroy: true,
                                columns: [
                                    {data: 'id', name: 'id'},
                                    {data: 'namaKoleksi', name: 'namaKoleksi'},
                                    {data: 'tanggalPinjam', name: 'tanggalPinjam'},
                                    {data: 'tanggalKembali', name: 'tanggalKembali'},
                                    {data: 'status', name: 'status'},
                                    {data: 'action', name: 'action', orderable: false, searchable: false},
                                ]
                            })
                        })
                    </script>
                    <div class="mt-4">
                        <x-input-label for="peminjam" :value="__('Peminjam')" />
            
                        <x-text-input id="peminjam" class="block mt-1 w-full" type="text" name="peminjam" :value="($transactions->fullnamePeminjam)" readonly/>
                    </div>
                    <div class="mt-4 mb-4">
                        <x-input-label for="petugas" :value="__('Petugas')" />
            
                        <x-text-input id="petugas" class="block mt-1 w-full" type="text" name="petugas" :value="($transactions->fullnamePetugas)" readonly/>
                    </div>
                    <div class="container-fluid">
                        <div class="row form-inline">
                            <table class="table table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Koleksi</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
