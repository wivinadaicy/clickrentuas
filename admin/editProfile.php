<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Edit Profile</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Edit Profile</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		<form method="post" action="queryeditprofil.php">
<div class="panel-body">
    <div class="form-group">
        <label class="col-sm-3 control-label">ID User <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="text" name="penggunaid" id="penggunaid" class="form-control" value="<?php echo $id ?>" readonly/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="text" name="namalengkap" class="form-control" value="<?php echo $nama ?>" placeholder="eg.: John Doe" required/>
        </div>
    </div>
    <!--<div class="form-group">
        <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" placeholder="eg.: email@email.com" value="<?php echo $email ?>" required/>
            </div>
        </div>
    </div>-->
    <div class="form-group">
        <label class="col-sm-3 control-label">Nomor Hp <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="text" name="nomorhp" class="form-control" value="<?php echo $nohp ?>" placeholder="eg.: John Doe" required/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Jenis Kelamin <span class="required">*</span></label>
        <div class="col-sm-9">
            <div class="radio-custom radio-primary">
                <input id="awesome" name="jk" type="radio" value="l" required <?php if($jk=="l"){echo "checked";} ?> />
                <label for="awesome">Laki-Laki</label>
            </div>
            <div class="radio-custom radio-primary">
                <input id="very-awesome" name="jk" type="radio" value="p" <?php if($jk=="p"){echo "checked";} ?> />
                <label for="very-awesome">Perempuan</label>
            </div>
            <label class="error" for="jk"></label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal Lahir <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="date" name="tanggallahir"  id="jeniskelamin" required  value = "<?php echo $data['tanggal_lahir']?>"  class="form-control" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Company</label>
        <div class="col-sm-9">
            <select name="statuspengguna" id="statuspengguna" class="form-control" required>
            <?php  
                $statusnyah[1]="Super Admin";
                $statusnyah[2]="Admin";
                $statusnyah[3]="Member Dosen";
                $statusnyah[4]="Member Mahasiswa";
                for($i = 1 ; $i <=4 ; $i++){
            ?>
            <option value="<?php echo $data['status_pengguna'] ?>" <?php if($data['status_pengguna']==$i){echo "selected";} ?> > <?php echo $statusnyah[$i] ?></option>
            <?php } ?>
            </select>
            <label class="error" for="company"></label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Alamat <span class="required">*</span></label>
        <div class="col-sm-9">
            <textarea name="alamat" rows="5" class="form-control" placeholder="alamat" required><?php echo $alamat ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
            <input class="btn btn-primary sukses" type="submit" name="simpanprofil" value="Simpan">
        </div>
    </div>
</div>
</form>

		
<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>