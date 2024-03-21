@extends('layout')
@section('content')

<div class="row">
<div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA PINJAM</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="post" action="{{ route('pinjam.update', $pinjam -> id) }}">
                        @csrf
                        @method('PUT')

                    <div class="form-group">
                          <Label>No Referensi :</Label>
                          <input type="text" class="form-control" id="noReferen" name="no_ref" value="{{ $pinjam -> no_ref }}" readonly>
                    </div>

                    <div class="form-group">
                          <Label>No Customer :</Label>
                          <input type="text" class="form-control" id="noCustomer" name="no_cus" value="{{ $pinjam -> no_cus }}" readonly>
                    </div>

                    <div class="form-group">
                          <Label>Nama Customer :</Label>
                          <select name="nm_customer" id="nmCustomer" class="form-control">
                            <option value="{{ $pinjam -> nm_customer }}">{{ $pinjam -> nm_customer }}</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->nama_customer }}">
                            {{ $customer->nama_customer }}
                            </option>
                            @endforeach
                          </select></div>

                     <div class="form-group">
                          <Label>Kode Kendaraan :</Label>
                          <select name="kode_kendaraan" id="kdKendaraan" class="form-control">
                            <option value="{{ $pinjam -> kode_kendaraan }}">{{ $pinjam -> kode_kendaraan }}</option>
                            @foreach ($kendaraans as $kendaraan)
                            <option value="{{ $kendaraan->kode_kendaraan }}">
                            {{ $kendaraan->kode_kendaraan }}
                            </option>
                            @endforeach
                          </select>
                      </div>

                      
                      <div class="form-group">
                        <Label>Lama Pinjam :</Label>
                        <input type="text" id="lamaPinjam" readonly class="form-control" name="lama_pinjam" value="{{ $pinjam -> lama_pinjam }}">
                      </div>
                      
                      <div class="form-group">
                          <Label>Tanggal Pinjam :</Label>
                          <input type="date" id="tglPinjam" class="form-control" name="tgl_pinjam" value="{{ $pinjam -> tgl_pinjam }}">
                        </div>
                        
                        <div class="form-group">
                          <Label>Tanggal Kembali :</Label>
                          <input type="date" id="tglKembali" class="form-control" name="tgl_kembali" value="{{ $pinjam -> tgl_kembali }}">
                        </div>
                        
                        <div class="form-group">
                            <Label>Jumlah Pinjam :</Label>
                            <input type="text" id="jmlhPinjam" class="form-control" name="jumlah_pinjam" value="{{ $pinjam -> jumlah_pinjam }}">
                        </div>

                        <div class="form-group">
                          <Label>Sisa Stok :</Label>
                          <input type="text" id="sisaStok" readonly class="form-control" name="sisa_stok" value="{{ $pinjam -> sisa_stok }}" >
                      </div>
                        
                        <div class="form-group">
                          <Label>Diskon :</Label>
                          <input type="text" readonly id="diskonHarga" class="form-control" name="diskon" value="{{ $pinjam -> diskon }}">
                      </div>

                    <div class="form-group">
                          <Label>Total :</Label>
                          <input type="text" id="total" readonly class="form-control" name="total" value="{{ $pinjam -> total }}">
                    </div>

          
          <center><input type="submit" class="btn btn-primary" value="Simpan Data" /></center>
                    
                    
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
          <script>
           const noCustomer = document.getElementById('noCustomer');
            const nmCustomer = document.getElementById('nmCustomer');
            let valueNikCustomer = @json($customers->pluck('nama_customer')->toArray());
            let valueNoCustomer = @json($customers->pluck('id')->toArray());
            nmCustomer.addEventListener('change', () => {
              if(valueNikCustomer.includes(nmCustomer.value)) {
               noCustomer.value = valueNoCustomer[valueNikCustomer.indexOf(nmCustomer.value)]
              }
            })

            const jmlhPinjam = document.getElementById('jmlhPinjam');
            const total = document.getElementById('total');
            const kdKendaraan = document.getElementById('kdKendaraan');
            const sisaStok = document.getElementById('sisaStok');
            kdKendaraan.addEventListener('change', () => {
              let indeks = kodeKendaraan.indexOf(kdKendaraan.value);
              const stok = @json($kendaraans->pluck('stok')->toArray());
              sisaStok.value = stok[indeks];
            })
            const diskonInput = document.getElementById('diskonHarga');
            const hargaKendaraan = @json($kendaraans->pluck('harga')->toArray());
            const kodeKendaraan = @json($kendaraans->pluck('kode_kendaraan')->toArray());
             jmlhPinjam.addEventListener('input', () => {
              let indeks = kodeKendaraan.indexOf(kdKendaraan.value);
              let awalHarga = (parseInt(jmlhPinjam.value) * parseInt(hargaKendaraan[indeks])) * lamaPinjam.value;
              if(jmlhPinjam.value > 5) {
                let diskon = 0.20;
                let beforeDisk = awalHarga * diskon;
                let afterDisk = awalHarga - beforeDisk;
                diskonInput.value = '20%'
                total.value = afterDisk;
              } else if(jmlhPinjam.value > 3 && jmlhPinjam.value <= 5) {
                let diskon = 0.10;
                let beforeDisk = awalHarga * diskon;
                let afterDisk = awalHarga - beforeDisk;
                diskonInput.value = '10%'
                total.value = afterDisk;
              } else if(jmlhPinjam.value > 1 && jmlhPinjam.value <= 3) {
                let diskon = 0.05;
                let beforeDisk = awalHarga * diskon;
                let afterDisk = awalHarga - beforeDisk;
                diskonInput.value = '5%'
                total.value = afterDisk;
              }  
              else {
                diskonInput.value = '0%'
                total.value = awalHarga;
              }
              if(!jmlhPinjam.value) {
                total.value = '0';
              }
              let indeks2 = kodeKendaraan.indexOf(kdKendaraan.value);
              const stok = @json($kendaraans->pluck('stok')->toArray());
              let kurangStok = stok[indeks2] - jmlhPinjam.value;
              sisaStok.value = kurangStok;
            })

            const tglPinjam = document.getElementById('tglPinjam');
            const tglKembali = document.getElementById('tglKembali');
            const lamaPinjam = document.getElementById('lamaPinjam');
            const tanggal = [tglPinjam, tglKembali];
            for (let i = 0; i < tanggal.length; i++) {
              tanggal[i].addEventListener('change', () => {
                let tanggalAwal = new Date(tanggal[0].value);
                let tanggalAkhir = new Date(tanggal[1].value);
                let tanggalSelisih = tanggalAkhir - tanggalAwal;
                let hariSelisih = tanggalSelisih / (1000 * 60 * 60 *24);
                lamaPinjam.value = hariSelisih;
                if(!tanggal[0].value || !tanggal[1].value) {
                  lamaPinjam.value = '0 hari';
                }   
              })
            }
          </script>
@endsection