**ÇAĞRIYI AKTARMA**
----
Santralde devam eden bir çağrıyı aktarmak için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi aşağıdaki
parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde başarı mesajı döner. İstek başarısız
olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.

**ÇAĞRIYI AKTARMA ÖRNEĞİ**

>https://api.bulutsantralim.com/transfer/f3797dfc-a818-11e7-bf70-cb295b6663ce?user_number=1000&key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP**
```
+OK
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```
**Parametreler**

* **user_number** - Aktarmak istediğiniz, bağlı kullanıcılarınızdan birinin dahili numarasıdır.
* **id** - Aktarmak istediğiniz çağrının UUID'si. [Yeni çağrı başlattığınızda](https://github.com/verimor/Bulutsantralim-API/blob/master/begin_call.md) API'den dönen UUID'yi kullanabilirsiniz veya [Olay Bildirmeyle](https://github.com/verimor/Bulutsantralim-API/blob/master/report_event.md) gelen UUID'leri kullanabilirsiniz.
