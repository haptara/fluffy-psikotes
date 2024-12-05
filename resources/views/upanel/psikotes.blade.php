<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot>


    <section class="section-py bg-body first-section-pt">
        <div class="container">
            <div class="row">
                <di class="col-lg-6">
                    <div class="card px-3">
                        <div class="card-body p-md-8">
                            {{-- <h4 class="mb-6 me-2 fw-bold text-primary">PSIKOTES</h4>
                            <p class="mb-0">All plans include 40+ advanced tools and features to boost your product.
                                Choose
                                the best plan to fit your needs.</p> --}}

                            <div class="divider text-start">
                                <div class="divider-text">
                                    <h5 class="fw-normal mb-3">I. Essay</h5>
                                </div>
                            </div>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($soal as $s)
                                @if ($s->question_type === 'essay')
                                    <div class="mb-3">
                                        <small class="fw-bold">{{ $no++ }}.</small>
                                        <label for="{{ $s->id }}" class="form-label text-primary">
                                            {{ $s->question_text }}
                                        </label>

                                        @if ($s->image)
                                            <img src="{{ asset('storage/images/soal/' . $s->image) }}"
                                                class="img-thumbnail mb-3" width="200px">
                                        @endif
                                        <input type="email" class="form-control" id="{{ $s->id }}"
                                            placeholder="Jawaban">
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </di>

                <div class="col-lg-6 col-md-12">
                    <div class="card px-3">
                        <div class="card-body p-md-8">
                            <div class="divider text-start">
                                <div class="divider-text">
                                    <h5 class="fw-normal mb-3">II. Test Sinonim</h5>
                                </div>
                            </div>

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($soal as $s)
                                @if ($s->question_type === 'multiple_choice')
                                    <p class="mt-3">
                                        <span class="fw-bold">{{ $no++ }}.</span>
                                        {{ strtoupper($s->question_text) }}
                                    </p>
                                    @foreach ($s->choices as $key => $sc)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="question_{{ $s->id }}" value="{{ $sc->choice_text }}"
                                                id="{{ $s->id . $key }}">
                                            <label
                                                class="form-check-label {{ $sc->is_correct == '1' ? 'text-danger' : '' }}"
                                                for="{{ $s->id . $key }}">
                                                {{ ucwords($sc->choice_text) }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


</x-app-layout>
