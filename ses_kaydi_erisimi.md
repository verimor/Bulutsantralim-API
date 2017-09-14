**SES KAYDI ERİŞİMİ**
----
Santralinizdeki ses kayıtlarını uygulamalarınız üzerinden dinlemek veya indirmek için kullanılır. Bu işlem iki aşamadan oluşur.
Birinci aşamada URL elde edilir. İkinci aşamada ise o URL’den ses dosyası indirilir/dinlenir.

Birinci aşama için; HTTP POST metodu ile api.bulutsantralim.com adresine aşağıdaki parametreler gönderilir. 
İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde ses kaydına ait olan bir URL döner.
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

İkinci aşamada ise elde ettiğiniz URL bir player’a verilip dinleme yaptırılır veya direkt indirebilir. URL yaşam süresi 1 saattir.

**HAZIRLIK** <br/>
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**URL İSTEME ÖRNEĞİ** <br/>

>http://api.bulutsantralim.com/recording_url?key=K12345678-1234-5678-4321-123456789012&call_uuid=12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP** <br/>

>HTTP/1.1 200 OK <br/>
>http://api.bulutsantralim.com/recording/Rbb9d6f36-d1a7-46f5-961e-4be2e2ba1b8e

**BAŞARISIZ CEVAP** <br/>

>HTTP/1.1 400 Bad Request <br/>
>cannot find call with call_uuid 12345678-1234-5678-4321-123456789012

**PARAMETRELER** <br/>
Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir. <br/>

* **key** = Size özel oluşturulmuş API anahtarınızdır. <br/>
* **call_uuid** = URL’ini istediğiniz ses kaydına ait uuid.
