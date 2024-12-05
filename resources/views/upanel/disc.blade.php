<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <section class="section-py bg-body first-section-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    {{-- ----- {{ route('disc.submit') }} --}}
                    <form action="{{ route('disc.submit') }}" method="POST">
                        @csrf
                        <div class="card mb-3">
                            <!-- Header Card -->
                            <div class="card-header header-elements">
                                <h5 class="mb-0 me-2 fw-bold text-primary">D.I.S.C Test</h5>
                            </div>

                            <!-- Intruksi -->
                            <div class="card-body">
                                <!-- Intruksi Text -->
                                <div class="d-flex align-items-center border-primary py-3 px-4 border rounded mb-5">
                                    {{-- <div class="avatar flex-shrink-0 me-3">
                                        <img src="../../assets/img/icons/unicons/briefcase.png" alt="User" class="rounded">
                                    </div> --}}
                                    <div
                                        class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-3">
                                            <p class="mb-0 text-heading text-primary fw-bold">INTRUKSI : </p>
                                            <p class="mb-0 small">Setiap nomor di bawah ini memuat 4
                                                (empat) kalimat. Tugas anda adalah :</p>
                                            <p class="mb-0 small">1. Beri tanda (X) pada kolom di bawah huruf (P) di
                                                samping
                                                kalimat yang <b>PALING</b> menggambarkan diri anda</p>
                                            <p class="small">2. Beri tanda (X) pada kolom di bawah huruf (K) di samping
                                                kalimat yang <b>PALING TIDAK</b> menggambarkan diri anda</p>
                                            <p class="mb-0 text-heading text-primary fw-bold">PERHATIKAN :</p>
                                            <p class="mb-0 small">Setiap nomor hanya ada 1 <b>(Satu)</b> tanda
                                                <b>(X)</b> di
                                                bawah
                                                masing-masing kolom <b>P</b> dan <b>K</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @php
                                    $no = 1;
                                @endphp
                                <!-- Questions Section in Columns -->
                                <div class="row">
                                    <!-- First Column: Pertanyaan 1-10 -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        @foreach ($questions->slice(0, 10) as $question)
                                            <div class="mb-4">
                                                <table
                                                    class="table-bordered text-nowrap {{ $errors->has('answers.' . $question->id . '.p') || $errors->has('answers.' . $question->id . '.k') ? 'border-danger' : '' }}"
                                                    style="border-collapse: collapse;width:100%;height:5%;">
                                                    <!-- Table Header -->
                                                    <thead class="small bg-primary text-white">
                                                        <tr>
                                                            <th width="5%">NO</th>
                                                            <th width="5%">P</th>
                                                            <th width="5%">K</th>
                                                            <th>{{ strtoupper($question->question_text) }}</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- Table Body -->
                                                    <tbody>
                                                        @foreach ($question->statements as $index => $statement)
                                                            <tr>
                                                                @if ($index === 0)
                                                                    <td rowspan="{{ count($question->statements) }}"
                                                                        class="text-center">
                                                                        {{ $no++ }}
                                                                    </td>
                                                                @endif
                                                                <td class="text-center">
                                                                    <input name="answers[{{ $question->id }}][p]"
                                                                        type="radio" value="{{ $statement->id }}"
                                                                        class="form-check-input @error('answers.' . $question->id . '.p') border-danger @enderror"
                                                                        {{ old('answers.' . $question->id . '.p') == $statement->id ? 'checked' : '' }}
                                                                        required>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input name="answers[{{ $question->id }}][k]"
                                                                        type="radio" value="{{ $statement->id }}"
                                                                        class="form-check-input @error('answers.' . $question->id . '.k') border-danger @enderror"
                                                                        {{ old('answers.' . $question->id . '.k') == $statement->id ? 'checked' : '' }}
                                                                        required>
                                                                </td>
                                                                <td
                                                                    class="@error('answers.' . $question->id . '.p') text-danger @enderror @error('answers.' . $question->id . '.k') text-danger @enderror">
                                                                    {{ $statement->statement }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Second Column: Pertanyaan 11-20 -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        @foreach ($questions->slice(10, 10) as $question)
                                            <div class="mb-4">
                                                <table class="table-bordered text-nowrap"
                                                    style="border-collapse: collapse;width:100%;height:5%;">
                                                    <!-- Table Header -->
                                                    <thead class="small bg-primary text-white">
                                                        <tr>
                                                            <th width="5%">NO</th>
                                                            <th width="5%">P</th>
                                                            <th width="5%">K</th>
                                                            <th>{{ strtoupper($question->question_text) }}</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- Table Body -->
                                                    <tbody>
                                                        @foreach ($question->statements as $index => $statement)
                                                            <tr>
                                                                @if ($index === 0)
                                                                    <td rowspan="{{ count($question->statements) }}"
                                                                        class="text-center">
                                                                        {{ $no++ }}
                                                                    </td>
                                                                @endif
                                                                <td class="text-center">
                                                                    <input name="answers[{{ $question->id }}][p]"
                                                                        class="form-check-input" type="radio"
                                                                        value="{{ $statement->id }}"
                                                                        {{ old('answers.' . $question->id . '.p') == $statement->id ? 'checked' : '' }}
                                                                        required />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input name="answers[{{ $question->id }}][k]"
                                                                        class="form-check-input" type="radio"
                                                                        value="{{ $statement->id }}"
                                                                        {{ old('answers.' . $question->id . '.k') == $statement->id ? 'checked' : '' }}
                                                                        required />
                                                                </td>
                                                                <td>{{ $statement->statement }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Third Column: Pertanyaan 21-30 -->
                                    <div class="col-lg-4 col-md-12 mb-3">
                                        @foreach ($questions->slice(20) as $question)
                                            <div class="mb-4">
                                                <table class="table-bordered text-nowrap"
                                                    style="border-collapse: collapse;width:100%;height:5%;">
                                                    <!-- Table Header -->
                                                    <thead class="small bg-primary text-white">
                                                        <tr>
                                                            <th width="5%">NO</th>
                                                            <th width="5%">P</th>
                                                            <th width="5%">K</th>
                                                            <th>{{ strtoupper($question->question_text) }}</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- Table Body -->
                                                    <tbody>
                                                        @foreach ($question->statements as $index => $statement)
                                                            <tr>
                                                                @if ($index === 0)
                                                                    <td rowspan="{{ count($question->statements) }}"
                                                                        class="text-center">
                                                                        {{ $no++ }}
                                                                    </td>
                                                                @endif
                                                                <td class="text-center">
                                                                    <input name="answers[{{ $question->id }}][p]"
                                                                        class="form-check-input" type="radio"
                                                                        value="{{ $statement->id }}"
                                                                        {{ old('answers.' . $question->id . '.p') == $statement->id ? 'checked' : '' }}
                                                                        required />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input name="answers[{{ $question->id }}][k]"
                                                                        class="form-check-input" type="radio"
                                                                        value="{{ $statement->id }}"
                                                                        {{ old('answers.' . $question->id . '.k') == $statement->id ? 'checked' : '' }}
                                                                        required />
                                                                </td>
                                                                <td>{{ $statement->statement }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>


</x-app-layout>
