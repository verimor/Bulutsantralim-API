**FAKS İŞLEMLERİ**
----
Uygulamalarınız üzerinden faks göndermek ve faks listesine erişmek için api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 status kodu ile mesajın Body'sinde liste veya ID döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**

 Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**Tamamlanmamış Gönderimler Listesine Erişim Örneği**
>http://api.bulutsantralim.com/fax_orders?key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP**
```json
HTTP/1.1 200 OK
[
  {
    "id":96,
    "created_at":"2018-06-05 10:57:45",
    "local_station_id":"902129630131",
    "remote_station_id":"902123205072",
    "status":"Bekliyor"
   }
]
```
* id: Kayıt NO.
* created_at: Kayıt zamanı.
* local_station_id: Arayan numara
* remote_station_id: Aranan numara
* status: Sonuç

**Faks Listesine Erişim örneği**
>http://api.bulutsantralim.com/fdrs?key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP**
```json
HTTP/1.1 200 OK
{"fdrs:[{
  "call_uuid":"3289fe02-2dc7-11e8-9a23-1f0cd544cc6v",
  "direction":"Giden",
  "caller_id_number":"902129630131",
  "local_station_header":"Bulutsantralim",
  "original_destination":"902123205072",
  "pages_count":"0 / 0",
  "transfer_rate":14400,
  "start_stamp":"2018-03-22 14:50:20",
  "answer_stamp":"2018-03-22 14:50:20",
  "end_stamp":"2018-03-22 14:50:35",
  "duration":15,
  "success":true,
  "result":"Başarılı"
}],
"pagination":{
  "page":1,
  "total_count":1,
  "total_pages":1,
  "limit":10
}
}
```
* call_uuid: Faksın uuid'si.
* direction: Çağrının yönü. “Gelen”, “Giden” ve  “Santral içi” olarak değişebilir.
* caller_id_number: Faks gönderen numara..
* local_station_header: Gönderen başlığı.
* original_destination: Faks alab numara.
* pages_count:Sayfa adedi.
* transfer_rate: Gönderim hızı.
* start_stamp: Arama Zamanı.
* answer_stamp: Cevaplama Zamanı.
* end_stamp: Kapatma Zamanı.
* duration: Süre.
* success: Durum.
* result: Sonuç

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
* direction = Değeri  “inbound” olarak gönderilirse gelen, değeri  “outbound” olarak gönderilirse giden, değeri “internal” olarak gönderilirse santral içi faksları listeler.
* caller_id_number = Faks gönderen numara.
* original_destination = Faks alan numara.
* success = Değeri “true” olarak gönderilirse başarılı, değeri “false” olarak gönderilirse başarısız faksları listeler.
* limit = Listeyi sınırlayabilirsiniz.Varsayılan değer 10,maksimum değer 100. 
* page = Liste limite göre sayfalanıyor. “total_pages” değerinden maksimum kaç sayfa olduğunu belirleyerek görmek istediyiniz sayfanın numarasını girebilirsiniz. 

**Faks Gönderimi**

Faks göndermek için dosyasının içeriğinin base64 ile kodlanmış halini ve diğer bilgileri aşağıdaki şekilde POST etmeniz yeterlidir.

```json
POST http://api.bulutsantralim.com/fax_orders
Host: api.bulutsantralim.com
Accept: */*
Content-Length: 481982
Content-Type: application/x-www-form-urlencoded

key=K12345678-1234-5678-4321-123456789012&&local_station_header=Bulutsantralim&remote_station_id=901234567891&filedata=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlcAAAGCCAIAAABCQnHSAAAAAXNSR0IArs4c6QAAAARnQU1BA.....
```
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
20212
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
invalid base64
```
**PARAMETRELER** <br/>
Kullanılacak parametreler aşağıdakilerdir. **Zorunlu** olanlar koyu olarak belirtilmiştir.

* **key** = Size özel oluşturulmuş API anahtarınızdır. https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz.
* **local_station_header:** Gönderici başlığı.
* **remote_station_id:** Alıcı.
* **filedata:** Gönderilecek dosyanın içeriğinin base64 ile kodlanmış hali.
