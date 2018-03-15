**MÜŞTERİ TANIMA**
----
Santralinize gelen çağrıların numarasını müşteri veritabanınızda sorgulayıp, arayana göre santralinizdeki farklı hedeflere (kuyruk, dahili, sesli karşılama vb.) yönlendirmek için kullanılır.
Çağrı geldiğinde sizin servisinize HTTP GET isteği yapılır, dönen JSON cevabındaki bilgiye göre çağrı yönlendirilir.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz ve Müşteri Tanıma başlığı altındaki ayarları yapmış olmalısınız.
  Online İşlem Merkezi => Bulut Santralim => Gelen Arama Yönetiminde hedef olarak Müşteri Tanımayı seçmiş olmalısınız.
  
**UYGULAMANIZA GÖNDERİLECEK İSTEK ÖRNEĞİ**

```json
GET http://musteri.adresi.com.tr/musteri.json?telefon=05301234567
Host: musteri.adresi.com.tr 
Accept: */* 
``` 
**PARAMETRELER** 
  URL'in sonunda arayan kişinin telefon numarası gönderilir. Bu numara ulusal çağrılar için 05301234567, uluslararası çağrılar için 00493089680211 veya dahili çağrılar için 1003 gibi formatlarda olabilir.

**UYGULAMANIZIN DÖNECEĞİ CEVAP ÖRNEĞİ** 

```json
{
  "name": "Ahmet Yılmaz",
  "target": "queue/201"
}
```
**SAHALAR**
* name: Opsiyonel. Eğer döndürürseniz müşterinizin ismi TTS ile okunarak karşılanır. "Merhaba, Ahmet Yılmaz. Çağrınızı bağlıyorum" şeklinde okunur. Bu özelliği kullabılabilmesi için TTS modülünü satın almış olmanız gerekir.
* target: Zorunlu. Çağrının hangi hedefe yönleneceğini belirtir. Arayan numara müşteriniz olmasa bile nereye yönlendirileceğini belirtmelisiniz. Bu sahada dönebileceğiniz seçenekleri aşağıdaki listede görebilirsiniz.

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
