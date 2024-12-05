<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Daftar Posisi Loker</h5>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#mediumModal">
                                <span>
                                    <i class="bx bx-plus bx-sm me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Posisi Loker</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="kategori-soal" class="table display responsive table-striped text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Test</th>
                                    <th>Deskripsi</th>
                                    <th>Dibuka</th>
                                    <th>Ditutup</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $l)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ strtoupper($l->job_title) }}</td>
                                        <td>{{ Str::limit(ucwords($l->description), 30, '...') }}</td>
                                        <td>{{ $l->open_date }}</td>
                                        <td>{{ $l->close_date }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-icon btn-sm btn-edit"
                                                data-id="{{ $l->id }}"><i class='bx bx-edit-alt'></i></button>
                                            <form action="{{ route('fpanel.setting.loker_posisi.destroy', $l->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-sm"><i
                                                        class='bx bx-trash text-danger'></i></button>
                                            </form>
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


    <div class="modal fade" id="mediumModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="/fpanel/setting/loker_posisi" method="POST" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Tambah Posisi Loker</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="job_title" class="form-label">Nama Posisi Loker</label>
                                <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}"
                                    class="form-control @error('job_title') is-invalid @enderror"
                                    placeholder="Masukan Nama Posisi Loker">
                                @error('job_title')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-3">
                                <label for="open_date" class="form-label">Open Date</label>
                                <input type="date" id="open_date" name="open_date" value="{{ old('open_date') }}"
                                    class="form-control @error('open_date') is-invalid @enderror"
                                    placeholder="Masukan Nama Posisi Loker">
                                @error('open_date')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <label for="close_date" class="form-label">Close Date</label>
                                <input type="date" id="close_date" name="close_date" value="{{ old('close_date') }}"
                                    class="form-control @error('close_date') is-invalid @enderror"
                                    placeholder="Masukan Nama Posisi Loker">
                                @error('close_date')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        @php
                            $val_desc = old('deskripsi');
                        @endphp
                        <div class="row">
                            <div class="col mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea type="text" rows="5" id="deskripsi" name="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukan Nama Posisi Loker">{{ $val_desc }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnFnz" type="submit" class="btn btn-primary btnFnz">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- EDIT --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="/fpanel/setting/update_lokpos" method="POST" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Edit Posisi Loker</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <input type="hidden" id="jobId_edit" name="jobid_edit">
                                <label for="job_title_edit" class="form-label">Nama Posisi Loker</label>
                                <input type="text" id="job_title_edit" name="job_title_edit"
                                    value="{{ old('job_title_edit') }}"
                                    class="form-control @error('job_title_edit') is-invalid @enderror"
                                    placeholder="Masukan Nama Posisi Loker">
                                @error('job_title_edit')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-3">
                                <label for="open_date_edit" class="form-label">Open Date</label>
                                <input type="date" id="open_date_edit" name="open_date_edit"
                                    value="{{ old('open_date_edit') }}"
                                    class="form-control @error('open_date_edit') is-invalid @enderror"
                                    placeholder="Masukan Nama Posisi Loker">
                                @error('open_date_edit')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <label for="close_date_edit" class="form-label">Close Date</label>
                                <input type="date" id="close_date_edit" name="close_date_edit"
                                    value="{{ old('close_date_edit') }}"
                                    class="form-control @error('close_date_edit') is-invalid @enderror"
                                    placeholder="Masukan Nama Posisi Loker">
                                @error('close_date_edit')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        @php
                            $val_desc = old('deskripsi_edit');
                        @endphp
                        <div class="row">
                            <div class="col mb-3">
                                <label for="deskripsi_edit" class="form-label">Deskripsi</label>
                                <textarea type="text" rows="5" id="deskripsi_edit" name="deskripsi_edit"
                                    class="form-control @error('deskripsi_edit') is-invalid @enderror" placeholder="Masukan Nama Posisi Loker">{{ $val_desc }}</textarea>
                                @error('deskripsi_edit')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnFnz_edit" type="submit" class="btn btn-primary btnFnz">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- EDIT --}}


    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toastMessage" class="toast bg-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('assets/img/favicon.png') }}" class="rounded me-2" alt="Fluffy"
                    width="20">
                <strong class="me-auto text-dark">Fluffy Baby</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $('#kategori-soal').DataTable({
                responsive: true,
                layout: {
                    topStart: {
                        buttons: ['copy', 'excel', 'pdf']
                    }
                }
            });
        </script>

        @if ($errors->any())
            <script>
                $(document).ready(function() {
                    $('#mediumModal').modal('show');
                });
            </script>
        @endif

        @push('script')
            <script>
                $(document).ready(function() {

                    $(document).on('click', '.btn-edit', function() {
                        var itemId = $(this).data('id');
                        $.ajax({
                            url: `/fpanel/setting/loker_posisi/${itemId}`,
                            type: "GET",
                            cache: false,
                            success: function(response) {
                                const id = response.data.id ?? '';
                                const jobTittle = response.data.job_title ?? '';
                                const open_date = response.data.open_date ?? '';
                                const close_date = response.data.close_date ?? '';
                                const deskripsi = response.data.description ?? '';

                                $('#jobId_edit').val(id)
                                $('#job_title_edit').val(jobTittle);
                                $('#open_date_edit').val(open_date);
                                $('#close_date_edit').val(close_date);
                                $('#deskripsi_edit').val(deskripsi);

                                $('#editModal').modal('show');
                            },
                            error: function() {
                                toastr.error("Server Error!");
                            }
                        });
                    });

                    @if (session('success'))
                        // var toastEl = document.getElementById('toastMessage');
                        // var toast = new bootstrap.Toast(toastEl);
                        // toast.show();
                        // Swal.fire('Success!', '{{ session('success') }}',
                        //     'success');

                        toastr.success("{{ session('success') }}");
                    @endif

                    @if (session('error'))
                        // var toastEl = document.getElementById('toastMessage');
                        // toastEl.querySelector('.toast-body').innerHTML = "";
                        // var toast = new bootstrap.Toast(toastEl);
                        // toast.show();
                        // Swal.fire('Error!', '{{ session('error') }}',
                        //     'error');
                        toastr.error("{{ session('error') }}");
                    @endif

                });
                // toastr.success("Hello");
            </script>
        @endpush
    @endpush
</x-app-layout>
