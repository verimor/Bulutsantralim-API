## İÇİNDEKİLER
* [SANTRAL PROGRAMLAMA API](#santral-programlama-api)
* [UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ](#uygulamaniza-g%C3%B6nderi%CC%87lecek-i%CC%87stek-%C3%B6rne%C4%9Fi%CC%87)
* [UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (YÖNLENDİRME)](#uygulamanizin-d%C3%B6nece%C4%9Fi%CC%87-cevap-%C3%B6rnekleri%CC%87-y%C3%B6nlendi%CC%87rme)
* [UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (TUŞ İSTEME)](#uygulamanizin-d%C3%B6nece%C4%9Fi%CC%87-cevap-%C3%B6rnekleri%CC%87-tu%C5%9F-i%CC%87steme)
* [TUŞLAMADAN SONRA UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ](#tu%C5%9Flamadan-sonra-uygulamaniza-g%C3%B6nderi%CC%87lecek-i%CC%87stek-%C3%B6rne%C4%9Fi%CC%87)
* [UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (SES KAYDI ALMA)](#uygulamanizin-d%C3%B6nece%C4%9Fi%CC%87-cevap-%C3%B6rnekleri%CC%87-ses-kaydi-alma)
* [UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (SPEECH TO TEXT)](#uygulamanizin-d%C3%B6nece%C4%9Fi%CC%87-cevap-%C3%B6rnekleri%CC%87-speech-to-text)


----
**SANTRAL PROGRAMLAMA API**
----
Santralinize gelen çağrıların numarasını müşteri veritabanınızda sorgulayıp, arayana göre santralinizdeki farklı hedeflere (kuyruk, dahili, sesli karşılama vb.) yönlendirmek veya ses kaydı almak için kullanılır.
Çağrı geldiğinde sizin servisinize HTTP GET isteği yapılır, dönen JSON cevabındaki bilgiye göre çağrı yönlendirilir veya ses kaydı alınır.

Eğer arayan numara veritabanınızda bulunmuyorsa, arayanın başka bir telefon numarasını veya müşteri numarasını tuşlamasını isteyebilirsiniz. Bulutsantral istediğiniz uzunluktaki numarayı müşteriden alır ve yine servisinize gönderir.

**Özellikler**

  * Çağrınız servisinizin döndüğü cevaba göre yönlendirilebilir.
  * Arayan taraftan tuşlama yapması istenebilir.
  * Ses kaydı alınabilir.

**HAZIRLIK**

  Santral Programlama Entegrasyonu başlığı altındaki ayarları yapmış olmalısınız.
  Online İşlem Merkezi => Bulut Santralim => Gelen Arama Yönetiminde hedef olarak Santral Programlama API seçmiş olmalısınız.

----
**UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ**
----

```json
GET https://musteri.adresi.com.tr/musteri.json?uuid=651f8a68-782e-11g7-a6b6-5bedc26e2ab3&cli=05301234567&cld=08505321234&step=1
Host: musteri.adresi.com.tr 
Accept: */* 
``` 
**PARAMETRELER**
  * uuid = Çağrının unique ID'si.
  * cli = Arayan kişinin telefon numarası. Bu numara ulusal çağrılar için 05301234567, uluslararası çağrılar için 00493089680211 veya dahili çağrılar için 1003 gibi formatlarda olabilir.
  * cld = Aranan dış numaranız.
  * step = İşlem adımı. Aynı çağrı için servisiniz her sorgulandığında bu numara 1 arttırılarak gönderilir. 

----
**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (YÖNLENDİRME)**
----

```json
{
  "transfer": {
    "greet_name": "Ahmet Yılmaz",
    "lang": "tr-TR",
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
    "lang": "tr-TR",
    "target": "queue/202"
  }
}
```

**SAHALAR**
* greet_name: Opsiyonel. Eğer döndürürseniz müşterinizin ismi TTS ile okunarak karşılanır. "Merhaba, Ahmet Yılmaz. Çağrınızı bağlıyorum" şeklinde okunur. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir.
* greet_phrase: Opsiyonel. Eğer döndürürseniz metin TTS ile okunarak karşılanır. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir. En fazla 300 karakter uzunluğunda olmalıdır.
* announcement_to_caller: Opsiyonel. Eğer döndürürseniz çağrının cevaplanma anında arayan tarafa bu anons dinletilir. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* announcement_to_callee: Opsiyonel. Eğer döndürürseniz çağrının cevaplanma anında aranan tarafa bu anons dinletilir. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* target: Zorunlu. Çağrının hangi hedefe yönleneceğini belirtir. Arayan numara müşteriniz olmasa bile nereye yönlendirileceğini belirtmelisiniz. Bu sahada dönebileceğiniz seçenekleri aşağıdaki listede görebilirsiniz.
* recording_enabled: Opsiyonel. Görüşmenin ses kaydının alınmasını istemiyorsanız false döndürün. Varsayılan olarak true kabul edilir ve görüşme kaydedilir.

----
**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (TUŞ İSTEME)**
----

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
    "phrase_speed": 1.0,
    "lang": "tr-TR",
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
* phrase: Zorunlu. Tuş isterken önce okunacak metin. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir. En fazla 300 karakter uzunluğunda olmalıdır.
* phrase_speed: Opsiyonel. Metin okuma hızı. Varsayılan değeri: 1.0, Geçerli hız aralığı: 0.5 - 1.5,
* lang: Opsiyonel. Okunacak metnin dili. Varsayılan değeri: "tr-TR", Geçerli değerler: "tr-TR", "en-US", "ar-XA",
* min_digits: Zorunlu. Tuşlanacak telefon veya müşteri numarasının minimum uzunluğu. Bundan kısa tuşlamalar geçersiz kabul edilir ve tekrar tuşlanması istenir. (retry_count değerine göre) 
* max_digits: Zorunlu. Tuşlanacak telefon veya müşteri numarasının maksimum uzunluğu. Tuşlama bu uzunluğa geldiğinde tuş isteme tamamlanır.
* timeout: Opsiyonel. Min:1, Maks:10, Varsayılan 6'dır. Tuşlama için bekleme süresidir. Bu süre içerisinde tuşlama yapılmazsa tekrar tuşlama yapılması istenir. (retry_count değerine göre)
* digit_timeout: Opsiyonel. Min:1, Maks:10, Varsayılan 3'tür. Tuşlama başladıktan sonra tuşlamalar arasındaki bekleme süresidir. max_digits uzunluğuna kadar tuşlamalarda digit_timeout süresinden sonra tuş isteme tamamlanır.
* retry_count: Zorunlu. Tuşlama yapılmadığında veya geçersiz tuşlama durumunda kaç defa daha deneneceği. 0 (Sıfır) değeri tekrar deneme yapılmaması kullanılır.
* service_url: Opsiyonel. Tuşlamanın sonucunun ayrı bir adrese gönderilmesini istiyorsanız bu sahayı döndürün. Programınızı daha basit tutmak için kullanabilirsiniz. Verilmezse OİM'den girdiğiniz Servis URL'nize iletilir.
* param_name: Opsiyonel. Tuşlanan değerin servisinize iletirken hangi isimle gönderilmesini istiyorsanız burada belirtebilirsiniz. Belirtmezseniz varsayılan olarak "digits" ismiyle gönderilir.


**TUŞLAMADAN SONRA UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ**
----

```json
GET https://musteri.adresi.com.tr/musteri.json?uuid=651f8a68-782e-11g7-a6b6-5bedc26e2ab3&cli=05301234567&cld=08505321234&step=2&musteri_no=123456&error=
Host: musteri.adresi.com.tr 
Accept: */* 
``` 

```json
GET https://musteri.adresi.com.tr/musteri.json?uuid=651f8a68-782e-11g7-a6b6-5bedc26e2ab3&cli=05301234567&cld=08505321234&step=2&secim=1&error=
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
* tts/tr-TR/Bu bir test cümlesidir: Aranan kişiye ilgili metni TTS ile dinlet ve çağrıyı sonlandır. Geçerli diller: ‘tr-TR’, ‘en-US’ ve ‘ar-XA’. Bu özelliği kullanabilmek için TTS modülüne sahip olmanız gerekir.


----
**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (SES KAYDI ALMA)**
----

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
    "phrase": "Sayın Ahmet Yılmaz ses kaydınız alınıyor.",
    "lang": "tr-TR"
  }
}
```

**SAHALAR**
* announcement_id: Opsiyonel. Ses kaydı alınmadan önce okunacak anons'un ID'si. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* phrase: Opsiyonel. Ses kaydı alınmadan önce okunacak metin. Bu özelliğin kullanılabilmesi için TTS modülünü satın almış olmanız gerekir. En fazla 300 karakter uzunluğunda olmalıdır.

----
**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEKLERİ (SPEECH TO TEXT)**
----

```json
{
  "speech_to_text": {
    "announcement_id": "123",
    "recognation_duration": 10
  }
}
```

**KONUŞMA ÇEVRİLDİLTEN SONRA UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ**
```json
GET https://musteri.adresi.com.tr/musteri.json?uuid=651f8a68-782e-11g7-a6b6-5bedc26e2ab3&cli=05301234567&cld=08505321234&step=2&musteri_no=123456&error=&result=busesçevrildi
Host: musteri.adresi.com.tr 
Accept: */* 
``` 
Görüleceği üzere tarafınıza gelen isteklerde "result" parametresi ile çevrilen ses metni bulunur. Bu aksiyonu aynı çağrı içinde 10 kez kullanım hakkına sahipsiniz. Daha sonra çağrı yedek hedefe yönlendirilir.

**SAHALAR**
* announcement_id: Karşıdaki kişinin konuşması metine çevrilmeden önce okunacak anons'un ID'si. Ses dosyası ID’lerinizi [API](https://github.com/verimor/Bulutsantralim-API/blob/master/announcements.md) ile veya [Online İşlem Merkezi]( https://oim.verimor.com.tr/switch/announcements) üzerinden görebilirsiniz.
* recognation_duration: Karşıdaki kişinin konuşması için tanınan maksimum süre. 1 ile 10 arasında olmalıdır. Varsayılan olarak 10'dur. Sistem karşı tarafın konuşmasının bittiğini anlayıp, bu süreyi beklemeden sesi metine çevirebilmektedir. 

----
