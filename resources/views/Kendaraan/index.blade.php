@extends('layout')
@section('content')
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if($message = Session::get('success'))
                  <div class="alert alert-success">
                    <p>{{ $message }}</p>
                  </div>
                @endif
                <a href="{{ route('kendaraan.create') }}" class="btn btn-success">Tambah Data Kendaraan</a><p></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Foto Kendaraan</th>
                      <th>Kode Kendaraan</th>
                      <th>Nama Kendaraan</th>
                      <th>Merk</th>
                      <th>Harga Sewa</th>
                      <th>Stok</th>
                      <th>Ket</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Foto Kendaraan</th>
                      <th>Kode Kendaraan</th>
                      <th>Nama Kendaraan</th>
                      <th>Merk</th>
                      <th>Harga Sewa</th>
                      <th>Stok</th>
                      <th>Ket</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($kendaraans as $kendaraan)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td><img src="{{ asset('data_file/'.$kendaraan -> gambar) }}" alt="" width="150px"></td>
                      <td>{{ $kendaraan -> kode_kendaraan }}</td>
                      <td>{{ $kendaraan -> nama_kendaraan }}</td>
                      <td>{{ $kendaraan -> merek_kendaraan }}</td>
                      <td>{{ $kendaraan -> harga }}</td>
                      <td>{{ $kendaraan -> stok }}</td>
                      <td>{{ $kendaraan -> ket }}</td>
                      <td><form action="{{ route('kendaraan.destroy', $kendaraan->id_kendaraan) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('kendaraan.edit', $kendaraan->id_kendaraan) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini...?')">Hapus</button>
                      </form></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection