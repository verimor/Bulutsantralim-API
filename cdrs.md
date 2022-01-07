**ARAMA KAYITLARINA ERİŞİM**
----
Santralinizdeki arama kayıtlarına ve detayına erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde çağrılar döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**ARAMA KAYITLARINA ERİŞİM ÖRNEĞİ**

>http://api.bulutsantralim.com/cdrs?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
{"cdrs":[{
  "start_stamp":"2017-08-03 12:30:32 +0300",
  "direction":"Gelen",
  "caller_id_number":"03121234567",
  "caller_id_name":"Verimor Telekom",
  "destination_number":"902129876543",
  "destination_name":"Dahili 1",
  "duration":"00:01:05",
  "talk_duration":"00:0:35",
  "queue":"201",
  "result":"Cevaplandı",
  "missed":"true",
  "return_uuid":"38359b70-7c10-4342-9479-e98ff716d102",
  "recording_present":"false",
  "sip_hangup_disposition":"caller",
  "call_uuid":"651f8a68-782e-11g7-a6b6-5bedc26e2ab3",
  "answer_stamp":"2017-08-03 12:30:32 +0300",
  "end_stamp":"017-08-03 12:30:52 +0300"
}],
"pagination":{
  "page":1,
  "total_count":25,
  "total_pages":3,
  "limit":10
}
}
```

* start_stamp – Çağrının başladığı zaman.
* direction – Çağrının yönü. “Gelen”, “Giden”, “Giden (API), “Giden (IVR)”  ve  “Santral içi” olarak değişebilir.
* caller_id_number – Arayan numara.
* caller_id_name - Giden aramalarda dahili ismini, gelen aramalarda arayan ismini ifade eder.
* destination_number – Aranan numara.
* destination_name - Gelen aramalarda dahili ismini, Giden aramalarda aranan ismini ifade eder.
* duration – Toplam süre.
* talk_duration - Konuşma süresi.
* queue – Çağrı kuyrukta beklediyse ve ya cağrı qrupuna yönlendirildiyse onun numarası. 
* result – Çağrının sonuçu. “Cevaplandı”, “Meşgul”  ve ya “Meşgule atıldı” gibi  döner.
* missed – Kaçan çağrı ise “true” değilse  “false” döner.
* return_uuid - Kaçan çağrıya dönüldüyse o çağrının uuid'si döner. Cevaplanan veya kaçan ama dönülmeyen çağrılarda null döner.
* recording_present – Çağrının ses kaydının olup olmadığı. “true”  ya da “false” döner.
* sip_hangup_disposition – Çağrının kimin tarafından kapatıldığı. “caller” ya da “callee” olarak döner. 
* call_uuid – Çağrının uuid'si.
* answer_stamp – Çağrının cevaplandığı zaman.
* end_stamp – Çağrının sonlandığı zaman. 
* page – Listenin hangi sayfasında olduğunuz. 
* total_count – Listede dönen çağrı sayısı.
* total_pages – Listenin kaç sayfadan oluştuğu.(total_pages=total_count/limit).
* limit – Listeye verilen sınır. 

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**PARAMETRELER** 

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.

* **key**= Size özel oluşturulmuş API anahtarınızdır.  https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz.
* start_stamp_from = Başlama tarihi yazdığınız tarihden sonra olan çağrıları listeler. “2017-08-03 12:30:32 UTC” formatında olmalı. 
* start_stamp_to = Başlama tarihi yazdığınız tarihe kadar olan çağrıları listeler. “2017-08-03 12:30:32 UTC” formatında olmalı. Tarih aralığı 31 günden uzun olamaz. 
* recording_present = Değeri “true” olarak gönderilirse ses kaydı olan çağrıları, değeri “false”  olarak gönderilirse ses kaydı olmayan çağrıları, değeri “deleted” olarak gönderilirse ses kaydı silinmiş çağrıları listeler. 
* direction = Değeri  “inbound” olarak gönderilirse gelen aramaları, değeri  “outbound” olarak gönderilirse giden aramaları, Değeri “internal” olarak gönderilirse santral içi aramaları listeler.
* caller_id_number = Arama yapan numara. 
* missed = Değeri “true” olarak gönderilirse kaçan çağrıları, Değeri  “false”  olarak gönderilirse cevaplanmış çağrıları listeler. 
* destination_number = Arama yapılan numara. 
* queue = Çağrının bağlandığı kuyruk. 
* limit = Listeyi sınırlayabilirsiniz. Varsayılan değer 10, minimum değer 10, maksimum değer 100. 
* page = Liste limite göre sayfalanıyor. “total_pages” değerinden maksimum kaç sayfa olduğunu belirleyerek görmek istediyiniz sayfanın numarasını girebilirsiniz. 

**ARAMA KAYDININ DETAYINA ERİŞME ÖRNEĞİ**

Detayına erişmek istediğiniz çağrının call_uuid'ni aşağıdaki URL'de olduğu gibi girmeniz gerekiyor.

>http://api.bulutsantralim.com/cdrs/5cfdfb46-776c-11e7-8375-0d58348796d3?key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP** 

```json
HTTP/1.1 200 OK
{"cdr":{
  "direction":"Santral içi",
  "caller_id_number":"1002",
  "destination_number":"1001",
  "result":"Cevaplandı",
  "sip_hangup_disposition":"caller",
  "missed":"false",
  "return_uuid":"38359b70-7c10-4342-9479-e98ff716d102",
  "call_uuid":"5cfdfb46-776c-11e7-8375-0d58348796d3",
  "start_stamp":"2017-08-02 13:21:35 +0300",
  "answer_stamp":"2017-08-02 13:21:37 +0300",
  "end_stamp":"2017-08-02 13:22:09 +0300",
  "duration":"00:00:32",
  "talk_duration":"00:0:35",
  "recording_present":"true"
},
"call_flow":[{
  "destination_number":"1001",
  "start_stamp":"2017-08-02 13:21:35 +0300",
  "answer_stamp":"2017-08-02 13:21:37 +0300",
  "end_stamp":"2017-08-02 13:21:52 +0300",
  "duration":"00:0:35",
  "ip_address":"192.168.1.101",
  "sip_user_agent":"Yealink SIP-T22P 7.73.0.50",
  "write_codec":"PCMA",
  "read_code":"PCMA",
  "result":"Cevaplandı"
},{
  "destination_number":"1000",
  "start_stamp":"2017-08-02 13:21:35 +030",
  "answer_stamp":"2017-08-02 13:21:37 +030",
  "end_stamp":"2017-08-02 13:22:09 +0300",
  "duration":"00:0:35",
  "ip_address":"192.168.1.102",
  "sip_user_agent":"X-Lite release 4.9.7 stamp 83108",
  "write_codec":"PCMA",
  "read_codec" :" PCMU",
  "result":"Cevaplandı"
}]
}
```

**Arama bilgileri:** 

* direction – Çağrının yönü. “Gelen”, “Giden”, “Giden (API), “Giden (IVR)” ve “Santral içi” olarak değişebilir. 
* caller_id_number – Arayan numara. 
* destination_number – Aranan numara.
* result – Çağrının sonuçu. “Cevaplandı”, “Meşgul” ve ya “Meşgule atıldı” gibi döner. 
* sip_hangup_disposition – Çağrının kimin tarafından kapatıldığı. “caller” ya da “callee” olarak döner. 
* missed – Kaçan çağrı. “true” ya da “false” döner.
* return_uuid - Kaçan çağrıya dönüldüyse o çağrının uuid'si döner. Cevaplanan veya kaçan ama dönülmeyen çağrılarda null döner.
* call_uuid – Çağrının uuid'si. 
* start_stamp – Çağrının başladığı zaman. 
* answer_stamp – Çağrının cevaplandığı zaman. 
* end_stamp – Çağrının sonlandığı zaman. 
* duration – Toplam süre.
* talk_duration - Konuşma süresi.
* recording_present – Çağrının ses kaydının olup olmadığı. “true” ya da “false” döner. 

**Çağrı akışı :** 

* destination_number – Aranan numara. 
* start_stamp – Çağrının başladığı zaman. 
* answer_stamp – Çağrının cevaplandığı zaman. 
* end_stamp – Çağrının sonlandığı zaman. 
* duration - Süre.
* ip_address –Aranan numaranın ip adresi. 
* sip_user_agent – Aranan numaranın cihaz modeli. 
* write_codec – Bulutsantralin gonderdiyi ses paketlerinin kodeki. 
* read_codec – Bulutsantralin aldığı ses paketlerinin kodeki. 
* result – Çağrının sonuçu. “Cevaplandı”, “Meşgul” ve ya “Meşgule atıldı” gibi  döner. 

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 404 Bad Request 
cannot find call with call_uuid 5cfdfb46-776c-11e7-8375-0d58348796d3 
```

**PARAMETRELER** 
Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.

* **key**= Size özel oluşturulmuş API anahtarınızdır. https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz. 
* **call_uuid**= Detayı istenen çağrının call_uuid'si.
