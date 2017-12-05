**DND MODU**
----
Santralinizdeki dahilinin DND modunu açmak ve ya kapatmak için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile başarı mesajı döner.
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**DND MODUNU AÇMA ÖRNEĞİ**

>http://192.168.1.204/dnd/1010?state=on&key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP**
```
Changed DND of 1010 to on.
```

**DND MODUNU KAPATMA ÖRNEĞİ**

>http://192.168.1.204/dnd/1010?state=off&key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP**
```
Changed DND of 1010 to off.
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```
