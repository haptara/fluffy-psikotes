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
                                <a href="{{ route('fpanel.soal.psikotes') }}" class="btn-sm">
                                    <span>
                                        <i class='bx bx-arrow-back bx-lg me-sm-2'></i>
                                    </span>
                                </a>

                                Edit Soal Psikotes
                            </h5>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/fpanel/soal/psikotes/update" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            @php
                                // $val_kategorites = old('test_id');
                                $val_group_tes = old('group_tes') ?? $question->question_group_id;
                                $question_text = old('question_text') ?? $question->question_text;
                                $question_type = old('question_type') ?? $question->question_type;

                                $image_url = asset('storage/images/soal/') . '/' . $question->image;
                            @endphp
                            <input type="hidden" class="form-control" value="1" name="test_id">
                            <input type="hidden" class="form-control" value="{{ $question->id }}" name="soal_id">
                            <div class="form-group mb-3">
                                <label for="group_tes" class="mb-2">Group Soal
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="group_tes" id="group_tes"
                                    class="form-control @error('group_tes') is-invalid @enderror">
                                    <option value="">-Pilih-</option>
                                    @foreach ($group_tes as $gt)
                                        <option value="{{ $gt->id }}"
                                            {{ $val_group_tes == $gt->id ? 'selected' : '' }}>
                                            {{ strtoupper($gt->group_name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('group_tes')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="question_text" class="mb-2">Soal
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea name="question_text" id="question_text" class="form-control @error('question_text') is-invalid @enderror">{{ $question_text }}</textarea>
                                @error('question_text')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gambar-soal" class="mb-2">Gambar</label>
                                <input type="file" name="gambar"
                                    class="form-control @error('gambar') is-invalid @enderror" id="gambar-soal">
                                @error('gambar')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <img src="{{ $image_url }}" class="img-thumbnail rounded mb-3 img__thumbnail-fnz"
                                alt="" width="200px"
                                style="{{ $image_url ? 'display:block;' : 'display:none;' }}">
                            <div class="form-group mb-3">
                                <label for="question_type" class="mb-2">Jenis Soal
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="question_type" id="question_type"
                                    class="form-control @error('question_type') is-invalid @enderror">
                                    <option value="">-Pilih-</option>
                                    <option value="essay" {{ $question_type === 'essay' ? 'selected' : '' }}>Essay
                                    </option>
                                    <option value="multiple_choice"
                                        {{ $question_type === 'multiple_choice' ? 'selected' : '' }}>
                                        Pilihan Ganda</option>
                                </select>
                                @error('question_type')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="choices-container"
                                {{ $question_type === 'multiple_choice' ? '' : 'style="display: none;"' }}>
                                <label class="mb-2">Pilihan Jawaban</label>
                                @foreach ($question->choices as $index => $choice)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">{{ chr(65 + $index) }}</span>
                                        <input type="text" name="choices[]" class="form-control"
                                            placeholder="Pilihan {{ chr(65 + $index) }}"
                                            value="{{ $choice['choice_text'] }}">
                                        <input type="hidden" name="choices_value[]" value="{{ chr(65 + $index) }}">
                                    </div>
                                @endforeach
                                <label for="correct_choice" class="mb-2">Pilihan Benar</label>
                                <select name="correct_choice" id="correct_choice" class="form-control">
                                    <option value="">-Pilih-</option>
                                    @foreach ($question->choices as $index => $choice)
                                        <option value="{{ $index }}"
                                            {{ $choice['is_correct'] ? 'selected' : '' }}>
                                            {{ chr(65 + $index) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" id="btnFnz" class="btn btn-primary mt-3 btnFnz">Simpan</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('script')
        <script>
            $(document).ready(function() {
                // $('#choices-container').hide();
                $('#choices-container').toggle($('#question_type').val() == 'multiple_choice');

                $('#question_type').on('change', function() {
                    $('#choices-container').toggle(this.value == 'multiple_choice');
                });

                // $('#question_type').on('change', function() {
                //     if (this.value === "multiple_choice") {
                //         $('#choices-container').show();
                //     } else {
                //         $('#choices-container').hide();
                //     }
                // });


                $('#gambar-soal').on('change', function(event) {
                    var file = event.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.img__thumbnail-fnz').attr('src', e.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });
            });


            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                var toastEl = document.getElementById('toastMessage');
                toastEl.querySelector('.toast-body').innerHTML = "{{ session('error') }}";
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            @endif

            // toastr.success("Hello");
        </script>
    @endpush


</x-app-layout>
