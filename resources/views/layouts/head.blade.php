<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="description">
<meta content="" name="keywords">
<link href="<?php echo asset('/Admin')?>">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="Admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="Admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="Admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="Admin/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="Admin/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="Admin/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="Admin/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="Admin/css/style.css" rel="stylesheet">
<script src="Admin/js/main.js"></script>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> Warning!!!</h5>
      </div>
      <div class="modal-body">
        Are you sure want to Logout??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="/logout" method="post">
          @csrf
        <button type="submit " class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content modal-input">
      <div class="modal-header modal-head">
        <h5 class="modal-title" id="addDataLabel"> Input Pasien</h5>
      </div>

      <form action="/submit" method="POST" enctype="multipart/form-data">
          @csrf
      <div class="modal-body modal-bd">
        <div class="row">
          <div class="col">
              <div class="card-addData">
                  <div class="card-body-data">
                    <h5 class="card-title addData-h pt-0">Data Diri Pasien</h5>
                    <hr class="int-l">

                    <input type="hidden" name="pengawasan_dokter" value="{{ auth()->user()->name }}">

                    <div class="mb-3 row">
                      <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                      <div class="align-items-end col-sm-8">
                        <input type="text" name="nik" class="form-control int-lbl" id="nik" oninput="numberOnly(this.id);" maxlength="16" required>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Nama Lengkap</label>
                      <div class="align-items-end col-sm-8">
                        <input type="text" name="name" class="form-control int-lbl" id="" required>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                      <div class="align-items-end col-sm-8">
                          <input name="tgl_lahir" type="text" class="form-control int-lbl" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputname" class="col-sm-4 col-form-label">Usia</label>
                        <div class="align-items-end col-sm-8">

                        </div>
                      </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Alamat</label>
                      <div class="align-items-end col-sm-8">
                          <textarea name="address" class="form-control int-lbl" id="exampleFormControlTextarea1" rows="3" required></textarea>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Gender</label>
                      <div class="align-items-end col-sm-8">
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="gender1" value="Laki-laki" required>
                              <label class="form-check-label" for="gender1">
                                Laki-Laki
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="gender2" value="Perempuan" required>
                              <label class="form-check-label" for="gender2">
                                Perempuan
                              </label>
                          </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="card-addData">
                    <div class="card-body">
                      <h5 class="card-title addData-h">Riwayat Sakit</h5>
                      <hr class="int-l">

                      <div class="row">
                        <label for="inputname" class="col-sm-4 col-form-label">HT</label>
                        <div class="align-items-end col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hipertensi" id="hipertensi" value="Yes" required>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <label for="inputname" class="col-sm-4 col-form-label">DM</label>
                        <div class="align-items-end col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="diabetes_melitus" id="diabetes_melitus" value="Yes" required>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <label for="inputname" class="col-sm-4 col-form-label">CKD</label>
                        <div class="align-items-end col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="critical_kidney_disease" id="critical_kidney_disease" value="Yes" required>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <label for="inputname" class="col-sm-4 col-form-label">Stroke</label>
                        <div class="align-items-end col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stroke" id="stroke" value="Yes" required>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <label for="inputname" class="col-sm-4 col-form-label">Lainnya</label>
                        <div class="align-items-end col-sm-8">
                            <div class="align-items-end">
                                <input type="text" name="r_sakit" class="form-control int-lbl" id="" required>
                              </div>
                        </div>
                      </div>

                    </div>

                </div>

          </div>
          <div class="col">
              <div class="card-addData">
                  <div class="card-body">
                    <h5 class="card-title addData-h pt-0">Informasi Pasien</h5>
                    <hr class="int-l">

                    <div class="mb-3 row">
                        <label for="phone_number" class="col-sm-4 col-form-label">Nomor HP</label>
                        <div class="align-items-end col-sm-8">
                          <input type="text" name="phone_number" class="form-control int-lbl" id="phone_number" oninput="numberOnly(this.id);" maxlength="12" required>
                        </div>
                      </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Berat badan</label>
                      <div class="align-items-end col-sm-4">
                        <input type="name" class="form-control int-lbl" id="bb" oninput="numberOnly(this.id);" name="bb" maxlength="3" required>
                      </div>
                      <label for="inputname" class="col-sm-4 col-form-label">Kg</label>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Tinggi Badan</label>
                      <div class="align-items-end col-sm-4">
                        <input type="name" class="form-control int-lbl" id="tb" oninput="numberOnly(this.id);" name="tb" maxlength="3" required>
                      </div>
                      <label for="inputname" class="col-sm-4 col-form-label">cm</label>
                    </div>

                    <div class="col">
                        <label for="inputname" class="col-form-label">Tingkat Pendidikan Terakhir</label>
                        <div class="align-items-end col-sm-6 row">

                            <div class="d-flex flex-column mb-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="p-2">SD <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="t_pendidikan" id="t_pendidikan1" value="Yes" required>
                                        </div>
                                    </div>
                                    <div class="p-2">SMP <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="t_pendidikan" id="t_pendidikan2" value="Yes" required>
                                        </div>
                                    </div>
                                    <div class="p-2">SMA <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="t_pendidikan" id="t_pendidikan3" value="Yes" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col">
                        <label for="inputname" class="col-form-label">Pekerjaan</label>
                        <div class="align-items-end col-sm-10 row">

                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="p-2">PNS <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan1" value="Yes" required>
                                        </div>
                                    </div>
                                    <div class="p-2">Swasta <br>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan2" value="Yes" required>
                                            </div>
                                    </div>
                                    <div class="p-2">Peg. Swasta <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan3" value="Yes" required>
                                        </div>
                                    </div>
                                    <div class="p-2">Wiraswasta <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan4" value="Yes" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                  </div>
                </div>


                <div class="card-addData">
                    <div class="card-body">
                      <h5 class="card-title addData-h pt-0">Lifestyle</h5>
                      <hr class="int-l">

                      <div class="mb-3">

                            <label for="inputname" class="col-form-label">Apakah pasien merokok?</label>
                            <div class="align-items-end row">

                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cigarettes" id="cigarettes1" value="Yes" required>
                                        <label class="form-check-label" for="cigarettes1">
                                            Ya
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cigarettes" id="cigarettes2" value="No" required>
                                        <label class="form-check-label" for="cigarettes2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <label for="inputname" class="col-form-label">Apakah pasien rutin olahraga?</label>
                            <div class="align-items-end row">

                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="olahraga" id="olahraga1" value="Rutin" required>
                                        <label class="form-check-label" for="olahraga1">
                                            Rutin
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="olahraga" id="olahraga2" value="Jarang" required>
                                        <label class="form-check-label" for="olahraga2">
                                            Jarang
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="olahraga" id="olahraga3" value="Tidak" required>
                                        <label class="form-check-label" for="olahraga3">
                                            Tidak
                                        </label>
                                    </div>
                                </div>

                              </div>


                        </div>
                    </div>

                </div>

                    </div>

                    <div class="modal-footer modal-foot">
                        <button type="submit " class="btn btn-int">Save</button>
                </form>
                    <button type="button" class="btn btn-dcl" data-bs-dismiss="modal">Close</button>
                </div>

                </div>


          </div>

        </div>

      </div>

    </div>

