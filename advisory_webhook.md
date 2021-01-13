**MÜŞTERİ TANIMA**
----
Santralinize gelen çağrıların numarasını müşteri veritabanınızda sorgulayıp, arayana göre santralinizdeki farklı hedeflere (kuyruk, dahili, sesli karşılama vb.) yönlendirmek veya ses kaydı almak için kullanılır.
Çağrı geldiğinde sizin servisinize HTTP GET isteği yapılır, dönen JSON cevabındaki bilgiye göre çağrı yönlendirilir veya ses kaydı alınır.

Eğer arayan numara veritabanınızda bulunmuyorsa, arayanın başka bir telefon numarasını veya müşteri numarasını tuşlamasını isteyebilirsiniz. Bulutsantral istediğiniz uzunluktaki numarayı müşteriden alır ve yine servisinize gönderir.

**Özellikler**
----
  * Çağrınız servisinizin döndüğü cevaba göre yönlendirilebilir.
  * Arayan taraftan tuşlama yapması istenebilir.
  * Ses kaydı alınabilir.

**HAZIRLIK**
----
  Müşteri Tanıma başlığı altındaki ayarları yapmış olmalısınız.
  Online İşlem Merkezi => Bulut Santralim => Gelen Arama Yönetiminde hedef olarak Müşteri Tanımayı seçmiş olmalısınız.
  
**UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ**

```json
GET http://musteri.adresi.com.tr/musteri.json?uuid=651f8a68-782e-11g7-a6b6-5bedc26e2ab3&cli=05301234567&cld=08505321234&step=1
Host: musteri.adresi.com.tr 
Accept: */* 
``` 
**PARAMETRELER**
  * uuid = Çağrının unique ID'si.
  * cli = Arayan kişinin telefon numarası. Bu numara ulusal çağrılar için 05301234567, uluslararası çağrılar için 00493089680211 veya dahili çağrılar için 1003 gibi formatlarda olabilir.
  * cld = Aranan dış numaranız.
  * step = İşlem adımı. Aynı çağrı için servisiniz her sorgulandığında bu numara 1 arttırılarak gönderilir. 

**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (YÖNLENDİRME)** 

```json
{
  "transfer": {
    "greet_name": "Ahmet Yılmaz",
    "announcement_to_caller": 12345,
    "announcement_to_callee": 12346,
    "target": "queue/201"
  }
}
```

```json
{
  "transfer": {
    "greet_phrase": "Günaydın Ahmet Bey. Tamir için teslim ettiğiniz cihazınızın arızası tespit edilmiştir. Sizi teknik ekibe aktarıyorum.",
    "target": "queue/202"
  }
}
```

**SAHALAR**
* greet_name: Opsiyonel. Eğer döndürürseniz müşterinizin ismi TTS ile okunarak karşılanır. "Merhaba, Ahmet Yılmaz. Çağrınızı bağlıyorum" şeklinde okunur. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir.
* greet_phrase: Opsiyonel. Eğer döndürürseniz metin TTS ile okunarak karşılanır. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir.
* announcement_to_caller: Opsiyonel. Eğer döndürürseniz çağrının cevaplanma anında arayan tarafa bu anons dinletilir. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* announcement_to_callee: Opsiyonel. Eğer döndürürseniz çağrının cevaplanma anında aranan tarafa bu anons dinletilir. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* target: Zorunlu. Çağrının hangi hedefe yönleneceğini belirtir. Arayan numara müşteriniz olmasa bile nereye yönlendirileceğini belirtmelisiniz. Bu sahada dönebileceğiniz seçenekleri aşağıdaki listede görebilirsiniz.
* recording_enabled: Opsiyonel. Görüşmenin ses kaydının alınmasını istemiyorsanız false döndürün. Varsayılan olarak true kabul edilir ve görüşme kaydedilir.

**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (TUŞ İSTEME)** 

```json
{
  "prompt": {
    "announcement_id": "123",
    "min_digits": "5",
    "max_digits": "6",
    "retry_count": "3",
    "service_url": "https://musteri.adresi.com/tuslamayan_musteri.php",
    "param_name": "musteri_no",
  }
}
```

```json
{
  "prompt": {
    "phrase": "Merhaba Ahmet Yılmaz. 12345 numaralı son siparişiniz teslim adresinize edilmiştir. Arıza ve iade işlemleri için 1, diğer işlemler için 2 tuşlayınız.",
    phrase_speed: 1.0,
    "min_digits": "1",
    "max_digits": "1",
    "retry_count": "2",
    "service_url": "https://musteri.adresi.com/siparis_sonraki_menu_secim.php",
    "param_name": "secim",
  }
}
```

**SAHALAR**
* announcement_id: Zorunlu. Tuş isterken önce okunacak anons'un ID'si. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* phrase: Zorunlu. Tuş isterken önce okunacak metin. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir.
* phrase_speed: Opsiyonel. Metin okuma hızı. Varsayılan değeri: 1.0, Geçerli hız aralığı: 0.5 - 1.5,
* min_digits: Zorunlu. Tuşlanacak telefon veya müşteri numarasının minimum uzunluğu. Bundan kısa tuşlamalar geçersiz kabul edilir ve tekrar tuşlanması istenir.
* max_digits: Zorunlu. Tuşlanacak telefon veya müşteri numarasının maksimum uzunluğu. Bundan uzun tuşlamalar geçersiz kabul edilir ve tekrar tuşlanması istenir.
* retry_count: Zorunlu. Geçersiz tuşlama durumunda kaç defa daha deneneceği.
* service_url: Opsiyonel. Tuşlamanın sonucunun ayrı bir adrese gönderilmesini istiyorsanız bu sahayı döndürün. Programınızı daha basit tutmak için kullanabilirsiniz. Verilmezse OİM'den girdiğiniz Servis URL'nize iletilir.
* param_name: Opsiyonel. Tuşlanan değerin servisinize iletirken hangi isimle gönderilmesini istiyorsanız burada belirtebilirsiniz. Belirtmezseniz varsayılan olarak "digits" ismiyle gönderilir.


**TUŞLAMADAN SONRA UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ**

```json
GET http://musteri.adresi.com.tr/musteri.json?uuid=651f8a68-782e-11g7-a6b6-5bedc26e2ab3&cli=05301234567&cld=08505321234&step=2&musteri_no=123456&error=
Host: musteri.adresi.com.tr 
Accept: */* 
``` 

```json
GET http://musteri.adresi.com.tr/musteri.json?uuid=651f8a68-782e-11g7-a6b6-5bedc26e2ab3&cli=05301234567&cld=08505321234&step=2&secim=1&error=
Host: musteri.adresi.com.tr 
Accept: */* 
``` 
**PARAMETRELER**
  * uuid = Çağrının unique ID'si.
  * cli = Arayan kişinin telefon numarası. Bu numara ulusal çağrılar için 05301234567, uluslararası çağrılar için 00493089680211 veya dahili çağrılar için 1003 gibi formatlarda olabilir.
  * cld = Aranan dış numaranız.
  * step = İşlem adımı. Aynı çağrı için servisiniz her sorgulandığında bu numara 1 arttırılarak gönderilir.
  * digits = Müşteriniz tarafından tuşlanan rakamlar. Eğer tuşlama yapılmadıysa boş gelir. Bu parametrenin ismini yukarıdaki *param_name* ile değiştirebilirsiniz.
  * error = Tuş alma işlemi sırasında hata oluşması durumunda servisinize bu hatayı bildirmek için bu parametre kullanılır.

**HEDEF (TARGET) SEÇENEKLERİ**

* user/1000: Aranan kişiyi 1000 numaralı dahiliye bağla.
* group/700: Aranan kişiyi 700 numaralı çalma grubuna bağla.
* queue/200: Aranan kişiyi 200 numaralı kuyruğa aktar.
* ivr/10: Aranan kişiyi 10 numaralı Sesli Karşılama Menüsüne aktar.
* external/05321234567: Aranan kişiyi 05321234567 numarasına bağla.
* voicemail/1000: Aranan kişiyi 1000 numaralı dahilinin telesekreterine aktar. 1000 numaralı dahili ulaşılabilir olsa bile.
* announcement/456: Aranan kişiye 456 ID’li Ses Dosyasını dinlet ve çağrıyı sonlandır. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* fax: Aranan kişiye faks sinyali gönder, faks alma işlemini başlat.
* fax/isim@firmaadi.com.tr: Aranan kişiye faks sinyali gönder, faks alma işlemini başlat, faks alınırsa verilen e-posta adresine gönder.
* hangup/hangup: Çağrıyı kapat (normal kapatma sinyali ver).
* hangup/busy: Çağrıyı kapat (meşgul tonu ver).

**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (SES KAYDI ALMA)** 

```json
{
  "record": {
    "announcement_id": "123"
  }
}
```

```json
{
  "record": {
    "phrase": "Sayın Ahmet Yılmaz ses kaydınız alınıyor."
  }
}
```

**SAHALAR**
* announcement_id: Opsiyonel. Ses kaydı alınmadan önce okunacak anons'un ID'si. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* phrase: Opsiyonel. Ses kaydı alınmadan önce okunacak metin. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir.
