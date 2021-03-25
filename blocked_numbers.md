**KARALİSTEYE ERİŞİM**
----

**HAZIRLIK** Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
 
Karalisteye erişmek ve ekleme yapmak için api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde id döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner

**KARALİSTEYE ERİŞİM ÖRNEĞİ**
----

**ÖRNEK URL**
>http://api.bulutsantralim.com/blocked_numbers?key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
{"blocked_numbers":[{
  "id":4274,
  "number":"905531234567"
  }],
"pagination":{
  "page":1,
  "total_count":1,
  "total_pages":1,
  "limit":10
  }
}
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 401 Unauthorized
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**KARALİSTEYE EKLEME ÖRNEĞİ**
----

```json
POST http://api.bulutsantralim.com/blocked_numbers
Host: api.bulutsantralim.com
Content-Type: application/json
Accept: */*

{
 "key" : "K12345678-1234-5678-4321-123456789012",
 "number" : "05531234567"
}
```
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
20212
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
number required
```

**KARALİSTEDEN SİLME ÖRNEĞİ**
----

**ÖRNEK URL**
>http://api.bulutsantralim.com/blocked_numbers/delete?key=K12345678-1234-5678-4321-123456789012&number=05531234567

**BAŞARILI CEVAP**

```
HTTP/1.1 200 OK
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 401 Unauthorized
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

