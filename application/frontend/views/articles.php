<div class="all-surajit-blog-all-section">
	<div class="container">
		<div class="row">
<div class="col-md-12">
	<div class="blog-heading-sec">
		<h2>Articles</h2>
	</div>
</div>


<div class="all-blog-conatent-details-section">
<div class="col-md-9">	

              <?php 
              if(count($articles_list)>0){

              foreach($articles_list as $row){?>
			<div class="col-md-6">
				<div class="blog-aritical-per-ful-sec">
					<div class="blog-artical-img-sec">
						<img src="<?php echo base_url();?>assets/uploads/blog/<?php echo @$row->blog_image;?>">
						<div class="atic-post-title">
							<a href="<?php echo $this->url->link(151).'/'.@$row->blog_id; ?>"><h3><?php echo @$row->blog_title;?></h3></a>
						</div>
					</div>
					<div class="blog-artical-content-details">
						<div class="admin-calerder-sec">
							<div class="admin-cland-left">
								<strong><?php echo $date=date('j', strtotime($row->created_on)); ?> <?php echo date('M',strtotime(@$row->created_on));?></strong>
								<p><?php echo date('Y',strtotime(@$row->created_on));?></p>
							</div>
							<div class="admin-calen-right">
								<p><i class="fa fa-user" aria-hidden="true"></i>
 <?php echo @$row->blog_author;?>  <span class="devide-sec"></span> <!-- <i class="fa fa-commenting-o" aria-hidden="true"></i>
 <?php 

 $blog_comment= $this->common_model->common($table_name = 'tbl_blog_comment', $field = array(), $where = array('blog_id'=>$row->blog_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 echo count($blog_comment);

 ?> --> </p>
 <h6><?php echo character_limiter(strip_tags(@$row->blog_description),120) ;?> </h6>
							</div>
						</div>
						<a href="<?php echo $this->url->link(151).'/'.@$row->blog_id; ?>"><div class="read-more-sec">Read More >></div></a>
						<div class="admin-calender-content-details">
						</div>
					</div>
				</div>
			</div>

		<?php } } else{ echo 'Not Found....';}?>


			<!-- <div class="col-md-4">
				<div class="blog-aritical-per-ful-sec">
					<div class="blog-artical-img-sec">
						<img src="<?php echo base_url();?>assets/uploads/service_basket/017945100_1561558083.jpg">
						<div class="atic-post-title">
							<a href="#"><h3>Title of first blog post</h3></a>
						</div>
					</div>
					<div class="blog-artical-content-details">
						<div class="admin-calerder-sec">
							<div class="admin-cland-left">
								<strong>10 AUG</strong>
								<p>2018</p>
							</div>
							<div class="admin-calen-right">
								<p><i class="fa fa-user" aria-hidden="true"></i>
 By Demengo <span class="devide-sec">/</span> <i class="fa fa-commenting-o" aria-hidden="true"></i>
 0</p>
 <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. </h6>
							</div>
						</div>
						<a href="#"><div class="read-more-sec">Read More >></div></a>
						<div class="admin-calender-content-details">
						</div>
					</div>
				</div>
				

			</div>
			<div class="col-md-4">

				<div class="blog-aritical-per-ful-sec">
					<div class="blog-artical-img-sec">
						<img src="<?php echo base_url();?>assets/uploads/service_basket/017945100_1561558083.jpg">
						<div class="atic-post-title">
							<a href="#"><h3>Title of first blog post</h3></a>
						</div>
					</div>
					<div class="blog-artical-content-details">
						<div class="admin-calerder-sec">
							<div class="admin-cland-left">
								<strong>10 AUG</strong>
								<p>2018</p>
							</div>
							<div class="admin-calen-right">
								<p><i class="fa fa-user" aria-hidden="true"></i>
 By Demengo <span class="devide-sec">/</span> <i class="fa fa-commenting-o" aria-hidden="true"></i>
 0</p>
 <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. </h6>
							</div>
						</div>
						<a href="#"><div class="read-more-sec">Read More >></div></a>
						<div class="admin-calender-content-details">
						</div>
					</div>
				</div>
			</div>



			<div class="col-md-4">

				<div class="blog-aritical-per-ful-sec">
					<div class="blog-artical-img-sec">
						<img src="<?php echo base_url();?>assets/uploads/service_basket/017945100_1561558083.jpg">
						<div class="atic-post-title">
							<a href="#"><h3>Title of first blog post</h3></a>
						</div>
					</div>
					<div class="blog-artical-content-details">
						<div class="admin-calerder-sec">
							<div class="admin-cland-left">
								<strong>10 AUG</strong>
								<p>2018</p>
							</div>
							<div class="admin-calen-right">
								<p><i class="fa fa-user" aria-hidden="true"></i>
 By Demengo <span class="devide-sec">/</span> <i class="fa fa-commenting-o" aria-hidden="true"></i>
 0</p>
 <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. </h6>
							</div>
						</div>
						<a href="#"><div class="read-more-sec">Read More >></div></a>
						<div class="admin-calender-content-details">
						</div>
					</div>
				</div>
			</div>



			<div class="col-md-4">

				<div class="blog-aritical-per-ful-sec">
					<div class="blog-artical-img-sec">
						<img src="<?php echo base_url();?>assets/uploads/service_basket/017945100_1561558083.jpg">
						<div class="atic-post-title">
							<a href="#"><h3>Title of first blog post</h3></a>
						</div>
					</div>
					<div class="blog-artical-content-details">
						<div class="admin-calerder-sec">
							<div class="admin-cland-left">
								<strong>10 AUG</strong>
								<p>2018</p>
							</div>
							<div class="admin-calen-right">
								<p><i class="fa fa-user" aria-hidden="true"></i>
 By Demengo <span class="devide-sec">/</span> <i class="fa fa-commenting-o" aria-hidden="true"></i>
 0</p>
 <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. </h6>
							</div>
						</div>
						<a href="#"><div class="read-more-sec">Read More >></div></a>
						<div class="admin-calender-content-details">
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-4">

				<div class="blog-aritical-per-ful-sec">
					<div class="blog-artical-img-sec">
						<img src="<?php echo base_url();?>assets/uploads/service_basket/017945100_1561558083.jpg">
						<div class="atic-post-title">
							<a href="#"><h3>Title of first blog post</h3></a>
						</div>
					</div>
					<div class="blog-artical-content-details">
						<div class="admin-calerder-sec">
							<div class="admin-cland-left">
								<strong>10 AUG</strong>
								<p>2018</p>
							</div>
							<div class="admin-calen-right">
								<p><i class="fa fa-user" aria-hidden="true"></i>
 By Demengo <span class="devide-sec">/</span> <i class="fa fa-commenting-o" aria-hidden="true"></i>
 0</p>
 <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor. </h6>
							</div>
						</div>
						<a href="#"><div class="read-more-sec">Read More >></div></a>
						<div class="admin-calender-content-details">
						</div>
					</div>
				</div>
			</div> -->




		</div>















		<div class="col-md-3">
			<div class="artical-page-all-right-sec">
				<div class="first-section-artical">
					<div class="right-section-heading-se">
						<h4>Search</h4>
					</div>
					<div class="artical-first-sec-form">
						<form class="sea-artical-form" action="<?php echo base_url();?>Manage_articles/search_blog" method="Get">
							<input type="text" name="blog_title" required="" placeholder="Write Your Text">
							<button type="submit" class="artical-search-submit">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<div class="second-section-artical">
					<div class="right-section-heading-se">
						<h4>Recent Post</h4>
					</div>
					<div class="second-sec-all-post-sec">




                        <?php foreach($recent_articles_list as $row){?>

						<div class="all-per-second-post">
							<div class="left-sec-per-post">
								<img src="<?php echo base_url();?>assets/uploads/blog/small/<?php echo @$row->blog_image;?>">
							</div>
							<div class="right-sec-per-post">
								<h6><?php echo character_limiter(strip_tags(@$row->blog_description),40) ;?></h6>
<p><?php echo @$row->blog_author;?> <span class="articla-divide"></span> <!-- <i class="fa fa-commenting-o" aria-hidden="true"></i>
 <?php 

 $recent_blog_comment= $this->common_model->common($table_name = 'tbl_blog_comment', $field = array(), $where = array('blog_id'=>$row->blog_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 echo count($recent_blog_comment);

 ?> --></p>
							</div>
						</div>

					<?php }?>



						<!-- <div class="all-per-second-post">
							<div class="left-sec-per-post">
								<img src="<?php echo base_url();?>assets/uploads/media/001716400_1503384400.png">
							</div>
							<div class="right-sec-per-post">
								<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor.</h6>
<p>By Surajit <span class="articla-divide">/</span> <i class="fa fa-commenting-o" aria-hidden="true"></i>
 0</p>
							</div>
						</div>



						<div class="all-per-second-post">
							<div class="left-sec-per-post">
								<img src="<?php echo base_url();?>assets/uploads/media/001716400_1503384400.png"">
							</div>
							<div class="right-sec-per-post">
								<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor.</h6>
<p>By Surajit <span class="articla-divide">/</span> <i class="fa fa-commenting-o" aria-hidden="true"></i>
 0</p>
							</div>
						</div> -->





					</div>
				</div>









				<div class="artical-right-third-section">
					<div class="right-section-heading-se">
						<h4>Categories List</h4>
					</div>
					<div class="categories-list-all-section-loop">
						<ul>

							<?php foreach($blog_category_list as $row){?>


						<a href="<?php echo $this->url->link(144).'/'.@$row->id; ?>">	<li><i class="fa fa-angle-right" aria-hidden="true"></i>
<span class="categories-left-sec"><?php echo @$row->category_name;?></span>
								<span class="categories-right-sec">(<?php 

 $all_blog= $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('category_id'=>$row->id,'blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 echo count($all_blog);

 ?>)</span>

							</li> </a>

						<?php } ?>




							<!-- <li><i class="fa fa-angle-right" aria-hidden="true"></i>
<span class="categories-left-sec">Official News Uodate</span>
								<span class="categories-right-sec">(4)</span>

							</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i>
<span class="categories-left-sec">Official News Uodate</span>
								<span class="categories-right-sec">(4)</span>

							</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i>
<span class="categories-left-sec">Official News Uodate</span>
								<span class="categories-right-sec">(4)</span>

							</li> -->


						</ul>
					</div>
				</div>
			</div>
		</div>


</div>
</div>
</div>
</div>
