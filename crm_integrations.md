# CRM ENTEGRASYONU AYARLARINA ERİŞİM
----
Santralinizin CRM Entegrasyonu ayarlarına erişmek ve güncellemek için kullanılır. Ayarlara erişmek için HTTP GET, güncellemek için HTTP POST metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde CRM Entgrasyonu ayarları döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**CRM ENTEGRASYONU AYARLARINA ERİŞİM ÖRNEĞİ**

>http://api.bulutsantralim.com/crm_integrations?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
{
  "ringing":"on",
  "answered":"on",
  "hangup":"on",
  "notification_url":"https://siteadresi.com/events"
}
```

* ringing - Çalıyor.
* answered - Açıldı.
* hangup - Kapandı.
* notification_url - Bildirilecek URL.

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**CRM ENTEGRASYONU AYARLARINI GÜNCELLEME ÖRNEĞİ**

```json
POST http://api.bulutsantralim.com/crm_integrations
Host: api.bulutsantralim.com
Accept: */*

key=K12345678-1234-5678-4321-123456789012&ringing=on&answered=on&hangup=off&notification_url=https://siteadresi.com/events
```
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
Ok
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```

**PARAMETRELER**

Kullanılacak parametreler aşağıdakilerdir. **Zorunlu** olanlar koyu olarak belirtilmiştir.

* ringing - Çalıyor. 'on' veya 'off' olarak değişebilir.
* answered - Açıldı. 'on' veya 'off' olarak değişebilir.
* hangup - Kapandı. 'on' veya 'off' olarak değişebilir.
* **notification_url** - Bildirilecek URL. Seçtiğiniz çağrı olayları oluştuğu anda, belirttiğiniz URL'e çağrı detaylarını içeren bir HTTP POST isteği gönderilir
