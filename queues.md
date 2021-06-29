*KUYRUKLAR*
----

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.

**KUYRUKLAR LİSTESİNE ERİŞİM**
----
Santralinizdeki kuyrukların listesine erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde kuyrukların listesi döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUKLAR LİSTESİNE ERİŞİM ÖRNEĞİ**

```json
HTTP/1.1 200 OK
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**KUYRUKTA BEKLEYENLER LİSTESİNE ERİŞİM**
----
Santralinizdeki kuyrukta bekleyenlerin listesine erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde kuyrukta bekleyenlerin listesi döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUKTA BEKLEYENLER LİSTESİNE ERİŞİM ÖRNEĞİ**

>http://api.bulutsantralim.com/queues/pending?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
    {
        "queue_number": "200",
        "uuid": "a7713781-xxxx-44b0-xxxx-38f24c4b55bb",
        "caller_id": "905320000000",
        "joined_at": "1624947819"
    },
    {
        "queue_number": "202",
        "uuid": "a7713781-cccc-44b0-cccc-38f24c4b55bb",
        "caller_id": "905320000001",
        "joined_at": "1624947822"
    }
]
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

 **Not:** API ile dakikada 10 istek (request) gönderebilirsiniz. Request limitini aştığınızda 429 (Too Many Requests) hatası döner.
