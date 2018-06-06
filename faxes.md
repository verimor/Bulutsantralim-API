**FAKS GÖNDERİMİ**

Uygulamalarınız üzerinden faks göndermek için dosyasının içeriğinin base64 ile kodlanmış halini ve diğer bilgileri aşağıdaki şekilde POST etmeniz yeterlidir.
İstek başarılı olduğunda HTTP 200 status kodu ile mesajın Body'sinde faksın id'si döner. İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

```json
POST http://api.bulutsantralim.com/fax_orders
Host: api.bulutsantralim.com
Accept: */*
Content-Length: 481982
Content-Type: application/x-www-form-urlencoded

key=K12345678-1234-5678-4321-123456789012&&local_station_header=Bulutsantralim&remote_station_id=901234567891&filedata=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlcAAAGCCAIAAABCQnHSAAAAAXNSR0IArs4c6QAAAARnQU1BA.....
```
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
20212
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
invalid base64
```
**PARAMETRELER** <br/>
Kullanılacak parametreler aşağıdakilerdir. **Zorunlu** olanlar koyu olarak belirtilmiştir.

* **key** = Size özel oluşturulmuş API anahtarınızdır. https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz.
* **local_station_header:** Gönderici başlığı.
* **remote_station_id:** Alıcı.
* **filedata:** Gönderilecek dosyanın içeriğinin base64 ile kodlanmış hali.
