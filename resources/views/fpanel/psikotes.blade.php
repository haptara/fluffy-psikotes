a<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Soal Psikotes</h5>

                            <a href="{{ route('fpanel.soal.psikotes.add') }}" class="btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus bx-sm me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Soal</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-soal-psikotes" class="table display responsive table-striped text-nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-start">No</th>
                                        <th>Soal</th>
                                        <th>Jenis</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Jawaban</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td class="text-start">{{ $no++ }}</td>
                                            <td>{{ $question->question_text }}</td>
                                            <td>{{ $question->question_type }}</td>
                                            <td><a href="{{ asset('storage/images/soal/') }}/{{ $question->image }}"
                                                    target="_blank">{{ $question->image }}</a>
                                            </td>
                                            <td>
                                                {{ $question->test->test_name }}
                                            </td>
                                            <td class="">
                                                {{ $question->choices->first()?->choice_text ?? 'Tidak ada pilihan' }}
                                            </td>
                                            <td class="text-center">
                                                {{-- <a href="{{ route('admin.questions.edit', $question) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.questions.destroy', $question) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form> --}}
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        {{-- <a class="dropdown-item" href="javascript:void(0);">
                                                        <i class="bx bx-edit-alt me-1"></i> View Details
                                                    </a> --}}
                                                        <a class="dropdown-item"
                                                            href="{{ route('fpanel.soal.psikotes.edit', $question->id) }}">
                                                            <i class="bx bx-edit me-1"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0);">
                                                            <i class="bx bx-trash me-1"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
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
    </div>


    @push('script')
        <script>
            $('#data-soal-psikotes').DataTable({
                responsive: true,
                layout: {
                    topStart: {
                        buttons: ['copy', 'excel', 'pdf']
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
