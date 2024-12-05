<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0"></h5>
                            <a href="javascript:void(0);" onclick="printContent()" class="no-print"><i
                                    class='bx bx-printer bx-md'></i></a>
                        </div>
                    </div>
                    <div class="card-body" id="content-to-print">

                        <h5 class="card-title mb-5">Data Hasil D.I.S.C</h5>
                        <div class="mb-5">
                            <div class="list-group list-group-flush">
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                    Nama : {{ ucwords($biodata->name) }}
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                    Posisi yang dilamar : {{ $biodata->lokerPosition->job_title ?? '' }}
                                </a>
                            </div>
                        </div>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $q)
                            <table class="table table-bordered text-nowrap">
                                <!-- Table Header -->
                                <thead class="small">
                                    <tr>
                                        <th class="text-center bg-primary text-white" width="2%">No</th>
                                        <th class="text-center bg-primary text-white" width="2%">P</th>
                                        <th class="text-center bg-primary text-white" width="2%">K</th>
                                        <th class="bg-primary text-white">{{ $q->question->question_text }}</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($q->question->statements as $index => $statement)
                                        <tr>
                                            @if ($index === 0)
                                                <td rowspan="{{ count($q->question->statements) }}" class="text-center">
                                                    {{ $no++ }}
                                                </td>
                                            @endif
                                            <td class="text-center">
                                                <input name="answers[{{ $q->question->id }}][p]" type="radio"
                                                    value="{{ $statement->id }}" class="form-check-input"
                                                    {{ $q->most_selected == $statement->id ? 'checked' : '' }} disabled>
                                            </td>
                                            <td class="text-center">
                                                <input name="answers[{{ $q->question->id }}][k]" type="radio"
                                                    value="{{ $statement->id }}" class="form-check-input"
                                                    {{ $q->least_selected == $statement->id ? 'checked' : '' }}
                                                    disabled>
                                            </td>
                                            <td class="">
                                                {{ $statement->statement }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>

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
