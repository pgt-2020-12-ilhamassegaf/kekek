@extends('layout.master')
@section('content')



    <h1>Edit Data</h1>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
      </div>
      @endif
    <div class="row">
        <div class ="col-lg-12">
        <form action="/dosen/{{ $dosen->id }}/update" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Dosen</label>
              <input name="nama_dosen" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Nama Dosen" value="{{ $dosen->nama_dosen }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pelajaran</label>
                <input name="pelajaran" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Pelajaran" value="{{ $dosen->pelajaran }}">
            </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                  <option value="Laki-Laki" @if($dosen->jenis_kelamin == 'Laki-Laki')selected @endif>LAKI-LAKI</option>
                  <option value="Perempuan" @if($dosen->jenis_kelamin == 'Perempuan')selected @endif>PEREMPUAN</option>

                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Agama</label>
                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder=" Agama" value="{{ $dosen->agama }}">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" > {{ $dosen->alamat }}</textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Avatar</label>
                <input type="file" name="avatar" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    </div>

    @endsection





