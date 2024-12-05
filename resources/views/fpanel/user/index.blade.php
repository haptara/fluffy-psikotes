<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Users</h5>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#add_new_user">
                                <span>
                                    <i class="bx bx-plus bx-sm me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Users</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="data-peserta" class="table display responsive table-striped text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Password</th>
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
                                        <td>{{ ucwords($u->name) }}</td>
                                        <td>
                                            <a href="mailto:{{ strtolower($u->email) }}">
                                                {{ strtolower($u->email) }}
                                            </a>
                                        </td>
                                        <td>{{ ucwords($u->name) }}</td>
                                        {{-- <td>{{ Str::limit($u->password, 5, '***') }}
                                            <button type="button" data-id="{{ $u->id }}"
                                                class="btn btn-icon btn-show-pw text-primary"><i
                                                    class='bx bx-low-vision'></i></button>
                                        </td> --}}
                                        <td>
                                            <span class="password-text"
                                                id="password-{{ $u->id }}">{{ Str::limit($u->password, 5, '***') }}</span>
                                            <span class="password-full d-none" id="password-full-{{ $u->id }}">
                                                @if ($u->user_pw_hash && $u->user_pw_hash->pw_hash)
                                                    {{ base64_decode($u->user_pw_hash->pw_hash) }}
                                                @else
                                                @endif
                                            </span>
                                            <button type="button" data-id="{{ $u->id }}"
                                                class="btn btn-icon btn-show-pw text-primary toggle-password">
                                                <i class='bx bx-low-vision'></i>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-block">
                                                <button type="button"
                                                    class="btn btn-icon text-danger delete-record btn-delete"
                                                    data-id="{{ $u->id }}"><i class='bx bx-trash'></i></button>
                                            </div>
                                            <button type="button" data-id="{{ $u->id }}"
                                                class="btn btn-icon item-edit btn-edit"><i
                                                    class="bx bx-edit bx-sm"></i></button>
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

    <div class="modal fade" id="add_new_user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/fpanel/user" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_add" class="form-label">Nama</label>
                                <input type="text" id="nama_add" name="nama_add"
                                    class="form-control @error('nama_add') is-invalid @enderror"
                                    placeholder="Enter Name" value="{{ old('nama_add') }}">
                                @error('nama_add')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}"
                                    placeholder="xxxx@xxx.xx">
                                @error('email')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label" for="password_add">Password</label>
                                <input type="password" class="form-control @error('password_add') is-invalid @enderror"
                                    id="password_add" name="password_add" placeholder="****************">
                                @error('password_add')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnFnz"><i class='bx bx-save'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT --}}
    <div class="modal fade" id="edit_user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/fpanel/user/update" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_edit" class="form-label">Nama</label>
                                <input type="hidden" id="user_id" name="user_id" class="form-control">
                                <input type="text" id="nama_edit" name="nama_edit" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label" for="email_edit">Email</label>
                                <input type="email_edit" class="form-control" name="email_edit" id="email_edit"
                                    placeholder="xxxx@xxx.xxx">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label" for="password_edit">Password</label>
                                <input type="password" class="form-control" id="password_edit" name="password_edit"
                                    placeholder="****************">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnFnz"><i class='bx bx-save'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END EDIT --}}


    @push('script')

        @if ($errors->any())
            <script>
                $(document).ready(function() {
                    $('#add_new_user').modal('show');
                });
            </script>
        @endif

        <script>
            $(document).ready(function() {

                $('.toggle-password').on('click', function() {
                    var userId = $(this).data('id');
                    var passwordText = $('#password-' + userId);
                    var passwordFull = $('#password-full-' + userId);

                    passwordText.toggleClass('d-none');
                    passwordFull.toggleClass('d-none');

                    if (passwordText.hasClass('d-none')) {
                        $(this).html('<i class="bx bx-show"></i>'); // Show password icon
                    } else {
                        $(this).html('<i class="bx bx-low-vision"></i>'); // Hide password icon
                    }
                });


                $('#data-peserta').DataTable({
                    responsive: true,
                    layout: {
                        topStart: {
                            buttons: ['copy', 'excel', 'pdf']
                        }
                    }
                });

                $(document).on('click', '.btn-edit', function() {
                    var itemId = $(this).data('id');

                    $.ajax({
                        url: `/fpanel/user/${itemId}`,
                        type: "GET",
                        cache: false,
                        success: function(response) {
                            console.log(response.data);
                            const id = response.data.id ?? '';
                            const nama = response.data.name ?? '';
                            // const jobId = response.data.loker_position.id ?? '';
                            const email = response.data.email ?? '';
                            // const pw = response.data.user?.user_pw_hash?.pw_hash ?? '';
                            // const decodedPw = atob(pw);

                            $('#user_id').val(id)
                            $('#nama_edit').val(nama);
                            $('#email_edit').val(email);
                            // $('#password_edit').val(decodedPw);
                            // $('#position_id_edit').val(jobId).trigger('change');

                            $('#edit_user').modal('show');
                        },
                        error: function() {
                            toastr.error("Server Error!");
                        }
                    });
                });

                $(document).on('click', '.btn-delete', function() {
                    var itemId = $(this).data('id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Data dan Akun ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/fpanel/user/destroy/' + itemId,
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
