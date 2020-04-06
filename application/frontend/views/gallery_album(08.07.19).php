<div class="gallery-album-all-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<div class="gallery-album-heading-text">
				<h3>Gallery Album</h3>
			</div>
		</div>

		<?php foreach($gallery_category_list as $row){?>
		<div class="col-md-4">
		<a href="<?php echo $this->url->link(145).'/'.@$row->cat_id; ?>">
			<div class="album-section-all-details">
			<div class="album-all-images-with-content">
				<div class="img-section-album">
				<img src="<?php echo base_url();?>assets/uploads/category/<?php echo @$row->cat_image;?>">
				</div>
				<div class="album-above-images">
					<?php echo @$row->cat_name;?>
				</div>

			</div>
		</div>
			</a>
		</div>

	<?php }?>




	<!-- <div class="col-md-4">
		<a href="<?php echo $this->url->link(145); ?> ">
			<div class="album-section-all-details">
			<div class="album-all-images-with-content">
				<div class="img-section-album">
					<img src="<?php echo base_url();?>assets/uploads/media/001716400_1503384400.png">
				</div>
				<div class="album-above-images">
					Album Name
				</div>

			</div>
		</div>
			</a>
		</div>


	<div class="col-md-4">
		<a href="<?php echo $this->url->link(145); ?> ">
			<div class="album-section-all-details">
			<div class="album-all-images-with-content">
				<div class="img-section-album">
					<img src="<?php echo base_url();?>assets/uploads/media/001716400_1503384400.png">
				</div>
				<div class="album-above-images">
					Album Name
				</div>

			</div>
		</div>
		</a>
		</div> -->
	


</div>
</div>
</div>