<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Soal DISC</h5>

                            <a href="{{ route('fpanel.soal.disc.add') }}" class="btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus bx-sm me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Soal DISC</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-soal-disc" class="table display responsive table-striped text-nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Question</th>
                                        <th>Statements</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ ucwords($question->question_text) }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($question->statements as $statement)
                                                        <li>{{ ucwords($statement->statement) }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                {{-- {{ route('admin.questions.edit', $question->id) }} --}}
                                                {{-- {{ route('admin.questions.destroy', $question->id) }} --}}
                                                <a href="{{ route('fpanel.soal.disc.edit', $question->id) }}"
                                                    class="btn btn-icon btn-sm"><i class='bx bx-edit-alt'></i></a>
                                                <form action="{{ route('fpanel.hasil.disc.destroy', $question->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-icon btn-sm btn-delete"><i
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
    </div>


    @push('script')
        <script>
            $(document).ready(function() {

                $('#data-soal-disc').DataTable({
                    responsive: true,
                    layout: {
                        topStart: {
                            buttons: ['copy', 'excel', 'pdf']
                        }
                    }
                });

                $(document).on('click', '.btn-delete', function(e) {
                    // alert('hello world')
                    e.preventDefault();

                    const form = $(this).closest('form');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak bisa mengembalikan ini setelah dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#2eaff5',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        </script>
    @endpush
</x-app-layout>
