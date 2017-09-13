**ÇAĞRI BAŞLATMA**
----
  Uygulamalarınız üzerinden santraldeki bir dahiliye çağrı başlatmak için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde call_uuid döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**ÇAĞRI BAŞLATMA ÖRNEĞİ**

http://api.bulutsantralim.com/originate?key=K12345678-1234-5678-4321-123456789012&extension=1001&destination=908505320000

* **BAŞARILI CEVAP:**

  * **Code:** HTTP/1.1 200 OK <br />
    **Content:** `{ 358c20bc-fd86-11e5-87a2-157d41a07454 }`

* **BAŞARISIZ CEVAP:**

  * **Code:** HTTP/1.1 400 Bad Request <br />
    **Content:** `{extension 1005 not found }`
    
* **PARAMETRELER** <br />
   Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir. <br />
  * **key** = Size özel oluşturulmuş API anahtarınızdır. <br />
  * **extension** = Aramanın bağlanacağı dahili numaradır. <br />
  * **destination** = Aranacak olan numara. (908505320000 formatında olmalı.) <br />
  * caller_id = Aramada kullanılacak olan dış numara. (908505320000 formatında olmalı. Kullanılacak dış numaranın mutlaka en az bir           dahilide seçili olması gerekir. Bu parametre verilmezse dahilide seçili olan dış no kullanılacaktır.) <br />
  * manual_answer = Değeri true olarak gönderilirse dahilinin telefonu açmasını bekler. (Normalde otomatik olarak dahili açılır ve karşı    numara aranır.)

