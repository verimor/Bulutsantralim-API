**MT (Müşteri Temsilcisi) Listesi**
----
Müşteri Temsilcilerinizin durumunu ve hangi kuyruklara üye olduklarını listelemek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde mesajlar döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**

  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
  **Müşteri Temsilcilerini Listeleme Örneği**
  >http://api.bulutsantralim.com/agent_status?key=K12345678-1234-5678-4321-123456789012
  
  **BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
  {"agent":"1010","status":"AVAILABLE","queues":["204","205"]},
  {"agent":"1011","status":"TALKING","queues":["202"]}
]
```
* agent - MT numarası.
* status - MT durumu. (AVAILABLE=Müsait, TALKING=Çağrıda, LOGGED_OUT=Çevrimdışı, ON_BREAK=Molada)
* queues - MT'nin üye olduğu kuyruklar.

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**PARAMETRELER**

Kullanılacak parametreler aşağıdakilerdir.
 * agent - Belirli bir MT'nin durumunu öğrenmek için kullanılır.
 * status - Belirli durumdaki MT'leri listelemek için kullanılır. (AVAILABLE, TALKING, LOGGED_OUT, ON_BREAK)
 * queue - Belirli kuyruktaki MT'lerin durumlarını listelemek için kullanılır. 
