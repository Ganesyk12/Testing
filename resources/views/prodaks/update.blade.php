<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
   <form action="" method="post" id="updateProdakForm">
       @csrf
       <input type="hidden" name="up_id" id="up_id">
       <div class="modal-dialog modal-xl">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="updateModalLabel">Update Prodak</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="errMsgContainer"></div>
                   <div class="errMsgContainer"></div>
<!-- NAMA PROSES -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="up_nama_proses" class="form-control" style="font-size: 15px; text-align: center">Nama Proses</label>
   </div>
   <div class="col-md-9">
       <input type="text" class="form-control" name="up_nama_proses" id="up_nama_proses" autofocus />
   </div>
</div>
<!-- KLASIFIKASI PERUBAHAN -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="up_klasifikasi_perubahan" class="form-control" style="font-size: 15px; text-align: center">Klasifikasi Perubahan</label>
   </div>
   <div class="col-md-9">
      <div class="btn-group" role="group" aria-label="Klasifikasi Perubahan" style="width: 100%;">
         <label class="btn btn-outline-primary">
             <input type="radio" name="up_klasifikasi_perubahan" value="design" {{ $prodak->klasifikasi_perubahan == 'design' ? 'checked' : '' }} required>
             Design
         </label>
         <label class="btn btn-outline-primary">
             <input type="radio" name="up_klasifikasi_perubahan" value="proses" {{ $prodak->klasifikasi_perubahan == 'proses' ? 'checked' : '' }} required>
             Proses
         </label>
     </div>
   </div>
</div>
<!-- PELAKSANAAN 2ND QA -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="pelaksanaan2ndQA" class="form-control" style="font-size: 15px; text-align: center">Pelaksanaan 2nd QA</label>
   </div>
   <div class="col-md-9 pt-1">
      <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="pelaksanaan2ndQA" name="up_pelaksanaan2ndQA" value="Ada" {{ $prodak->pelaksanaan2ndQA == 'Ada' ? 'checked' : '' }} />
         <label class="form-check-label" for="pelaksanaan2ndQA">Ada</label>
     </div>
     <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="pelaksanaan2ndQAX" name="up_pelaksanaan2ndQA" value="Tidak" {{ $prodak->pelaksanaan2ndQA == 'Tidak' ? 'checked' : '' }} />
         <label class="form-check-label" for="pelaksanaan2ndQA">Tidak</label>
     </div>
   </div>
</div>
<!-- ITEM PERUBAHAN -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="up_item_perubahan" class="form-control" style="font-size: 15px; text-align: center">Item Perubahan</label>
   </div>
   <div class="col-md-9">
       <input type="text" class="form-control" name="up_item_perubahan" id="up_item_perubahan" placeholder="Insert Text (Area Text)" style="text-align: center" />
   </div>
</div>
<!-- LEMBAR INSTRUKSI -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="up_no_lembar_instruksi" class="form-control" style="font-size: 15px; text-align: center">Lembar Instruksi</label>
   </div>
   <div class="col-md-9">
       <input type="text" class="form-control" name="up_no_lembar_instruksi" id="up_no_lembar_instruksi" placeholder="Insert Text (Area Text)" style="text-align: center" />
   </div>
</div>
<!-- PRODUKSI SAAT PERUBAHAN -->
<div class="row mb-3">
   <div class="col-md-6">
      <div class="row mb-3">
         <div class="col-md-6">
             <label for="shiftt" class="form-control" style="font-size: 15px; text-align: center">Shift</label>
         </div>
   <div class="col-md-6">
      <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="shiftt_a" name="up_shiftt" value="shiftt_a" {{ $prodak->shiftt == 'shiftt_a' ? 'checked' : '' }} />
         <label class="form-check-label" for="shiftt_a">Shift A</label>
     </div>
     <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="shiftt_b" name="up_shiftt" value="shiftt_b" {{ $prodak->shiftt == 'shiftt_b' ? 'checked' : '' }} />
         <label class="form-check-label" for="shiftt_b">Shift B</label>
     </div>
     <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="shiftt_c" name="up_shiftt" value="shiftt_c" {{ $prodak->shiftt == 'shiftt_c' ? 'checked' : '' }} />
         <label class="form-check-label" for="shiftt_c">Shift C</label>
     </div>
     <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="shiftt_non_shiftt" name="up_shiftt" value="non_shiftt" {{ $prodak->shiftt == 'non_shiftt' ? 'checked' : '' }} />
         <label class="form-check-label" for="shiftt_non_shiftt">Non Shift</label>
     </div>
   </div>
</div>
<!-- PART NUMBER FINISH GOOD -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="up_part_number_finish_good" class="form-control" style="font-size: 15px; text-align: center">Part Number Finish Good</label>
   </div>
   <div class="col-md-9">
       <input type="text" class="form-control" name="up_part_number_finish_good" id="up_part_number_finish_good" placeholder="Insert Text (Area Text)" style="text-align: center" />
       <small class="form-text text-muted">Part number pertama yang diproduksi pertama kali saat terjadi perubahan</small>
   </div>
</div>
<!-- KUALITAS -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="kualitas" class="form-control" style="font-size: 15px; text-align: center">Kualitas</label>
   </div>
   <div class="col-md-9 pt-1">
      <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="kualitasO" name="up_kualitas" value="O" {{ $prodak->kualitas == 'O' ? 'checked' : '' }} />
         <label class="form-check-label" for="kualitasO">OK</label>
     </div>
     <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" id="kualitasX" name="up_kualitas" value="X" {{ $prodak->kualitas == 'X' ? 'checked' : '' }} />
         <label class="form-check-label" for="kualitasX">NG</label>
     </div>
   </div>
</div>
<!-- FAKTA - FAKTA NG -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="up_fakta_ng" class="form-control" style="font-size: 15px; text-align: center">Fakta-Fakta NG</label>
   </div>
   <div class="col-md-9">
       <input type="text" class="form-control" name="up_fakta_ng" id="up_fakta_ng" placeholder="Insert Text (Area Text)" style="text-align: center" />
   </div>
</div>
<!-- PCDT -->
<div class="row mb-3">
   <div class="col-md-3">
       <label for="up_pcdt" class="form-control" style="font-size: 15px; text-align: center">PCDT</label>
   </div>
   <div class="col-md-9 pt-1">
       <!-- PCDT -->
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="pcdtO" name="up_pcdt" value="O" {{ $prodak->pcdt == 'O' ? 'checked' : '' }} />
           <label class="form-check-label" for="pcdtO">Revised</label>
       </div>
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="pcdtNotX" name="up_pcdt" value="X" {{ $prodak->pcdt == 'X' ? 'checked' : '' }} />
           <label class="form-check-label" for="pcdtNotX">Not Revised</label>
       </div>
       <div class="col-md-3">
           <label for="up_tanggal_perubahan_pcdt" class="form-control" style="font-size: 15px; text-align: center">Issued Date</label>
       </div>
       <div class="col space-between">
           <input class="form-control" type="date" id="up_tanggal_perubahan_pcdt" name="up_tanggal_perubahan_pcdt" disabled required />
       </div>
   </div>
</div>
<!-- INSTRUKSI KERJA -->
<div class="row g-3">
   <div class="col-md-3">
       <label class="form-label">Instruksi Kerja</label>
   </div>
   <div class="col-md-3 pt-1">
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="instruksi_O" name="up_instruksi_kerja" value="O" {{ $prodak->instruksi_kerja == 'O' ? 'checked' : '' }} />
           <label class="form-check-label" for="instruksi_O">Revised</label>
       </div>
   </div>
   <div class="col-md-3">
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="instruksi_X" name="up_instruksi_kerja" value="X" {{ $prodak->instruksi_kerja == 'X' ? 'checked' : '' }} />
           <label class="form-check-label" for="instruksi_X">Not Revised</label>
       </div>
   </div>
   <div class="col-md-3">
       <input class="form-control" type="date" id="up_tanggal_perubahan_instruksi_kerja" name="up_tanggal_perubahan_instruksi_kerja" required />
   </div>
</div>
<!-- ISIR -->
<div class="row g-3">
   <div class="col-md-3">
       <label class="form-label">ISIR</label>
   </div>
   <div class="col-md-3 pt-1">
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="isir_O" name="up_isir" value="O" {{ $prodak->isir == 'O' ? 'checked' : '' }} />
           <label class="form-check-label" for="isir_O">Revised</label>
       </div>
   </div>
   <div class="col-md-3">
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="Isir_X" name="up_isir" value="X" {{ $prodak->isir == 'X' ? 'checked' : '' }} />
           <label class="form-check-label" for="Isir_X">Not Revised</label>
       </div>
   </div>
   <div class="col-md-3">
       <input class="form-control" type="date" id="up_tanggal_perubahan_isir" name="up_tanggal_perubahan_isir" required />
   </div>
</div>
<!-- PEMAHAMAN BEFORE AFTER -->
<div class="row g-3">
   <div class="col-md-3">
       <label class="form-label">Pemahaman</label>
   </div>
   <div class="col-md-3 pt-1">
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="pemahaman_paham" name="up_pemahaman" value="paham" {{ $prodak->pemahaman == 'paham' ? 'checked' : '' }}>
           <label class="form-check-label" for="pemahaman_paham">Paham</label>
       </div>
   </div>
   <div class="col-md-3">
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="pemahaman_kurangpaham" name="up_pemahaman" value="kurang paham" {{ $prodak->pemahaman == 'kurang paham' ? 'checked' : '' }}>
           <label class="form-check-label" for="pemahaman_kurangpaham">Kurang Paham</label>
       </div>
   </div>
   <div class="col-md-3">
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" id="pemahaman_tidak_sama_sekali" name="up_pemahaman" value="tidak sama sekali" {{ $prodak->pemahaman == 'tidak sama sekali' ? 'checked' : '' }}>
           <label class="form-check-label" for="pemahaman_tidak_sama_sekali">Tidak Sama Sekali</label>
       </div>
   </div>
</div>
<!-- ULASAN -->
<div class="row mb-3 mt-2">
   <div class="col-md-3">
       <label for="up_ulasan" class="form-control" style="font-size: 15px; text-align: center">Ulasan</label>
   </div>
   <div class="col-md-9">
       <input type="text" class="form-control" name="up_ulasan" id="up_ulasan" placeholder="Insert Text (Area Text)" style="text-align: center" />
   </div>
</div>
<!-- HANCHOU -->
<div class="row g-3">
   <div class="col-md-3">
       <label class="form-label">Nama Hanchou</label>
   </div>
   <div class="col-md-4">
       <script>
           // Simulasikan proses login
           var user = {
               name: "{{ auth()->user()->name }}"
           };
           localStorage.setItem("user", JSON.stringify(user));

           // Isi input dengan nama pengguna yang login saat itu
           window.onload = function() {
               var loggedInUser = JSON.parse(localStorage.getItem("user"));
               if (loggedInUser) {
                   document.getElementById("name").value = loggedInUser.name;
                   document.getElementById("name").placeholder = loggedInUser.name;
               }
           };

           function removeUpdateButton() {
               // Mendapatkan referensi tombol "Update"
               var updateButton = document.getElementById('updateButton');

               // Menyembunyikan tombol "Update" dengan CSS
               updateButton.style.display = 'none';
           }
       </script>

       <div class="col-md-10">
           <input type="text" class="form-control" id="name" placeholder="{{ auth()->user()->name }}" disabled />
       </div>
   </div>
</div>

<div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   <button type="submit" class="btn btn-primary update_prodak">Save</button>
</div>
</div>
</div>
</div>
</form>
</div>
