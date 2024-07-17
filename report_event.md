**OLAY BİLDİRME**
----
Santralinizde gerçekleşen olayları (telefon çalıyor, telefon açıldı, telefon kapandı) uygulamalarınıza bildirmek için kullanılır.
Telefon kapandı (hangup) bildirimi aynı zamanda CDR bildirimidir. Telefon kapandı bildirimi içesindeki çağrının cevaplanıp cevaplanamadığı (answered) bilgisi Kaçan çağrı tespiti için kullanılır. HTTP POST metodu ile [Santral Ayarlarım](https://oim.verimor.com.tr/switch/domain/edit) sayfasından CRM Entegrasyonu bölümünden girdiğiniz **Bildirilecek URL** adresine
aşağıdaki parametreler HTML Form Field olarak gönderilir.

> **_NOT:_** Gireceğiniz url, sistemimizde bazı kontrollere sokulacaktır. Geçerli bir url olması ve test amaçlı boş post isteğine başarılı cevap vermelidir.
> ```  curl --location 'http://ornekadres.url/event' --data '{}' ```

**UYGULAMANIZA GÖNDERİLECEK BİLDİRİM ÖRNEĞİ**

```json
POST https://musteri.adresi.com.tr/event/ 
Host: musteri.adresi.com.tr 
Accept: */* 
event_type=ringing&domain_id=101&direction=inbound&caller_id_number=02123205062&outbound_caller_id_number=&destination_number=1001&dialed_user=1001&call_uuid=1234&start_stamp=2016-01-01 00:00:00
``` 
**PARAMETRELER** 
  * **event_type:** Olay tipi. *ringing*, *answer*, *hangup* veya *user_hangup* döner.
  * **domain_id:** Bulutsantral ID’si.
  * **direction:** Çağrının yönü. *internal*, *inbound* yada *outbound* döner.
  * **caller_id_number:** Arayan numara.
  * **outbound_caller_id_number:** Arayanın dış numarası.
  * **destination_number:** Aranan numara.
  * **dialed_user¹:** Aranan kişinin dahili numarası.
  * **connected_user¹:** Bağlanan (telefonu açan) dahili. 
  * **call_uuid:** Çağrının uuid'si.
  * **start_stamp:** Çağrının başladığı zaman.
  * **answer_stamp:** Çağrının cevaplandığı zaman.
  * **end_stamp:** Çağrının sonlandığı zaman.
  * **duration:** Konuşma süresi.
  * **recording_present:** Çağrının ses kaydının olup olmadığı. *true* yada *false* döner.
  * **answered:** Kaçan çağrı tespiti için kullanılır. Aranan taraf çağrıyı kabul ettiyse *true* döner.
  * **queue:**  Kuyruğun veya Çağrı grubunun numarası.
  * **queue_wait_duration:** Kuyrukta bekleme süresi.
  * **sip_hangup_disposition:** Çağrının kimin tarafından kapatıldığı. *caller* ya da *callee* olarak döner. 
  * **hangup_cause:** Çağrının kapanma sebebi.
  * **failure_status:** Çağrı başarısız ise hata kodu.
  * **failure_phrase:** Çağrı başarısız ise hata mesajı.

¹ dialed_user ve connected_user sadece bir dahili diğerinin çağrısını (*8 ile) çektiği zaman farklı olur. Bu detayla ilgilenmiyorsanız her zaman connected_user'ı kullanabilirsiniz.

**hangup_cause Parametresinin Alabileceği Değerler ve Açıklamaları**

 [Çağrı Sonuç Kodları ve Açıklamaları](https://github.com/verimor/Bulutsantralim-API/blob/master/cagri-sonuc-kodlari.md)
