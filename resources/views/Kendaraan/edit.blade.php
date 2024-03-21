@extends('layout')
@section('content')

<div class="row">
<div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA KENDARAAN</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="post" action="{{ route('kendaraan.update', $kendaraan->id_kendaraan) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
          
                    <div class="form-group">
                          <Label>Kode Kendaraan :</Label>
                          <input type="text" class="form-control" name="kode_kendaraan" value="{{ $kendaraan->kode_kendaraan }}">
                    </div>


                    <div class="form-group">
                          <Label>Nama Kendaraan :</Label>
                          <input type="text" class="form-control" name="nama_kendaraan" value="{{ $kendaraan->nama_kendaraan }}">
                    </div>

                    <div class="form-group">
                          <Label>Merk Kendaraan :</Label>
                          <input type="text" class="form-control" name="merek_kendaraan" value="{{ $kendaraan->merek_kendaraan }}">
                      </div>

                     <div class="form-group">
                          <Label>Harga :</Label>
                          <input type="text" class="form-control" name="harga" value="{{ $kendaraan->harga }}">
                      </div>

                      <div class="form-group">
                          <Label>Stok :</Label>
                          <input type="text" class="form-control" name="stok" value="{{ $kendaraan->stok }}">
                      </div>

                      <div class="form-group">
                          <Label>Foto Kendaraan(<a href="{{ asset('data_kendaraan/'.$kendaraan->gambar) }}">Lihat Gambar</a>) :</Label>
                          <input type="file" class="form-control" name="gambar">
                      </div>

                    <div class="form-group">
                          <Label>Keterangan :</Label>
                          <textarea name="ket" class="form-control">{{ $kendaraan->ket }}</textarea>
                    </div>

          
          <center><input type="submit" class="btn btn-primary" value="Update Data" /></center>
                    
                    
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
@endsection