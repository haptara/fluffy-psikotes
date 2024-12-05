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

                                Tambah Soal Baru
                            </h5>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/fpanel/soal/psikotes/add" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            @php
                                // $val_kategorites = old('test_id');
                                $val_group_tes = old('group_tes');
                                $question_text = old('question_text');
                                $question_type = old('question_type');
                            @endphp
                            <input type="hidden" class="form-control" value="1" name="test_id">
                            {{-- <div class="form-group mb-3">
                                <label for="test_id" class="mb-2">Kategori Tes
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="test_id" id="test_id"
                                    class="form-control @error('test_id') is-invalid @enderror">
                                    <option value="">-Pilih-</option>
                                    @foreach ($tests as $test)
                                        <option value="{{ $test->id }}"
                                            {{ $val_kategorites == $test->id ? 'selected' : '' }}>
                                            {{ strtoupper($test->test_name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('test_id')
                                    <div class="invalid-feedback d-flex align-item-center">
                                        <i class='bx bx-x'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
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
                            <img src="#" class="img-thumbnail rounded mb-3 img__thumbnail-fnz" alt=""
                                width="200px" style="display:none;">
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
                            <div id="choices-container" style="display: none;">
                                <label class="mb-2">Pilihan Jawaban</label>
                                @foreach (['A', 'B', 'C', 'D', 'E'] as $index => $label)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                            id="basic-addon1">{{ strtoupper($label) }}</span>
                                        <input type="text" name="choices[]" class="form-control"
                                            placeholder="Pilihan {{ strtoupper($label) }}">
                                        <input type="hidden" name="choices_value[]" value="{{ strtoupper($label) }}"
                                            class="form-control">
                                    </div>
                                    {{-- <input type="text" name="choices[]" class="form-control mb-2"
                                        placeholder="Pilihan {{ strtoupper($label) }}"
                                        value="{{ old('choices.' . $index) }}"> --}}
                                @endforeach
                                {{-- @for ($i = 0; $i < 5; $i++)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input type="text" class="form-control"
                                            placeholder="Pilihan {{ $i + 1 }}">
                                    </div>

                                    <input type="text" name="choices[]" class="form-control mb-2"
                                        placeholder="Pilihan {{ $i + 1 }}">
                                @endfor --}}
                                <label for="correct_choice" class="mb-2">Pilihan Benar</label>
                                <select name="correct_choice" id="correct_choice" class="form-control">
                                    <option value="">-Pilih-</option>
                                    @foreach (['A', 'B', 'C', 'D', 'E'] as $index => $label)
                                        <option value="{{ $index }}"
                                            {{ old('correct_choice') == $index ? 'selected' : '' }}>
                                            {{ strtoupper($label) }}
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
                $('#choices-container').hide();

                $('#question_type').on('change', function() {
                    if (this.value === "multiple_choice") {
                        $('#choices-container').show();
                    } else {
                        $('#choices-container').hide();
                    }
                });


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
