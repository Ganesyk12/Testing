<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
   <form action="" method="post" id="approveProdakForm">
       @csrf
       <input type="hidden" name="uup_id" id="uup_id">
       <div class="modal-dialog modal-xl">
           <div class="modal-content">
               <div class="modal-header" style="background-color:darkcyan; color: white;">
                   <h5 class="modal-title" id="approveModalLabel">Approve Prodak</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="errMsgContainer"></div>
                   <div class="errMsgContainer">
                   </div>
                   {{-- NAMA PROSES --}}
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="uup_nama_proses" class="form-control" style="font-size: 15px; text-align: center">Nama Proses</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_nama_proses" id="uup_nama_proses" autofocus />
                       </div>
                   </div>
                   {{-- LINE --}}
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="id_line" class="form-control" style="font-size: 15px; text-align: center">ID Line</label>
                       </div>
                       <div class="col-md-9">
                           <select class="form-control" name="up_id_line"  id="up_id_line">
                               <option placeholder="pilih line">-Pilih line-</option>
                               @foreach($lines as $line)
                                   <option value="{{ $line->id_line }}" {{ $prodak->id_line == $line->id_line ? 'selected' : '' }}>
                                       {{ $line->nama_line }}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   <!-- KLASIFIKASI PERUBAHAN -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="uup_klasifikasi_perubahan" class="form-control" style="font-size: 15px; text-align: center">Klasifikasi Perubahan</label>
                       </div>
                       <div class="col-md-9">
                           <div class="btn-group" role="group" aria-label="Klasifikasi Perubahan" style="width: 100%;">
                               <label class="btn btn-outline-primary">
                                   <input type="radio" name="uup_klasifikasi_perubahan" value="design" {{ $prodak->klasifikasi_perubahan == 'design' ? 'checked' : '' }} required>
                                   Design
                               </label>
                               <label class="btn btn-outline-primary">
                                   <input type="radio" name="uup_klasifikasi_perubahan" value="proses" {{ $prodak->klasifikasi_perubahan == 'proses' ? 'checked' : '' }} required>
                                   Proses
                               </label>
                           </div>
                       </div>
                   </div>
                   <!-- PELAKSANAAN 2ND QA -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="pelaksanaan2ndQA" class="form-control" style="font-size: 15px; text-align: center">pelaksanaan2ndQA</label>
                       </div>
                       <div class="col-md-9 pt-1">
                           <!-- pelaksanaan2ndQA -->
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pelaksanaan2ndQAO" name="uup_pelaksanaan2ndQA" value="Ada" {{ $prodak->pelaksanaan2ndQA == 'Ada' ? 'checked' : '' }} />
                               <label class="form-check-label" for="pelaksanaan2ndQAO">Ada</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pelaksanaan2ndQAX" name="uup_pelaksanaan2ndQA" value="Tidak" {{ $prodak->pelaksanaan2ndQA == 'Tidak' ? 'checked' : '' }} />
                               <label class="form-check-label" for="pelaksanaan2ndQAX">Tidak</label>
                           </div>
                       </div>
                   </div>
                   <!-- ITEM PERUBAHAN -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="uup_item_perubahan" class="form-control" style="font-size: 15px; text-align: center">Item Perubahan</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_item_perubahan" id="uup_item_perubahan" placeholder="Insert Text (Area Text)" style="text-align: center" />
                       </div>
                   </div>
                   <!-- LEMBAR INSTRUKSI -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="uup_no_lembar_instruksi" class="form-control" style="font-size: 15px; text-align: center">Lembar Instruksi</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_no_lembar_instruksi" id="uup_no_lembar_instruksi" placeholder="Insert Text (Area Text)" style="text-align: center" />
                       </div>
                   </div>
                   <!-- PRODUKSI SAAT PERUBAHAN -->
                   <div class="row mb-3 g-3">
                       <div class="col-md-6">
                           <div class="row mb-3">
                               <div class="col-md-6">
                                   <label for="uup_tanggal_produksi_saat_perubahan" class="form-control" style="font-size: 15px; text-align: center">Tanggal Produksi saat Perubahan</label>
                               </div>
                               <div class="col-md-6">
                                   <input class="form-control" type="date" id="uup_tanggal_produksi_saat_perubahan" name="uup_tanggal_produksi_saat_perubahan" />
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="row mb-3">
                               <div class="col-md-6">
                                   <label for="shiftt" class="form-control" style="font-size: 15px; text-align: center">Shiftt</label>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="sift_a" name="uup_shiftt" value="shiftt_a" {{ $prodak->shiftt == 'shiftt_a' ? 'checked' : '' }} required />
                                       <label class="form-check-label" for="sift_a">Shift A</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="sift_b" name="uup_shiftt" value="shiftt_b" {{ $prodak->shiftt == 'shiftt_b' ? 'checked' : '' }} />
                                       <label class="form-check-label" for="sift_b">Shift B</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="sift_c" name="uup_shiftt" value="shiftt_c" {{ $prodak->shiftt == 'shiftt_c' ? 'checked' : '' }} />
                                       <label class="form-check-label" for="sift_c">Shift C</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="non_shiftt" name="uup_shiftt" value="non_shiftt" {{ $prodak->shiftt == 'non_shiftt' ? 'checked' : '' }} />
                                       <label class="form-check-label" for="non_shiftt">Non Shift</label>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- PART NUMBER FINISH GOOD -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="uup_part_number_finish_good" class="form-control" style="font-size: 15px; text-align: center">Part Number Finish Good</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_part_number_finish_good" id="uup_part_number_finish_good" placeholder="Insert Text (Area Text)" style="text-align: center" />
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
                               <input class="form-check-input" type="radio" id="kualitasO" name="uup_kualitas" value="O" {{ $prodak->kualitas == 'O' ? 'checked' : '' }} />
                               <label class="form-check-label" for="kualitasO">OK</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="kualitasX" name="uup_kualitas" value="X" {{ $prodak->kualitas == 'X' ? 'checked' : '' }} />
                               <label class="form-check-label" for="kualitasX">NG</label>
                           </div>
                       </div>
                   </div>
                   <!-- FAKTA - FAKTA NG -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="uup_fakta_ng" class="form-control" style="font-size: 15px; text-align: center">Fakta-Fakta NG</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_fakta_ng" id="uup_fakta_ng" placeholder="Insert Text (Area Text)" style="text-align: center" />
                       </div>
                   </div>
                   <!-- PCDT -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="uup_pcdt" class="form-control" style="font-size: 15px; text-align: center">PCDT</label>
                       </div>
                       <div class="col-md-3 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pcdtO" name="uup_pcdt" value="O" {{ $prodak->pcdt == 'O' ? 'checked' : '' }} />
                               <label class="form-check-label" for="pcdtO">Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pcdtNotX" name="uup_pcdt" value="X" {{ $prodak->pcdt == 'X' ? 'checked' : '' }} />
                               <label class="form-check-label" for="pcdtNotX">Not Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <input class="form-control" type="date" id="uup_tanggal_perubahan_pcdt" name="uup_tanggal_perubahan_pcdt" required />
                       </div>
                       
                   </div>
                   <!-- INSTRUKSI KERJA -->
                   <div class="row g-3 mb-3">
                       <div class="col-md-3">
                           <label class="form-control" style="font-size: 15px; text-align: center">Instruksi Kerja</label>
                       </div>
                       <div class="col-md-3 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="instruksi_O" name="uup_instruksi_kerja" value="O" {{ $prodak->instruksi_kerja == 'O' ? 'checked' : '' }} />
                               <label class="form-check-label" for="instruksi_O">Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="instruksi_X" name="uup_instruksi_kerja" value="X" {{ $prodak->instruksi_kerja == 'X' ? 'checked' : '' }} />
                               <label class="form-check-label" for="instruksi_X">Not Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <input class="form-control" type="date" id="uup_tanggal_perubahan_instruksi_kerja" name="uup_tanggal_perubahan_instruksi_kerja" required />
                       </div>
                   </div>
                   <!-- ISIR -->
                   <div class="row g-3 mb-3">
                       <div class="col-md-3">
                           <label class="form-control" style="font-size: 15px; text-align: center">ISIR</label>
                       </div>
                       <div class="col-md-3 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="isir_O" name="uup_isir" value="O" {{ $prodak->isir == 'O' ? 'checked' : '' }} />
                               <label class="form-check-label" for="isir_O">Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="Isir_X" name="uup_isir" value="X" {{ $prodak->isir == 'X' ? 'checked' : '' }} />
                               <label class="form-check-label" for="Isir_X">Not Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <input class="form-control" type="date" id="uup_tanggal_perubahan_isir" name="uup_tanggal_perubahan_isir" required />
                       </div>
                   </div>
                   <!-- PEMAHAMAN BEFORE AFTER -->
                   <div class="row g-3 mb-3">
                       <div class="col-md-3">
                           <label class="form-control" style="font-size: 15px; text-align: center">Pemahaman</label>
                       </div>
                       <!-- Pemahaman -->
                       <div class="col-md-3 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pemahaman_paham" name="uup_pemahaman" value="paham" {{ $prodak->pemahaman == 'paham' ? 'checked' : '' }}>
                               <label class="form-check-label" for="pemahaman_paham">Paham</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pemahaman_kurangpaham" name="uup_pemahaman" value="kurang paham" {{ $prodak->pemahaman == 'kurang paham' ? 'checked' : '' }}>
                               <label class="form-check-label" for="pemahaman_kurangpaham">Kurang Paham</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pemahaman_tidak_sama_sekali" name="uup_pemahaman" value="tidak sama sekali" {{ $prodak->pemahaman == 'tidak sama sekali' ? 'checked' : '' }}>
                               <label class="form-check-label" for="pemahaman_tidak_sama_sekali">Tidak Sama Sekali</label>
                           </div>
                       </div>
                   </div>
                   <!-- ULASAN -->
                   <div class="row mb-3 mt-2">
                       <div class="col-md-3">
                           <label for="uup_ulasan" class="form-control" style="font-size: 15px; text-align: center">Ulasan</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_ulasan" id="uup_ulasan" 
                           placeholder="Insert Text (Area Text)" style="text-align: center" />
                       </div>
                   </div>
                   <!-- HANCHOU -->
                   <div class="row g-3">
                       <div class="col-md-3" style="font-size: 15px; text-align: center">
                           @if ($role == 'hanchou')
                           <label class="form-label">Nama Hanchou</label>
                           @elseif ($role == 'kakaricho')
                           <label class="form-label">Nama Kakaricho</label>
                           @elseif ($role == 'mng_mfg')
                           <label class="form-label">Nama Manager Manufacturing</label>
                           @elseif ($role == 'gm')
                           <label class="form-label">Nama General manager</label>
                           @endif
                       </div>
                       <div class="col-md-4">
                           <script>
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
                   @if($role == 'kakaricho')
                   <div class="col-md-3">
                       <div class="form-check form-check-inline" hidden>
                           <input class="form-check-input" type="radio" id="status_active" name="uup_status" value="active" checked>
                           <label class="form-check-label" for="status_active" >active</label>
                       </div>
                   </div>
                   @elseif ($role == 'mng_mfg')
                   <div class="col-md-3">
                       <div class="form-check form-check-inline" hidden>
                           <input class="form-check-input" type="radio" id="status_mng_mfg_active" name="uup_status_mng_mfg" value="active" checked>
                           <label class="form-check-label" for="status_mng_mfg_active">active_mng</label>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-check form-check-inline" hidden>
                           <input class="form-check-input" type="radio" id="status_active" name="uup_status" value="active" checked>
                           <label class="form-check-label" for="status_active">active</label>
                       </div>
                   </div>
                   @elseif ($role == 'mng_qc')
                       <div class="col-md-3">
                           <div class="form-check form-check-inline" hidden>
                               <input class="form-check-input" type="radio" id="status_mng_mfg_active" name="uup_status_mng_mfg" value="active" checked>
                               <label class="form-check-label" for="status_mng_mfg_active">active_mng</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline" hidden>
                               <input class="form-check-input" type="radio" id="status_active" name="uup_status" value="active" checked>
                               <label class="form-check-label" for="status_active">active</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline" hidden>
                               <input class="form-check-input" type="radio" id="status_mng_qc_active" name="uup_status_mng_qc" value="active" checked>
                               <label class="form-check-label" for="status_mng_qc_active">active_qc</label>
                           </div>
                       </div>
                   @elseif ($role == 'gm')
                   <div class="col-md-3">
                           <div class="form-check form-check-inline" hidden>
                               <input class="form-check-input" type="radio" id="status_mng_mfg_active" name="uup_status_mng_mfg" value="active" checked>
                               <label class="form-check-label" for="status_mng_mfg_active">active_mng</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline" hidden>
                               <input class="form-check-input" type="radio" id="status_active" name="uup_status" value="active" checked>
                               <label class="form-check-label" for="status_active">active</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline" hidden>
                               <input class="form-check-input" type="radio" id="status_mng_qc_active" name="uup_status_mng_qc" value="active" checked>
                               <label class="form-check-label" for="status_mng_qc_active">active_qc</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline" hidden>
                               <input class="form-check-input" type="radio" id="status_gm_active" name="uup_status_gm" value="active" checked>
                               <label class="form-check-label" for="status_gm_active">active_gm</label>
                           </div>
                       </div>
                   @endif
                   <div class="modal-footer">
                       <button type="button" class="btn btn-danger" id="hm" onclick="openModal('modal3')">Reject</button>
                       <button type="submit" class="btn btn-success approve_prodak" onclick="removeUpdateButton()">Approve</button>
                   </div>
               </div>
           </div>
           <div class="modal" id="modal3">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h4 class="modal-title">Ulasan Reject</h4>
                       </div>
                   <div class="container mt-2">
                       <div class="row mb-3">
                   @if($role == 'mng_mfg')
                       <div class="col-md-3">
                           <label for="uup_reject_mng_mfg" class="form-control" style="font-size: 15px; text-align: center" >Reject Manager MFG</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_reject_mng_mfg" id="uup_reject_mng_mfg" style="text-align: center" required />
                       </div>
                   @elseif($role == 'kakaricho')
                       <div class="col-md-3">
                           <label for="uup_reject_kakaricho" class="form-control" style="font-size: 15px; text-align: center">Reject Kakaricho</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_reject_kakaricho" id="uup_reject_kakaricho" style="text-align: center" required />
                       </div>
                   @elseif($role == 'mng_qc')
                       <div class="col-md-3">
                           <label for="uup_reject_mng_qc" class="form-control" style="font-size: 15px; text-align: center">Reject mng_qc</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_reject_mng_qc" id="uup_reject_mng_qc" style="text-align: center" required />
                       </div>
                   @elseif ($role = 'gm')
                       <div class="col-md-3">
                           <label for="uup_reject_gm" class="form-control" style="font-size: 15px; text-align: center">Reject GM</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="uup_reject_gm" id="uup_reject_gm" style="text-align: center" required />
                       </div>
                   @endif
                   </div>
               </div>
                       <div class="modal-body">
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                               <button type="submit" id="rejectbutton" class="btn btn-primary approve_prodak">Submit</button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
   </form>
</div>