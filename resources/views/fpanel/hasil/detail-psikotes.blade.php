<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">&nbsp;</h5>
                            <a href="javascript:void(0);" onclick="printContent()" class="no-print"><i
                                    class='bx bx-printer bx-md'></i></a>
                        </div>
                    </div>
                    <div class="card-body" id="content-to-print">
                        {{-- {{ $biodata }} --}}

                        <h5 class="card-title mb-5">Jawaban Psikotes</h5>
                        <div class="mb-5">
                            <div class="list-group list-group-flush">
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                    Nama : {{ $biodata->name }}
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                    Posisi yang dilamar : {{ $biodata->lokerPosition->job_title ?? '' }}
                                </a>
                            </div>
                        </div>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $d)
                            <div class="mb-4">
                                <p><strong>{{ $no++ }}. {{ $d->question->question_text }}</strong></p>
                                @if ($d->question->question_type == 'essay')
                                    @if ($d->question->image)
                                        <img src="{{ asset('storage/images/soal/' . $d->question->image) }}"
                                            class="img-thumbnail mb-3" width="200px">
                                    @endif
                                    <input name="answers[{{ $d->question->id }}]" class="form-control"
                                        placeholder="Jawaban" value="{{ $d->answer_text }}" readonly>
                                @elseif ($d->question->question_type == 'multiple_choice')
                                    @foreach ($d->question->choices as $c)
                                        <div class="form-check">
                                            <input type="radio" name="answers[{{ $d->question->id }}]"
                                                value="{{ $d->choice->id }}" class="form-check-input"
                                                id="choice-{{ $d->choice->id }}"
                                                {{ $c->id == $d->choice->id ? 'checked' : '' }} disabled>
                                            <label
                                                class="form-check-label {{ $c->is_correct == 1 ? 'text-success' : '' }}"
                                                for="choice-{{ $d->choice->id }}">
                                                {{ $c->choice_text }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach

                        {{-- <button type="submit" class="btn btn-primary d-flex align-items-center">Selanjutnya
                            <i class='bx bxs-chevron-right'></i>
                        </button> --}}
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


            function printContent() {
                var content = document.getElementById('content-to-print').innerHTML;
                var originalContent = document.body.innerHTML;
                document.body.innerHTML = content;
                window.print();
                document.body.innerHTML = originalContent;
            }
        </script>
    @endpush
</x-app-layout>
