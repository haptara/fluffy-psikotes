<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="section-py first-section-pt">
        <div class="container">
            {{-- <h2 class="text-center mb-2">{{ $score }}</h2> --}}
            {{-- <p class="text-center mb-0">All plans include 40+ advanced tools and features to boost your product.<br>
                Choose the best plan to fit your needs.</p> --}}

            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h4 class="alert-heading d-flex align-items-center">
                            <span class="alert-icon rounded-circle"><i class="bx bx-coffee bx-lg"></i></span>Well done :)
                        </h4>
                        <hr>
                        <p class="mb-0">Tes Psikotes Selesai ! untuk hasil tes dan tahap selanjutnya akan di infokan
                            melalui whatsapp atau email.</p>
                    </div>
                </div>
            </div>


        </div>
    </section>

</x-app-layout>
