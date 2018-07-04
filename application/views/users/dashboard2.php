<div class="container">
   <div class="py-5 text-center">
       <h2>Selamat datang <?php echo $user->nama ?> <span class="badge badge-secondary"><?php echo $user->nama_level ?></span></h2>
       <?php echo "<br> ciieelaaaa!"; ?>
       </h2><br><br>
+   		<div class="row">
+   			<div class="col-sm"></div>
+   			<div class="col-sm">
+   				<a href="<?php echo site_url()?>list_Blog/add/">
+	   				<img src="../assets/img/edit.png" class="img-fluid"> <br><br>
+		   			<h4>Create News</h4>
+	   			</a>
+   			</div>
+	   		<div class="col-sm"></div>
+	    </div>
   </div>
</div>