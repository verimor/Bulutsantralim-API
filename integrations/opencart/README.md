**Opencart – Bulutsantralim Entegrasyonuyla Neler Yapabilirsiniz?**
----
Opencart entegrasyonunun amacı ve özellikleri hakkında bilgi almak için şu sayfayı inceleyebilirsiniz:  https://www.bulutsantralim.com/entegrasyonlar/opencart-bulutsantralim-entegrasyonu

Entegrasyon Opencart 2.3.x sürümü ile uyumludur.
----
**Kurulum**
----
* Opencart'ın çalıştığı web sunucusundaki public_html klasörüne [API dosyalarımızı](https://github.com/verimor/Bulutsantralim-API/tree/master/integrations/opencart/public_html/catalog) kopyalayın.

* Opencart yönetim paneli üzerinden kullanıcı adı **bulutsantralim** olan yeni bir kullanıcı hesabı oluşturun.
     * Kullanıcı grubunun **user/api**ye erişme ve değiştirme iznine sahip olduğuna emin olun.

* Opencart yönetim paneli üzerinden **API Key** oluşturun.
     * Sistem > Kullanıcılar > API sayfasını açın.
     * Sağ üst kısımdan ekle (+) düğmesine basın.
     * API adı olarak **Verimor** girin.
     * API anahtarı kutusunun altındaki oluştur düğmesine basın.
     * Durumu açık olarak işaretleyin.
     * Ip adresleri sekmesine tıklayın.
     * **194.49.126.36**, **194.49.126.45**, **194.49.126.18**, **78.189.64.130** ve **85.105.157.28** ip adreslerini ekleyin.
     * Sağ üst kısımdan kaydedin.

* Opencart yönetim paneli üzerinden API'yi etkinleştirin.
     * Sistem > Mağazalar sayfasında mağaza isminin yanındakı düzenle düğmesine basın.
     * Seçenekler sekmesine tıklayın ve **Kasaya Git** başlığın gidin. 
     * Burada **API kullanıcısı** kutusundan Verimor'u seçin. Oluşturduğunuz API ismini seçin ve kaydedin.

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

