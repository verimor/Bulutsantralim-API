<?php
class ControllerApiVerimor extends Controller {
  public function get_order_by_telephone_number() {
    $this->load->language('api/order');
    $this->load->model('checkout/verimor');
    $json = array();

    if (!isset($this->session->data['api_id'])) {
      $json['error'] = $this->language->get('error_permission');
    } else {
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
    $this->load->model('checkout/verimor');

    $json = array();

    if (!isset($this->session->data['api_id'])) {
      $json['error']['warning'] = $this->language->get('error_permission');
    } else {
      
      $date_added = $this->request->get['date_added'];
      
      $order_info = $this->model_checkout_verimor->list_orders($date_added);
      $json[] = $order_info;
    }

    $this->response->addHeader('Content-Type: application/json');
    $this->response->addHeader('Controller: v3.0.3.8');
    $this->load->model('checkout/verimor');
    $this->response->addHeader($this->model_checkout_verimor->model_version());
    $this->response->setOutput(json_encode($json));
  }	

}
