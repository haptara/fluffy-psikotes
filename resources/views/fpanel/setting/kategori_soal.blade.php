<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Daftar Kategori Soal</h5>

                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#smallModal">
                                <span>
                                    <i class="bx bx-plus bx-sm me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Kategori Soal</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="kategori-soal" class="table display responsive table-striped text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Slug</th>
                                    <th>Nama Test</th>
                                    {{-- <th>Kategori</th> --}}
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($test as $question)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ strtolower($question->slug) }}</td>
                                        <td>{{ strtoupper($question->test_name) }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-icon btn-sm btn-edit"
                                                data-id="{{ $question->id }}"><i class='bx bx-edit-alt'></i></button>
                                            <form
                                                action="{{ route('fpanel.setting.kategori_soal.destroy', $question->id) }}"
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


    <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="/fpanel/setting/kategori_soal" method="POST" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Katrgori Soal Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-6">
                                <label for="nama-test" class="form-label">Nama Test</label>
                                <input type="text" id="nama-test" name="test_name" value="{{ old('test_name') }}"
                                    class="form-control @error('test_name') is-invalid @enderror"
                                    placeholder="Masukan Nama Test">
                                @error('test_name')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnFnz" type="submit" class="btn btn-primary btnFnz"><i
                                class='bx bx-save'></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- EDIT --}}

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="/fpanel/setting/update_kategori_soal" method="POST" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Katrgori Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-6">
                                <input type="hidden" id="testId_edit" name="id_edit">
                                <label for="test_name_edit" class="form-label">Nama Test</label>
                                <input type="text" id="test_name_edit" name="test_name_edit" class="form-control"
                                    placeholder="Masukan Nama Test">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnFnz" type="submit" class="btn btn-primary btnFnz"><i
                                class='bx bx-save'></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- END EDIT --}}

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
                    $('#smallModal').modal('show');
                });
            </script>
        @endif

        @push('script')
            <script>
                $(document).ready(function() {

                    $(document).on('click', '.btn-edit', function() {
                        var itemId = $(this).data('id');
                        $.ajax({
                            url: `/fpanel/setting/kategori_soal/${itemId}`,
                            type: "GET",
                            cache: false,
                            success: function(response) {
                                const id = response.data.id ?? '';
                                const testName = response.data.test_name ?? '';

                                $('#testId_edit').val(id)
                                $('#test_name_edit').val(testName);

                                $('#editModal').modal('show');
                            },
                            error: function() {
                                toastr.error("Server Error!");
                            }
                        });
                    });

                    @if (session('success'))
                        toastr.success("{{ session('success') }}");
                    @endif

                    @if (session('error'))
                        toastr.error("{{ session('error') }}");
                    @endif

                });
                // toastr.success("Hello");
            </script>
        @endpush
    @endpush
</x-app-layout>
