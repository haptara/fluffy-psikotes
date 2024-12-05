<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <section class="section-py first-section-pt">
        <div class="container">

            <div class="col-lg-6 mx-auto mt-3">
                <h2 class="text-center mb-2">{{ strtoupper($tes['test_name']) }}</h2>
                <p class="text-center mb-0">Diharapkan seluruh rangkaian tes diselesaikan secara langsung ( tidak
                    terpotong-potong ) , sehingga dimohon untuk meluangkan waktu kurang lebih 1 jam untuk menyelesaikan
                    TES nya.</p>
                <div class="mt-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class='bx bx-badge-check me-3 text-primary'></i>
                            Pastikan bapak/ibu sudah beristirahat yang cukup.
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class='bx bx-badge-check me-3 text-primary'></i>
                            Bapak/ibu disarankan untuk menggunakan device laptop untuk mengerjakan psikotes online.
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class='bx bx-badge-check me-3 text-primary'></i>
                            Saudara tidak diperkenankan membuka laman/tab lain selain tab psikotes.
                        </li>
                        @if (strtolower($tes['test_name']) != 'disc')
                            <li class="list-group-item d-flex align-items-center">
                                <i class='bx bx-badge-check me-3 text-primary'></i>
                                Terdapat 5 bagian tes yang perlu Bapak/Ibu kerjakan. Pastikan seluruh tes telah
                                dikerjakan
                                dan tidak terlewat.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class='bx bx-badge-check me-3 text-primary'></i>
                                Setiap bagian tes memiliki ketentuan waktu pengerjaan tersendiri. Jika waktu pengerjaan
                                sudah habis, form akan secara otomatis terkirim sehingga pastikan Bapak/Ibu memanfaatkan
                                waktu semaksimal mungkin dalam mengerjakan persoalan.
                            </li>
                        @endif
                        <li class="list-group-item d-flex align-items-center">
                            <i class='bx bx-badge-check me-3 text-primary'></i>
                            Link psikotes hanya dapat diakses satu kali dalam waktu yang ditetapkan sehingga pastikan
                            Bapak/Ibu mengakses link tersebut setelah siap untuk mengerjakan (tidak diperkenankan untuk
                            berlatih terlebih dahulu). Pastikan saudara mengakses link saat sudah siap untuk mulai
                            mengerjakan.
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class='bx bx-badge-check me-3 text-primary'></i>
                            Pastikan Bapak/Ibu berada di ruangan yang kondusif (tanpa gangguan dari sekitar) dan
                            memiliki jaringan yang stabil.
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class='bx bx-badge-check me-3 text-primary'></i>
                            Jika ada pertanyaan ataupun kendala selama pengerjaan psikotes, silakan berikan info kepada
                            kami
                        </li>

                    </ul>
                </div>
                {{-- <div class="row mb-4 g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-calendar bx-lg"></i></span>
                            </div>
                            <div>
                                <h6 class="mb-0 text-nowrap">17 Nov 23</h6>
                                <small>Date</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-time-five bx-lg"></i></span>
                            </div>
                            <div>
                                <h6 class="mb-0 text-nowrap">32 minutes</h6>
                                <small>Duration</small>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 text-center mt-4">
                    @if ($tes->slug == 'disc')
                        <a href="{{ route('upanel.test.disc', ['testId' => $tes->slug]) }}" class="btn btn-primary">
                            Mulai Kerjakan
                        </a>
                    @else
                        <a href="{{ route('test.group', ['testId' => $tes->slug, 'groupOrder' => 1]) }}"
                            class="btn btn-primary">
                            Mulai Kerjakan
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
