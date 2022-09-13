**NUMARALAR LİSTESİNE ERİŞİM**
----
Santralinizdeki **Arayan Numara** olarak kullanabileceğiniz numaraların listesine erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde numaralarınızın listesi döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**NUMARALAR LİSTESİNE ERİŞİM ÖRNEĞİ**

>https://api.bulutsantralim.com/caller_ids?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
  "908501234567",
  "902121234567",
  "902161234567",
  "902127654321"
]
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```
