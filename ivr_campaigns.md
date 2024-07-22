## İÇİNDEKİLER
* [OTOMATİK ARAMA KAMPANYASI OLUŞTURMA](#otomati%CC%87k-arama-kampanyasi-olu%C5%9Fturma)
* [OTOMATİK ARAMA KAMPANYASI OLUŞTURMA - RAPOR ALIMI](#otomati%CC%87k-arama-kampanyasi-raporu-alimi)
* [OTOMATİK ARAMA KAMPANYASI SİLME](#otomati%CC%87k-arama-kampanyasi-si%CC%87lme)
* [OTOMATİK ARAMA KAMPANYASI DURDURMA](#otomati%CC%87k-arama-kampanyasi-durdurma)


----
**OTOMATİK ARAMA KAMPANYASI OLUŞTURMA**
----
Yeni otomatik arama kampanyasını oluşturmak için **HTTP(S) POST JSON** yöntemini kullanabilirsiniz.
Aşağıdaki örnekte olduğu gibi bir JSON string POST etmeniz yeterlidir.

**IVR KAMPANYA BAŞLATMA ÖRNEĞİ**
```json
POST https://api.bulutsantralim.com/ivr_campaigns.json
Host: api.bulutsantralim.com
Content-Type: application/json
Accept: */*

{
    "key" : "K12345678-1234-5678-4321-123456789012",
    "call_type": "ivr",
    "name" : "Memnuniyet anketi",
    "date_range_begin" : "2022-09-12",
    "date_range_end" : "2022-09-12",
    "time_range_begin" : "09:00",
    "time_range_end" : "18:00",
    "active_days" : [1,2,3,4,5,6,7],
    "max_thread_count": 1,
    "ring_timeout" : 30,
    "cli" : "902129630131",
    "welcome_announcement_id" : 128,
    "call_retries" : 2,
    "webhook_url" : "https://sizin.adresiniz.com.tr/bildirim/yolu",
    "digit_target_0" : "announcement/421",
    "digit_target_1" : "announcement/421",
    "digit_target_2" : "user/1001",
    "digit_target_3" : "group/700",
    "digit_target_4" : "ivr/10",
    "digit_target_5" : "announcement/428",
    "digit_target_6" : "external/05321234567",
    "digit_target_7" : "voicemail/1003",
    "digit_target_8" : "queue/201",
    "digit_target_9" : "tts/tr-TR/Bu bir test cümlesidir.",
    "digit_target_star" : "restart",
    "digit_target_square" : "user/1000",
    "timeout_target" : "",
    "invalid_target" : "",
    "digit_retries" : 1,
    "digit_timeout" : 4,
    "is_commercial" : false,
    "phone_list" : [
        {"phone" : "05512369874", "phrase" : "#429 12/05/2017 #430 102.45 #431", "lang" : "tr-TR"}
        {"phone" : "05651236547", "phrase" : "#429 12/05/2017 #430 65.12 #431", "lang" : "tr-TR"}
      ]
}
```

**KUYRUK (ÖNGÖRÜLÜ) KAMPANYA BAŞLATMA ÖRNEĞİ**
```json
POST https://api.bulutsantralim.com/ivr_campaigns.json
Host: api.bulutsantralim.com
Content-Type: application/json
Accept: */*

{
    "key": "K12345678-1234-5678-4321-123456789012",
    "call_type": "queue",
    "name": "Queue Test (API)",
    "date_range_begin": "2022-09-12",
    "date_range_end": "2022-09-12",
    "time_range_begin": "00:00",
    "time_range_end": "23:59",
    "active_days" : [1,2,3,4,5,6,7],
    "max_thread_count": 1,
    "thread_multiplier": 1,
    "queue_number": 204,
    "ring_timeout": 30,
    "cli": "902129630131",
    "call_retries": 0,
    "phone_list": [
        { "phone": "05512369874" },
        { "phone": "05651236547" }
    ]
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
name can't be blank
```
**PARAMETRELER** <br/>
Kullanılacak parametreler aşağıdakilerdir. **Zorunlu** olanlar koyu olarak belirtilmiştir.

* **key** = Size özel oluşturulmuş API anahtarınızdır. https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz.
* **call_type** = Otomatik aramanın tipi."queue" ya da "ivr" olabilir.
* **queue_number** = Kuyruk tipi otomatik aramalarda, çağrıların hangi kuyruğa aktarılacağını belirtir.
* **thread_multiplier** = Kuyruk tipi otomatik aramalarda, eşzamanlı olarak, müsait temsilci sayısının kaç katı arama yapılacağını belirtir.
* **max_thread_count:** Kampanya için, eşzamanlı maksimum çağrı sayısını belirtir. Bu parametre belirtilmezse, santralin değerleri referans alınır. (Santral ayarlarında, "Otomatik Arama Kanal Sayısı" değeri referans alınır. Bu ayar için "Otomatik Arama / Sesli Mesaj (Çoklu) modülü gereklidir.)
* **name:** Kampanyanın adı.
* **date_range_begin:** Opsiyonel. Kampanyanın aramaya başlayacağı tarih, YYYY-AA-GG formatında olmalıdır. Gönderilmezse o anki tarih kullanılır.
* **date_range_end:** Opsiyonel. Kampanyanın arama bitiş tarihi. YYYY-AA-GG formatında olmalıdır. Gönderilmezse date_range_begin değeri kullanılır.
* **time_range_begin:** Opsiyonel. Kampanyanın çalışma saatlerinin başlangıcı. SS:DD (veya S:DD) formatında olmalı. Gönderilmezse "00:00" değeri kullanılır.
* **time_range_end:** Opsiyonel. Kampanyanın çalışma saatlerinin bitişi. SS:DD (veya S:DD) formatında olmalı. Gönderilmezse "23:59" değeri kullanılır.
* **active_days:** Kampanyanın çalışma günleri. 1=Pazartesi, 7=Pazar olacak şeklinde çalışma günlerini integer array olarak verip, kampanyanın haftanın sadece belirli günleri çalışmasını sağlayabilirsiniz.
* **ring_timeout:** Aranan numara çalarken beklenecek süre (saniye), 25 – 60 sn. arasında olabilir.
* **cli:** Arayan numara. Karşı taraf bu numarayı görür.
* **welcome_announcement_id:** Aranan numaralara dinletilecek ses dosyasının ID’si. Bu ses dinletilip peşinden tuşlama beklenir. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* **call_retries:** Tekrar arama sayısı. Meşgul, ulaşılamıyor, cevap yok gibi durumlarda numaranın kaç defa daha aranacağını belirtir.
* **webhook_url:** Tuşlamaların bildirileceği URL. Doluysa tüm tuşlamalar bu URL’e gönderilir. Kampanya oluşturulurken bu URL’e boş bir POST request’i gönderilip 200 dönmesi beklenir, bu şekilde URL’i doğruluyoruz. Aranan kişi tuşlama yaptıktan sonra bir yere yönlenmeyecekse, sadece tuşlamayı kaydetmek istiyorsanız, tuşa hedef olarak anons verebilirsiniz.
* **digit_target0 .. digit_target_9:** Aranan kişi 0 – 9 tuşlarına bastığında yönlendirilecek hedefler (gerçekleşecek eylemler). Verebileceğiniz hedeflerin listesi aşağıda listelenmiştir. 0-9, star, square, timeout, invalid’den en az birisi için hedef verilmesi zorunludur.
* **digit_target_star:** Aranan kişi yıldız (*) tuşuna bastığında yönlendirilecek hedef (gerçekleşecek eylem). Verebileceğiniz hedeflerin listesi aşağıda listelenmiştir. 0-9, star, square, timeout, invalid’den en az birisi için hedef verilmesi zorunludur.
* **digit_target_square:** Aranan kişi kare (#) tuşuna bastığında yönlendirilecek hedef (gerçekleşecek eylem). Verebileceğiniz hedeflerin listesi aşağıda listelenmiştir. 0-9, star, square, timeout, invalid’den en az birisi için hedef verilmesi zorunludur.
* **timeout_target:** Aranan kişi ses kaydını dinledikten sonra digit_timeout süresi içinde bir tuşa basmadığında ve retry_count adedi kadar tekrar denemenin sonunda yönlendirilecek hedef (gerçekleşecek eylem). Verebileceğiniz hedeflerin listesi aşağıda listelenmiştir. 0-9, star, square, timeout, invalid’den en az birisi için hedef verilmesi zorunludur.
* **invalid_target:** Aranan kişi ses kaydını dinledikten sonra hatalı bir tuşa bastığında ve retry_count adedi kadar tekrar denemenin sonunda yönlendirilecek hedef (gerçekleşecek eylem). Verebileceğiniz hedeflerin listesi aşağıda listelenmiştir. 0-9, star, square, timeout, invalid’den en az birisi için hedef verilmesi zorunludur.
* **digit_retries:** Tuşlama tekrar sayısı. Geçersiz tuşlama yapıldığında veya hiç tuşlama yapılmayıp digit_timeout süresi dolduğunda, ilgili uyarı okunup Menü baştan okunur.
* **digit_timeout:** Opsiyonel. Min:1, Maks:10, Varsayılan 4'tür. Ses kaydı dinletildikten sonra burada belirtilen süre kadar bekletilip senaryoya göre ya zaman aşımı hedefine aktarılır yada menü baştan okutulur.
* **phone_list:** Aranacak numara listesi (zorunlu). ‘phone’ aranacak numaradır, ‘905321234567’ veya ‘05321234567’ veya ‘5321234567’ veya uluslararası için ‘00491234567’ şeklinde olmalıdır, ‘phone’ sahası zorunludur. ‘phrase’ sahası bu numaraya okunacak özel mesajı belirtir, formatı için aşağıda Cümle (phrase) Formatı başlığına bakınız. ‘phrase’ sahası zorunlu değildir. ‘lang’ sahası, mesajın hangi dilde okunacağını belirtir. Zorunlu değildir. Gönderilmediği durumda varsayılan olarak ‘tr-TR’ kabul edilir. Geçerli diller: ‘tr-TR’, ‘en-US’ ve ‘ar-XA’.
* **is_commercial:** Opsiyonel. true | false değeri alır. Varsayılan false. Ticari gönderimlerde true olarak belirlemelisiniz.
* **iys_recipient_type:** "BIREYSEL" yada "TACIR" olmalıdır. Ticari gönderimlerde bu alanı zorunlu olarak göndermelisiniz.
* **iys_brand_code:** Sistemde kayıtlı ve onaylı başlıklarınızdan birinin "İYS Marka Kodu" değeri olmalıdır. Ticari gönderimlerde bu alanı zorunlu olarak göndermelisiniz.
* **recording_enabled:** Arama başlar başlamaz kayıt yapılmasını istiyorsanız bu parametreye "true" (String) vermelisiniz.

**HEDEF (TARGET) SEÇENEKLERİ**

* restart: Karşılama mesajını (announcement) veya cümleyi (phrase) tekrar dinlet, “mesajı tekrar dinlemek için 3’e basınız” şeklinde kullanılabilir.
* user/1000: Aranan kişiyi 1000 numaralı dahiliye bağla.
* group/700: Aranan kişiyi 700 numaralı çalma grubuna bağla.
* queue/200: Aranan kişiyi 200 numaralı kuyruğa aktar.
* ivr/10: Aranan kişiyi 10 numaralı Sesli Karşılama Menüsüne aktar.
* external/05321234567: Aranan kişiyi 05321234567 numarasına bağla.
* voicemail/1000: Aranan kişiyi 1000 numaralı dahilinin telesekreterine aktar. 1000 numaralı dahili ulaşılabilir olsa bile.
* announcement/456: Aranan kişiye 456 ID’li Ses Dosyasını dinlet ve çağrıyı sonlandır. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz. Tuşlamaları sadece API ile toplamak istiyorsanız, arayanı başka bir yere yönlendirmeyecekseniz bu seçeneği kullanmalısınız.
* fax: Aranan kişiye faks sinyali gönder, faks alma işlemini başlat.
* fax/isim@firmaadi.com.tr: Aranan kişiye faks sinyali gönder, faks alma işlemini başlat, faks alınırsa verilen e-posta adresine gönder.
* hangup/hangup: Çağrıyı kapat (normal kapatma sinyali ver).
* hangup/busy: Çağrıyı kapat (meşgul tonu ver).
* tts/tr-TR/Bu bir test cümlesidir: Aranan kişiye ilgili metni TTS ile dinlet ve çağrıyı sonlandır. Geçerli diller: ‘tr-TR’, ‘en-US’ ve ‘ar-XA’. Bu özelliği kullanabilmek için TTS modülüne sahip olmanız gerekir.

**CÜMLE (PHRASE) FORMATI**

Karşı tarafa okunacak ‘cümle’, boşlukla ayrılmış ‘kelime’lerden oluşur.
Önceden https://oim.verimor.com.tr/switch/announcements adresinden şu ses dosyalarını yüklediğimizi düşünelim:

* ID: 456, okunan mesaj: “Değerli müşterimiz, son ödeme tarihi”
* ID: 457, okunan mesaj: “olan faturanızın tutarı”
* ID: 458, okunan mesaj: “tur. İyi günler dileriz.”

**ÖRNEK CÜMLE**

>#456 15/11/2017 #457 73.56 #458

Karşı tarafa **“Değerli müşterimiz, son ödeme tarihi on beş kasım iki bin on yedi olan faturanızın tutarı yetmiş üç lira elli altı kuruştur. İyi günler dileriz.”** şeklinde seslendirilecektir.

----
**OTOMATİK ARAMA KAMPANYASI RAPORU ALIMI**
----
Kampanyadaki numaralar arandığında, aramanın durumu ve varsa tuşlama bilgisi, kampanya oluşturulurken verilen webhook_url adresine bir HTTP POST request’i ile gönderilir.

**BİLDİRİM ÖRNEĞİ**

```json
POST https://sizin.adresiniz.com.tr/bildirim/yolu
Host: sizin.adresiniz.com.tr

notification_id=5&notification_date=2017-05-10 13:18:56 UTC&domain_id=429&ivr_campaign_id=131&ivr_campaign_name=Memnuniyet anketi&ivr_lead_id=1878&phone=905321234567&digit=2&status=Başarılı&call_uuid=aacdb242-364b-11e7-8bed-c9aec7093786
```

**BİLDİRİM SAHALARI**

API’nize gönderilecek parametreler aşağıdakilerdir.

* notification_id: Bu bildirime ait unique id.
* notification_date: Bildirimi yapılan olayın gerçekleştiği tarih saat.
* domain_id: Bulutsantral ID’si
* ivr_campaign_id: Otomatik IVR arama kampanyasının ID’si
* ivr_campaign_name: Otomatik IVR arama kampanyasının adı
* ivr_lead_id: Kampanyadaki numaranın ID’si
* phone: Aranan telefon numarası
* digit: Aranan kişinin yaptığı tuşlama. Şu değerleri alabilir:
  * Boş string (“”): Çağrı başlamadı (numara meşgul, ulaşılamıyor, hatalı numara vs.). Bu durumda status sahasında ilgili hata yazar.
  * 0-9 arası bir rakam: Geçerli bir tuşlama yapıldı.
  * tire (-) işareti: tuşlama yapılmadı ve timeout oluştu.
  * ünlem (!) işareti ve rakam (örn: !4): Geçerli olmayan (tuşlama ayarlarında karşılığı olmayan) bir tuşa basıldı.
* call_uuid: Tuşlama için yapılan çağrının UUID’si. Yukarıdaki olay bildirme API’sini de kullanıyorsanız, orada gelen UUID ile eşleştirebilirsiniz.
* status: Çağrı durumu. “Cevaplandı”, “Cevapsız”, “Reddedildi”, “Hata” gibi açıklamaları içerir. “Cevaplandı” hariç her durum hata olarak yorumlanabilir. Linkten tüm çağrı durumlarına ulaşabilirsiniz.
[Çağrı Sonuç Kodları ve Açıklamaları](https://github.com/verimor/Bulutsantralim-API/blob/master/cagri-sonuc-kodlari.md)

----
**OTOMATİK ARAMA KAMPANYASI SİLME**
----
Otomatik arama kampanyasını iptal etmek istediğinizde (örneğin arayacağınız müşteri sizi aradıysa), oluşturduğunuz kampanyayı silmek için **HTTP(S) DELETE** yöntemini kullanabilirsiniz.
Aşağıdaki örnekte olduğu gibi DELETE request’i göndermeniz yeterlidir.

**KAMPANYA SİLME ÖRNEĞİ**

```json
DELETE https://api.bulutsantralim.com/ivr_campaigns/112?key=K12345678-1234-5678-4321-123456789012
Host: api.bulutsantralim.com
Accept: */*
```

**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
OK
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
Cannot find ivr_campaign with ID 112
```

**PARAMETRELER**
Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.

* **key** = Size özel oluşturulmuş API anahtarınızdır. https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz.
* **Kampanya ID’si (bu örnekte 112):** Silmek istediğiniz kampanyanın ID’si. Bu ID kampanyayı ilk oluşturduğunuzda API tarafından döner. Ayrıca https://oim.verimor.com.tr/switch/ivr_campaigns adresinden de görebilirsiniz.

----
**OTOMATİK ARAMA KAMPANYASI DURDURMA**
----
Otomatik arama kampanyasını durdurmak ve tekrar başlatmak istediğinizde **HTTP(S) PATCH** yöntemini kullanabilirsiniz.
Aşağıdaki örnekte olduğu gibi PATCH request’i göndermeniz yeterlidir.

**KAMPANYA DURDURMA ÖRNEĞİ**

```json
PATCH https://api.bulutsantralim.com/ivr_campaigns/112
Host: api.bulutsantralim.com
Accept: */*

key=K12345678-1234-5678-4321-123456789012&status=off
```
**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
OK
```

**BAŞARISIZ CEVAP**

```json
HTTP/1.1 400 Bad Request
Cannot find ivr_campaign with ID 112
```

**PARAMETRELER**

Kullanılacak parametreler aşağıdakilerdir. Zorunlu olanlar koyu olarak belirtilmiştir.

* **key** Size özel oluşturulmuş API anahtarınızdır. https://oim.verimor.com.tr/switch/domain/edit adresinden görebilir/üretebilirsiniz.
* **Kampanya ID’si (bu örnekte 112):** Durdurmak istediğiniz kampanyanın ID’si. Bu ID kampanyayı ilk oluşturduğunuzda API tarafından döner. Ayrıca https://oim.verimor.com.tr/switch/ivr_campaigns adresinden de görebilirsiniz.
* **status** on veya off olabilir. Kampanyayı durdurmak için off, tekrar başlatmak için on olarak gönderilmesi gerekiyor.
