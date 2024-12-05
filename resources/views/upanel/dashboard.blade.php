<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <!-- Help Center Header: Start -->
    <section class="section-py first-section-pt help-center-header position-relative overflow-hidden">
        <img class="banner-bg-img z-n1" src="{{ asset('assets/img/header.png') }}" alt="Help center header">
        <h4 class="text-center text-primary"> Hello <span class="fw-bold">{{ auth()->user()->name }}</span>, Welcome back!
        </h4>
    </section>
    <!-- Help Center Header: End -->

    <!-- Knowledge Base: Start -->
    <section class="section-py">
        {{-- @if ($jum_data > 0) --}}
        @if ($biodata['test_date'])
            <div class="container-fluid">
                {{-- <h4 class="text-center mb-6">Knowledge Base</h4> --}}
                <div class="row mt--fnz">
                    <div class="col-lg-10 mx-auto mt--fnz-col">
                        <div class="row g-6">
                            <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- @dd($biodata) --}}
                                        <div class="d-flex align-items-center mb-3 justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-primary"><i
                                                            class="bx bx-user"></i></span>
                                                </div>
                                                <h5 class="mb-0">Biodata</h5>
                                            </div>
                                            <a href="#" class="btn btn-primary btn-sm d-flex align-items-center">
                                                <i class="bx bx-edit"></i> Edit Biodata
                                            </a>
                                        </div>

                                        <dl class="row mb-6 text-heading">
                                            <dt class="col-6 fw-normal">Nama Lengkap</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ $biodata['name'] }}
                                            </dd>
                                            {{-- <dt class="col-6 fw-normal">Usia</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ date('Y') - date('Y', strtotime($biodata['birth_date'])) }}
                                            </dd> --}}
                                            <dt class="col-6 fw-normal">Tanggal Lahir</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ \Carbon\Carbon::parse($biodata['birth_date'])->translatedFormat('d F Y') }}
                                            </dd>
                                            <dt class="col-6 fw-normal">Jenis Kelamin</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ $biodata['gender'] }}
                                            </dd>
                                            <dt class="col-6 fw-normal">Email</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ $biodata['user']['email'] }}
                                            </dd>
                                            <dt class="col-6 fw-normal">No. Whatsapp</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ $biodata['no_whatsapp'] }}
                                            </dd>
                                            <dt class="col-6 fw-normal">Tanggal Tes</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ \Carbon\Carbon::parse($biodata['test_date'])->translatedFormat('d F Y') }}
                                            </dd>
                                            <dt class="col-6 fw-normal">Posisi Yang dilamar</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ $biodata['lokerPosition']['job_title'] }}
                                            </dd>
                                            <dt class="col-6 fw-normal">Alamat</dt>
                                            <dd class="col-6 text-end text-primary fw-medium">
                                                {{ $biodata['address'] }}
                                            </dd>
                                        </dl>

                                    </div>
                                </div>
                            </div>

                            @foreach ($soal as $s)
                                <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="bg-label-primary rounded-3 text-center mb-3 pt-4">
                                                <img class="img-fluid w-60"
                                                    src="{{ asset('assets/img/sitting-girl-with-laptop-dark.png') }}"
                                                    alt="Card girl image" />
                                            </div>
                                            <h4 class="mb-2 pb-1 text-primary fw-bold">{{ strtoupper($s->test_name) }}
                                            </h4>
                                            {{-- <a href="{{ route('upanel.tes.psikotes') }}"
                                                class="btn btn-primary w-100">Mulai</a> --}}

                                            @php
                                                $userProgress = $s->userProgress->first();
                                                $isCompleted = $userProgress && $userProgress->end_at;

                                                // Cek apakah user telah menyelesaikan tes psikotes
                                                $psychTestCompleted = $soal
                                                    ->where('slug', 'psikotes')
                                                    ->first()
                                                    ?->userProgress->where('user_id', auth()->id())
                                                    ->first()?->end_at;
                                            @endphp

                                            @if ($s->slug == 'disc')
                                                @if ($psychTestCompleted)
                                                    <a href="{{ $isCompletedDisc ? '#' : route('upanel.tes', $s->slug) }}"
                                                        class="btn btn-{{ $isCompletedDisc ? 'danger' : 'primary' }} w-100 {{ $isCompletedDisc ? 'disabled' : '' }}">
                                                        {{ $isCompletedDisc ? 'Selesai' : 'Mulai' }}
                                                    </a>
                                                @else
                                                    <button class="btn btn-secondary w-100" disabled>Harap Selesaikan
                                                        Psikotes</button>
                                                @endif
                                            @else
                                                <a href="{{ $isCompleted ? '#' : route('upanel.tes', $s->slug) }}"
                                                    class="btn btn-{{ $isCompleted ? 'danger' : 'primary' }} w-100 {{ $isCompleted ? 'disabled' : '' }}">
                                                    {{ $isCompleted ? 'Selesai' : 'Mulai' }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <!-- Knowledge Base: End -->

    {{-- MODAL --}}
    <div class="modal fade" id="biodataPeserta" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('store.biodata') }}" autocomplete="off">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Biodata Peserta</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-6">
                            <label for="nama-lengkap" class="form-label text-primary">Nama
                                Lengkap</label>
                            <input type="text" id="nama-lengkap" name="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                            @error('name')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-6">
                            <label for="birth_date" class="form-label text-primary">Tanggal
                                Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                                class="form-control @error('birth_date') is-invalid @enderror">
                            @error('birth_date')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @php
                            $val_gender = old('gender');
                        @endphp
                        <div class="col-lg-6 col-md-12 mb-6">
                            <label for="jenis-kelamin" class="form-label text-primary">Jenis Kelamin</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                id="jenis-kelamin">
                                <option value="">-Pilih-</option>
                                <option value="Laki-laki" {{ $val_gender === 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ $val_gender === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-6">
                            <label for="no-whatsapp" class="form-label text-primary">No. Whatsapp</label>
                            <input type="number" min="0" name="no_whatsapp"
                                value="{{ old('no_whatsapp') }}" id="no-whatsapp"
                                class="form-control @error('no_whatsapp') is-invalid @enderror">
                            @error('no_whatsapp')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12 mb-6">
                            <label for="tanggal-tes" class="form-label text-primary">Tanggal Tes</label>
                            <input type="date" name="test_date" value="{{ old('test_date') }}" id="tanggal-tes"
                                class="form-control @error('test_date') is-invalid @enderror">
                            @error('test_date')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    @php
                        $val_address = old('address');
                    @endphp
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-6">
                            <label for="alamat" class="form-label text-primary">Alamat</label>
                            <textarea name="address" id="alamat" rows="2" class="form-control @error('address') is-invalid @enderror"
                                style="resize: none;">{{ $val_address }}</textarea>
                            @error('address')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    @php
                        $val_positions = old('position_id') ?? $biodata['position_id'];
                    @endphp
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-6">
                            <label for="job-position" class="form-label text-primary">Posisi yang dilamar</label>
                            <select class="form-control @error('position_id') is-invalid @enderror" name="position_id"
                                id="job-position">
                                <option value="">-Pilih-</option>
                                @foreach ($positions as $p)
                                    <option value="{{ $p->id }}"
                                        {{ $val_positions == $p->id ? 'selected' : '' }}>{{ $p->job_title }}</option>
                                @endforeach
                            </select>
                            @error('position_id')
                                <div class="invalid-feedback d-flex align-item-center">
                                    <i class='bx bx-x'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button type="submit" id="saveButton" class="btn btn-primary"><i class="bx bx-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
    {{-- END MODAL --}}

    {{-- @if ($jum_data === 0) --}}
    @if (is_null($biodata['test_date']))
        @push('script')
            <script>
                $(document).ready(function() {
                    $('#biodataPeserta').modal('show');
                });
            </script>
        @endpush
    @endif

    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const saveButton = document.getElementById('saveButton');
                saveButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    saveButton.innerHTML = `
                <i class='bx bx-loader bx-spin'></i> Loading...
            `;
                    saveButton.disabled = true;
                    saveButton.closest('form').submit();
                });


                @if (session('success'))
                    Swal.fire('Success!', '{{ session('success') }}',
                        'success');
                @endif

                @if (session('error'))
                    Swal.fire('Error!', '{{ session('error') }}',
                        'error');
                @endif

            });
            // toastr.success("Hello");
        </script>
    @endpush
</x-app-layout>
{{--  --}}
