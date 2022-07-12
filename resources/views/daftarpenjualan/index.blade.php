@extends('layouts.app')

@section('content')

<!-- MAIN -->

<main style="max-width:800px; margin:10px auto;">

     <!-- CARD TABLE -->

     <div class="card" style="background-color:#334756; margin:20px;">
          <div class="card-header" style="background-color:#2C394B; font-weight:bold;">
               Daftar Penjualan
          </div>
          <div class="card-body">

               <!-- BUTTON ADD DATA -->

               <div class="mb-3 row">
                    <button type="button" class="btn btn-primary col-sm-2" style="background-color: #FF4C29; border: 1px solid #FF4C29; margin-left:12px;" data-bs-toggle="modal" data-bs-target="#modalCreate">
                         Tambah
                    </button>
               </div>

               <!-- POPUP MODAL CREATE DATA -->

               <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content" style="background-color:#2C394B;">
                              <form action="daftarpenjualan/store" method="POST">
                                    @csrf
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Jual Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body" style="background-color:#334756;">
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Buku</label>
                                             <select class="form-select" aria-label="Default select example" name="jual_id_buku" id="jual_id_buku">
                                                  <option selected>-Pilih-</option>
                                                  @foreach($daftarbuku as $bk)
                                                  <option value="@if($jual_id_buku = $bk->bk_id) {{$jual_id_buku}}" @endif>
                                                       {{$jual_id_buku = $bk->bk_judul}} - {{$bk->bk_harga}}
                                                  </option>
                                                  @endforeach
                                             </select>   
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                             <input type="number" class="form-control" id="jual_jml" name="jual_jml" aria-describedby="emailHelp">
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary" style="background-color: #FF4C29; border: 1px solid #FF4C29;">Simpan</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>

               <!-- SEARCH -->

               <form action="daftarpenjualan/search" method="GET">
                    <div class="mb-3 row">
                         <div class="col-sm-6">
                              <input type="text" class="form-control" id="search" name="search" autofocus value="{{ old('cari') }}">
                         </div>
                         <div class="col-sm-1">
                              <button type="submit" class="btn btn-light">Cari</button>
                         </div>
                    </div>
               </form>

               <!-- TABLE  -->

               <table class="table table-hover text-white">
                    <thead>
                         <tr>
                              <th scope="col">No</th>
                              <th scope="col">Waktu</th>
                              <th scope="col">Judul Buku</th>
                              <th scope="col">Harga</th>
                              <th scope="col">Jumlah</th>
                              <th scope="col">Total Harga</th>
                              <th colspan="2" scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $i=1; ?>@foreach($daftarpenjualan as $jual)
                              <tr>
                                   <td>{{ $i++ }} </td>
                                   <td>{{ $jual->updated_at }} </td>

                                   @foreach($daftarbuku as $bk)
                                   @if($jual->jual_id_buku == $bk->bk_id)
                                   <td>{{ $jual->jual_id_buku = $bk->bk_judul }} </td>
                                   <td>{{ $bk_harga = $bk->bk_harga }} </td>
                                   @endif  @endforeach
                                   
                                   <td>{{ $jual_jml = $jual->jual_jml }} </td>
                                   <td>{{ $jual_total = $jual_jml *  $bk_harga}} </td>
                                   <td scope="row">

                                        <!-- BUTTON EDIT DATA-->

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $jual->jual_id }}">
                                             Edit
                                        </button>

                                        <!-- POPUP MODAL EDIT DATA  -->

                                        <div class="modal fade" id="modalEdit{{ $jual->jual_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                  <div class="modal-content" style="background-color:#2C394B; color:white;">
                                                       <form action="daftarbuku/{{ $jual->jual_id }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="modal-header">
                                                                 <h5 class="modal-title" id="exampleModalLabel">Edit Penjualan</h5>
                                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" a-labriael="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="background-color:#334756;">
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Buku</label>
                                                                      <select class="form-select" aria-label="Default select example" name="jual_id_buku">
                                                                           @foreach($daftarbuku as $bk) 
                                                                           @if($jual->jual_id_buku == $bk->bk_judul)
                                                                           <?php $jual_id_buku=$bk->bk_id; ?>
                                                                                <option selected value="{{$jual_id_buku}}">
                                                                                     {{$jual->jual_id_buku}} - {{$bk->bk_harga}}
                                                                                </option>
                                                                               <?php continue; ?> @endif
                                                                           <option value="@if($jual_id_buku = $bk->bk_id){{$jual_id_buku}}"  @endif>
                                                                               {{$jual_id_buku = $bk->bk_judul}}
                                                                           </option>
                                                                           @endforeach
                                                                      </select>
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                                                      <input type="number" class="form-control" id="jual_jml" name="jual_jml" value="{{$jual->jual_jml}}" aria-describedby="emailHelp">
                                                                 </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                 <button type="submit" name="submit" class="btn btn-primary" style="background-color: #FF4C29; border: 1px solid #FF4C29;">Save changes</button>
                                                            </div>
                                                       </form>
                                                  </div>
                                             </div>
                                        </div>

                                        <!-- BUTTON DELETE DATA  -->

                                        <a href="daftarbuku/{{$jual->jual_id}}" onclick="return confirm('yakin ingin menghapus data?')">
                                             <button type="button" class="btn btn-danger">Delete</button>
                                        </a>
                                   </td>
                              </tr>
                        @endforeach
                    </tbody>
               </table>
          </div>
     </div>
</main>
@endsection

<script>
function cetak() {
    var jumlah = document.getElementById("jual_jml").value;
    var harga = document.getElementById("jual_id_buku").harga;
    document.getElementById("jual_total").innerHTML = "<b>" + harga + "</b>";
}
</script>
