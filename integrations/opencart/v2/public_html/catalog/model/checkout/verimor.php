<?php
class ModelCheckoutVerimor extends Model {
  public function model_version(){
    return "Model: v1.0.1";
  }

  public function get_order_by_telephone_number($telephone) {
    $order_statuses = Array(
      1 => 'Onay Bekliyor',
      2 => 'Hazırlanıyor',
      3 => 'Kargoya Verildi',
      5 => 'Tamamlandı',
      7 => 'İptal Edildi',
      8 => 'Reddedildi',
      9 => 'İptal Geri Alındı',
      10 => 'Başarısız',
      11 => 'İade Edildi',
      12 => 'Durduruldu',
      13 => 'Ters İbraz',
      14 => 'Süresi Doldu',
      15 => 'Hazırlandı',
      16 => 'Hükümsüz'
    );
    
    $order_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "order` o WHERE o.telephone LIKE '%" . $telephone . "' order by date_added DESC Limit 1");

    if ($order_query->num_rows) {
      $row = $order_query->row;
      $row['order_status'] = $order_statuses[(int)$row['order_status_id']];
      return $row;
    } else {
      return false;
    }
  }
  
  public function check_token($token){
      $query = $this->db->query("Select * from `" . DB_PREFIX . "api_session` a where a.token= '". $token ."'");
      
      if ($query->num_rows) {
        return true; 
    } else {
      return false;
    }
  }
  
  public function update_order_status($order_id,$status) {
    $this->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id =". (int)$status ."   WHERE order_id = '" . (int)$order_id . "'");

    $comment = 'Bulutsantralim OtoIVR Kapıda Ödeme Onayı Araması';
    $notify = false;
    $this->db->query("INSERT INTO " . DB_PREFIX . "order_history SET order_id = '" . (int)$order_id . "', order_status_id = '" . (int)$status . "', notify = '" . (int)$notify . "', comment = '" . $this->db->escape($comment) . "', date_added = NOW()");
  }  
  
  public function list_orders($date_added) {
    $orders = $this->db->query("SELECT o.order_id,o.firstname,o.lastname,o.telephone,o.date_added,o.total FROM `" . DB_PREFIX . "order` o WHERE o.payment_method IN ('Kapıda Ödeme', 'Cash on Delivery', 'Kapıda Kredi Kartı ile Ödeme', 'Kapıda Nakit Ödeme') AND o.order_status_id=1 AND o.date_added > '" . $date_added . "' AND o.date_added >=Curdate() order by o.date_added ASC");
    $order_array = null;
    if ($orders->num_rows) {
        foreach($orders->rows as $row){
            if ($order_array == null){
                $order_array = array($row);
            }else{
                array_push($order_array,$row);
            }
        }
         return $order_array; 
    } else {
      return false;
    }
  }
}	
