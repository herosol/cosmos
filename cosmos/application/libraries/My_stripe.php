<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_stripe {

	public function __construct(){
		\Stripe\Stripe::setApiKey(API_SECRET_KEY);
	}

	/*** start customer ***/

	function save_customer($parms,$customer_id=''){
		try {

			if(empty($customer_id)){
				$customer = \Stripe\Customer::create($parms);
				if($customer)
					return $customer->id;
				return false;
			}else{
				$customer = \Stripe\Customer::update($customer_id,$parms);
				if($customer)
					return $customer->id;
				return false;
			}
		} catch (Exception $e) {
			// echo $e->getMessage();
			return false;
		}
	}
	function delete_customer($customer_id){
		try {
			$customer = \Stripe\Customer::retrieve($customer_id);
			if($customer)
				$customer->delete();
			return false;	
		} catch (Exception $e) {
			// echo $e->getMessage();
			return false;
		}
	}

	function make_defualt_payment_method($customer_id,$card_id){
		try {
			$customer = \Stripe\Customer::update($customer_id,
				[
					'default_source' => $card_id
				]
			);
			// pr($customer);
			if($customer)
				return $customer->id;
			return false;
		} catch (Exception $e) {
			// echo $e->getMessage();
			return false;
		}
	}

	/*** end customer ***/

	/*** start Payment Method ***/

	function create_payment_method($customer_id,$nonce){
		try {
			$card = \Stripe\Customer::createSource(
				$customer_id,
				[
					'source' => $nonce,
				]
			);
			if($card)
				return $card;
			return false;
		} catch (Exception $e) {
			// echo $e->getMessage();
			return false;
		}
	}

	function delete_payment_method($customer_id,$card_id){
		try {
			$card = \Stripe\Customer::deleteSource($customer_id,$card_id);
			if($card->deleted)
				return true;
			return false;
		} catch (Exception $e) {
			// exit($e->getMessage());
			return false;
		}
	}

	/*** end Payment Method ***/

	function generate_client_token(){
		return $this->gateway->clientToken()->generate();
	}

	/*** start Charge ***/

	function charge_customer($amount,$customer_id,$description=''){
		try {
			$cents=floatval($amount*100);
			$charge = \Stripe\Charge::create([
				"amount" => $cents,
				"currency" => "USD",
				'customer' => $customer_id,
                "description" => $description
			]);

			if($charge)
				return $charge->id;
				// return $result->transaction->id;
			return false;
		} catch (Exception $e) {
			// echo $e->getMessage();
			return false;
		}
	}
	function charge($customer_id, $card_id, $amount, $description = '')
	{
		try {
			$cents=floatval($amount*100);
			$charge = \Stripe\Charge::create([
				"amount" => $cents,
				"currency" => "USD",
				'customer' => $customer_id,
				'source' => $card_id,
                "description" => $description
			]);
			if($charge)
				return $charge->id;
				// return $charge->transaction->id;
			return false;
		} catch (Exception $e) {
			// echo $e->getMessage();
			// exit($e->getMessage());
			return false;
		}
	}
	function charge_by_nonce($nonce,$amount,$description=''){
		try {
			$cents=floatval($amount*100);
			$charge = \Stripe\Charge::create([
				"amount" => $cents,
				"currency" => "USD",
				'source' => $nonce,
                "description" => $description
			]);
			if($charge)
				return $charge->id;
			return false;
		} catch (Exception $e) {
			// echo $e->getMessage();
			// exit($e->getMessage());
			return false;
		}
	}
}
