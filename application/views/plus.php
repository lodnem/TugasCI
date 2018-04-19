<div class="container">
      <?php echo validation_errors(); ?>
      <?php echo form_open('home_view_form/plus');?>

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
    </div>