@extends('layouts.app')

@section('content')

<!-- MAIN -->

<main style="max-width:800px; margin:10px auto;">

     <!-- CARD TABLE -->

     <div class="card" style="background-color:#334756; margin:20px;">
          <div class="card-header" style="background-color:#2C394B; font-weight:bold;">
               Daftar Buku
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
                              <form action="daftarbuku/store" method="POST">
                                    @csrf
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body" style="background-color:#334756;">
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Judul Buku</label>
                                             <input type="text" class="form-control" id="bk_judul" name="bk_judul" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Pengarang</label>
                                             <input type="text" class="form-control" id="bk_pengarang" name="bk_pengarang" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Jenis</label>
                                             <select class="form-select" aria-label="Default select example" name="bk_id_jenis">
                                                  <option selected>-Pilih-</option>
                                                  @foreach($jenisbuku as $jns)
                                                  <option value="@if($bk_id_jenis = $jns->jns_id) {{$bk_id_jenis}} @endif">
                                                       {{$bk_id_jenis = $jns->jns_buku}}
                                                  </option>
                                                  @endforeach
                                             </select>   
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Harga</label>
                                             <input type="text" class="form-control" id="bk_harga" name="bk_harga" aria-describedby="emailHelp">
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

               <form action="daftarbuku/search" method="GET">
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
                              <th scope="col">Judul</th>
                              <th scope="col">Pengarang</th>
                              <th scope="col">Jenis</th>
                              <th scope="col">Harga</th>
                              <th colspan="2" scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $i=1; ?>@foreach($daftarbuku as $bk)
                              <tr>
                                   <td>{{ $i++ }} </td>
                                   <td>{{ $bk->bk_judul }} </td>
                                   <td>{{ $bk->bk_pengarang }} </td>

                                   @foreach($jenisbuku as $jns)
                                   @if($bk->bk_id_jenis == $jns->jns_id)
                                   <td>{{ $bk->bk_id_jenis = $jns->jns_buku }} </td>
                                   @endif  @endforeach
                                   
                                   <td>{{ $bk->bk_harga }} </td>
                                   <td scope="row">

                                        <!-- BUTTON EDIT DATA-->

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $bk->bk_id }}">
                                             Edit
                                        </button>

                                        <!-- POPUP MODAL EDIT DATA  -->

                                        <div class="modal fade" id="modalEdit{{ $bk->bk_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                  <div class="modal-content" style="background-color:#2C394B; color:white;">
                                                       <form action="daftarbuku/{{ $bk->bk_id }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="modal-header">
                                                                 <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" a-labriael="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="background-color:#334756;">
                                                                <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Judul Buku</label>
                                                                      <input type="text" class="form-control" id="bk_judul" name="bk_judul" value="{{ $bk->bk_judul }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Pengarang</label>
                                                                      <input type="text" class="form-control" id="bk_pengarang" name="bk_pengarang" value="{{ $bk->bk_pengarang }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Jenis</label>
                                                                      <select class="form-select" aria-label="Default select example" name="bk_id_jenis">
                                                                           @foreach($jenisbuku as $jns) 
                                                                           @if($bk->bk_id_jenis == $jns->jns_buku)
                                                                                <option selected value="{{$bk_id_jenis = $jns->jns_id}}">
                                                                                     {{$bk->bk_id_jenis}}
                                                                                </option>
                                                                               <?php continue; ?> @endif
                                                                           <option value="@if($bk_id_jenis = $jns->jns_id){{$bk_id_jenis}} @endif">
                                                                               {{$bk_id_jenis = $jns->jns_buku}}
                                                                           </option>
                                                                           @endforeach
                                                                      </select>
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Harga</label>
                                                                      <input type="text" class="form-control" id="bk_harga" name="bk_harga" value="{{$bk->bk_harga}}" aria-describedby="emailHelp">
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

                                        <a href="daftarbuku/{{$bk->bk_id}}" onclick="return confirm('yakin ingin menghapus data?')">
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
