 <?php $this->load->view('templates/header');?>
 <!-- container --> 
  <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2></h2>
      </div>
      
      <span id="success-msg" class="payment-errors"></span>       
      
      <div class="row">
        <?php foreach($productInfo as $key=>$element) { ?>
          <div class="col-lg-3 col-md-3 mb-3">
              <div class="card h-100">
                  <div class="card-body">
                      <h4 class="card-title">
                          <a href="#"><?php print $element['name'];?></a>
                      </h4>
                      <h5>₹<?php print $element['price'];?></h5>
                      <p class="card-text"><?php print $element['description'];?></p>
                  </div>
                  <div class="card-footer text-right">                    
                      <a href="<?php print site_url()?>stripe/checkout/<?php print $element['product_id'];?>" class="add-to-cart btn-success btn btn-sm" data-productid="<?php print $element['product_id'];?>" title="Add to Cart"><i class="fa fa-shopping-cart fa-fw"></i>Subscriptions</a>                    
                  </div>
              </div>
          </div>
      <?php } ?>              
    </div>
    </div>
  </section>
<?php $this->load->view('templates/footer');?>        
