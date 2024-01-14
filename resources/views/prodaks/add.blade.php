<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <form action="" method="post" id="addProdakForm">
       @csrf
       <div class="modal-dialog modal-xl">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="addModalLabel">Add Items</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="errMsgContainer"></div>
                   
                   <!-- NAMA PROSES -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="nama_proses" class="form-control" style="font-size: 15px; text-align: center">Nama Proses</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="nama_proses" id="nama_proses" autofocus />
                       </div>
                   </div>
                   <!-- END OF NAMA PROSES -->
                   
                   <!-- ID LINE -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="id_line" class="form-control" style="font-size: 15px; text-align: center">ID Line</label>
                       </div>
                       <div class="col-md-9">
                           <select class="form-control" name="id_line" id="id_line">
                               <option placeholder="pilih line">-Pilih line-</option>
                               @foreach($lines as $line)
                               <option value="{{ $line->id_line }}">{{ $line->nama_line }}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   <!-- END OF ID LINE -->
                   
                   <!-- KLASIFIKASI PERUBAHAN -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="klasifikasi_perubahan" class="form-control" style="font-size: 15px; text-align: center">Klasifikasi Perubahan</label>
                       </div>
                       <div class="col-md-9">
                           <label class="btn btn-outline-primary" style="width: 100%;">
                               <input class="form-check-input" type="radio" name="klasifikasi_perubahan" value="design">
                               Design
                           </label>
                           <label class="btn btn-outline-primary" style="width: 100%;">
                               <input class="form-check-input" type="radio" name="klasifikasi_perubahan" value="proses">
                               Proses
                           </label>
                       </div>
                   </div>
                   <!-- END OF KLASIFIKASI PERUBAHAN -->
                   
                   <!-- PELAKSANAAN 2ND QA -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="pelaksanaan2ndQA" class="form-control" style="font-size: 15px; text-align: center">Pelaksanaan 2nd QA</label>
                       </div>
                       <div class="col-md-9 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="changesMade" name="pelaksanaan2ndQA" value="Ada" />
                               <label class="form-check-label" for="changesMade">Ada</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="newProducts" name="pelaksanaan2ndQA" value="Tidak" />
                               <label class="form-check-label" for="newProducts">Tidak</label>
                           </div>
                       </div>
                   </div>
                   <!-- END OF PELAKSANAAN 2ND QA -->
                   
                   <!-- ITEM PERUBAHAN -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="item_perubahan" class="form-control" style="font-size: 15px; text-align: center">Item Perubahan</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="item_perubahan" id="item_perubahan" placeholder="Insert Text (Area Text)" style="text-align: center" />
                       </div>
                   </div>
                   <!-- END OF ITEM PERUBAHAN -->
                   
                   <!-- LEMBAR INSTRUKSI -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="no_lembar_instruksi" class="form-control" style="font-size: 15px; text-align: center">Lembar Instruksi</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="no_lembar_instruksi" id="no_lembar_instruksi" placeholder="Insert Text (Area Text)" style="text-align: center" />
                       </div>
                   </div>
                   <!-- END OF LEMBAR INSTRUKSI -->
                   
                   <!-- PRODUKSI SAAT PERUBAHAN -->
                   <div class="row mb-3">
                       <!-- Left Column -->
                       <div class="col-md-6">
                           <div class="row mb-3">
                               <div class="col-md-6">
                                   <label for="tanggal_produksi_saat_perubahan" class="form-control" style="font-size: 15px; text-align: center">Tanggal Produksi saat Perubahan</label>
                               </div>
                               <div class="col-md-6">
                                   <input class="form-control" type="date" id="tanggal_produksi_saat_perubahan" name="tanggal_produksi_saat_perubahan" />
                               </div>
                           </div>
                       </div>
                       
                       <!-- Right Column -->
                       <div class="col-md-6">
                           <div class="row mb-3">
                               <div class="col-md-6">
                                   <label for="shiftt" class="form-control" style="font-size: 15px; text-align: center">Shiftt</label>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="sift_a" name="shiftt" value="shiftt_a" />
                                       <label class="form-check-label" for="sift_a">Shift A</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="sift_b" name="shiftt" value="shiftt_b" />
                                       <label class="form-check-label" for="sift_b">Shift B</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="sift_c" name="shiftt" value="shiftt_c" />
                                       <label class="form-check-label" for="sift_c">Shift C</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" id="non_shiftt" name="shiftt" value="non_shiftt" />
                                       <label class="form-check-label" for="non_shiftt">Non Shift</label>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- END OF PRODUKSI SAAT PERUBAHAN -->
                   
                   <!-- PART NUMBER FINISH GOOD -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="part_number_finish_good" class="form-control" style="font-size: 15px; text-align: center">Part Number Finish Good</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="part_number_finish_good" id="part_number_finish_good" placeholder="Insert Text (Area Text)" style="text-align: center" />
                           <small class="form-text text-muted">Part number pertama yang diproduksi pertama kali saat terjadi perubahan</small>
                       </div>
                   </div>
                   <!-- END OF PART NUMBER -->
                   
                   <!-- KUALITAS -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="kualitas" class="form-control" style="font-size: 15px; text-align: center">Kualitas</label>
                       </div>
                       <div class="col-md-9 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="kualitasO" name="kualitas" value="O" />
                               <label class="form-check-label" for="kualitasO">OK</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="kualitasX" name="kualitas" value="X" />
                               <label class="form-check-label" for="kualitasX">NG</label>
                           </div>
                       </div>
                   </div>
                   <!-- END OF KUALITAS -->
                   
                   <!-- FAKTA - FAKTA NG -->
                   <div class="row mb-3">
                       <div class="col-md-3">
                           <label for="fakta_ng" class="form-control" style="font-size: 15px; text-align: center">Fakta-Fakta NG</label>
                       </div>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="fakta_ng" id="fakta_ng" placeholder="Insert Text (Area Text)" style="text-align: center" />
                       </div>
                   </div>
                   <!-- END OF FAKTA NG -->
                   
                   <!-- PCDT -->
                   <div class="row g-3">
                       <div class="col-md-3">
                           <label class="form-control" style="font-size: 15px; text-align: center">PCDT</label>
                       </div>
                       <div class="col-md-3 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pcdt_O" name="pcdt" value="O">
                               <label class="form-check-label" for="pcdt_O">Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="pcdt_X" name="pcdt" value="X">
                               <label class="form-check-label" for="pcdt_X">Not Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <input class="form-control" type="date" id="tanggal_perubahan_pcdt" name="tanggal_perubahan_pcdt" />
                       </div>
                   </div>
                   <!-- END OF PCDT -->
                   
                   <!-- INSTRUKSI KERJA -->
                   <div class="row g-3">
                       <div class="col-md-3">
                           <label class="form-control" style="font-size: 15px; text-align: center">Instruksi Kerja</label>
                       </div>
                       <div class="col-md-3 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="instruksi_O" name="instruksi_kerja" value="O">
                               <label class="form-check-label" for="instruksi_O">Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="instruksi_X" name="instruksi_kerja" value="X">
                               <label class="form-check-label" for="instruksi_X">Not Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <input class="form-control" type="date" id="tanggal_perubahan_instruksi_kerja" name="tanggal_perubahan_instruksi_kerja" />
                       </div>
                   </div>
                   <!-- END OF INSTRUKSI KERJA -->
                   
                   <!-- ISIR -->
                   <div class="row g-3">
                       <div class="col-md-3">
                           <label class="form-control" style="font-size: 15px; text-align: center">ISIR</label>
                       </div>
                       <div class="col-md-3 pt-1">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="isir_O" name="isir" value="O">
                               <label class="form-check-label" for="isir_O">Revised</label>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="Isir_X" name="isir" value="X">
                               <label class="form-check-label" for="Isir_X">Not Revised</label>
                           </div>
                       </div>
                   </div>
                       <div>
                        <form>
                            <!-- ISIR -->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="tanggal_perubahan_isir" class="form-control" style="font-size: 15px; text-align: center">Tanggal Perubahan ISIR</label>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="date" id="tanggal_perubahan_isir" name="tanggal_perubahan_isir" />
                                </div>
                            </div>
                            <!-- END OF ISIR -->
                    
                            <!-- PEMAHAMAN BEFORE AFTER -->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-control" style="font-size: 15px; text-align: center">Pemahaman</label>
                                </div>
                                <div class="col-md-3 pt-1">
                                    <input class="form-check-input" type="radio" id="pemahaman_paham" name="pemahaman" value="paham">
                                    <label class="form-check-label" for="pemahaman_paham">Paham</label>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-check-input" type="radio" id="pemahaman_kurangpaham" name="pemahaman" value="kurang paham">
                                    <label class="form-check-label" for="pemahaman_kurangpaham">kurang paham</label>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-check-input" type="radio" id="pemahaman_tidak_sama_sekali" name="pemahaman" value="tidak sama sekali">
                                    <label class="form-check-label" for="pemahaman_tidak_sama_sekali">Tidak sama sekali</label>
                                </div>
                            </div>
                            <!-- END OF BEFORE AFTER -->
                    
                            <!-- ULASAN -->
                            <div class="row mb-3 mt-2">
                                <div class="col-md-3">
                                    <label for="ulasan" class="form-control" style="font-size: 15px; text-align: center">Ulasan</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="ulasan" id="ulasan" placeholder="Insert Text (Area Text)" style="text-align: center" />
                                </div>
                            </div>
                            <!-- END OF ULASAN -->
                    
                            <!-- HANCHOU -->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-control" style="font-size: 15px; text-align: center">Nama Hanchou</label>
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
                            <!-- END OF HANCHOU -->
                    
                            <!-- TOMBOL SUBMIT -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary add_prodak">Draft</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="submitButton" onclick="openModal('modal2')">Save</button>
                            </div>
                        </form>
                    
                        <!-- Modal 2 -->
                        <div class="modal" id="modal2">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Send Email to</h4>
                                        <button type="button" class="close" data-dismiss="modal" onclick="resetModal('addModal')">&times;</button>
                                    </div>
                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <!-- Additional content for Modal 2 -->
                                        <p>Choose an option:</p>
                                        <div class="form-group">
                                            <label for="approvalOption2">Pilih user</label>
                                            <select class="form-control" id="approvalOption" name="approvalOption">
                                                <option value="approve">Approve</option>
                                                <option value="reject">Reject</option>
                                                <option value="hold">Hold</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary add_prodak">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
   </form>
</div>
            
                    