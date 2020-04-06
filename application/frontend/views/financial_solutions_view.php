<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>






<div class="blog_section">
  <div class="container">
    <div class="row">
     
      <div class="col-md-12 p-no">
         <div class="nopad test-app courses-area">
            <h2 class="head-title text-center"> Financial Solutions</h2>
            <!-- <p class="financial_info">Having an adequate product basket across different assets classes, risk profiles and by different companies is very crucial to offer holistic, unbiased and need-based structured solutions or strategies to clients. We proud ourselves in providing our clients with a single point, unrestricted access to a rich basket of growing financial & non-financial products.</p> -->

            <?php if(@$financial_solutions_content[0]->content!=''){ echo @$financial_solutions_content[0]->content; }?>
        </div>
        


      </div>

       	<div class="col-md-12 p-no">
          
          <?php foreach($financial_solutions as $row){?>

          <div class="col-md-4 col-sm-6">
            <div class="financial_item"> 
              <div class="sppb-addon-content"><span class="sppb-img-container">
                <img class="sppb-img-responsive" src="<?php echo base_url()?>assets/uploads/financial_solutions/<?php  echo @$row->image; ?>" alt="Mutual Funds" width="60" height="60"></span>
          <h4 class="sppb-addon-title sppb-feature-box-title"><?php if(@$row->title!=''){ echo @$row->title; }?></h4>
          <div class="sppb-addon-text">
          <?php if(@$row->content!=''){ echo @$row->content; }?>
          </div>
          </div>
            </div>
          </div>

        <?php }?>



       		<!-- <div class="col-md-4 col-sm-6">
       			<div class="financial_item"> 
       				<div class="sppb-addon-content"><span class="sppb-img-container">
       					<img class="sppb-img-responsive" src="<?php echo base_url()?>assets/images/financial1.png" alt="Mutual Funds" width="60" height="60"></span>
					<h4 class="sppb-addon-title sppb-feature-box-title">Mutual Funds</h4>
					<div class="sppb-addon-text">
					<p>We have all the mutual fund schemes on offer by virtually all the Asset Management Companies (AMCs) in the country. As a client, you can access any scheme with us, either in physical mode or even in a demat /stock-exchange mode with Trading Account services.</p>
					</div>
					</div>
       			</div>
       		</div>
       		<div class="col-md-4 col-sm-6">
       			<div class="financial_item"> 
       				<div class="sppb-addon-content"><span class="sppb-img-container">
       					<img class="sppb-img-responsive" src="<?php echo base_url()?>assets/images/financial2.png" alt="Mutual Funds" width="60" height="60"></span>
					<h4 class="sppb-addon-title sppb-feature-box-title">CAPITAL MARKET</h4>
					<div class="sppb-addon-text">
					<p>We also offer our clients with NJ E-Wealth A/c services through one of the India's leading & highly reputed distribution houses. With the same you will have easy access to capital market products of direct equity stocks and Exchange Traded Funds (ETFs).</p>
					</div>
					</div>
       			</div>
       		</div>
       		<div class="col-md-4 col-sm-6">
       			<div class="financial_item"> 
       				<div class="sppb-addon-content"><span class="sppb-img-container">
       					<img class="sppb-img-responsive" src="<?php echo base_url()?>assets/images/financial3.png" alt="Mutual Funds" width="60" height="60"></span>
					<h4 class="sppb-addon-title sppb-feature-box-title">FIXED INCOME</h4>
					<div class="sppb-addon-text">
					<p>We also offer clients with diverse fixed income products, namely Non-Convertible Debentures (NCDs), Infrastructure and RBI Bonds, Company Deposits, etc. from some of the leading companies, institutions in India.</p>
					</div>
					</div>
       			</div>
       		</div>
                    <div class="col-md-4 col-sm-6">
            <div class="financial_item"> 
              <div class="sppb-addon-content"><span class="sppb-img-container">
                <img class="sppb-img-responsive" src="<?php echo base_url()?>assets/images/financial6.png" alt="Mutual Funds" width="60" height="60"></span>
          <h4 class="sppb-addon-title sppb-feature-box-title">INSURANCE</h4>
          <div class="sppb-addon-text">
          <p>Experience quality risk advisory and management services with our insurance solutions. We offer the best of risk management advisory available in insurance .</p>
          </div>
          </div>
            </div>
          </div>
       		<div class="col-md-4 col-sm-6">
       			<div class="financial_item"> 
       				<div class="sppb-addon-content"><span class="sppb-img-container">
       					<img class="sppb-img-responsive" src="<?php echo base_url()?>assets/images/financial5.png" alt="Mutual Funds" width="60" height="60"></span>
					<h4 class="sppb-addon-title sppb-feature-box-title">AIF</h4>
					<div class="sppb-addon-text">
					<p>In addition to financial products, we also offer access to real estate properties as investment opportunities to our clients. Few of our products are exclusively offered by us in the market.</p>
					</div>
					</div>
       			</div>
       		</div> -->




       	</div>
    </div>
  </div>
</div>
