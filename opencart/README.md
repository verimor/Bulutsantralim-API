**Bu entegrasyonun çalışabilmesi için aşağıdaki işlemlerin yapılması gerekiyor.**
----
* Opencart'ın çalıştığı web sunucuya bu entegrasyonun çalışması için yazdığımız API dosyaları ilgili klasörlerin altına kopyalanır (dosyalara [burdan](https://github.com/verimor/Bulutsantralim-API/tree/master/opencart/public_html/catalog) erişebilirsiniz).

* Opencart yönetim paneli üzerinden kullanıcı adı **bulutsantralim** olan yeni bir kullanıcı hesabı oluşturulur.
     (Kullanıcının ait olduğu kullanıcı grubunun **user/api**  bölümüne erişme ve değiştirme iznine sahip olmasını sağlayın.)

* Opencart yönetim paneli üzerinden **API Key** oluşturulur.
     * Sistem > Kullanıcılar > API kısmına gelin.
     * Sağ üst kısımdan yeni api ekleyin.
     * API adınızı girin.
     * API anahtarı oluşturun.
     * Durumu açık olarak işaretleyin.
     * Ip adresleri sekmesine tıklayın.
     * **194.49.126.36** ve **194.49.126.18** ip adreslerini ekleyin
     * Sağ üst kısımdan kaydedin.

* Opencart yönetim paneli üzerinden API etkinleştirilir.
     * Sistem > Mağazalar > Düzenle kısmına gelin.
     * Seçenekler sekmesine tıklayın ve **kasaya git** bölümüne gidin. 
     * Burada **API kullanıcısı** kısmını bulun.Oluşturduğunuz API ismini seçin ve kaydedin.

* Bulutsantralim yönetim panelinden aşağıdaki ayarlar yapılır.
     * **OIM**'den Bulut Santral Hizmeti > Santral Ayarlarım > E-Ticaret Entegrasyonu kısmına gelin.
     * **E-Ticaret Yazılımı** bölümünden **Opencartı** seçin
     * **Servis URL** bölümüne site ismini girin (örn.  http://opencart.com)
     * **Müşteri Temsilcisi** bölümünden müşterinin Müşteri temsilcisi ile görüşülmek istendiğinde bağlanacağı hedefi seçin.
     * **Kapıda Ödeme Onayı**nı açık yapın.
     * **Onay ses kaydı** bölümünden kapıda ödeme onayı için arandığında okunacak ses kaydını seçin.
     * **Arayan No** bölümünden kapıda ödeme onayı için, müşterinin hangi numaradan aranacağını seçin.
     * Kaydedin.

* Son olarak Bulutsantralim yönetim panelinden sipariş sorgulama hedefi seçilir. (Gelen arama yönetimi altından veya Sesli Karşılama Menüsü üzerinden **E-Ticaret Sipariş Sorgula** hedefi seçilerek)

