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
                <form action="/cari" method="get">
                  @csrf
                <div class="form-row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Tanggal Awal</label>
                      <input type="date" name="dari" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Tanggal Akhir</label>
                      <input type="date" name="sampai" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="">&nbsp;</label>
                      <input type="submit" class="btn btn-primary" value="Cari Data">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="">&nbsp;</label>
                      <a href="{{ route('pinjam.create') }}" class="btn btn-success">Tambah Data Kendaraan</a>
                    </div>
                  </div>
                </div>
                </form>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Ref</th>
                      <th>Nama Customer</th>
                      <th>Nama kendaraan</th>
                      <th>Jumlah Pinjam</th>
                      <th>Lama Pinjam</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="8" style="text-align: end">Total Pinjam</th>
                      <th>Rp.{{ number_format($sums,0,',','.') }}</th>
                      <th>------</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($pinjams as $pinjam)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $pinjam -> no_ref }}</td>
                      <td>{{ $pinjam -> nm_customer }}</td>
                      <td>{{ $pinjam -> nama_kendaraan }}</td>
                      <td>{{ $pinjam -> jumlah_pinjam }} Mobil</td>
                      <td>{{ $pinjam -> lama_pinjam }} Hari</td>
                      <td>{{ $pinjam -> tgl_pinjam }}</td>
                      <td>{{ $pinjam -> tgl_kembali }}</td>
                      <td>Rp. {{ number_format($pinjam -> total,0,',','.') }}</td>
                      <td><form action="{{ route('pinjam.destroy', $pinjam -> id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('pinjam.edit', $pinjam -> id) }}" class="btn btn-warning">Edit</a>
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