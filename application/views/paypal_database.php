  $data  = array(

                        "product_id"      => $this->session->userdata('paypal_product_id'),
                        "user_id"         => $this->session->userdata('user_id'),
                        "txn_id"          => $agreement->getId(),
                        "plan_id"         => $planid,
                        "pay_mode"        => 'P',
                        "payment_gross"   => $details->last_payment_amount->value,
                        "currency_code"   => 'USD',
                        "payer_name"      => $this->session->userdata("first_name").' '.$this->session->userdata("last_name"),
                        "payer_email"     => $this->session->userdata('user_email'),
                        "status"          => $success

                    );

        if ( $success=='true') {

            if($this->session->userdata('paypal_product_id') == 2){
                         $datei = strtotime("+6 day", strtotime(date('Y-m-d')));
                     }elseif($this->session->userdata('paypal_product_id') == 3){
                         $datei = strtotime("+29 day", strtotime(date('Y-m-d')));
                     }
                    
                    $bata   = array(
                    
                        "user_id"     => $this->session->userdata('user_id'),
                        "trans_dt"    => date('Y-m-d'),
                        "txn_id"      => $agreement->getId(),
                        "plan_id"     => $planid,
                        "subs_type"   => $this->session->userdata('paypal_product_id'),
                        "amount"      => $details->last_payment_amount->value,
                        "from_dt"     => date('Y-m-d'),
                        "to_dt"       => date("Y-m-d", $datei),
                        "subs_status" => 'A'

                    ) ;

          
            $this->Master->f_insert('payments', $data);
            $this->Master->f_insert('td_subscription', $bata);

            redirect(base_url().'user/payment_success', 'refresh');



            
                exit(1);
              } else {
                  // Payment failed
              } 