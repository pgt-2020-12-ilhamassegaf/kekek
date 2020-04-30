@extends('layout.master')
@section('content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{ session('sukses') }}
  </div>
  @elseif(session('Gagal'))
<div class="alert alert-danger" role="alert">
    {{ session('Gagal') }}
  </div>
  @endif

    <div class="content">

        <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="title">Mata Pelajaran</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive ps">
                              <table class="table tablesorter " id="">
                                <thead class=" text-primary">
                                  <tr>
                                    <th>
                                      KODE
                                    </th>
                                    <th>
                                      NAMA
                                    </th>
                                    <th>
                                      SEMESTER
                                    </th>
                                    <th class="text-center">
                                      NILAI
                                    </th>
                                  </tr>
                                </thead>
                               <tbody>
                                   @foreach ($siswa->mapel as $mapel )

                                <td>
                                    {{ $mapel->kode }}
                                </td>
                                  <td>
                                    {{ $mapel->nama }}
                                  </td>
                                  <td>
                                    {{ $mapel->semester }}
                                  </td>
                                  <td class="text-center">
                                    {{ $mapel->pivot->nilai }}
                                  </td>
                                </tr>
                                @endforeach

                               </tbody>
                              </table>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                          </div>

                    </div>
                  </form>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-fill btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Nilai</button>
                </div>
                <div class="panel">
                    <div id="chartNilai"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-user">
                <div class="card-body">
                  <p class="card-text">
                    </p><div class="author">
                      <div class="block block-one"></div>
                      <div class="block block-two"></div>
                      <div class="block block-three"></div>
                      <div class="block block-four"></div>
                      <a href="javascript:void(0)">
                        <img class="avatar" src="{{ $siswa->getAvatar() }}" alt="avatar">
                        <h5 class="title">{{ $siswa->nama_depan }}</h5>
                      </a>
                      <p class="description">
                          {{ $siswa->nim }}
                      </p>
                    </div>
                      <div class="table-responsive ps">
                        <table class="table tablesorter " id="">
                          <thead class=" text-primary">
                           <tr>
                             <th>Matapelajaran</th>
                              <th>Point Plus</th>
                              <th>Point Minus</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <td>{{ $siswa->mapel->count() }}</td>
                          <td>20</td>
                          <td>5</td>
                          </tr>
                      </tbody>
                  </table>
                </div>
                  <div class="profile-info">
                    <h4 class="heading">Informasi</h4>
                        <div class="table-responsive">
                          <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                             <tr>
                               <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>{{ $siswa->agama }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="/siswa/{{ $siswa->id }}/edit" type="submit" class="btn btn-fill btn-primary">edit</a>

                    </div>
                              </div>


          <div class="card-footer">
            <div class="button-container">
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                <i class="fab fa-facebook"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                <i class="fab fa-twitter"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                <i class="fab fa-google-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                        <form action="/siswa/{{ $siswa->id }}/addnilai" method="POST" class="white-content" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Mata Pelajaran</label>
                                <select name="mapel" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($matapelajaran as $mp )
                                  <option value="{{ $mp->id }}">{{ $mp->nama }}</option>
                                  @endforeach

                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nilai</label>
                                <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Nilai">
                              </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
@stop
@section('piechart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Pencapaian Siswa'
    },

    xAxis: {
        categories:{!! json_encode($categories) !!} ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai',
        data: {!! json_encode($data) !!}

    }]
});
</script>
@stop
