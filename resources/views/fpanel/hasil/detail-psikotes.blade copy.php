<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Hasil Psikotes</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-peserta" class="table display table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Soal</th>
                                        <th>Jenis</th>
                                        <th>Jawaban</th>
                                        <th>Status</th>
                                        <th>Score</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $d)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $d->question->question_text }}</td>
                                            <td>
                                                {{ $d->question->question_type == 'multiple_choice' ? 'PILIHAN GANDA' : 'ESSAY' }}
                                            </td>
                                            <td>
                                                @if ($d->question->question_type == 'multiple_choice')
                                                    {{ $d->choice->choice_text }}
                                                @else
                                                    {{ $d->answer_text }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($d->question->question_type == 'multiple_choice')
                                                    {{ $d->choice->is_correct == 1 ? 'Benar' : 'Salah' }}
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                @if ($d->question->question_type == 'multiple_choice')
                                                    {{ $d->choice->is_correct == 1 ? 20 : 0 }}
                                                @else
                                                @endif
                                            </td>
                                            <td class="text-center">

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


    {{-- 
        "success", "danger", "warning", "info", "dark", "primary", "secondary" 
        <td>
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar me-2"><span
                        class="avatar-initial rounded-circle bg-label-dark">AB</span>
                </div>
            </div>
            <div class="d-flex flex-column"><span class="emp_name text-truncate">Alaric
                    Beslier</span><small class="emp_post text-truncate text-muted">Tax
                    Accountant</small></div>
        </div>
        </td>
        --}}

    @push('script')
        <script>
            $('#data-peserta').DataTable({
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
