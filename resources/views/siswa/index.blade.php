@extends('layout.master')
@section('content')


    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
      </div>
      @endif
    <div class="row">
        <div class="col-6">
            <h1> data siswa </h1>
        </div>
        <div class="col-6">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
    Tambah Data Siswa
  </button>
        </div>



        <div class="card-body">
            <div class="table-responsive">
              <table class="table tablesorter " id="">
                <thead class=" text-primary">
                 <tr>
                    <th>Nama </th>
                    <th>Nim</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($data_siswa as $siswa )

                <tr>
                <td><a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_depan }}</a></td>
                <td><a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nim}}</a></td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->agama }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>
                    <a href = "/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                    <a href = "/siswa/{{ $siswa->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau ente hapus ?')">Delete</a></td>

                </td>

                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>

    </div>
</div>
          <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="/siswa/create" method="POST" class="white-content" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama </label>
                  <input  name="nama_depan" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp"
                  placeholder="Nama Depan">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nim</label>
                    <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Nim">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                      <option value="Laki-Laki">LAKI-LAKI</option>
                      <option value="Perempuan">PEREMPUAN</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder=" Agama">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                  </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
    </div>
  </div>


@endsection
