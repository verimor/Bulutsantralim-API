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
>http://api.bulutsantralim.com/queues?key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
   {
        "number": 200,
        "name": "Kuyruk 1"
    },
    {
        "number": 201,
        "name": "Kuyruk 2"
    },
    {
        "number": 202,
        "name": "Kuyruk 3"
    }
]
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**KUYRUKTA BEKLEYENLER LİSTESİNE ERİŞİM**
----
Santralinizdeki kuyrukta bekleyenlerin listesine erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde kuyrukta bekleyenlerin listesi döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUKTA BEKLEYENLER LİSTESİNE ERİŞİM ÖRNEĞİ**

>https://api.bulutsantralim.com/queues/pending?key=K12345678-1234-5678-4321-123456789012
 
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

**KUYRUKDAKİ DAHİLİ LİSTESİNE ERİŞİM**
----
Santralinizdeki kuyruğun dahili sırasını listeler. Bunun için GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda OK döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUKDAKİ DAHİLİ LİSTESİNE ERİŞİM ÖRNEĞİ**

  >https://api.bulutsantralim.com/queue/user_list?key=K12345678-1234-5678-4321-123456789012Ç&queue_number=200

**BAŞARILI CEVAP**
```json
[{"user":1000,"name":"DAHİLİ-1"},{"user":1001,"name":"DAHİLİ-2"},{"user":1006,"name":"DAHİLİ-3"}]
```

**BAŞARISIZ CEVAPLAR** 

```json
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012Ç
Queue_number value null or none 200
```

**KUYRUĞA DAHİLİ EKLEME, ÇIKARMA VEYA YER DEĞİŞTİRME**
----
Santralinizdeki kuyruklara dahili ekleme, çıkarma veya yer değiştirme için kullanılır. Bunun için GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda OK döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUĞA DAHİLİ EKLEME, ÇIKARMA VEYA YER DEĞİŞTİRME ÖRNEĞİ**
  >https://api.bulutsantralim.com/queue/manage_users?key=K12345678-1234-5678-4321-123456789012Ç&queue_number=200&user_list=1000,1001,1002

**BAŞARILI CEVAP**
```json
OK
```

```json
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012Ç
user_list value null or none
User value null or none 1001
Queue_number value null or none 200
```

**PARAMETRELER**

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.
  * **key** = Size özel oluşturulmuş API anahtarınızdır.
  * **queue_number** = Dahili ayarını değiştirmek istediğiniz kuyruğun numarası.
  * **user_list** = Kuyruğa dahili eklemek, çıkarmak veya yerini değiştirmek için göndermeniz gereken değer.
  * *user* = Eklemek veya silmek istediğiniz tek bir dahilinin numarası.
  * *name* = Dahilinin ismi

 **Not:** API ile dakikada 10 istek (request) gönderebilirsiniz. Request limitini aştığınızda 429 (Too Many Requests) hatası döner.
