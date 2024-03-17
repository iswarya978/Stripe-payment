<?php
/**
 * @package Stripe :  CodeIgniter Stripe Gateway
 *
 * @author StripePayment Team
 *
 * @email  info@StripePayment.com
 *   
 * Description of Contact Controller
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_model extends CI_Model {
    private $_productID;
    private $_transactionID;
    private $_name;
    private $_email;
    private $_address;
    private $_productName;
    private $_price;
    private $_total;
    private $_currency;
    private $_createdDate;
    private $_modifiedDate;
    private $_status;

    public function setProductID($productID) {
        $this->_productID = $productID;
    }
    public function setTransactionID($transactionID) {
        $this->_transactionID = $transactionID;
    }
    public function setName($name) {
        $this->_name = $name;
    }
    public function setEmail($email) {
        $this->_email = $email;
    }
    public function setAddress($address) {
        $this->_address = $address;
    }
    public function setProductName($productName) {
        $this->_productName = $productName;
    }
    public function setPrice($price) {
        $this->_price = $price;
    }
    public function setTotal($total) {
        $this->_total = $total;
    }
    public function setCurrency($currency) {
        $this->_currency = $currency;
    }
    public function setCreatedDate($createdDate) {
        $this->_createdDate = $createdDate;
    }
    public function setModifiedDate($modifiedDate) {
        $this->_modifiedDate = $modifiedDate;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }
    
    public function getProduct() {
        $this->db->select(array('p.product_id', 'p.name', 'p.description', 'p.price'));
        $this->db->from('product as p');
        $query = $this->db->get();
        return $query->result_array();
    }
    // getProduct Details
    public function getProductDetails() {
        $this->db->select(array('p.product_id', 'p.name', 'p.description', 'p.price'));
        $this->db->from('product as p');
        $this->db->where('p.product_id', $this->_productID);
        $query = $this->db->get();
        return $query->row_array();
    }

    // create Order
    public function createOrder() {
        $data = array(
            'transaction_id' => $this->_transactionID,
            'name' => $this->_name,
            'email' => $this->_email,
            'address' => $this->_address,
            'product_id' => $this->_productID,
            'product_name' => $this->_productName,
            'product_price' => $this->_price,
            'total' => $this->_total,
            'currency' => $this->_currency,
            'created_date' => $this->_createdDate,
            'modified_date' => $this->_modifiedDate,
            'status' => $this->_status,
        );
        $this->db->insert('orders', $data);
        return $last_id = $this->db->insert_id();
    }

        public function get_data()
        {
            

            $query = $this->db->query("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
            $result = $query->result_array();
            return $result;
        }
       

    public function set_data()
    {
        // Selecting columns
        $this->db->select('o.id, o.name, o.transaction_id, o.created_date, o.status, p.price');
        
        // From orders table (alias 'o')
        $this->db->from('orders o');
        
        // Joining with the product table
        $this->db->join('product p', 'o.product_id = p.product_id');
        
        // Execute the query and fetch results
        $query = $this->db->get();
    
        // Check if the query executed successfully
        if ($query) {
            // Fetch the results
            $result = $query->result();
    
            // You can then use $result to work with the retrieved data
            return $result;
        } else {
            // Handle query error
            return false;
        }
    }
    
public function login_user($username, $password) {
    // Retrieve user data from the database based on the provided username
    $user = $this->db->get_where('users', array('username' => $username))->row();
    if ($user) {
        // Verify the password
        if (password_verify($password, $user->password)) {
            return $user; // Return user data if login successful
        }
    }
    return false; // Return false if login failed
}
    

}
