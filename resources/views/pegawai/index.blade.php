@extends('layouts.master')
@section('title', 'selamat datang')
    
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
    </ol>
  </nav>
  @include('layouts.alert')
    <div class="container">
        <h1>Data Pegawai</h1>
        <br>
        <a href="{{ route('pegawai.create') }}" class="btn btn-success">Tambah Pegawai</a>
        <br>
        <br>
        <table class="table table-striped">
            <thead class="table table-info">
              <tr>
                <th width="60px" scope="col">NO</th>
                <th width="60px" scope="col">Nama Pegawai</th>
                <th width="60px" scope="col">Jabatan</th>
                <th width="60px" scope="col">Gaji</th>
                <th width="60px" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($ambil_data as $a)
                <form action="{{ route('pegawai.destroy', $a -> id) }}" id="{{ $i }}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                </form>
                <tr>
                    <th>{{ $i }}</th>
                    <td>{{ $a -> nama }}</td>
                    <td>{{ $a -> relasijabatan-> jabatan }}</td>
                    <td>Rp{{ number_format($a -> relasijabatan -> gaji) }}</td>
                    <td>
                      <a href="{{ route('pegawai.edit', $a -> id) }}" class="btn btn-primary">Edit</a>
                      <button type="submit" form="{{ $i }}" onclick="return confirm('Yakin ingin menghapus Pegawai?')" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
          </table>
    </div>
@endsection