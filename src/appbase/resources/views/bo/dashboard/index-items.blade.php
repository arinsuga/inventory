
<!-- TICKET DAN ABSENSI -->
<div class="row">
    <div class="col-lg-5 col-sm-12">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>Open Ticket</h3>

                <p>
                    <div class="row">
                        <div class="col-md-2">
                            Incident
                        </div>
                        <div class="col-md-10">
                            : {{ $viewModel->data->ticket->incident }}
                        </div>
                    </div>
                </p>

                <p>
                    <div class="row">
                        <div class="col-md-2">
                            Request
                        </div>
                        <div class="col-md-10">
                            : {{ $viewModel->data->ticket->request }}
                        </div>
                    </div>
                </p>

                <p>
                    <div class="row">
                        <div class="col-md-2">
                            Pending
                        </div>
                        <div class="col-md-10">
                            : {{ $viewModel->data->ticket->pending }}
                        </div>
                    </div>
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-ticket"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-sm-12">
        <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">Absen Karyawan - Masih data dummy</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Harin</th>
                      <th>Tanggal</th>
                      <th>Masuk</th>
                      <th>Pulang</th>
                      <th>Lama</th>
                      <th>Lembur</th>
                      <th>Catatan</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Senin</td>
                      <td>3 Apr 2023</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>8</td>
                      <td>0</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Selasa</td>
                      <td>4 Apr 2023</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>8</td>
                      <td>0</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Rabu</td>
                      <td>5 Apr 2023</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>8</td>
                      <td>0</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Kamis</td>
                      <td>6 Apr 2023</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>8</td>
                      <td>0</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Senin</td>
                      <td>10 Apr 2023</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>8</td>
                      <td>0</td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MY TASK -->
<div class="row" style="height: ">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">My Task</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Status</th>
                      <th>Kategori</th>
                      <th>Subjek</th>
                      <th>Deskripsi</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($viewModel->data->mytask as $no => $item)
                    <tr>
                      <td>{{ $no+1 }}</td>
                      <td>{{ $item->activitystatus_name }}</td>
                      <td>{{ $item->tasktype_name }}</td>
                      <td>{{ $item->subject }}</td>
                      <td>{{ $item->description }}</td>
                      <td>{{ $item->startdt }}</td>
                      <td>{{ $item->enddt }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- GRAFIK -->
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <input id="barYear" name="barYear" type="hidden" value="{{ $year }}">
        <!-- BAR CHART SUPPORT - INCIDENT dan REQUEST per BULAN dalam 1 TAHUN -->
        <div class="small-box">
            <div class="inner">
                <div style="height: 250px;">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <p style="margin-top: 20px;">Grafik Bar - Incident dan Request per Bulan tahun tahun {{ $year }}</p>

            </div>
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <input id="pieYear" name="pieYear" type="hidden" value="{{ $year }}">
        <input id="pieMonth" name="pieMonth" type="hidden" value="{{ $month }}">
        <!-- PIE CHART SUPPORT - INCIDENT BERDASAR SUB CATEGORY DALAM 1 BULAN -->
        <div class="small-box">
            <div class="inner">

                <div style="height: 250px;">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <p style="margin-top: 20px;">Pie Chart - Incident berdasarkan sub category bulan {{ $monthText }} tahun {{ $year }}</p>
            </div>
        </div>
    </div>

</div>

<!-- PROJECT -->
<div class="row">
    <div class="col-lg-12 col-sm-12">

        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title">Project / Action Plan</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Status</th>
                      <th>Jenis Project</th>
                      <th>Project</th>
                      <th>Subjek</th>
                      <th>Deskripsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($viewModel->data->project as $no => $item)
                    <tr>
                      <td>{{ $no+1 }}</td>
                      <td>{{ $item->activitystatus_name }}</td>
                      <td>{{ $item->tasktype_name }}</td>
                      <td>{{ $item->tasksubtype1_name }}</td>
                      <td>{{ $item->subject }}</td>
                      <td>{{ $item->description }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>

    
    </div>
</div>
