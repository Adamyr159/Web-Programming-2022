<?php 
    // include_once 'header.php';
    // include_once 'sidebar.php';

    require_once 'BMIPasien.php';
    require_once 'pasien.php';
    require_once 'BMI.php';

    $pasien1 = new Pasien();
    $pasien1->kode = $_POST['kode'];
    $pasien1->nama = $_POST['name'];
    $pasien1->gender = $_POST['gender'];

    $bmi1 = new BMI($_POST['bb'], $_POST['tb']);
    $bmiPasien1 = new BMIPasien($bmi1, $pasien1);
    $ar_bmi = [$bmiPasien1];


?>  

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <div class="content-wrapper">
        <div class="container ms-3">
        <h2 class="mb-2">Form Hitung BMI</h2>
            <form method="POST" >
                <div class="form-group row">
                    <label for="kode" class="col-4 col-form-label">Kode Pasien</label> 
                    <div class="col-8">
                    <input id="kode" name="kode" placeholder="Masukkan Kode Pasien" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label">Nama Pasien</label> 
                    <div class="col-8">
                    <input id="name" name="name" placeholder="Masukkan Nama Pasien" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Gender</label> 
                    <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="gender" id="gender_0" type="radio" class="custom-control-input" value="Pria"> 
                        <label for="gender_0" class="custom-control-label">Pria</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="gender" id="gender_1" type="radio" class="custom-control-input" value="Wanita"> 
                        <label for="gender_1" class="custom-control-label">Wanita</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bb" class="col-4 col-form-label">Berat Badan</label> 
                    <div class="col-8">
                    <input id="bb" name="bb" placeholder="Masukkan Berat Badan" type="number" class="form-control" aria-describedby="bbHelpBlock"> 
                    <span id="bbHelpBlock" class="form-text text-muted">*kg</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tb" class="col-4 col-form-label">Tinggi Badan</label> 
                    <div class="col-8">
                    <input id="tb" name="tb" placeholder="Masukkan Tinggi Badan" type="number" class="form-control" aria-describedby="tbHelpBlock"> 
                    <span id="tbHelpBlock" class="form-text text-muted">*cm</span>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                
            </form>
            <table class="table table-striped table-hover table-bordered"  cellspacing="0" cellpadding="10">
                
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Periksa</th>
                        <th>Kode Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Gender</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>BMI</th>
                        <th>Status BMI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>15 April 2022</td>
                        <td>A001</td>
                        <td>Adam Yusron</td>
                        <td>Pria</td>
                        <td>55 kg</td>
                        <td>168 cm</td>
                        <td>19.4</td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>15 April 2022</td>
                        <td>A002</td>
                        <td>Aurel</td>
                        <td>Wanita</td>
                        <td>52 kg</td>
                        <td>160 cm</td>
                        <td>20.3</td>
                        <td>Normal</td>
                    </tr>
                    
                    <?php 
                    $no=3;
                    $nilai_bmi_variabel = nilaiBMI();
                    ?>
                    <?php foreach($ar_bmi as $obj){ ?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= date('d F Y');?></td>
                            <td><?= $obj->pasien->kode;?></td>
                            <td><?= $obj->pasien->nama;?></td>
                            <td><?= $obj->pasien->gender;?></td>
                            <td><?= $obj->bmi->bb ." kg";?></td>
                            <td><?= $obj->bmi->tb ." cm";?></td>
                            <td><?= $obj->bmi->number_format(nilaiBMI(), 1);?></td>
                            <td><?= $obj->bmi->statusBMI();?></td>
                        </tr>
                    <?php $no++; }?>
                </tbody>
            </table>             
        </div>  
    </div>
    
<?php include_once 'footer.php';?>


    