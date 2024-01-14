@extends('../layout.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Histori Perubahan Proses dan Perubahan Desain</h1>
    </div>

    {{-- SEARCH BUTTON--}}
    <form class="row g-3 align-items-center mb-3" style="size: 10px" method="POST" action="#">
      <div class="col-6"> {{--Search Line--}}
          <div class="input-group">
              <span class="input-group-text" id="inputGroup-sizing-default1" style="font-size: 13px;">Search Line</span>
              <select class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default1" style="font-size: 13px;">
                  <option selected>Pilih Line</option>
                  <!-- Tambahkan opsi di sini -->
                  <option value="1">Line 1</option>
                  <option value="2">Line 2</option>
                  <option value="3">Line 3</option>
                  <option value="4">Line 4</option>
                  <option value="5">Line 5</option>
                  <option value="6">Line 6</option>
                  <option value="7">Line 7</option>
                  <option value="8">Line 8</option>
                  <option value="9">Line 9</option>
                  <option value="10">Line 10</option>
                  <option value="11">Line 11</option>
                  <option value="12">Line 12</option>
                  <option value="13">Line 13</option>
              </select>
          </div>
      </div>
      <div class="col-6"></div>
      <div class="col"> {{--Tanggal perubahan--}}
          <div class="input-group">
              <span class="input-group-text" id="inputGroup-sizing-default2" style="font-size: 13px;">Tanggal Perubahan</span>
              <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default2" style="font-size: 13px;" />
          </div>
      </div>
      <div class="col"> {{--Part Number--}}
          <div class="input-group">
              <span class="input-group-text" id="inputGroup-sizing-default3" style="font-size: 13px;">Part Number</span>
              <input type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default3" style="font-size: 13px;" />
          </div>
      </div>
      <div class="col">
          <div class="input-group">
              <span class="input-group-text" id="inputGroup-sizing-default4" style="font-size: 13px;">Nama Perubahan</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default4" style="font-size: 13px;" />
          </div>
      </div>
      <div class="col-auto">
          <button type="submit" class="btn btn-primary" title="SEARCH">
              <i class="bi bi-search"></i>
          </button>
      </div>
  </form>

    <div class="d-flex mb-3 justify-content-end gap-3">
        <a href="" class="btn btn-success d-inline-block mr-2 bi-download" data-bs-toggle="modal" data-bs-target="#export"> Download</a>
        @php
        $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
        @endphp
        @if($role == 'hanchou')
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">add</a>
        @endif
    </div>

    <div class="card">
      <div class="card-body">
          <div class="table-responsive mt-3">
              <h5 class="card-title">REQUEST LIST</h5>
              <div class="datatable-container">
                  <table class="table datatable">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Pelaksanaan 2nd QA</th>
                              <th scope="col">id_line</th>
                              <th scope="col">Klasifikasi perubahan</th>
                              <th scope="col">No Lembar Instruksi</th>
                              <th scope="col">Item Perubahan</th>
                              <th scope="col">Nama proses</th>
                              <th scope="col">Tanggal Produksi Saat Perubahan</th>
                              <th scope="col">Part Number Finish Good</th>
                              <th scope="col">Kualitas</th>
                              <th scope="col">Fakta NG</th>
                              <th scope="col">PCDT</th>
                              <th scope="col">Tanggal Perubahan PCDT</th>
                              <th scope="col">IK</th>
                              <th scope="col">Tanggal Perubahan IK</th>
                              <th scope="col">ISIR</th>
                              <th scope="col">Tanggal Perubahan ISIR</th>
                              <th scope="col">Pemahaman</th>
                              <th scope="col">Ulasan</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($prodaks as $row=>$prodak)
                          @php
                              $status = $prodak->status;
                              $status_gm = $prodak->status_gm;
                              $id = $prodak->id;
                              $reject_kakaricho = $prodak->reject_kakaricho;
                              $reject_mng_mfg = $prodak->reject_mng_mfg;
                              $reject_mng_qc = $prodak->reject_mng_qc;
                              $reject_gm = $prodak->reject_gm;
                              $nama_proses = $prodak->nama_proses;
                              $line = $lines->where('id_line', $prodak->id_line)->first();
                               // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                          @endphp
                          @if ($nama_proses != 'hidden')
                              @if($role == 'hanchou')
                              <tr>
                                  <th scope="row">{{$row+1 -1}}</th>
                                  <td>{{$prodak->pelaksanaan2ndQA}}</td>
                                  <td>{{$line ? $line->nama_line : ''}}</td>
                                  <td>{{$prodak->klasifikasi_perubahan}}</td>
                                  <td>{{$prodak->no_lembar_instruksi}}</td>
                                  <td>{{$prodak->item_perubahan}}</td>
                                  <td>{{$prodak->nama_proses}}</td>
                                  <td>{{$prodak->tanggal_produksi_saat_perubahan}}</td>
                                  <td>{{$prodak->part_number_finish_good}}</td>
                                  <td>{{$prodak->kualitas}}</td>
                                  <td>{{$prodak->fakta_ng}}</td>
                                  <td>{{$prodak->pcdt}}</td>
                                  <td>{{$prodak->tanggal_perubahan_pcdt}}</td>
                                  <td>{{$prodak->instruksi_kerja}}</td>
                                  <td>{{$prodak->tanggal_perubahan_instruksi_kerja}}</td>
                                  <td>{{$prodak->isir}}</td>
                                  <td>{{$prodak->tanggal_perubahan_isir}}</td>
                                  <td>{{$prodak->pemahaman}}</td>
                                  <td>{{$prodak->ulasan}}</td>
                                  <td>
                                      <div class="d-flex justify-content-between" style="width: 100px">
                                          <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                          @php
                                          $status = $prodak->status;
                                          $status_gm = $prodak->status_gm;
                                          $reject_kakaricho = $prodak->reject_kakaricho;
                                          $reject_mng_mfg = $prodak->reject_mng_mfg;
                                          $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                          @endphp
                                          @if($role == 'hanchou' && $status !== 'active' or $reject_kakaricho !== null)
                                          <a href="#" class="btn btn-warning btn-sm updateProdakForm" id="updateButton" data-bs-toggle="modal" data-bs-target="#updateModal"  data-title="Update Prodak" data-id="{{ $prodak->id }}" data-nama_proses="{{ $prodak->nama_proses }}" data-klasifikasi_perubahan="{{ $prodak->klasifikasi_perubahan }}" data-pelaksanaan2ndQA="{{ $prodak->pelaksanaan2ndQA }}" data-item_perubahan="{{ $prodak->item_perubahan }}" data-no_lembar_instruksi="{{ $prodak->no_lembar_instruksi }}" data-tanggal_produksi_saat_perubahan="{{ $prodak->tanggal_produksi_saat_perubahan }}" data-shiftt="{{ $prodak->shiftt }}" data-part_number_finish_good="{{ $prodak->part_number_finish_good }}" data-kualitas="{{ $prodak->kualitas }}" data-fakta_ng="{{ $prodak->fakta_ng }}" data-pcdt="{{ $prodak->pcdt }}" data-tanggal_perubahan_pcdt="{{ $prodak->tanggal_perubahan_pcdt }}" data-instruksi_kerja="{{ $prodak->instruksi_kerja }}" data-tanggal_perubahan_instruksi_kerja="{{ $prodak->tanggal_perubahan_instruksi_kerja }}" data-isir="{{ $prodak->isir }}" data-tanggal_perubahan_isir="{{ $prodak->tanggal_perubahan_isir }}" data-ulasan="{{ $prodak->ulasan }}" data-pemahaman="{{ $prodak->pemahaman }}">
                                              <i class="fas fa-edit"></i>
                                          </a>
                                          @endif
                                          @php
                                          $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                          $status = $prodak->status;
                                          $status_mng_mfg = $prodak->status_mng_mfg;
                                          @endphp
                                         @if($role == 'hanchou' && $status !== 'active' or $reject_kakaricho !== null)
                                          <a href="#" class="btn btn-danger btn-sm delete_prodak" data-id="{{ $prodak->id }}"><i class="fas fa-trash"></i> </a>
                                          @endif
                                      </div>
                                  </td>
                              </tr>
                              @endif
                          @endif
                          @if ($nama_proses != 'hidden')
                              @if($role == 'kakaricho')
                              <tr>
                                  <th scope="row">{{$row+1-1}}</th>
                                  <td>{{$prodak->pelaksanaan2ndQA}}</td>
                                  <td>{{$prodak->id_line}}</td>
                                  <td>{{$prodak->klasifikasi_perubahan}}</td>
                                  <td>{{$prodak->no_lembar_instruksi}}</td>
                                  <td>{{$prodak->item_perubahan}}</td>
                                  <td>{{$prodak->nama_proses}}</td>
                                  <td>{{$prodak->tanggal_produksi_saat_perubahan}}</td>
                                  <td>{{$prodak->part_number_finish_good}}</td>
                                  <td>{{$prodak->kualitas}}</td>
                                  <td>{{$prodak->fakta_ng}}</td>
                                  <td>{{$prodak->pcdt}}</td>
                                  <td>{{$prodak->tanggal_perubahan_pcdt}}</td>
                                  <td>{{$prodak->instruksi_kerja}}</td>
                                  <td>{{$prodak->tanggal_perubahan_instruksi_kerja}}</td>
                                  <td>{{$prodak->isir}}</td>
                                  <td>{{$prodak->tanggal_perubahan_isir}}</td>
                                  <td>{{$prodak->pemahaman}}</td>
                                  <td>{{$prodak->ulasan}}</td>
                                  <td>
                                      <div class="d-flex justify-content-between" style="width: 100px">
                                          <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                          @php
                                          $status = $prodak->status;
                                          $reject_kakaricho = $prodak->reject_kakaricho;
                                          $reject_mng_mfg = $prodak->reject_mng_mfg;
                                          $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                          @endphp
                                          @php
                                          $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                          $status = $prodak->status;
                                          $status_mng_mfg = $prodak->status_mng_mfg;
                                          @endphp
                                          @if($role == 'kakaricho' && $status !== 'active' && $reject_kakaricho == null or $reject_kakaricho !== null or $reject_mng_mfg !== null)
                                              <!-- Tombol kedua untuk approval -->
                                              <a href="#" class="btn btn-primary btn-sm approvalProdakForm" data-bs-toggle="modal" data-bs-target="#approveModal" data-action="approve" data-title="Approval Prodak" data-id="{{ $prodak->id }}" data-nama_proses="{{ $prodak->nama_proses }}" data-klasifikasi_perubahan="{{ $prodak->klasifikasi_perubahan }}" data-pelaksanaan2ndQA="{{ $prodak->pelaksanaan2ndQA }}" data-item_perubahan="{{ $prodak->item_perubahan }}" data-no_lembar_instruksi="{{ $prodak->no_lembar_instruksi }}" data-tanggal_produksi_saat_perubahan="{{ $prodak->tanggal_produksi_saat_perubahan }}" data-shiftt="{{ $prodak->shiftt }}" data-part_number_finish_good="{{ $prodak->part_number_finish_good }}" data-kualitas="{{ $prodak->kualitas }}" data-fakta_ng="{{ $prodak->fakta_ng }}" data-pcdt="{{ $prodak->pcdt }}" data-tanggal_perubahan_pcdt="{{ $prodak->tanggal_perubahan_pcdt }}" data-instruksi_kerja="{{ $prodak->instruksi_kerja }}" data-tanggal_perubahan_instruksi_kerja="{{ $prodak->tanggal_perubahan_instruksi_kerja }}" data-isir="{{ $prodak->isir }}" data-tanggal_perubahan_isir="{{ $prodak->tanggal_perubahan_isir }}" data-ulasan="{{ $prodak->ulasan }}" data-pemahaman="{{ $prodak->pemahaman }}" data-reject_kakaricho="{{ $prodak->reject_kakaricho }}">
                                                  <i class="fas fa-check"></i> 
                                              </a>
                                          @elseif ($role == 'kakaricho' && $status !== 'active' )
                                          @endif
                                      </div>
                                  </td>
                              </tr>
                              @endif
                          @endif
                          @if($role == 'mng_mfg' && $status == 'active')
                          <tr>
                              <th scope="row">{{$row+1}}</th>
                              <td>{{$prodak->pelaksanaan2ndQA}}</td>
                              <td>{{$prodak->id_line}}</td>
                              <td>{{$prodak->klasifikasi_perubahan}}</td>
                              <td>{{$prodak->no_lembar_instruksi}}</td>
                              <td>{{$prodak->item_perubahan}}</td>
                              <td>{{$prodak->nama_proses}}</td>
                              <td>{{$prodak->tanggal_produksi_saat_perubahan}}</td>
                              <td>{{$prodak->part_number_finish_good}}</td>
                              <td>{{$prodak->kualitas}}</td>
                              <td>{{$prodak->fakta_ng}}</td>
                              <td>{{$prodak->pcdt}}</td>
                              <td>{{$prodak->tanggal_perubahan_pcdt}}</td>
                              <td>{{$prodak->instruksi_kerja}}</td>
                              <td>{{$prodak->tanggal_perubahan_instruksi_kerja}}</td>
                              <td>{{$prodak->isir}}</td>
                              <td>{{$prodak->tanggal_perubahan_isir}}</td>
                              <td>{{$prodak->pemahaman}}</td>
                              <td>{{$prodak->ulasan}}</td>
                          
                              <td>
                                  <div class="d-flex justify-content-between" style="width: 100px">
                                      <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                      @php
                                      $status = $prodak->status;
                                      $reject_kakaricho = $prodak->reject_kakaricho;
                                      $reject_mng_mfg = $prodak->reject_mng_mfg;
                                      $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                      @endphp
                                      @php
                                      $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                      $status = $prodak->status;
                                      $status_mng_mfg = $prodak->status_mng_mfg;
                                      @endphp
                                      @if($role == 'mng_mfg' && $status_mng_mfg !== 'active' && $reject_mng_mfg == null or $reject_mng_mfg !== null or $reject_mng_qc !== null)
                                      <!-- Tombol kedua untuk approval -->
                                      <a href="#" class="btn btn-primary btn-sm approvalProdakForm" data-bs-toggle="modal" data-bs-target="#approveModal" data-action="approve" data-title="Approval Prodak" data-id="{{ $prodak->id }}" data-nama_proses="{{ $prodak->nama_proses }}" data-klasifikasi_perubahan="{{ $prodak->klasifikasi_perubahan }}" data-pelaksanaan2ndQA="{{ $prodak->pelaksanaan2ndQA }}" data-item_perubahan="{{ $prodak->item_perubahan }}" data-no_lembar_instruksi="{{ $prodak->no_lembar_instruksi }}" data-tanggal_produksi_saat_perubahan="{{ $prodak->tanggal_produksi_saat_perubahan }}" data-shiftt="{{ $prodak->shiftt }}" data-part_number_finish_good="{{ $prodak->part_number_finish_good }}" data-kualitas="{{ $prodak->kualitas }}" data-fakta_ng="{{ $prodak->fakta_ng }}" data-pcdt="{{ $prodak->pcdt }}" data-tanggal_perubahan_pcdt="{{ $prodak->tanggal_perubahan_pcdt }}" data-instruksi_kerja="{{ $prodak->instruksi_kerja }}" data-tanggal_perubahan_instruksi_kerja="{{ $prodak->tanggal_perubahan_instruksi_kerja }}" data-isir="{{ $prodak->isir }}" data-tanggal_perubahan_isir="{{ $prodak->tanggal_perubahan_isir }}" data-ulasan="{{ $prodak->ulasan }}" data-pemahaman="{{ $prodak->pemahaman }}" data-reject_kakaricho="{{ $prodak->reject_kakaricho }}">
                                          <i class="fas fa-check"></i> 
                                      </a>
                                      @endif
                                      @php
                                      $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                      @endphp
                                  </div>
                              </td>
                          </tr>
                          @endif
                          @php
                          $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                          $status_mng_mfg = $prodak->status_mng_mfg;
                          @endphp
                          @if($role == 'mng_qc' && $status_mng_mfg == 'active')
                          <tr>
                              <th scope="row">{{$row+1}}</th>
                              <td>{{$prodak->pelaksanaan2ndQA}}</td>
                              <td>{{$prodak->id_line}}</td>
                              <td>{{$prodak->klasifikasi_perubahan}}</td>
                              <td>{{$prodak->no_lembar_instruksi}}</td>
                              <td>{{$prodak->item_perubahan}}</td>
                              <td>{{$prodak->nama_proses}}</td>
                              <td>{{$prodak->tanggal_produksi_saat_perubahan}}</td>
                              <td>{{$prodak->part_number_finish_good}}</td>
                              <td>{{$prodak->kualitas}}</td>
                              <td>{{$prodak->fakta_ng}}</td>
                              <td>{{$prodak->pcdt}}</td>
                              <td>{{$prodak->tanggal_perubahan_pcdt}}</td>
                              <td>{{$prodak->instruksi_kerja}}</td>
                              <td>{{$prodak->tanggal_perubahan_instruksi_kerja}}</td>
                              <td>{{$prodak->isir}}</td>
                              <td>{{$prodak->tanggal_perubahan_isir}}</td>
                              <td>{{$prodak->pemahaman}}</td>
                              <td>{{$prodak->ulasan}}</td>
                          
                              <td>
                                  <div class="d-flex justify-content-between" style="width: 100px">
                                      <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                      @php
                                      $status = $prodak->status;
                                      $reject_kakaricho = $prodak->reject_kakaricho;
                                      $reject_mng_mfg = $prodak->reject_mng_mfg;
                                      $reject_mng_qc = $prodak->reject_mng_qc;
                                      $status_mng_qc = $prodak->status_mng_qc;
                                      $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                      @endphp
                                      
                                      @if($role == 'mng_qc' && $status_mng_qc !== 'active' && $reject_mng_qc == null or $reject_mng_qc !== null or $reject_gm !== null)
                                      <!-- Tombol kedua untuk approval -->
                                      <a href="#" class="btn btn-primary btn-sm approvalProdakForm" data-bs-toggle="modal" data-bs-target="#approveModal" data-action="approve" data-title="Approval Prodak" data-id="{{ $prodak->id }}" data-nama_proses="{{ $prodak->nama_proses }}" data-klasifikasi_perubahan="{{ $prodak->klasifikasi_perubahan }}" data-pelaksanaan2ndQA="{{ $prodak->pelaksanaan2ndQA }}" data-item_perubahan="{{ $prodak->item_perubahan }}" data-no_lembar_instruksi="{{ $prodak->no_lembar_instruksi }}" data-tanggal_produksi_saat_perubahan="{{ $prodak->tanggal_produksi_saat_perubahan }}" data-shiftt="{{ $prodak->shiftt }}" data-part_number_finish_good="{{ $prodak->part_number_finish_good }}" data-kualitas="{{ $prodak->kualitas }}" data-fakta_ng="{{ $prodak->fakta_ng }}" data-pcdt="{{ $prodak->pcdt }}" data-tanggal_perubahan_pcdt="{{ $prodak->tanggal_perubahan_pcdt }}" data-instruksi_kerja="{{ $prodak->instruksi_kerja }}" data-tanggal_perubahan_instruksi_kerja="{{ $prodak->tanggal_perubahan_instruksi_kerja }}" data-isir="{{ $prodak->isir }}" data-tanggal_perubahan_isir="{{ $prodak->tanggal_perubahan_isir }}" data-ulasan="{{ $prodak->ulasan }}" data-pemahaman="{{ $prodak->pemahaman }}" data-reject_kakaricho="{{ $prodak->reject_kakaricho }}">
                                          <i class="fas fa-check"></i> 
                                      </a>
                                      @endif
                                      @php
                                      $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                      @endphp                                                                        
                                  </div>
                              </td>
                          </tr>
                          @endif
                          @php
                          $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                          $status_mng_qc = $prodak->status_mng_qc;
                          @endphp
                          @if($role == 'gm' && $status_mng_qc == 'active')
                          <tr>
                              <th scope="row">{{$row+1}}</th>
                              <td>{{$prodak->pelaksanaan2ndQA}}</td>
                              <td>{{$prodak->id_line}}</td>
                              <td>{{$prodak->klasifikasi_perubahan}}</td>
                              <td>{{$prodak->no_lembar_instruksi}}</td>
                              <td>{{$prodak->item_perubahan}}</td>
                              <td>{{$prodak->nama_proses}}</td>
                              <td>{{$prodak->tanggal_produksi_saat_perubahan}}</td>
                              <td>{{$prodak->part_number_finish_good}}</td>
                              <td>{{$prodak->kualitas}}</td>
                              <td>{{$prodak->fakta_ng}}</td>
                              <td>{{$prodak->pcdt}}</td>
                              <td>{{$prodak->tanggal_perubahan_pcdt}}</td>
                              <td>{{$prodak->instruksi_kerja}}</td>
                              <td>{{$prodak->tanggal_perubahan_instruksi_kerja}}</td>
                              <td>{{$prodak->isir}}</td>
                              <td>{{$prodak->tanggal_perubahan_isir}}</td>
                              <td>{{$prodak->pemahaman}}</td>
                              <td>{{$prodak->ulasan}}</td>
                          
                              <td>
                                  <div class="d-flex justify-content-between" style="width: 100px">
                                      <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                      @php
                                      $status = $prodak->status;
                                      $reject_kakaricho = $prodak->reject_kakaricho;
                                      $reject_mng_mfg = $prodak->reject_mng_mfg;
                                      $reject_gm = $prodak->reject_gm;
                                      $status_gm = $prodak->status_gm;
                                      $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                      @endphp
                                      
                                      @if($role == 'gm' && $status_gm !== 'active' && $reject_gm == null or $reject_gm !== null)
                                      <!-- Tombol kedua untuk approval -->
                                      <a href="#" class="btn btn-primary btn-sm approvalProdakForm" data-bs-toggle="modal" data-bs-target="#approveModal" data-action="approve" data-title="Approval Prodak" data-id="{{ $prodak->id }}" data-nama_proses="{{ $prodak->nama_proses }}" data-klasifikasi_perubahan="{{ $prodak->klasifikasi_perubahan }}" data-pelaksanaan2ndQA="{{ $prodak->pelaksanaan2ndQA }}" data-item_perubahan="{{ $prodak->item_perubahan }}" data-no_lembar_instruksi="{{ $prodak->no_lembar_instruksi }}" data-tanggal_produksi_saat_perubahan="{{ $prodak->tanggal_produksi_saat_perubahan }}" data-shiftt="{{ $prodak->shiftt }}" data-part_number_finish_good="{{ $prodak->part_number_finish_good }}" data-kualitas="{{ $prodak->kualitas }}" data-fakta_ng="{{ $prodak->fakta_ng }}" data-pcdt="{{ $prodak->pcdt }}" data-tanggal_perubahan_pcdt="{{ $prodak->tanggal_perubahan_pcdt }}" data-instruksi_kerja="{{ $prodak->instruksi_kerja }}" data-tanggal_perubahan_instruksi_kerja="{{ $prodak->tanggal_perubahan_instruksi_kerja }}" data-isir="{{ $prodak->isir }}" data-tanggal_perubahan_isir="{{ $prodak->tanggal_perubahan_isir }}" data-ulasan="{{ $prodak->ulasan }}" data-pemahaman="{{ $prodak->pemahaman }}" data-reject_kakaricho="{{ $prodak->reject_kakaricho }}">
                                  
                                          <i class="fas fa-check"></i> 
                                      </a>                                        
                                      @endif
                                      @php
                                      $role = auth()->user()->role; // Mendapatkan nilai 'role' dari pengguna yang sedang diotentikasi
                                      @endphp                                                                        
                                  </div>
                              </td>
                          </tr>
                          @endif
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
     @include('prodaks.update')
  </div>


    @include('prodaks.approve')

    <script src="assets/js/main.js"></script>
</main>
@include('prodaks.add')
@endsection
