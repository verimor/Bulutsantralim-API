**KUYRUKLAR LİSTESİNE ERİŞİM**
----
Santralinizdeki kuyrukların listesine erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde kuyrukların listesi döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**KUYRUKLAR LİSTESİNE ERİŞİM ÖRNEĞİ**

>http://api.bulutsantralim.com/queues?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
  {"number":201,"name":"Kuyruk 1"},
  {"number":202,"name":"Kuyruk 2"},
  {"number":203,"name":"Kuyruk 3"},
  {"number":204,"name":"Kuyruk 4"}
]
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```
