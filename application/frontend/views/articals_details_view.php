<div class="artical-details-all-section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="all-artical-details-left-section">
          <div class="artical-details-first-secton">
            <a href="#"><h3><?php echo @$articles_details[0]->blog_title;?></h3></a>
            <p><i class="fa fa-calendar" aria-hidden="true"></i>
 <?php echo $date=date('j', strtotime($articles_details[0]->created_on)); ?> <?php echo date('M',strtotime(@$articles_details[0]->created_on));?> <?php echo date('Y',strtotime(@$articles_details[0]->created_on));?> / <i class="fa fa-user" aria-hidden="true"></i> <?php echo @$articles_details[0]->blog_author;?>  <!-- <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php 

 $blog_comment= $this->common_model->common($table_name = 'tbl_blog_comment', $field = array(), $where = array('blog_id'=>$articles_details[0]->blog_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 echo count($blog_comment);

 ?> --> 

</p>
          </div>
          <div class="artical-details-second-section">
            <div class="articas-details-img-section">
            
             <?php if(@$articles_details[0]->blog_image !=''){?> <img src="<?php echo base_url();?>assets/uploads/blog/large/<?php echo @$articles_details[0]->blog_image;?>">  <?php }?>


          

           <?php echo @$articles_details[0]->blog_description;?>
            </div>
           
          </div>


        </div>
         
      </div>





<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d3023bf9c434ea1"></script>
















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


          



          </div>
        </div>









        <div class="artical-right-third-section">
          <div class="right-section-heading-se">
            <h4>Categories List</h4>
          </div>
          <div class="categories-list-all-section-loop">
            <ul>


              <?php foreach($blog_category_list as $row){?>


            <a href="<?php echo $this->url->link(144).'/'.@$row->id; ?>">  <li><i class="fa fa-angle-right" aria-hidden="true"></i>
<span class="categories-left-sec"><?php echo @$row->category_name;?></span>
                <span class="categories-right-sec">(<?php 

 $all_blog= $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('category_id'=>$row->id,'blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 echo count($all_blog);

 ?>)</span>

              </li></a>

            <?php } ?>




             <!--  <li><i class="fa fa-angle-right" aria-hidden="true"></i>
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

              </li>
              <li><i class="fa fa-angle-right" aria-hidden="true"></i>
<span class="categories-left-sec">Official News Uodate</span>
                <span class="categories-right-sec">(4)</span>

              </li>
 -->

            </ul>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

</div>