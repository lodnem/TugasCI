<!doctype html>
<html lang="en">
<head>
	<base href="<?=base_url()?>">
	<meta charset="UTF-8">
	<title>Add Blog</title>
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css">
 	<script src="<?php echo base_url()?>assets/css/bootstrap.js" type="text/javascript"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">My Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="myweb">Home</a></li>
            <li><a href="myweb/profil">About</a></li>
            <li class="active"><a href="blog">Blog</a></li>
            <li><a href="teman">Friends</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>

<div class="container">

	
	<?php    
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
     ?> 
      <?php echo validation_errors(); ?>
      <?php echo form_open('list_blog/add');?>
<center>
      <table>
        <tr>
          <td><font color="black">Judul</font></td>
          <td>:</td>
          <td><input type="text" name="judul_blog" value="<?php echo set_value('judul_blog'); ?>"></td>
        </tr>
        <tr>
          <td><font color="black">Content</font></td>
          <td>:</td>
          <td><input type="text" name="tanggal_blog" value="<?php echo set_value('tanggal_blog'); ?>" ></td>
        </tr>
        <tr>
          <td><font color="black">Tanggal</font> </td>
          <td>:</td>
          <td><input type="date" name="content" value="<?php echo set_value('content'); ?>"></td>
        </tr>
        <tr>
          <td><font color="black">Gambar</font></td>
          <td>:</td>
          <td><input type="file" name="gambar_blog" value="<?php echo set_value('gambar_blog'); ?>"></td>
        </tr>
        <tr>
          <td><font color="black">Email</font></td>
          <td>:</td>
          <td><input type="text" name="Email" value="<?php echo set_value('Email'); ?>" ></td>
        </tr>
        <tr>
          <td><font color="black">Pengarang</font></td>
          <td>:</td>
          <td><input type="text" name="Pengarang" value="<?php echo set_value('Pengarang'); ?>" ></td>
        </tr>
        <tr>
          <td><font color="black">Sumber</font></td>
          <td>:</td>
          <td><input type="text" name="Sumber" value="<?php echo set_value('Sumber'); ?>" ></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="simpan" value="Tambah"></td>
        </tr>
      </table>
      </form>
    </div>
    </center>


		</form>
	</div>
</body>
</html>