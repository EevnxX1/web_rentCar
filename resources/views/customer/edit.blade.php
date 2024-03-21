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
				
                    <form class="user" method="post" action="{{ route('customer.update', $customer->id) }}">
                        @csrf
                        @method('PUT')
          
                    <div class="form-group">
                          <Label>Nomer Customer :</Label>
                          <input type="text" readonly class="form-control" name="nik_customer" value="{{ $customer->id }}">
                    </div>

                    <div class="form-group">
                          <Label>Nik Customer :</Label>
                          <input type="text" class="form-control" name="nik_customer" value="{{ $customer->nik_customer }}">
                    </div>


                    <div class="form-group">
                          <Label>Nama Customer :</Label>
                          <input type="text" class="form-control" name="nama_customer" value="{{ $customer->nama_customer }}">
                    </div>

                    <div class="form-group">
                          <Label>Gender Customer :</Label>
                          <select name="gender" class="form-control" id="">
                            <option class="opt" value="{{ $customer->gender }}">{{ $customer->gender }}</option>
                            <option class="opt" value="Pria">Pria</option>
                            <option class="opt" value="Wanita">Wanita</option>
                          </select>
                      </div>

                     <div class="form-group">
                          <Label>Alamat :</Label>
                          <input type="text" class="form-control" name="alamat" value="{{ $customer->alamat }}">
                      </div>

                      <div class="form-group">
                          <Label>Nomer Hp :</Label>
                          <input type="text" class="form-control" name="nohp" value="{{ $customer->nohp }}">
                      </div>
          
          <center><input type="submit" class="btn btn-primary" value="Simpan Data" /></center>
                    
                    
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
          <script>
            const option = document.getElementsByClassName('opt');
            if(option[0].value == 'Pria') {
                option[1].style.display = 'none';
            } else {
                option[2].style.display = 'none;'
            }
          </script>
@endsection