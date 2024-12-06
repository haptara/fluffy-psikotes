<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Pelanggaran</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="data-peserta" class="table display responsive table-striped text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>Pesan</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($user as $u)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ ucwords($u->user->name) }}</td>
                                        <td>
                                            {{ ucwords($u->waktu_pelanggaran) }}
                                        </td>
                                        <td>
                                            {{ ucwords($u->deskripsi) }}
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-block">
                                                <button type="button"
                                                    class="btn btn-icon text-danger delete-record btn-delete"
                                                    data-id="{{ $u->id }}"><i class='bx bx-trash'></i></button>
                                            </div>
                                            {{-- <button type="button" data-id="{{ $u->id }}"
                                                class="btn btn-icon item-edit btn-edit"><i
                                                    class="bx bx-edit bx-sm"></i></button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>




    @push('script')
        <script>
            $(document).ready(function() {

                $('#data-peserta').DataTable({
                    responsive: true,
                    layout: {
                        topStart: {
                            buttons: ['copy', 'excel', 'pdf']
                        }
                    }
                });

                $(document).on('click', '.btn-delete', function() {
                    var itemId = $(this).data('id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Akun ini akan dihapus!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/fpanel/pelanggaran/destroy/' + itemId,
                                type: 'POST',
                                data: {
                                    _method: 'DELETE',
                                    _token: window.csrfToken,
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire('Deleted!',
                                            'The item has been deleted.',
                                            'success');
                                        $('button[data-id="' + itemId + '"]').closest(
                                                'tr')
                                            .remove();
                                    } else {
                                        Swal.fire('Error!', 'Something went wrong.',
                                            'error');
                                    }
                                },
                                error: function() {
                                    Swal.fire('Error!', 'Failed to delete item.',
                                        'error');
                                }
                            });
                        }
                    });
                })

                @if (session('success'))
                    // toastr.success("{{ session('success') }}");
                    Swal.fire('Success!', '{{ session('success') }}',
                        'success');
                @endif

                @if (session('error'))
                    var toastEl = document.getElementById('toastMessage');
                    toastEl.querySelector('.toast-body').innerHTML = "{{ session('error') }}";
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                @endif

            });
        </script>
    @endpush
</x-app-layout>
