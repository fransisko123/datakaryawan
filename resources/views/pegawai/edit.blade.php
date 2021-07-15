@extends('layouts.master')
@section('title', 'Edit Pegawai')
    
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Pegawai</li>
    </ol>
  </nav>
    <div class="container">
        <h1>Form Edit Pegawai</h1>
        <br>
        <form action="{{ route('pegawai.update', $ambil_data-> id ) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label>Nama Pegawai</label>
              <input type="text" class="form-control" value="{{ $ambil_data -> nama }}" name="nama" required>
            </div>
            <div class="form-group">
              <label>Pilih Jabatan</label>
              <select class="form-control" name='id_jabatan' id="id_jabatan">
                <option value="{{ $ambil_data -> id_jabatan }}">{{ $ambil_data -> relasijabatan -> jabatan }}</option>
                <option disabled value>Pilih Jabatam</option>
                @foreach ($jab as $i)
                    <option value="{{ $i -> id }}">{{ $i -> jabatan }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
@endsection