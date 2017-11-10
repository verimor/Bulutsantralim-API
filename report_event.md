**OLAY BİLDİRME**
----
Santralinizde gerçekleşen olayları (telefon çalıyor, telefon açıldı, telefon kapandı) uygulamalarınıza bildirmek için kullanılır.
Telefon kapandı (hangup) bildirimi aynı zamanda CDR bildirimidir. Telefon kapandı bildirimi içesindeki çağrının cevaplanıp cevaplanamadığı
(answered) bilgisi Kaçan çağrı tespiti için kullanılır. HTTP POST metodu ile santral ayarlarından girdiğiniz olay bildirim adresine
aşağıdaki parametreler gönderilir. Veriler HTML Form Field olarak gönderilir. adresi aşağıdaki parametrelerle çağrılır.
İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde call_uuid döner. İstek başarısız olduğunda ise ilgili HTTP Status
kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**UYGULAMANIZA GÖNDERİLECEK BİLDİRİM ÖRNEĞİ**

```json
POST http://musteri.adresi.com.tr/event/ 
Host: musteri.adresi.com.tr 
Accept: */* 
event_type=ringing&domain_id=101&direction=inbound&caller_id_number=02123205062&outbound_caller_id_number=&destination_number=1001&dialed_user=1001&call_uuid=1234&start_stamp=2016-01-01 00:00:00
``` 
**PARAMETRELER** 
  * **event_type:** Olay tipi. *ringing*, *answer* yada *hangup* döner.
  * **domain_id:** Bulutsantral ID’si.
  * **direction:** Çağrının yönü. *internal*, *inbound* yada *outbound* döner.
  * **caller_id_number:** Arayan numara.
  * **outbound_caller_id_number:** Arayanın dış numarası.
  * **destination_number:** Aranan numara.
  * **dialed_user:** Aranan kişinin dahili numarası.
  * **connected_user:** Bağlanan (telefonu açan) dahili. 
  * **call_uuid:** Çağrının uuid'si.
  * **start_stamp:** Çağrının başladığı zaman.
  * **answer_stamp:** Çağrının cevaplandığı zaman.
  * **end_stamp:** Çağrının sonlandığı zaman.
  * **duration:** Konuşma süresi.
  * **recording_present:** Çağrının ses kaydının olup olmadığı. *true* yada *false* döner.
  * **answered:** Kaçan çağrı tespiti için kullanılır. Kaçan çağrı ise *true* değilse  *false* döner.
  * **queue:**  Kuyruğun veya Çağrı grubunun numarası.
  * **queue_wait_duration:** Kuyrukta bekleme süresi.
  * **sip_hangup_disposition:** Çağrının kimin tarafından kapatıldığı. *caller* ya da *callee* olarak döner. 
  * **hangup_cause:** Çağrının kapanma sebebi.
  * **failure_status:** Hata kodu.
  * **failure_phrase:** Hata mesajı.
