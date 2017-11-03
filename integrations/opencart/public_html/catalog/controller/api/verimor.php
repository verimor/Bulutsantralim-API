<?php
class ControllerApiVerimor extends Controller {

	public function get_order_by_telephone_number() {
		$this->load->language('api/order');
        $this->load->model('checkout/verimor');
		$json = array();
		if (isset($this->request->get['token'])) {
				$token = $this->request->get['token'];
			} else {
				$token = 0;
			}
        $check_token = $this->model_checkout_verimor->check_token($token);
		if ($check_token) {
            if (isset($this->request->get['telephone'])) {
				$telephone = $this->request->get['telephone'];
			} else {
				$telephone = 0;
			}

			$order_info = $this->model_checkout_verimor->get_order_by_telephone_number($telephone);

			if ($order_info) {
				$json['order'] = $order_info;
				$json['status'] = "success";
			} else {
				$json['status'] = "not found";
			}
			
		} else {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function update_order_status(){
		$this->load->language('api/order');

		$json = array();

		if (!isset($this->session->data['api_id'])) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$this->load->model('checkout/verimor');

            if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$order_info = $this->model_checkout_verimor->update_order_status($order_id,$this->request->get['status']);

			$json['order'] = $order_info;

		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function list_orders(){
		$this->load->language('api/order');

		$json = array();

		if (!isset($this->session->data['api_id'])) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$this->load->model('checkout/verimor');
            $date_added = $this->request->get['date_added'];
			$order_info = $this->model_checkout_verimor->list_orders($date_added);
			$json[] = $order_info;

		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}	

}