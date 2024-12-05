<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card mb-3">
                    <div class="card-header header-elements">
                        <h5 class="mb-0 me-2 fw-bold text-primary">D.I.S.C</h5>
                        <div class="card-header-elements ms-auto">
                            {{-- <span class="badge bg-primary p-3">00 : 30 : 23 Detik</span> --}}
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="d-flex align-items-center border-primary py-3 px-4 border rounded mb-5">
                            {{-- <div class="avatar flex-shrink-0 me-3">
                                <img src="../../assets/img/icons/unicons/briefcase.png" alt="User" class="rounded">
                            </div> --}}
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-3">
                                    <p class="mb-0 text-heading text-primary fw-bold">INTRUKSI : </p>
                                    <p class="mb-0 small">Setiap nomor di bawah ini memuat 4
                                        (empat) kalimat. Tugas anda adalah :</p>
                                    <p class="mb-0 small">1. Beri tanda (X) pada kolom di bawah huruf (P) di samping
                                        kalimat yang <b>PALING</b> menggambarkan diri anda</p>
                                    <p class="small">2. Beri tanda (X) pada kolom di bawah huruf (K) di samping
                                        kalimat yang <b>PALING TIDAK</b> menggambarkan diri anda</p>
                                    <p class="mb-0 text-heading text-primary fw-bold">PERHATIKAN :</p>
                                    <p class="mb-0 small">Setiap nomor hanya ada 1 <b>(Satu)</b> tanda <b>(X)</b> di
                                        bawah
                                        masing-masing kolom <b>P</b> dan <b>K</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            @for ($i = 1; $i <= 8; $i++)
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>P</th>
                                                    <th>K</th>
                                                    <th>GAMBARAN DIRI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="4">1</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="p" class="form-check-input"
                                                                type="radio" value="" id="p" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="k" class="form-check-input"
                                                                type="radio" value="" id="k" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        Memberi Semangat
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="p" class="form-check-input"
                                                                type="radio" value="" id="p" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="k" class="form-check-input"
                                                                type="radio" value="" id="k" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        Petualang
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="p" class="form-check-input"
                                                                type="radio" value="" id="p" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="k" class="form-check-input"
                                                                type="radio" value="" id="k" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        Teliti
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="p" class="form-check-input"
                                                                type="radio" value="" id="p" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input name="k" class="form-check-input"
                                                                type="radio" value="" id="k" />

                                                        </div>
                                                    </td>
                                                    <td>
                                                        Mudah menyesuaikan diri
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endfor

                        </div>


                    </div>
                </div>
            </div>

        </div>

    </div>


</x-app-layout>
