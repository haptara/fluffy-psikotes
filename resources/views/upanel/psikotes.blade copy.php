<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot>


    <section class="section-py bg-body first-section-pt">
        <div class="container">
            <div class="row">
                <di class="col-lg-7">
                    <div class="card px-3">
                        <div class="card-body p-md-8">
                            <h4 class="mb-6 me-2 fw-bold text-primary">PSIKOTES</h4>
                            <p class="mb-0">All plans include 40+ advanced tools and features to boost your product.
                                Choose
                                the best plan to fit your needs.</p>

                            <div class="divider text-start">
                                <div class="divider-text">
                                    <h5 class="fw-normal mb-3">I. Essay</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </di>
            </div>
        </div>
    </section>

    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card mb-3">
                    <div class="card-header header-elements">
                        <h5 class="mb-0 me-2 fw-bold text-primary">PSIKOTES</h5>
                        <div class="card-header-elements ms-auto">
                            <span class="badge bg-primary p-3">00 : 30 : 23 Detik</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="divider text-start">
                            <div class="divider-text">
                                <h5 class="fw-normal mb-3">II. TEST SINONIM</h5>
                            </div>
                        </div>
                        <p>200.000,00 mendapatkan diskon 10% dan baju C memiliki harga Rp. 550.000,00 mendapatkan diskon
                            20%. Berapa biaya yang dibutuhkan bu Ratna untuk membeli baju tersebut</p>
                        <form id="businessForm" onsubmit="return false">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content py-3 ps-12" for="a">
                                            <input name="customRadioTemp" class="form-check-input" type="radio"
                                                value="" id="a" checked />
                                            <span class="custom-option-header pb-0">
                                                <span>890.000,00</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content py-3 ps-12" for="b">
                                            <input name="customRadioTemp" class="form-check-input" type="radio"
                                                value="" id="b" />
                                            <span class="custom-option-header pb-0">
                                                <span>880.000,00</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content py-3 ps-12" for="c">
                                            <input name="customRadioTemp" class="form-check-input" type="radio"
                                                value="" id="c" />
                                            <span class="custom-option-header pb-0">
                                                <span>870.000,00</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content py-3 ps-12" for="d">
                                            <input name="customRadioTemp" class="form-check-input" type="radio"
                                                value="" id="d" />
                                            <span class="custom-option-header pb-0">
                                                <span>860.000,00</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content py-3 ps-12" for="e">
                                            <input name="customRadioTemp" class="form-check-input" type="radio"
                                                value="" id="e" />
                                            <span class="custom-option-header pb-0">
                                                <span>850.000,00</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 col-md-12 mb-2">
                                    <button type="submit"
                                        class="btn btn-secondary w-100 d-flex align-items-center disabled">
                                        <i class='bx bx-chevron-left bx-xs'></i> Kembali</button>
                                </div>
                                <div class="col-lg-3 col-md-12 mb-2">
                                    <button type="submit" class="btn btn-primary w-100 d-flex align-items-center">
                                        Selanjutnya
                                        <i class='bx bx-chevron-right bx-xs'></i>
                                    </button>
                                </div>

                                <div class="col-lg-2 col-md-12"></div>
                                <div class="col-lg-4 col-md-12 mb-2">
                                    {{-- <button type="submit" class="btn btn-danger w-100 d-flex align-item-center"
                                        data-bs-toggle="modal" data-bs-target="#onboardImageModal"><i
                                            class='bx bx-x-circle'></i> Akhiri tes</button> --}}
                                    <a href="#" class="btn btn-danger w-100 d-flex align-item-center"><i
                                            class='bx bx-x-circle'></i> Akhiri tes</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        {{-- <div class="divider text-start">
                            <div class="divider-text">
                                <h5 class="fw-normal mb-3">II. TEST SINONIM</h5>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary w-100">II. TEST SINONIM</button>
                            </div>
                        </div> --}}
                        <div class="row mb-2">
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-primary">1</button>
                            </div>
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-secondary disabled">2</button>
                            </div>
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-secondary disabled">3</button>
                            </div>
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-secondary disabled">4</button>
                            </div>
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-secondary disabled">5</button>
                            </div>
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-secondary disabled">6</button>
                            </div>
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-secondary disabled">7</button>
                            </div>
                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-secondary disabled">8</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal-onboarding modal fade animate__animated" id="onboardImageModal" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <a class="text-muted close-label" href="javascript:void(0);" data-bs-dismiss="modal">Skip
                        Intro</a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="onboarding-media">
                        <div class="mx-2">
                            <img src="{{ asset('assets/img/girl-unlock-password-light.png') }}"
                                alt="girl-unlock-password-light" width="335" class="img-fluid">
                        </div>
                    </div>
                    <div class="onboarding-content mb-0">
                        <h4 class="onboarding-title text-body">Example Request Information</h4>
                        <div class="onboarding-info">In this example you can see a form where you can request some
                            additional
                            information from the customer when they land on the app page.</div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
