<?php $this->load->view('templates/header');?>
<section class="showcase">
    <div class="container">
        <div class="pb-2 mt-4 mb-2 border-bottom">
            <h2>User Profile</h2>
        </div>      
        <span id="success-msg" class="payment-errors"></span>   
        <body>
            <?php foreach ($records as $record): ?>
                <b>Name</b> :<?php echo $record['name']; ?><br>
                 <b>Mail</b> :<?php echo $record['email']; ?>
            <?php endforeach; ?>
        </body>
    </div>
</section>
<?php $this->load->view('templates/footer');?>
