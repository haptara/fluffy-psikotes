<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Peserta</h5>
                            <a class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" href="#add-new-record"
                                role="button" aria-controls="offcanvasExample">
                                <span>
                                    <i class="bx bx-plus bx-sm me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Peserta</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="data-peserta" class="table display responsive table-striped text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Loker Posisi</th>
                                    <th>Tanggal Tes</th>
                                    <th class="text-center">Link</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data_peserta as $p)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ ucwords($p->name) }}</td>
                                        <td>{{ ucwords($p->gender) }}</td>
                                        <td>{{ ucwords($p->lokerPosition->job_title) }}</td>
                                        <td>{{ $p->test_date }}</td>
                                        <td class="text-center">
                                            @if ($p->user && $p->user->generatedLink && $p->user->generatedLink->link_key)
                                                <input type="hidden" id="value-copy" class="value-copy"
                                                    value="{{ url('/t') . '/' . $p->user->generatedLink->link_key }}">
                                                <a href="javascript:void(0)" id="btn-copy"
                                                    class="btn btn-icon item-edit btn-copy">
                                                    <i class='bx bxs-copy'></i>
                                                </a>
                                                <button type="button" class="btn btn-icon item-edit btn-send-link"
                                                    id="btn-send-link" data-id="{{ $p->user_id }}">
                                                    <i class='bx bxl-whatsapp bx-sm'></i>
                                                </button>
                                            @else
                                                <a href="{{ route('fpanel.peserta.createlink', ['uid' => Crypt::encryptString($p->user_id)]) }}"
                                                    class="btn btn-icon item-edit"><i
                                                        class='bx bx-edit-alt bx-sm'></i></a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-block">
                                                <a href="javascript:;"
                                                    class="btn btn-icon dropdown-toggle hide-arrow me-1"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded bx-sm"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <button type="button" data-id="{{ $p->id }}"
                                                        class="dropdown-item btn-details d-flex align-items-center"><i
                                                            class='bx bx-edit-alt'></i> Details</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button type="button"
                                                        class="dropdown-item text-danger delete-record btn-delete d-flex align-items-center"
                                                        data-id="{{ $p->id }}"><i class='bx bx-trash'></i>
                                                        Delete</button>
                                                </div>
                                            </div>
                                            <button type="button" data-id="{{ $p->id }}"
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


    {{-- DETAIL --}}
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendLinkTitle">Detail Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="divider text-start">
                                <h5 class="divider-text">Biodata</h5>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class="bx bx-user me-2"></i>
                                    <div>
                                        <h6 class="mb-1">Nama</h6>
                                        <p id="namaText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bx-male-sign me-2'></i>
                                    <div>
                                        <h6 class="mb-1">Jenis Kelamin</h6>
                                        <p id="jkText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bxs-calendar me-2'></i>
                                    <div>
                                        <h6 class="mb-1">Tanggal Lahir</h6>
                                        <p id="dobText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bxl-whatsapp me-2'></i>
                                    <div>
                                        <h6 class="mb-1">No. Whatsapp</h6>
                                        <p id="waText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bxs-map me-2'></i>
                                    <div>
                                        <h6 class="mb-1">Alamat</h6>
                                        <p id="addressText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="divider text-start">
                                <h5 class="divider-text">TEST</h5>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bx-calendar-check me-2'></i>
                                    <div>
                                        <h6 class="mb-1">Tanggal Tes</h6>
                                        <p id="datetesText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bx-briefcase-alt-2 me-2'></i>
                                    <div>
                                        <h6 class="mb-1">Posisi Loker</h6>
                                        <p id="lokerText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="divider text-start">
                                <h5 class="divider-text">Akun</h5>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bx-envelope me-2'></i>
                                    <div>
                                        <h6 class="mb-1">Email</h6>
                                        <p id="emailText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="d-flex align-items-start">
                                    <i class='bx bx-lock-alt me-2'></i>
                                    <div>
                                        <h6 class="mb-1">Password</h6>
                                        <p id="pwText" class="text-primary fw-medium"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    {{-- END DETAIL --}}

    <div class="modal fade" id="sendLink" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendLinkTitle">Send Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/fpanel/peserta/send-url" method="POST" target="_blank">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col mb-2">
                                <label for="nama_send" class="form-label">Nama</label>
                                <input type="text" id="nama_send" name="nama_send" class="form-control"
                                    placeholder="Enter Name" readonly>
                            </div>
                        </div>
                        <div class="row g-6">
                            <div class="col mb-2">
                                <label for="no_whatsapp" class="form-label">No.Whatsapp</label>
                                <input type="text" id="no_whatsapp" name="no_whatsapp" class="form-control"
                                    placeholder="Enter Whatsapp">
                            </div>
                        </div>
                        <div class="row g-6">
                            <div class="col mb-2">
                                <label for="pesan" class="form-label">Pesan</label>
                                {{-- <textarea type="text" id="name" class="form-control" placeholder="Enter Name" readonly> --}}
                                <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnFnz">
                            <i class='bx bx-paper-plane'></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-2" id="form-add-new-record"
                action="{{ route('fpanel.peserta.add') }}" method="POST" autocomplete="off">
                @csrf
                <div class="col-sm-12">
                    <label class="form-label" for="nama-lengkap">Nama Lengkap</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="nama-lengkap" name="name"
                            class="form-control dt-full-name @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="John Doe" />
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="email" name="email"
                            class="form-control dt-email @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="john.doe@example.com" />
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control dt-date @error('password') is-invalid @enderror"
                            id="password" value="{{ Str::random(8) }}" name="password" />
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                @php
                    $val_positions = old('position_id');
                @endphp
                <div class="col-sm-12">
                    <label class="form-label" for="position_id">Posisi yang dilamar</label>
                    <div class="input-group input-group-merge">
                        <select class="form-control dt-date @error('position_id') is-invalid @enderror"
                            id="position_id" name="position_id">
                            <option value="">-Pilih-</option>
                            @foreach ($positions as $p)
                                <option value="{{ $p->id }}" {{ $val_positions == $p->id ? 'selected' : '' }}>
                                    {{ $p->job_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('position_id')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12 mt-3">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary"
                        data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>

        </div>
    </div>

    {{-- EDIT --}}
    <div class="offcanvas offcanvas-end" id="edit-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-2" id="edit-record" action="{{ route('fpanel.peserta.update') }}"
                method="POST" autocomplete="off">
                @csrf
                <div class="col-sm-12">
                    <input type="hidden" name="peserta_id" id="peserta_id">
                    <label class="form-label" for="name_edit">Nama Lengkap</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="name_edit" name="name_edit"
                            class="form-control dt-full-name @error('name_edit') is-invalid @enderror" id="name_edit"
                            placeholder="John Doe" />
                    </div>
                    @error('name_edit')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="email_edit">Email</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="email_edit" name="email_edit"
                            class="form-control dt-email @error('email_edit') is-invalid @enderror"
                            placeholder="john.doe@example.com" />
                    </div>
                    @error('email_edit')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="password_edit">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="text"
                            class="form-control dt-date @error('password_edit') is-invalid @enderror"
                            id="password_edit" name="password_edit" />
                    </div>
                    @error('password_edit')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="position_id_edit">Posisi yang dilamar</label>
                    <div class="input-group input-group-merge">
                        <select class="form-control dt-date @error('position_id_edit') is-invalid @enderror"
                            id="position_id_edit" name="position_id_edit">
                            <option value="">-Pilih-</option>
                            @foreach ($positions as $p)
                                <option value="{{ $p->id }}">
                                    {{ $p->job_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('position_id_edit')
                        <div class="invalid-feedback d-flex align-item-center">
                            <i class='bx bx-x'></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12 mt-3">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary"
                        data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>

        </div>
    </div>
    {{-- EDIT --}}

    @push('script')


        @if ($errors->any())
            <script>
                const offcanvas = new bootstrap.Offcanvas(document.getElementById('add-new-record'));
                offcanvas.show();
            </script>
        @endif

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

                $(document).on('click', '.btn-send-link', function() {
                    let id_user = $(this).data('id');
                    $('#sendLink').modal('show');
                    $.ajax({
                        url: `/fpanel/peserta/gid/${id_user}`,
                        type: "GET",
                        cache: false,
                        success: function(response) {
                            const nama = response.data.nama ?? ''
                            const no_whatsapp = response.data.no_whatsapp ?? ''
                            const pesan = response.data.pesan ?? ''

                            $('#nama_send').val(nama);
                            $('#no_whatsapp').val(no_whatsapp);
                            $('#pesan').val(pesan);

                            $('#sendLink').modal('show');
                        }
                    });
                });

                $(document).on('click', '.btn-copy', function() {
                    var copyText = $(this).closest('tr').find('.value-copy')
                        .val();
                    var $temp = $('<textarea>');
                    $('body').append($temp);
                    $temp.val(copyText).select();
                    document.execCommand('copy');
                    $temp.remove();
                    toastr.success('Tautan telah disalin ke clipboard!');
                });

                $(document).on('click', '.btn-details', function() {
                    var itemId = $(this).data('id');
                    // alert(itemId);

                    $.ajax({
                        url: `/fpanel/peserta/${itemId}`,
                        type: "GET",
                        cache: false,
                        success: function(response) {
                            const nama = response.data.name ?? 'n/a';
                            const jk = response.data.gender ?? 'n/a';
                            const dob = response.data.birth_date ?? 'n/a';
                            const wa = response.data.no_whatsapp ?? 'n/a';
                            const address = response.data.address ?? 'n/a';
                            const tgTest = response.data.test_date ?? 'n/a';
                            const job = response.data.loker_position.job_title ?? 'n/a';
                            const email = response.data.user.email ?? 'n/a';
                            const pw = response.data.user?.user_pw_hash?.pw_hash ?? 'n/a';

                            const decodedPw = atob(pw);

                            $('#namaText').text(nama.toUpperCase());
                            $('#jkText').text(jk.toUpperCase());
                            $('#dobText').text(dob);
                            $('#waText').text(wa);
                            $('#addressText').text(address);
                            $('#datetesText').text(tgTest);
                            $('#lokerText').text(job.toUpperCase());
                            $('#emailText').text(email.toLowerCase());
                            $('#pwText').text(decodedPw);

                            $('#detailModal').modal('show');
                        },
                        error: function() {
                            toastr.error("Server Error!");
                        }
                    });
                })

                $(document).on('click', '.btn-edit', function() {
                    const offcanvas = new bootstrap.Offcanvas(document.getElementById('edit-record'));
                    var itemId = $(this).data('id');

                    $.ajax({
                        url: `/fpanel/peserta/${itemId}`,
                        type: "GET",
                        cache: false,
                        success: function(response) {
                            const id = response.data.user.id ?? '';
                            const nama = response.data.name ?? '';
                            const jobId = response.data.loker_position.id ?? '';
                            const email = response.data.user.email ?? '';
                            const pw = response.data.user?.user_pw_hash?.pw_hash ?? '';
                            const decodedPw = atob(pw);

                            $('#peserta_id').val(id)
                            $('#name_edit').val(nama);
                            $('#email_edit').val(email);
                            $('#password_edit').val(decodedPw);
                            $('#position_id_edit').val(jobId).trigger('change');


                            offcanvas.show();
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
                                url: '/fpanel/peserta/destroy/' + itemId,
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
