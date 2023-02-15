**DAHİLİNİN DIŞ NUMARASINI (ARAYAN NO) DEĞİŞTİRME**
----
Santralinizdeki dahililerin dış numarasını değiştirmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde OK döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**ÖRNEK**

>https://api.bulutsantralim.com/update_outbound_caller_id?key=K12345678-1234-5678-4321-123456789012&extension=1xxx&caller_id=90850532xxxx

**PARAMETRELER**
* **extension** = Dış numarası değiştirilecek olan dahili.
* **caller_id** = Dahilinin kullanacağı dış numara. Kullanabileceğiniz numara listesini bu api den öğrenebilirsiniz.
https://github.com/verimor/Bulutsantralim-API/blob/master/caller_ids.md
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
OK
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```
