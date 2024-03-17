<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class StripePayment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load library  
        $this->load->model('Payment_model', 'payment'); 
        $this->load->library('session');
    }   
    // index method
    public function index() {
        $data = array();
        $data['metaDescription'] = '';
        $data['metaKeywords'] = '';
        $data['title'] = " Socxo";
        $data['breadcrumbs'] = array('Stripe Payment Gateway' => '#');
        $data['productInfo'] = $this->payment->getProduct();  
        $this->load->view('stripe/index', $data);
    }

    public function login() {
        // Check if the user is already logged in
        if ($this->session->userdata('user_id')) {
            // If logged in, redirect to the index or main page with base URL
            redirect(base_url('StripePayment/index'));
        } else {
            // If not logged in, load the login view
            $this->load->view('stripe/login_view');
        }
    }
    

    public function logout() {
        // Destroy session and log the user out
        $this->session->unset_userdata('user_id');
        redirect('StripePayment/login');
    }


    public function register() {
        // Check if the user is already logged in
        if ($this->session->userdata('user_id')) {
            // If logged in, redirect to the index or main page
            redirect('StripePayment/index');
        } else {
            // If not logged in, load the register view
            $this->load->view('stripe/register_view');
        }
    }

    public function register_user() {
        // Process registration form submission
        // For example:
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // Perform validation and registration logic
        // After successful registration, you can redirect the user to the login page
        redirect('StripePayment/login');
    }
    
    // checkout page
    public function checkout($id) {
        $data = array();
        $data['metaDescription'] = '';
        $data['metaKeywords'] = '';
        $data['title'] = " Socxo";

        $this->payment->setProductID($id);
        $data['itemInfo'] = $this->payment->getProductDetails();
        $this->load->view('stripe/checkout', $data);    
    }
    // callback method
    public function callback() {
        $data = array();   
        $statusMsg =''; 
        if(!empty($this->input->post('stripeToken'))) {            
            $amount = $this->input->post('amount');
            $product_id = $this->input->post('product_id');
            $product_name = $this->input->post('product_name');
            $name = $this->input->post('stripe_name');
            $email = $this->input->post('stripe_email');
            $address = 'Test 15 Street, New York, USA';
            $params = array(
                'amount' => $amount * 100,
                'currency' => CURRENCY_CODE,
                'description' => 'Charge for '.$email,
                'source' => 'tok_visa',
                'metadata' => array( 
                    'product_id' => $product_id,
                )
            );
            $jsonData = $this->get_curl_handle($params);
            $resultJson = json_decode($jsonData, true);
            if($resultJson['amount_refunded'] == 0 && empty($resultJson['failure_code']) && $resultJson['paid'] == 1 && $resultJson['captured'] == 1){ 
            // Order details  
            $transactionID = $resultJson['balance_transaction']; 
            $currency = $resultJson['currency']; 
            $payment_status = $resultJson['status'];

             // Insert tansaction data into the database 
             $this->payment->setTransactionID($transactionID); 
             $this->payment->setProductID($product_id); 
             $this->payment->setProductName($product_name); 
             $this->payment->setName($name); 
             $this->payment->setEmail($email); 
             $this->payment->setAddress($address); 
             $this->payment->setPrice($amount); 
             $this->payment->setTotal($amount); 
             $this->payment->setCurrency($currency); 
             $this->payment->setCreatedDate(time()); 
             $this->payment->setModifiedDate(time()); 
             $this->payment->setStatus($payment_status); 
             $orderID = $this->payment->createOrder(); 

             // If the order is successful 
            if($payment_status == 'succeeded') { 
                $statusMsg .= '<h2>Thanks for your Order!</h2>';
                $statusMsg .= '<h4>The transaction was successful. Order details are given below:</h4>';
                $statusMsg .= "<p>Order Number: {$orderID}</p>";
                $statusMsg .= "<p>Transaction ID: {$transactionID}</p>";
                $statusMsg .= "<p>Order Total: {$amount} {$currency}</p>";

            }else{ 
                $statusMsg = "Your Payment has Failed!"; 
            } 

            } else { 
                $statusMsg = "Transaction has been failed!"; 
            }
         } else { 
            $statusMsg = "Error on form submission."; 
        }    
        $this->session->set_flashdata('paymentMsg', $statusMsg);
        redirect('stripe/success');
    } 
    // success method
    public function success() {
        $data = array();
        $data['metaDescription'] = '';
        $data['metaKeywords'] = '';
        $data['title'] = " Socxo";
        $data['msg'] = $this->session->flashdata('paymentMsg');       
        $this->load->view('stripe/success', $data);  
    }
    
     // userprofile page
    //  public function userprofile() {
    //     $data['records'] = $this->payment->get_data(); // Get data from model
    //     $this->load->view('stripe/userprofile', $data); // Load view and pass data   
    // }

     // transaction page
     public function usertransaction() {
        // Retrieve data from the model
        $data['records1'] = $this->payment->set_data(); 
    
        // Check if data retrieval was successful
        if ($data['records1'] !== false) {
            // Load view and pass data
            $this->load->view('stripe/usertransaction', $data); 
        } else {
            // Handle the case where data retrieval failed
            echo "Failed to retrieve data from the database.";
        }
    }


    public function userprofile() {
        // Retrieve user profiles from the model
        $data['records'] = $this->payment->get_data(); 
        
        // Load view and pass data
        $this->load->view('stripe/userprofile', $data);
    }
    

    // get curl handle method
    private function get_curl_handle($data) {
        $url = 'https://api.stripe.com/v1/charges';
        $key_secret = STRIPE_SECRET_KEY;
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        $params = http_build_query($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $output = curl_exec ($ch);
        return $output;
    }
}