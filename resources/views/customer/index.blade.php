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
                <a href="{{ route('customer.create') }}" class="btn btn-success">Tambah Data Customer</a><p></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>No Customer</th>
                      <th>Nik Customer</th>
                      <th>Nama Customer</th>
                      <th>Gender</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>No Customer</th>
                      <th>Nik Customer</th>
                      <th>Nama Customer</th>
                      <th>Gender</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($customers as $customer)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $customer -> id }}</td>
                      <td>{{ $customer -> nik_customer }}</td>
                      <td>{{ $customer -> nama_customer }}</td>
                      <td>{{ $customer -> gender }}</td>
                      <td>{{ $customer -> alamat }}</td>
                      <td>{{ $customer -> nohp }}</td>
                      <td><form action="{{ route('customer.destroy', $customer->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
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