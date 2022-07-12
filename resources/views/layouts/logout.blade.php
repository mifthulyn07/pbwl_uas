<form id="logout-form" action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
     @csrf

     <div class="modal fade" id="ModalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content" style="background-color:#2C394B;">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body" style="background-color:#334756;">
                    <p>Apa kamu yakin ingin <b>Keluar</b>?</p>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
               </div>
               </div>
          </div>
     </div>
</form>