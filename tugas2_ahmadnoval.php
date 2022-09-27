<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Memproses Form Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container my-4">

        <div class="row">
            <div class="col-md-3">
                <h3 class="text-center">Form Input Pegawai</h3>
                <div class="my-5">
                    <form id="contactForm" method="POST">
                        <div class="mb-3">
                            <label class="form-label" for="namaPegawai">Nama Pegawai</label>
                            <input class="form-control" name="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="agama">Agama</label>
                            <select class="form-select" name="agama" aria-label="Agama">
                                <option value="" hidden>-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khatolik">Khatolik</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Jabatan</label>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="hidden" name="jabatan" value="" />
                                <input class="form-check-input" id="manager" type="radio" name="jabatan" value="Manager" data-sb-validations="required" />
                                <label class="form-check-label" for="manager">Manager</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" id="asisten" type="radio" name="jabatan" value="Asisten" data-sb-validations="required" />
                                <label class="form-check-label" for="asisten">Asisten</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" id="kabag" type="radio" name="jabatan" value="Kabag" data-sb-validations="required" />
                                <label class="form-check-label" for="kabag">Kabag</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" id="staff" type="radio" name="jabatan" value="Staff" data-sb-validations="required" />
                                <label class="form-check-label" for="staff">Staff</label>
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="jabatan:required">One option is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="hidden" name="status" value="" />
                                <input class="form-check-input" id="menikah" type="radio" name="status" value="Menikah" data-sb-validations="required" />
                                <label class="form-check-label" for="menikah">Menikah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="Belum Menikah" data-sb-validations="required" />
                                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="status:required">One option is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
                            <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="submitButton" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            </div>

            <?php
            error_reporting(0);
            $pegawai = $_POST['namaPegawai'];
            $agama = $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $jmlAnak = $_POST['jumlahAnak'];
            $submit = $_POST['submit'];


            // Gaji
            switch ($jabatan) {
                case 'Manager':
                    $gapok = 20000000;
                    break;
                case 'Asisten':
                    $gapok = 15000000;
                    break;
                case 'Kabag':
                    $gapok = 10000000;
                    break;
                case 'Staff':
                    $gapok = 4000000;
                    break;
                default:
                    $gapok = '';
            }


            // Tunjangan Jabatan
            $tunJab = 0.2 * $gapok;


            // Tunjangan Keluarga
            if ($status == 'Menikah' && $jmlAnak >= 1 && $jmlAnak <= 2) $tunKel = 0.5 * $gapok;
            else if ($status == 'Menikah' && $jmlAnak >= 3 && $jmlAnak <= 5) $tunKel = 0.1 * $gapok;
            else if ($status == 'Menikah' && $jmlAnak >= 6) $tunKel = 0.15 * $gapok;
            else if ($status == 'Belum Menikah') $tunKel = 0;

            if ($tunKel != 0) $tunKelOri = "Rp. " . number_format($tunKel, 0, ',', '.');
            else if ($tunKel == 0) $tunKelOri = "Anda belum dapat Tunjangan Keluarga";


            // Tunjangan Gaji Kotor
            $gator = $gapok + $tunJab + $tunKel;


            // Zakat Profesi
            $zakat = $agama == "Islam" && $gator >= 6000000 ? 0.025 * $gator : 0;


            // Take Home Pay
            $takeHomePay = $gator - $zakat;

            ?>

            <div class="col-md-9">
                <h3 class="text-center">Tabel Gaji Pegawai</h3>
                <div class="my-5">
                    <table class="table table-hover table-striped-columns">
                        <tr class="table-primary">
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Gaji Pokok</th>
                            <th>T. Jabatan</th>
                            <th>T. Keluarga</th>
                            <th>T. Gaji Kotor</th>
                            <th>Zakat Profesi</th>
                            <th>Take Home Pay</th>
                        </tr>
                        <?php if (isset($submit)) : ?>
                            <tr class="table-secondary">
                                <td><?= $pegawai; ?></td>
                                <td><?= $jabatan; ?></td>
                                <td><?= $status; ?></td>
                                <td>Rp. <?= number_format($gapok, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($tunJab, 0, ',', '.'); ?></td>
                                <td><?= $tunKelOri ?></td>
                                <td>Rp. <?= number_format($gator, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($zakat, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($takeHomePay, 0, ',', '.'); ?></td>
                            </tr>
                        <?php endif ?>
                    </table>

                    <h5 class="text-end text-secondary">*Ket: T = Tunjangan</h5>
                </div>
            </div>

        </div>
    </div>



    </div>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>