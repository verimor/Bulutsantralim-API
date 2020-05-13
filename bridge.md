**ÇAĞRI BAĞLAMA**
----
  Uygulamalarınız üzerinden iki dış numarayı (örn. cep telefonu) arayıp birbiriyle görüştürmek için kullanılır.
  
  Kullanım alanları:
  * Müşteriniz ve saha personelinizi görüştürmek istiyorsunuz fakat bilgi güvenliği (örn. KVKK) nedeniyle cep telefonu numaralarının görünmesini istemiyorsunuz. (Bu özellik numara maskele veya numara gizleme olarakta bilinir.)
  * Müşteriniz ve saha personelinizin yaptığı görüşmeleri raporlamak ve müşteri memnuniyeti için bu görüşmelerin ses kayıtlarını tutmak istiyorsunuz.
  
  Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde call_uuid döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**ÇAĞRI BAŞLATMA ÖRNEĞİ**

>http://api.bulutsantralim.com/originate?key=K12345678-1234-5678-4321-123456789012&source=905321234567&destination=905423456789

**BAŞARILI CEVAP:**

Başarılı durumda HTTP status kodu 200 olur ve cevapta çağrı ID'si döner. Bu ID'yi [Olay Bildirme](https://github.com/verimor/Bulutsantralim-API/blob/master/report_event.md)'deki ID'ler ile eşleştirebilir veya çağrı bittikten sonra [Arama Kayıtlarına Erişim](https://github.com/verimor/Bulutsantralim-API/blob/master/cdrs.md) için kullanabilirsiniz.
```json
HTTP/1.1 200 OK 
358c20bc-fd86-11e5-87a2-157d41a07454
```
**BAŞARISIZ CEVAP:**

```json
HTTP/1.1 400 Bad Request 
invalid destination: 1234
```
**PARAMETRELER** 

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir. 
  * **key** = Size özel oluşturulmuş API anahtarınızdır. 
  * **source** = İlk olarak bu numara aranır, çalmaya başlayınca **destination** aranır ve birbiriyle görüşmeye başlarlar (yurtiçi çağrılar için 908505320000, yurtdışı çağrılar için 00493027590915 formatında olmalı).
  * **destination** = İkinci aranacak numara (yurtiçi çağrılar için 908505320000, yurtdışı çağrılar için 00493027590915 formatında olmalı).
  * caller_id = İki tarafı da ararken kullanılacak dış numara (908505320000 formatında olmalı. Bu parametre verilmezse 1000 dahilisinde seçili olan dış no kullanılacaktır).
