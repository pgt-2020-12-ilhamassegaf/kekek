@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
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
                    <img class="avatar" src="{{ $dosen->getAvatar() }}" alt="avatar">
                    <h5 class="title">{{ $dosen->nama_dosen }}</h5>
                  </a>
                <p class="description">
                    {{ $dosen->nip }}
                </p>
              </div>
            <p></p>
            <div class="card-description">

<div class="profile-info">
<h4 class="heading">Informasi</h4>
<div class="card-body">
    <div class="table-responsive">
      <table class="table tablesorter " id="">
        <thead class=" text-primary">
         <tr>
            <th>Pelajaran</th>
           <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{ $dosen->pelajaran }}</td>
        <td>{{ $dosen->jenis_kelamin }}</td>
        <td>{{ $dosen->agama }}</td>
        <td>{{ $dosen->alamat }}</td>
        </tr>
    </tbody>
</table>
<a href="/dosen/{{ $dosen->id }}/edit" type="submit" class="btn btn-fill btn-primary">edit</a>

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
@stop
