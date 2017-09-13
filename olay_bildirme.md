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

>POST http://musteri.adresi.com.tr/event/ <br />
>Host: musteri.adresi.com.tr <br />
>Accept: */* <br />
>event_type=ringing&domain_id=101&direction=inbound&caller_id_number=02123205062&outbound_caller_id_number=&destination_number=1001&dialed_user=1001&call_uuid=1234&start_stamp=2016-01-01 00:00:00
 
**PARAMETRELER** <br />
  * event_type (ringing, answer, hangup)
  * domain_id
  * direction (internal, inbound, outbound)
  * caller_id_number
  * outbound_caller_id_number
  * destination_number
  * dialed_user
  * connected_user
  * call_uuid
  * start_stamp
  * answer_stamp
  * end_stamp
  * duration
  * recording_present (t, f)
  * answered (t, f)
  * queue
  * queue_wait_duration
  * sip_hangup_disposition
  * hangup_cause
  * failure_status
  * failure_phrase   
