<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <style>
        .sticky-top {
            top: 5rem;
            background-color: #fff;
        }
    </style>

    <section class="section-py bg-body first-section-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card px-3">
                        <div class="card-header sticky-top fixed-top z-3">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h4 class="mb-6 me-2 fw-bold text-primary">{{ ucfirst($soal->group_name) }}</h4>
                                <div class="alert alert-info d-flex align-items-center" role="alert">
                                    <span id="timer" class="text-center fw-bold">Sisa Waktu: 00:00:00</span>
                                </div>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div id="progress-bar"
                                    class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
                                    role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-md-8">

                            @php
                                $groupOrderId = Crypt::encryptString($groupOrder);
                            @endphp

                            <form id="test-form"
                                action="{{ route('test.submit_group', ['testId' => $soal->test_id, 'groupOrder' => $groupOrderId]) }}"
                                method="POST">
                                @csrf

                                @foreach ($soal->questions as $index => $question)
                                    <div class="mb-4">
                                        <p><strong>{{ $index + 1 }}. {{ $question->question_text }}</strong></p>
                                        @if ($question->question_type == 'essay')
                                            @if ($question->image)
                                                <img src="{{ asset('storage/images/soal/' . $question->image) }}"
                                                    class="img-thumbnail mb-3" width="200px">
                                            @endif
                                            <input name="answers[{{ $question->id }}]" class="form-control"
                                                placeholder="Jawaban">
                                        @elseif ($question->question_type == 'multiple_choice')
                                            @foreach ($question->choices as $choice)
                                                <div class="form-check">
                                                    <input type="radio" name="answers[{{ $question->id }}]"
                                                        value="{{ $choice->id }}" class="form-check-input"
                                                        id="choice-{{ $choice->id }}">
                                                    <label class="form-check-label" for="choice-{{ $choice->id }}">
                                                        {{ $choice->choice_text }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary d-flex align-items-center">Selanjutnya
                                    <i class='bx bxs-chevron-right'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Pelanggaran --}}
    <div class="modal fade" id="modalBlok" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <h4 class="alert-heading d-flex align-items-center">
                            <span class="alert-icon rounded-circle">
                                <i class="bx bx-error bx-md"></i>
                            </span>
                            Peringatan
                        </h4>
                        <p>Kami mendeteksi adanya berpindahan laman dari laman psikotes, jika anda tidak merasa keluar
                            dari
                            laman psikotes , silahkan
                            untuk menghubungi kami.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button> --}}
                    {{-- <a href="" class="btn btn-primary">Ok</a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{-- <i class="bx bx-power-off me-2"></i> --}}
                            <span class="align-middle">Ok</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Pelanggaran --}}

    @push('script')
        <script>
            $(document).ready(function() {
                document.addEventListener('visibilitychange', function() {
                    if (document.hidden) {
                        console.log('Tab is no longer active');
                    } else {

                        $.ajax({
                            url: '/upanel/pelanggaran',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                pesan: 'Pengguna beralih tab',
                            },
                            success: function(response) {
                                // console.log(response.message);
                                $('#modalBlok').modal('show');
                                // window.location.href = '/upanel/pelanggaran/show';
                            },
                            error: function() {
                                // console.error("Gagal menyimpan data pelanggaran");
                            }
                        });

                        // if ($('#modalBlok').length) {
                        //     $('#modalBlok').modal('show');
                        //     console.log('Modal not found!');
                        // } else {
                        //     console.log('Modal not found!');
                        // }
                    }
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                let remainingTime = {{ $remainingTime }};
                const totalTime = {{ $totalTime }};
                const timerElement = document.getElementById('timer');
                const progressBar = document.getElementById('progress-bar');

                function formatTime(seconds) {
                    const hours = Math.floor(seconds / 3600);
                    const minutes = Math.floor((seconds % 3600) / 60);
                    const secs = seconds % 60;
                    return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
                }

                function updateProgressBar() {
                    const percentage = (remainingTime / totalTime) * 100;
                    progressBar.style.width = `${percentage}%`;
                    progressBar.setAttribute('aria-valuenow', percentage.toFixed(2));

                    if (percentage <= 20) {
                        progressBar.classList.remove('bg-primary', 'bg-success');
                        progressBar.classList.add('bg-danger');
                    } else if (percentage <= 50) {
                        progressBar.classList.remove('bg-primary');
                        progressBar.classList.add('bg-warning');
                    } else {
                        progressBar.classList.remove('bg-danger', 'bg-warning');
                        progressBar.classList.add('bg-primary');

                    }
                }

                function updateTimer() {
                    if (remainingTime <= 0) {
                        clearInterval(timerInterval);
                        // alert('Waktu habis, jawaban Anda disimpan otomatis!');
                        // Swal.fire('Info!', 'Waktu habis, jawaban Anda disimpan otomatis!',
                        //     'info');
                        $.blockUI({
                            message: '<div class="spinner-border text-primary" role="status"></div>',
                            // timeout: 1e3,
                            css: {
                                backgroundColor: "transparent",
                                border: "0"
                            },
                            overlayCSS: {
                                backgroundColor: "#fff",
                                opacity: .8
                            }
                        })
                        document.getElementById('test-form').submit();
                        return;
                    }

                    timerElement.innerText = `Sisa Waktu: ${formatTime(remainingTime)}`;
                    updateProgressBar();
                    remainingTime--;
                }

                const timerInterval = setInterval(updateTimer, 1000);
                updateTimer(); // Jalankan pertama kali
            });
        </script>
    @endpush
</x-app-layout>
