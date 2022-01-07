**TELESEKRETER ARAMA KAYITLARINA ERİŞİM**
----
Santralinizdeki telesekreter arama kayıtlarına ve ses kayıtlarına erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde mesajlar döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**

  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**TELESEKRETER ARAMA KAYITLARINA ERİŞİM ÖRNEĞİ**

>http://api.bulutsantralim.com/voicemail_messages?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
{"messages":[{
  "start_stamp":"2017-08-03 12:30:32 +0300",
  "read_stamp":"2017-08-03 14:31:32 +0300",
  "user_number":"1002",
  "uuid":"651f8a68-782e-11g7-a6b6-5bedc26e2ab3",
  "caller_id_number":"03121234567",
  "caller_id_name":"Mehmet Yılmaz",
  "duration":"00:01:05",
}],
"pagination":{
  "page":1,
  "total_count":25,
  "total_pages":3,
  "limit":10
}
}
```

* start_stamp – Telesekreter mesajının bırakıldığı zaman.
* read_stamp – Telesekreter mesajı okunduysa, okunma zamanı (OİM'den, IVR'dan veya API'den ses kaydı dinlendiği zaman).
* user_number – Mesajın bırakıldığı dahili numarası.
* uuid - Bu mesajın kayıt numarası. Aynı zamanda ilgili çağrının numarasıdır, CDR kayıtlarıyla ilişkilidir.
* caller_id_number – Mesajı burakan numara.
* caller_id_name – Mesajı burakan kişinin ismi.
* duration – Ses kaydının süresi.
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
* start_stamp_from = Mesaj bırakma tarihi yazdığınız tarihden sonra olan çağrıları listeler. “2017-08-03 12:30:32 UTC” formatında olmalı. 
* start_stamp_to = Mesaj bırakma tarihi yazdığınız tarihe kadar olan çağrıları listeler. “2017-08-03 12:30:32 UTC” formatında olmalı. Tarih aralığı 31 günden uzun olamaz. 
* read = Değeri “true” olarak gönderilirse okunmuş mesajları, değeri “false”  olarak gönderilirse henüz okunmamış mesajları listeler. 
* user_number = Mesajın bırakıldığı dahilinin numarası.
* uuid = Mesajın (veya ilgili CDR kaydının) kayıt numarası.
* limit = Listeyi sınırlayabilirsiniz. Varsayılan değer 10, minimum değer 10, maksimum değer 100. 
* page = Liste limite göre sayfalanıyor. “total_pages” değerinden maksimum kaç sayfa olduğunu belirleyerek görmek istediyiniz sayfanın numarasını girebilirsiniz. 

**TELESEKRETERİN SES KAYDINA ERİŞİM**
---

CDR'ın ses kaydına erişimde olduğu gibi, bu ses kayıtlarına erişim de iki aşamaladır. Birinci aşamada URL elde edilir. İkinci aşamada ise o URL’den ses dosyası indirilir/dinlenir.

Birinci aşama için; HTTP POST metodu ile api.bulutsantralim.com adresine aşağıdaki parametreler gönderilir. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde ses kaydına ait olan bir URL döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

İkinci aşamada ise elde ettiğiniz URL bir player’a verilip dinleme yaptırılır veya direkt indirebilir. URL yaşam süresi 1 saattir.

**URL İSTEME ÖRNEĞİ** 
```json
POST http://api.bulutsantralim.com/voicemail_recording_url/
Host: api.bulutsantralim.com
Accept: */*
key=K12345678-1234-5678-4321-123456789012&uuid=12345678-1234-5678-4321-123456789012
```
**BAŞARILI CEVAP** 

```json
HTTP/1.1 200 OK 
http://api.bulutsantralim.com/recording/Rbb9d6f36-d1a7-46f5-961e-4be2e2ba1b8e
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
cannot find voicemail with uuid 12345678-1234-5678-4321-123456789012
```
**PARAMETRELER** 

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir. 

* **key** = Size özel oluşturulmuş API anahtarınızdır. 
* **uuid** = URL’ini istediğiniz telesekreter mesajına ait uuid.
