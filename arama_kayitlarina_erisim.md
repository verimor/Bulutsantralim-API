**ARAMA KAYITLARINA ERİŞİM**
----
Santralinizdeki arama kayıtlarına ve detayına erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde çağrılar döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**ARAMA KAYITLARINA ERİŞME ÖRNEĞİ**

>http://api.bulutsantralim.com/cdrs?key=K12345678-1234-5678-4321-123456789012 <br/>
 
**BAŞARILI CEVAP** <br/>

>HTTP/1.1 200 OK <br/>
>{"cdrs":[{ <br/>
  >"start_stamp":"2017-08-03 12:30:32 +0300", <br/>
  >"direction":"Gelen", <br/>
  >"caller_id_number":"03121234567", <br/>
  >"destination_number":"902129876543", <br/>
  >"duration":00:01:05, <br/>
  >"queue":"201", <br/>
  >"result":"Cevaplandı", <br/>
  >"missed":"true", <br/>
  >"recording_present":"false", <br/>
  >"sip_hangup_disposition":"caller", <br/>
  >"call_uuid":"651f8a68-782e-11g7-a6b6-5bedc26e2ab3", <br/>
  >"answer_stamp":"2017-08-03 12:30:32 +0300", <br/>
  >"end_stamp":"017-08-03 12:30:52 +0300" <br/>
>}], <br/>
>"pagination":{ <br/>
  >"page":1, <br/>
  >"total_count":25, <br/>
  >"total_pages":3, <br/>
  >"limit":10 <br/>
>} <br/>
>} 

* start_stamp – Çağrının başladığı zaman. <br/>
* direction – Çağrının yönü. “Gelen”, “Giden”, “Giden (API), “Giden (IVR)”  ve  “Santral içi” olarak değişebilir. <br/>
* caller_id_number – Arayan numara. <br/>
* destination_number – Aranan numara. <br/>
* duration – Konuşma süresi. <br/>
* queue – Çağrı kuyrukta beklediyse ve ya cağrı qrupuna yönlendirildiyse onun numarası. <br/>
* result – Çağrının sonuçu. “Cevaplandı”, “Meşgul”  ve ya “Meşgule atıldı” gibi  döner. <br/>
* missed – Kaçan çağrı ise “true” değilse  “false” döner. <br/>
* recording_present – Çağrının ses kaydının olup olmadığı. “true”  ya da “false” döner. <br/>
* sip_hangup_disposition – Çağrının kimin tarafından kapatıldığı. “caller” ya da “callee” olarak döner. <br/>
* call_uuid – Çağrının uuid'si.
* answer_stamp – Çağrının cevaplandığı zaman. <br/>
* end_stamp – Çağrının sonlandığı zaman. <br/>
* page – Listenin hangi sayfasında olduğunuz. <br/>
* total_count – Listede dönen çağrı sayısı <br/>
* total_pages – Listenin kaç sayfadan oluştuğu.(total_pages=total_count/limit) <br/>
* limit – Listeye verilen sınır. <br/>

**BAŞARISIZ CEVAP** <br/>

>HTTP/1.1 400 Bad Request <br/>
>Gecersiz anahtar: K12345678-1234-5678-4321-123456789012 <br/>

**PARAMETRELER** <br/>
Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.

* **key**= Size özel oluşturulmuş API anahtarınızdır.  https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz. <br/>
* start_stamp_from = Başlama tarihi yazdığınız tarihden sonra olan çağrıları listeler. “2017-08-03 12:30:32 UTC” formatında olmalı. <br/>
* start_stamp_to = Başlama tarihi yazdığınız tarihe kadar olan çağrıları listeler. “2017-08-03 12:30:32 UTC” formatında olmalı. Tarih aralığı 31 günden uzun olamaz. <br/>
* recording_present = Değeri “true” olarak gönderilirse ses kaydı olan çağrıları, değeri “false”  olarak gönderilirse ses kaydı olmayan çağrıları, değeri “deleted” olarak gönderilirse ses kaydı silinmiş çağrıları listeler. <br/>
* direction = Değeri  “inbound” olarak gönderilirse gelen aramaları, değeri  “outbound” olarak gönderilirse giden aramaları, Değeri “internal” olarak gönderilirse santral içi aramaları listeler. <br/>
* caller_id_number = Arama yapan numara. <br/>
* missed = Değeri “true” olarak gönderilirse kaçan çağrıları, Değeri  “false”  olarak gönderilirse cevaplanmış çağrıları listeler. <br/>
* destination_number = Arama yapılan numara. <br/>
* queue = Çağrının bağlandığı kuyruk. <br/>
* limit = Listeyi sınırlayabilirsiniz.Varsayılan değer 10,maksimum değer 100. <br/>
* page = Liste limite göre sayfalanıyor. “total_pages” değerinden maksimum kaç sayfa olduğunu belirleyerek görmek istediyiniz sayfanın numarasını girebilirsiniz. <br/>

**ARAMA KAYDININ DETAYINA ERİŞME ÖRNEĞİ** <br/>
Detayına erişmek istediğiniz çağrının call_uuid`ni aşağıdaki URL`de olduğu gibi girmeniz gerekiyor.

>http://api.bulutsantralim.com/cdrs/5cfdfb46-776c-11e7-8375-0d58348796d3?key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP** <br/>

>HTTP/1.1 200 OK <br/>
>{"cdr":{ <br/>
  >"direction":"Santral içi", <br/>
  >"caller_id_number":"1002", <br/>
  >"destination_number":"1001", <br/>
  >"result":"Cevaplandı", <br/>
  >"sip_hangup_disposition":"caller", <br/>
  >"missed":"false", <br/>
  >"call_uuid":"5cfdfb46-776c-11e7-8375-0d58348796d3", <br/>
  >"start_stamp":"2017-08-02 13:21:35 +0300", <br/>
  >"answer_stamp":"2017-08-02 13:21:37 +0300", <br/>
  >"end_stamp":"2017-08-02 13:22:09 +0300", <br/>
  >"duration":00:00:32, <br/>
  >"recording_present":"true" <br/>
>}, <br/>
>"call_flow":[{ <br/>
  >"destination_number":"1001", <br/>
  >"start_stamp":"2017-08-02 13:21:35 +0300", <br/>
  >"answer_stamp":"2017-08-02 13:21:37 +0300", <br/>
  >"end_stamp":"2017-08-02 13:21:52 +0300", <br/>
  >"ip_address":"192.168.1.101", <br/>
  >"sip_user_agent":"Yealink SIP-T22P 7.73.0.50" <br/>
  >"write_codec":"PCMA" <br/>
  >"read_code":"PCMA", <br/>
  >"result":"Cevaplandı" <br/>
>},{ <br/>
  >"destination_number":"1000", <br/>
  >"start_stamp":"2017-08-02 13:21:35 +030", <br/>
  >"answer_stamp":"2017-08-02 13:21:37 +030", <br/>
  >"end_stamp":"2017-08-02 13:22:09 +0300", <br/>
  >"ip_address":"192.168.1.102", <br/>
  >"sip_user_agent":"X-Lite release 4.9.7 stamp 83108", <br/>
  >"write_codec":"PCMA" <br/>
  >"read_codec" :" PCMU", <br/>
  >"result":"Cevaplandı", <br/>
>}] <br/>
>} <br/>

**Arama bilgileri:** <br/>

* direction – Çağrının yönü. “Gelen”, “Giden”, “Giden (API), “Giden (IVR)” ve “Santral içi” olarak değişebilir. <br/>
* caller_id_number – Arayan numara. <br/>
* destination_number – Aranan numara. <br/>
* result – Çağrının sonuçu. “Cevaplandı”, “Meşgul” ve ya “Meşgule atıldı” gibi döner. <br/>
* sip_hangup_disposition – Çağrının kimin tarafından kapatıldığı. “caller” ya da “callee” olarak döner. <br/>
* missed – Kaçan çağrı. “true” ya da “false” döner. <br/>
* call_uuid – Çağrının uuid'si. <br/>
* start_stamp – Çağrının başladığı zaman. <br/>
* answer_stamp – Çağrının cevaplandığı zaman. <br/>
* end_stamp – Çağrının sonlandığı zaman. <br/>
* duration – Konuşma süresi. <br/>
* recording_present – Çağrının ses kaydının olup olmadığı. “true” ya da “false” döner. <br/>

**Çağrı akışı :** <br/>

* destination_number – Aranan numara. <br/>
* start_stamp – Çağrının başladığı zaman. <br/>
* answer_stamp – Çağrının cevaplandığı zaman. <br/>
* end_stamp – Çağrının sonlandığı zaman. <br/>
* ip_address –Aranan numaranın ip adresi. <br/>
* sip_user_agent – Aranan numaranın cihaz modeli. <br/>
* write_codec – Bulutsantralin gonderdiyi ses paketlerinin kodeki. <br/>
* read_codec – Bulutsantralin aldığı ses paketlerinin kodeki. <br/>
* result – Çağrının sonuçu. “Cevaplandı”, “Meşgul” ve ya “Meşgule atıldı” gibi  döner. <br/>

**BAŞARISIZ CEVAP** <br/>

>HTTP/1.1 404 Bad Request <br/>
>cannot find call with call_uuid 5cfdfb46-776c-11e7-8375-0d58348796d3 <br/>

**PARAMETRELER** <br/>
Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.

* **key**= Size özel oluşturulmuş API anahtarınızdır. https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz. <br/>
* **call_uuid**= Detayı istenen çağrının call_uuid'si.
