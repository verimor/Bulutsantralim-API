----
**BULUTSANTRALİM WEB TELEFONUNU KENDİ UYGULAMANIZIN İÇİNDE KULLANMA (IFRAME EMBED)**
----
  Bulutsantralim web telefonunu kendi web uygulamanızın içine iframe ile gömmek için kullanılır.
  Böylece kullanıcılarınız tek pencereyle çalışır ve iki ayrı sisteme login olmak zorunda kalmazlar.

**HAZIRLIK**
----
  Online İşlem Merkezi => Bulut Santralim => Santral Ayarlarım menüsü altından API Anahtarınızı (key) öğrenmelisiniz.
  Ayrıca Online İşlem Merkezi => Abonelik İşlemleri => Personel Hesapları sayfasında, web telefonunu kullanacak her dahili için bir personel hesabı açıp ilgili dahiliyi seçmiş olmalısınız. Karşılığında personel hesabı olmayan dahililer web telefonunu kullanamaz.
  
**DAHİLİ İÇİN TOKEN (ANAHTAR) ALMA ÖRNEĞİ**

  Web telefonunu kendi uygulamanız içinde her açacağınız zaman, o dahili için bir token almak için API'ye POST isteği yapmalısınız. Bu token **1 gün** boyunca güvenli bir şekilde web telefonunu çalıştırmanızı sağlar.

 ```json
POST https://api.bulutsantralim.com/webphone_tokens
Host: api.bulutsantralim.com
Content-Type: application/json
Accept: */*

{
  "key" : "K12345678-1234-5678-4321-123456789012",
  "extension" : "1000"
}
```

**BAŞARILI CEVAP**

```json
HTTP/1.1 200 OK
W03311746-d56d-489b-801f-da610aba71cf
```

**BAŞARISIZ CEVAP**
```json
HTTP/1.1 400 Bad Request
missing extension
```

  Alabileceğiniz hata mesajları ve sebepleri şunlardır:
  
| Hata                               | Açıklama                                       |
|------------------------------------|------------------------------------------------|
| missing extension                  | extension parametresini vermediniz |
| cannot find user for extension     | verdiğiniz dahili (extension) numarası geçersiz, bu numaralı bir dahili bulunamadı |
| cannot find employee for extension | verdiğiniz dahili (extension) için personel hesabı oluşturulmamış |

**WEB TELEFONUNU IFRAME İLE GÖMME ÖRNEĞİ**
----
```html
<iframe style="border: none;" src="https://oim.verimor.com.tr/webphone?token=W03311746-d56d-489b-801f-da610aba71cf" width="275px" height="700px" allow="microphone"></iframe>
```

**DAHİLİNİN DIŞ NUMARASINI (ARAYAN NO) DEĞİŞTİRME**
---
https://github.com/verimor/Bulutsantralim-API/blob/master/user_caller_id.md

**DIŞ NUMARALAR LİSTESİNE ERİŞİM**
---
https://github.com/verimor/Bulutsantralim-API/blob/master/caller_ids.md
