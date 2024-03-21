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
				
                    <form class="user" method="post" action="{{ route('kendaraan.store') }}" enctype="multipart/form-data">
                        @csrf
          
                    <div class="form-group">
                          <Label>Kode Kendaraan :</Label>
                          <input type="text" class="form-control" name="kode_kendaraan" placeholder="Kode Kendaraan">
                    </div>


                    <div class="form-group">
                          <Label>Nama Kendaraan :</Label>
                          <input type="text" class="form-control" name="nama_kendaraan" placeholder="Nama Kendaraan">
                    </div>

                    <div class="form-group">
                          <Label>Merk Kendaraan :</Label>
                          <input type="text" class="form-control" name="merek_kendaraan" placeholder="Merk Kendaraan">
                      </div>

                     <div class="form-group">
                          <Label>Harga :</Label>
                          <input type="text" class="form-control" name="harga" placeholder="Harga">
                      </div>

                      <div class="form-group">
                          <Label>Stok :</Label>
                          <input type="text" class="form-control" name="stok" placeholder="Berapa Stok?">
                      </div>

                      <div class="form-group">
                          <Label>Foto Kendaraan :</Label>
                          <input type="file" class="form-control" name="gambar">
                      </div>

                    <div class="form-group">
                          <Label>Keterangan :</Label>
                          <textarea name="ket" class="form-control" placeholder="Keterangan"></textarea>
                    </div>

          
          <center><input type="submit" class="btn btn-primary" value="Simpan Data" /></center>
                    
                    
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
@endsection