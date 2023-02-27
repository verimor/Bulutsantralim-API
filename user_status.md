**Dahili Durumlarını Listeleme**
----
Dahililerinizin durumlarını listelemek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde mesajlar döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**

  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
  **Dahili durumlarını Listeleme Örneği**
  >https://api.bulutsantralim.com/user_statuses?key=K12345678-1234-5678-4321-123456789012
  
  **BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
  {"user":1000,"status":"AVAILABLE"},
  {"user":1001,"status":"UNREGISTERED"},
  {"user":1002,"status":"TALKING"},
  {"user":1003,"status":"SS_DND"}
]
```
* user - Dahili numarası.
* status - Dahili durumu. (AVAILABLE=Müsait, TALKING=Çağrıda, UNREGISTERED=Çevrimdışı, SS_DND=Bulutsantral server side DND ayarı aktif)

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**PARAMETRELER**

Kullanılacak parametreler aşağıdakilerdir.
 * user - Belirli bir Dahilinin durumunu öğrenmek için kullanılır.
 * status - Belirli durumdaki Dahilileri listelemek için kullanılır. (AVAILABLE, TALKING, UNREGISTERED)
 
 **Not:** API ile dakikada iki istek (request) gönderebilirsiniz. Request limitini aştığınızda 429 (Too Many Requests) hatası döner.
 
