**ÇAĞRI BAŞLATMA**
----
  Uygulamalarınız üzerinden santraldeki bir dahiliye çağrı başlatmak için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde call_uuid döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**ÇAĞRI BAŞLATMA ÖRNEĞİ**

>http://api.bulutsantralim.com/originate?key=K12345678-1234-5678-4321-123456789012&extension=1001&destination=908505320000

**BAŞARILI CEVAP:**

```json
HTTP/1.1 200 OK 
358c20bc-fd86-11e5-87a2-157d41a07454
```
**BAŞARISIZ CEVAP:**

```json
HTTP/1.1 400 Bad Request 
extension 1005 not found
```
**PARAMETRELER** 

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir. 
  * **key** = Size özel oluşturulmuş API anahtarınızdır. 
  * **extension** = Aramanın bağlanacağı dahili numaradır.
  * **destination** = Aranacak olan numara (yurtiçi çağrılar için 908505320000, yurtdışı çağrılar için 00493027590915 formatında olmalı).
  * **caller_id** = Aramada kullanılacak olan dış numara (908505320000 formatında olmalı. Bu parametre verilmezse dahilide seçili olan dış no kullanılacaktır).
  * **manual_answer** = Değeri true olarak gönderilirse dahilinin telefonu açmasını bekler (Normalde otomatik olarak dahili açılır ve karşı numara aranır).
  * **timeout** = Opsiyonel. Telefon çaldırma süresidir. 10 ile 60 sn. arasında bir değer olmalı. Varsayılan 30'dur.
  * **announcement_to_callee** = Opsiyonel. Cevaplanma anında aranan tarafa bu anons dinletilir. Ses dosyası ID’lerinizi API ile veya Online İşlem Merkezi üzerinden görebilirsiniz.
* **announcement_to_caller** = Opsiyonel. Cevaplanma anında arayan tarafa bu anons dinletilir. Ses dosyası ID’lerinizi API ile veya Online İşlem Merkezi üzerinden görebilirsiniz.
