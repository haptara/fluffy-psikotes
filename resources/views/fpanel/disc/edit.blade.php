<x-app-layout>
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">
                                <a href="{{ route('fpanel.soal.disc') }}" class="btn-sm">
                                    <span>
                                        <i class='bx bx-arrow-back bx-lg me-sm-2'></i>
                                    </span>
                                </a>

                                Edit Soal
                            </h5>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/fpanel/soal/disc/update" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="question_id" id="question_id" value="{{ $questions->id }}"
                                    class="form-control">
                                <label for="question_text" class="form-label">Question</label>
                                <input type="text" name="question_text" id="question_text"
                                    value="{{ $questions->question_text }}"
                                    class="form-control @error('question_text') is-invalid @enderror">
                                @error('question_text')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="statements" class="form-label">Statements</label>
                                <div id="statements">
                                    {{-- @for ($i = 0; $i < $questions->statements->count(); $i++) --}}
                                    @foreach ($questions->statements as $index => $s)
                                        <input type="hidden" name="statements_id[]"
                                            class="form-control mb-2 @error('statements_id.*') is-invalid @enderror"
                                            value="{{ $s->id }}">
                                        <input type="text" name="statements[]"
                                            class="form-control mb-2 @error('statements.*') is-invalid @enderror"
                                            value="{{ $s->statement }}">
                                    @endforeach
                                    {{-- @endfor --}}
                                    @error('statements.*')
                                        <div class="invalid-feedback d-flex align-item-center">
                                            <i class='bx bx-x'></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="button" id="add-statement" class="btn btn-secondary btn-sm">Add
                                    Statement</button>
                            </div>

                            <button type="submit" id="btnFnz" class="btn btn-primary btnFnz">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('script')
        <script>
            const addStatementButton = document.getElementById('add-statement');
            const statementsDiv = document.getElementById('statements');

            addStatementButton.addEventListener('click', () => {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'statements[]';
                input.className = 'form-control mb-2';
                input.required = true;
                statementsDiv.appendChild(input);
            });


            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            // toastr.success("Hello");
        </script>
    @endpush


</x-app-layout>
