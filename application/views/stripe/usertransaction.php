<?php $this->load->view('templates/header'); ?>
<!-- container -->
<style>
  /* CSS for the table */
  table {
    border-collapse: collapse; /* Collapse borders into a single border */
    width: 100%;
    margin-top: 73px;
  }

  th, td {
    border: 1px solid #000; /* 1px solid black border for table cells */
    padding: 8px; /* Add padding to cells for better readability */
    text-align: left; /* Align text to the left */
  }

  th {
    background-color: #f2f2f2; /* Background color for table header */
  }
</style>
<section class="showcase">
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>Stripe Payment Gateway Integration in Codeigniter</h2>
    </div>
    <span id="success-msg" class="payment-errors"></span>
    <body>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Transaction ID</th>
          <th>Price</th>
          <th>Created Date</th>
          <th>Status</th>
        </tr>
        <?php foreach ($records1 as $record): ?>
        <tr>
          <td><?php echo $record->id; ?></td>
          <td><?php echo $record->name; ?></td>
          <td><?php echo $record->transaction_id; ?></td>
          <td><?php echo $record->price; ?></td>
          <td><?php echo $record->created_date; ?></td>
          <td><?php echo $record->status; ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </body>
  </div>
</section>
<?php $this->load->view('templates/footer'); ?>
