@extends('layout')
@section('content')

<div class="row">
<div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA CUSTOMER</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="post" action="{{ route('customer.store') }}">
                        @csrf
          
                    <div class="form-group">
                          <Label>Nik Customer :</Label>
                          <input type="text" class="form-control" name="nik_customer" placeholder="Nik Customer">
                    </div>


                    <div class="form-group">
                          <Label>Nama Customer :</Label>
                          <input type="text" class="form-control" name="nama_customer" placeholder="Nama Customer">
                    </div>

                    <div class="form-group">
                          <Label>Gender Customer :</Label>
                          <select name="gender" class="form-control" id="">
                            <option selected>~~ Pilih Gender ~~</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                          </select>
                      </div>

                     <div class="form-group">
                          <Label>Alamat :</Label>
                          <input type="text" class="form-control" name="alamat" placeholder="Alamat Customer">
                      </div>

                      <div class="form-group">
                          <Label>Nomer Hp :</Label>
                          <input type="text" class="form-control" name="nohp" placeholder="Nomer Hp Customer">
                      </div>
          
          <center><input type="submit" class="btn btn-primary" value="Simpan Data" /></center>
                    
                    
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
@endsection