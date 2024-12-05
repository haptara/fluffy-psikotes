<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {{-- DATA PESERTA --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">Data Hasil Psikotes</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="data-peserta" class="table display responsive table-striped text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Peserta</th>
                                    <th>Skor</th>
                                    <th>Tanggal Tes</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $index => $participant)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $participant->user->biodataPeserta->name }}</td>
                                        <td>{{ $participant->score }}</td>
                                        <td>
                                            {{ $participant->user->biodataPeserta->test_date }}
                                        </td>
                                        <td class="text-center">
                                            <a href="/fpanel/hasil/psikotes/{{ $participant->user_id }}"
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

    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                <div class="col-sm-12">
                    <label class="form-label" for="basicFullname">Full Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                        <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
                            placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicPost">Post</label>
                    <div class="input-group input-group-merge">
                        <span id="basicPost2" class="input-group-text"><i class='bx bxs-briefcase'></i></span>
                        <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                            placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicEmail">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                        <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                            placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                    </div>
                    <div class="form-text">
                        You can use letters, numbers & periods
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicDate">Joining Date</label>
                    <div class="input-group input-group-merge">
                        <span id="basicDate2" class="input-group-text"><i class='bx bx-calendar'></i></span>
                        <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                            aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label" for="basicSalary">Salary</label>
                    <div class="input-group input-group-merge">
                        <span id="basicSalary2" class="input-group-text"><i class='bx bx-dollar'></i></span>
                        <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                            placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary"
                        data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>

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
