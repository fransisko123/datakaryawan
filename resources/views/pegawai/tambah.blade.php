@extends('layouts.master')
@section('title', 'Tambah Pegawai')
    
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
    </ol>
  </nav>
    <div class="container">
        <h1>Form Tambah Pegawai</h1>
        <br>
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Nama Pegawai</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
              <label>Pilih Jabatan</label>
              <select class="form-control" name='id_jabatan' id="id_jabatan">
                <option disabled value>Pilih Jabatan</option>
                @foreach ($jab as $i)
                    <option value="{{ $i -> id }}">{{ $i -> jabatan }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
          </form>
    </div>
@endsection