**ÇAĞRI SONLANDIRMA**
----
  Uygulamalarınız üzerinden santralde devam eden bir çağrıyı sonlandırmak için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde +OK döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.

**ÇAĞRI SONLANDIRMA ÖRNEĞİ**

>http://api.bulutsantralim.com/hangup/f3797dfc-a818-11e7-bf70-cb295b6663ce?key=K12345678-1234-5678-4321-123456789012

**BAŞARILI CEVAP:**

```json
HTTP/1.1 200 OK
+OK
```
**BAŞARISIZ CEVAP:**

```json
HTTP/1.1 400 Bad Request
No such channel!
```
**PARAMETRELER**
   Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.
  * **key** = Size özel oluşturulmuş API anahtarınızdır.
  * **id** = Sonlandırmak istediğiniz çağrının UUID'si. [Yeni çağrı başlattığınızda](https://github.com/verimor/Bulutsantralim-API/blob/master/begin_call.md) API'den dönen UUID'yi kullanabilirsiniz veya [Olay Bildirmeyle](https://github.com/verimor/Bulutsantralim-API/blob/master/report_event.md) gelen UUID'leri kullanabilirsiniz.
