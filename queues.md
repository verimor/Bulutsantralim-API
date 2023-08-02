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

**KUYRUĞA DAHİLİ EKLEME**
----
Santralinizdeki kuyruklara dahili eklemek için kullanılır. Bunun için GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda OK döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUĞA DAHİLİ EKLEME ÖRNEĞİ**

 * Çoklu dahili ekleme işlemlerinde kullanılması gereken:
  >https://api.bulutsantralim.com/queue/add_user?key=K12345678-1234-5678-4321-123456789012Ç&queue_number=200&user_list=1000,1001,1002

 * Tekli dahili ekleme işlemlerinde kullanılması gereken:
  >https://api.bulutsantralim.com/queue/add_user?key=K12345678-1234-5678-4321-123456789012Ç&queue_number=200&user=1006

**BAŞARILI CEVAP**
```json
OK
```

**BAŞARISIZ CEVAPLAR** 

```json
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012Ç

You are trying to add an existing user 1039
```

**KUYRUKDAN DAHİLİ ÇIKARMA**
----
Santralinizdeki kuyruklarda dahili çıkarmak için kullanılır. Bunun için DELETE metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda OK döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUKDAN DAHİLİ ÇIKARMA ÖRNEĞİ**

>DELETE https://api.bulutsantralim.com/queue/user_del?key=K12345678-1234-5678-4321-123456789012Ç&queue_number=204&user=1039
 
**BAŞARILI CEVAP**

```json
OK
```

**BAŞARISIZ CEVAP** 

```json
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012Ç

User value null or none 1039
```

**KUYRUKDAN DAHİLİ SIRALAMASI DEĞİŞTİRME**
----
Santralinizdeki kuyruklarda dahili sıralaması değiştirmek için kullanılır. Bunun için GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda OK döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**KUYRUKDAN DAHİLİ SIRALAMASI DEĞİŞTİRME ÖRNEĞİ**

>https://api.bulutsantralim.com/queue/user_sorting?key=K12345678-1234-5678-4321-123456789012Ç&queue_number=200&user_list=1002,1006,1000
 
**BAŞARILI CEVAP**

```json
OK
```

**BAŞARISIZ CEVAP** 

```json
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012Ç
```

**PARAMETRELER**

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.
  * **key** = Size özel oluşturulmuş API anahtarınızdır. 
  * **user_list** = Kuyruğa dahili eklemek veya yerini değiştirmek için göndermeniz gereken değer.
  * **queue_number** = Dahili ayarını değiştirmek istediğiniz kuyruğun numarası.
  * *user* = Eklemek veya silmek istediğiniz tek bir dahilinin numarası.
  * *name* = Dahilinin ismi

 **Not:** API ile dakikada 10 istek (request) gönderebilirsiniz. Request limitini aştığınızda 429 (Too Many Requests) hatası döner.
