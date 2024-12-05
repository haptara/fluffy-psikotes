<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Hasil D.I.S.C</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="data-peserta" class="table display responsive table-striped text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Peserta</th>
                                    {{-- <th>Total Tes Diikuti</th>
                                    <th>Tes Terakhir Diikuti</th> --}}
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $d)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ strtoupper($d->user->name) }}</td>
                                        <td class="text-center">
                                            <a href="/fpanel/hasil/disc/{{ $d->user_id }}"
                                                class="btn btn-primary btn-sm">
                                                <i class='bx bx-file '></i> Lihat Jawaban
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- 
        "success", "danger", "warning", "info", "dark", "primary", "secondary" 
        <td>
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar me-2"><span
                        class="avatar-initial rounded-circle bg-label-dark">AB</span>
                </div>
            </div>
            <div class="d-flex flex-column"><span class="emp_name text-truncate">Alaric
                    Beslier</span><small class="emp_post text-truncate text-muted">Tax
                    Accountant</small></div>
        </div>
        </td>
        --}}

    @push('script')
        <script>
            $('#data-peserta').DataTable({
                responsive: true,
                layout: {
                    topStart: {
                        buttons: ['copy', 'excel', 'pdf']
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
