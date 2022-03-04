**Opencart – Bulutsantralim Entegrasyonuyla Neler Yapabilirsiniz?**
----
Opencart entegrasyonunun amacı ve özellikleri hakkında bilgi almak için şu sayfayı inceleyebilirsiniz:  https://www.bulutsantralim.com/entegrasyonlar/opencart-bulutsantralim-entegrasyonu

----
**Kurulum**
----
* Kullandığınız Opencart versiyonuna göre aşağıdaki dosyayı indirin, zipten çıkarıp web sunucunuzdaki public_html klasörüne (ana dizine) yükleyin.
    * Opencart v2.3.x için [tıklayınız](https://oim.verimor.com.tr/opencart_v2.zip)
    * Opencart v3.0.x için [tıklayınız](https://oim.verimor.com.tr/opencart_v3.zip)

* Opencart yönetim paneli üzerinden API Key oluşturun.
     * Sistem > Kullanıcılar > API sayfasını açın.
     * Sağ üst kısımdan ekle (+) düğmesine basın.
     * API adı olarak **bulutsantralim** girin.
     * API anahtarı kutusunun altındaki oluştur düğmesine basın.
     * Durumu açık olarak işaretleyin.
     * Ip adresleri sekmesine tıklayın.
     * **194.49.126.36**, **194.49.126.45**, **194.49.126.46**, **194.49.126.18** ip adreslerini ekleyin.
     * Sağ üst kısımdan kaydedin.

* Opencart yönetim paneli üzerinden API'yi etkinleştirin.
     * Sistem > Mağazalar sayfasında mağaza isminin yanındakı düzenle düğmesine basın.
     * Seçenekler sekmesine tıklayın ve **Kasaya Git** başlığın gidin. 
     * Burada **API kullanıcısı** kutusundan bulutsantralim'i seçin.

* Bulutsantralinizdeki ayarları tamamlayın.
     * [Santral Ayarlarım](https://oim.verimor.com.tr/switch/domain/edit) sayfasındaki E-Ticaret Entegrasyonu başlığını bulun.
     * **E-Ticaret Yazılımı** kutusunda **Opencart**'ı seçin
     * **Servis URL** bölümüne site ismini **http://mağazaadresim.com** şeklinde girin.
     * **Servis Anahtarı** bölümüne Opencart yönetim panelinden oluşturduğunuz API anahtarını girin.
     * **Müşteri Temsilcisi** kutusundan, Müşteri temsilcisi hedefini seçin.
     * **Kapıda Ödeme Onayı**nı açın.
     * **Onay ses kaydı** kutusundan kapıda ödeme onayı için arandığında okunacak ses kaydını seçin.
     * **Arayan No** kutusundan kapıda ödeme onayı için, müşterinin hangi numaradan aranacağını seçin.
     * Kaydedin.
     * Gelen aramayı doğrudan sipariş sorgulamaya yönlendirmek istiyorsanız [Gelen Arama Yönetimi](https://oim.verimor.com.tr/switch/dids) sayfasından ilgili numaraya girip hedef olarak **E-Ticaret Sipariş Sorgula** seçin.
     * Sesli Karşılama Menüsünden de sipariş sorgulamaya yönlendirmek istiyorsanız [Sesli Karşılama Menüsü](https://oim.verimor.com.tr/switch/ivrs) sayfasından ilgili Sesli Karşılama Menüsünde **E-Ticaret Sipariş Sorgula** hedefini seçin.

