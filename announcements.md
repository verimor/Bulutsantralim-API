# SES DOSYALARI YÖNETİMİ
----
Santralinizdeki ses dosyalarının listesine erişmek için kullanılır. Bunun için HTTP GET metodu ile api.bulutsantralim.com adresi
aşağıdaki parametrelerle çağrılır. İstek başarılı olduğunda HTTP 200 Status kodu ile mesajın Body’sinde ses dosyalarının listesi döner. 
İstek başarısız olduğunda ise ilgili HTTP Status kodu ile mesajın Body’sinde hata mesajı döner.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  
**SES DOSYALARI LİSTESİNE ERİŞİM ÖRNEĞİ**

>http://api.bulutsantralim.com/announcements?key=K12345678-1234-5678-4321-123456789012
 
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
[
  {"id":112,"name":"Firmamıza hoşgeldiniz"},
  {"id":113,"name":"Kalite standlarımız gereği"},
  {"id":114,"name":"Mesai dışındayız"},
  {"id":115,"name":"Öğle molası"}
]
```

**BAŞARISIZ CEVAP** 

```json
HTTP/1.1 400 Bad Request 
Gecersiz anahtar: K12345678-1234-5678-4321-123456789012
```



# YENİ SES DOSYASI YÜKLEME
Yeni ses dosyasının ismini ve içeriğinin base64 ile kodlanmış halini POST etmeniz yeterlidir. Başarılı durumda oluşturulan ses kaydının id'si döner.


**YENİ SES DOSYASI YÜKLEME ÖRNEĞİ**
```json
POST http://api.bulutsantralim.com/announcements
Host: api.bulutsantralim.com
Accept: */*
Content-Length: 481982
Content-Type: application/x-www-form-urlencoded

key=K12345678-1234-5678-4321-123456789012&name=kar%C5%9F%C4%B1lama+sesi&sounddata=data:audio/mp3;name:anons.mp3;base64,SUQzAwAAAAAHdlRZRVIAAAAGAAAAMjAxMwBUREFUAAAABgAAADEyMjMAVFhYWAAAACcAAAH__kUAbgBnAGkAbgBlAGUAcgAAAP_-cwBpAGIAIABzAGkAYgAAAFRDT04AAAAPAAAB__5PAHQAaABlAHIAAABHRU9CAAAAKAAAAQD__gAA__5TAGYATQBhAHIAawBlAHIAcwAAAAwAAABkAAAAAAAAAEdFT0IAAACWAAABAP_-AAD__lMAZgBDAEQASQBuAGYAbwAAABwAAABkAAAAAQAAAInGktMGzMdMvxsOxb5i8JMcAAAAZAAAAInGktMGzMdMvxsOxb5i8JNEAAAARAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP_70gAAAA_8AEuAAAAIpIAJcAAAAQAAAS4AAAAgAAAlwAAABP_____AAAw=
```

**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
859
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
Sound file should have one of these extensions: wav mp3 wma m4a aac ac3 amr flac gsm mpeg mp1 mp2 ra spx ogg 3gp
```


# SES DOSYASI GÜNCELLEME
Ses dosyasının ismini ve içeriğinin base64 ile kodlanmış halini PUT etmeniz yeterlidir. Başarılı durumda OK yazısı döner.

** SES DOSYASI GÜNCELLEME ÖRNEĞİ**
```json
PUT http://api.bulutsantralim.com/announcements/21870
Host: api.bulutsantralim.com
Accept: */*
Content-Length: 481982
Content-Type: application/x-www-form-urlencoded

key=K12345678-1234-5678-4321-123456789012&name=kar%C5%9F%C4%B1lama+sesi&sounddata=data:audio/mp3;name:anons.mp3;base64,SUQzAwAAAAAHdlRZRVIAAAAGAAAAMjAxMwBUREFUAAAABgAAADEyMjMAVFhYWAAAACcAAAH__kUAbgBnAGkAbgBlAGUAcgAAAP_-cwBpAGIAIABzAGkAYgAAAFRDT04AAAAPAAAB__5PAHQAaABlAHIAAABHRU9CAAAAKAAAAQD__gAA__5TAGYATQBhAHIAawBlAHIAcwAAAAwAAABkAAAAAAAAAEdFT0IAAACWAAABAP_-AAD__lMAZgBDAEQASQBuAGYAbwAAABwAAABkAAAAAQAAAInGktMGzMdMvxsOxb5i8JMcAAAAZAAAAInGktMGzMdMvxsOxb5i8JNEAAAARAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP_70gAAAA_8AEuAAAAIpIAJcAAAAQAAAS4AAAAgAAAlwAAABP_____AAAw=
```

**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
OK
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
Sound file should have one of these extensions: wav mp3 wma m4a aac ac3 amr flac gsm mpeg mp1 mp2 ra spx ogg 3gp
```


# SES DOSYASI SİLME
Ses dosyasının id ile DELETE etmeniz yeterlidir. Başarılı durumda OK yazısı döner.

**SES DOSYASI SİLME ÖRNEĞİ**
```json
DELETE http://api.bulutsantralim.com/announcements/21870
Host: api.bulutsantralim.com
Accept: */*
Content-Length: 481982
Content-Type: application/x-www-form-urlencoded

key=K12345678-1234-5678-4321-123456789012
```

**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
OK
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
cannot find announcement with id: #{id}
```

**PARAMETRELER**

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir. 
  * **key** = Size özel oluşturulmuş API anahtarınızdır. 
  * **name** = Yüklediğiniz ses dosyasının listede görünecek ismidir.
  * **sounddata** = Ses dosyasının içeriği. Formatı için aşağıdaki başlığa bakınız.
  
**SOUNDDATA FORMATI**
Sounddata parametresi "Data URL" formatında olmalıdır (https://en.wikipedia.org/wiki/Data_URI_scheme, https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/Data_URIs). "ses dosyası.mp3" isimli bir mp3 dosyası için örnek: data:audio/mp3;name:ses+dosyas%C4%B1.mp3;base64,SUQzAwAA... olabilir.

Parçaları açıklayacak olursak:
  * **data:audio/mp3** Yüklenecek olan dosyanın MIME tipidir.
  * **name:ses+dosyas%C4%B1.mp3** Yüklenecek dosyanın diskteki ismidir. Bu örnekte olduğu gibi ismin URL encode edilmiş olması gerekir. Kullandığınız kütüphane bunu yapmıyorsa sizin yapmanız gerekir.
  * **base64,SUQzAwAA...** dosyanın içeriğinin base64 ile kodlanmış halidir. Bu kodlamayı 76 karakterlik satırlar halinde yapMAyınız, ayrıca URL safe alphabet kullanmalısınız (+ karakteri yerine -, / karakteri yerine _ kullanmalısınız). Yani base64 datasının içinde satır sonu (\r\n), + ve / işaretleri geçmemeli. Daha detaylı bilgi için RFC 4648'i inceleyebilirsiniz.
