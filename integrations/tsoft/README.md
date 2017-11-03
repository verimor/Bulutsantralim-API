**T-Soft – Bulutsantralim Entegrasyonuyla Neler Yapabilirsiniz?**
----
T-Soft entegrasyonunun amacı ve özellikleri hakkında bilgi almak için şu sayfayı inceleyebilirsiniz:
https://www.bulutsantralim.com/entegrasyonlar/tsoft-bulutsantralim-entegrasyonu/

**Kurulum**
----
* Siparişim Ne Durumda?
  * [Santral Ayarlarım](https://oim.verimor.com.tr/switch/domain/edit) sayfasına gidin ve **E-Ticaret Entegrasyonu** başlığını bulun.
  * **E-Ticaret Yazılımı** kutusunda **T-Soft**'u seçin.
  * **Servis Adı** bölümüne Tcallcenter => Ayarlar sayfasında Servis Url kutusundaki adresi girin.
  * **Servis Anahtarı** bölümüne Tcallcenter => Ayarlar sayfasında sağ alt köşedeki uygulama anahtarını girin.
  * **Müşteri Temsilcisi** kutusundan, Müşteri temsilcisi hedefini seçin.
* Otomatik Aramayla Kapıda Ödeme Onayı Alma
  * **Tcallcenter** ekranını açın.
  * Sağ üst köşedeki **Ayarlar** düğmesine basın.
  * **Servis Anahtarı** bölümüne [Santral Ayarlarım](https://oim.verimor.com.tr/switch/domain/edit) sayfasındaki API Anahtarınızı (key) girin.
  * Bu bilgiler doğrulandığında Verimorda bulunan ayarlarınız otomatik olarak diğer kutulara dolacaktır.
  * Ayarları yapıp **Kaydet** düğmesine basın.
  
  *Not : T-Soft yönetim paneli ayarlarından telefonla onaylama ayarının da aktif olması gerekmektedir.*
 
* Müşteri Bilgilerinin Çağrı Merkezi Ekranında Açılması
  * [Santral Ayarlarım](https://oim.verimor.com.tr/switch/domain/edit) sayfasındaki **CRM Entegrasyonu** başlığını bulun.
  * Almak istediğiniz çağrı olaylarını seçin.
  * Tcallcenter => Ayarlar sayfasının sağ alt köşesindeki uygulama anahtarını kopyalayın, aşağıdaki adresin sonuna ekleyerek **Bildirilecek URL** kutusuna girin. https://my.tcallcenter.com/service/callevent?token=
  * Kaydedin.
  * Gelen aramayı doğrudan sipariş sorgulamaya yönlendirmek istiyorsanız [Gelen Arama Yönetimi](https://oim.verimor.com.tr/switch/dids) sayfasından ilgili numaraya girip hedef olarak **E-Ticaret Sipariş Sorgula** seçin.
   * Sesli Karşılama Menüsünden de sipariş sorgulamaya yönlendirmek istiyorsanız [Sesli Karşılama Menüsü](https://oim.verimor.com.tr/switch/ivrs) sayfasından ilgili Sesli Karşılama Menüsünde **E-Ticaret Sipariş Sorgula** hedefini seçin.
