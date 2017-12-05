**SES DOSYALARI LİSTESİNE ERİŞİM**
----
Santralinizdeki ses dosyalarının listesine erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde ses dosyalarının listesi döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**SES DOSYALARI LİSTESİNE ERİŞİM**

>http://api.bulutsantralim.com/announcements?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
  {"id":112,"name":"Firmamıza hoşgeldiniz"},
  {"id":113,"name":"Kalite standlarımız gereği"},
  {"id":114,"name":"Mesai dışındayız"},
  {"id":115,"name":"Öğle molası"}
]
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```
