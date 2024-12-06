<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Daftar Group Soal</h5>

                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addGroupSoal">
                                <span>
                                    <i class="bx bx-plus bx-sm me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Group Soal</span>
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
                                    <th>Nama Group</th>
                                    <th>TEST</th>
                                    <th>Urutan</th>
                                    <th>Jumlah Soal</th>
                                    <th>Durasi</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($groupSoal as $g)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ strtoupper($g->group_name) }}</td>
                                        <td>{{ strtoupper($g->test->test_name) }}</td>
                                        <td>{{ $g->order }}</td>
                                        <th><button type="button"
                                                class="btn btn-icon btn-sm text-info btn-show-soal">{{ $g->questions->count() }}</button>
                                            Soal</th>
                                        <td>{{ $g->duration }} Menit</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-icon btn-sm btn-edit"
                                                data-id="{{ $g->id }}"><i class='bx bx-edit-alt'></i></button>
                                            <form action="{{ route('fpanel.setting.group_soal.destroy', $g->id) }}"
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


    <div class="modal fade" id="addGroupSoal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/fpanel/setting/group_soal" method="POST" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Tambah Group Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="group_name" class="form-label">Nama Group Soal</label>
                            <input type="text" id="group_name" name="group_name" value="{{ old('group_name') }}"
                                class="form-control @error('group_name') is-invalid @enderror"
                                placeholder="Masukan Nama Test">
                            @error('group_name')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label for="test_id" class="form-label">Test</label>
                            <select id="test_id" name="test_id"
                                class="form-control @error('test_id') is-invalid @enderror">
                                <option value="">-PILIH-</option>
                            </select>
                            @error('test_id')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-group mb-3">
                            <label for="durasi" class="form-label">Durasi ( <small class="text-muted"> Dalam
                                    Menit</small>)</label>
                            <input type="number" min="0" id="durasi" name="durasi"
                                value="{{ old('durasi') }}" class="form-control @error('durasi') is-invalid @enderror"
                                placeholder="Dalam menit">
                            @error('durasi')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button id="btnFnz" type="submit" class="btn btn-primary btnFnz"><i
                                class='bx bx-save'></i></button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- EDIT --}}
    <div class="modal fade" id="editGroupSoal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/fpanel/setting/update_group_soal" method="POST" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Edit Group Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="group_id" name="group_id" class="form-control">
                        <div class="form-group mb-3">
                            <label for="group_name_edit" class="form-label">Nama Group Soal</label>
                            <input type="text" id="group_name_edit" name="group_name_edit" class="form-control "
                                placeholder="Masukan Nama Group Soal">
                            @error('group_name_edit')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="urutan_edit" class="form-label">Urutan</label>
                            <select id="urutan_edit" name="urutan_edit"
                                class="form-control @error('urutan_edit') is-invalid @enderror">
                                <option value="">-PILIH-</option>
                            </select>
                            @error('urutan_edit')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="durasi_edit" class="form-label">Durasi ( <small class="text-muted"> Dalam
                                    Menit</small>)</label>
                            <input type="number" min="0" id="durasi_edit" name="durasi_edit"
                                value="{{ old('durasi_edit') }}"
                                class="form-control @error('durasi_edit') is-invalid @enderror"
                                placeholder="Dalam menit">
                            @error('durasi_edit')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnFnz" type="submit" class="btn btn-primary btnFnz">
                            <i class='bx bx-save'></i></button>
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
                    $('#addGroupSoal').modal('show');
                });
            </script>
        @endif

        @push('script')
            <script>
                $(document).ready(function() {

                    $(document).on('click', '.btn-edit', function() {
                        var itemId = $(this).data('id');
                        // toastr.warning("Maintenance");
                        $.ajax({
                            url: `/fpanel/setting/group_soal/${itemId}`,
                            type: "GET",
                            cache: false,
                            success: function(response) {
                                var id = response.data.id ?? '';
                                var groupName = response.data.group_name ?? '';
                                var duration = response.data.duration ?? '';
                                var selectUrutan = response.data.order ?? '';
                                var urutanData = response.urutan;
                                var urutanSelect = $('#urutan_edit');

                                $('#group_id').val(id);
                                $('#group_name_edit').val(groupName);
                                $('#durasi_edit').val(duration);

                                urutanSelect.empty();

                                urutanSelect.append('<option value="">-PILIH-</option>');

                                urutanData.forEach(function(item) {
                                    var orderValue = item.order;
                                    var optionText = orderValue;
                                    if (orderValue == selectUrutan) {
                                        urutanSelect.append(
                                            `<option value="${orderValue}" selected>${optionText}</option>`
                                        );
                                    } else {
                                        urutanSelect.append(
                                            `<option value="${orderValue}">${optionText}</option>`
                                        );
                                    }
                                });

                                $('#editGroupSoal').modal('show');
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
