# LazisLITE
1. Nama aplikasi yang disebutkan dalam dokumen ini ialah LazisLITE
2. LazisLITE adalah Software manajemen LAZIS skala kecil untuk 1 kantor cabang.
3. LazisLITE Memudahkan mengelola data donatur, transaksi pencatatan Ziswaf, dan laporan-laporan.
4. LazisLITE berbasis Web, diakses menggunakan browser, baik melalui komputer / laptop maupun Smartphone.


## KEBUTUHAN LazisLITE
1. Sebuah Komputer / Laptop Yang menjalankan program Aplikasi Server Apache/Nginx, PHP, dan MySQL. Komputer ini berfungsi sebagai server dan didalamnya terdapat aplikasi ini.. Komputer ini wajib untuk dalam keadaan hidup selama program LazisLITE sedang digunakan. . 
2. Sebuah Browser yang terhubung melalui jaringan / WiFi dengan komputer Server tersebut. Browser dapat berupa PC/Laptop, ataupun sebuah smartphone. Browser dapat berada di komputer yang sama dengan server pada point (1) untuk lebih mengirit anggaran pengeluaran.


# Fitur Utama LazisLITE
Beberapa fitur utama dari LazisLITE adalah sebagai berikut : 

### Multiple user. 
Pada LazisLITE Terdapat 2 jenis user utama yaitu :
1. SuperAdmin 
   Adalah orang yang dapat mengelola konfigurasi dari program. Superadmin dapat mengelola data user (admin pengguna program), mengelola data amil, dan mengelola data jenis donasi, sekaligus melakukan konfigurasi-konfigurasi program (Nama LAZ, logo, dlsb). Hanya terdapat 1 user dengan akses level SuperAdmin. Idealnya yang menjadi SuperAdmin adalah orang IT di lembaga, atau kepala Admin, atau Admin yang dipercaya dengan program ini.
2. Admin 
   Adalah orang yang bertugas sehari-hari mencatat dan mengelola transaksi donasi, dan juga mengelola data para donatur. Dalam 1 lembaga boleh jadi terdapat lebih dari 1 Admin.
Perlu diperhatikan bahwa beberapa user dapat login bersama-sama sekaligus menggunakan akun yang berbeda.



### Manajemen Jenis Donasi (peruntukan), 
1. Yang dimaksud jenis donasi disini adalah semisal : Zakat, Shodaqoh/Infaq, Beasiswa, Wakaf, Pendidikan, Anak Yatim, Program lembaga A, Program Lembaga B, dlsb.
2. LazisLITE dapat menambah, mengedit, menghapus, dan mencari data Jenis Donasi pada Program.
3. Yang dapat melakukan modifikasi pada data Jenis Donasi ialah user dengan akses level SuperAdmin.

### Manajemen Data Amil
1. LazisLITE dapat mengelola data para Amil yang ada.
2. LazisLITE dapat menambah, mengedit, menghapus, dan mencari data Amil.
3. Hanya SuperAdmin yang bisa melakukan modifikasi data Amil pada program.
4. Data Amil yang disimpan meliputi :
   - IDAmil (Otomatis)
   - Nama Amil
   - Nomor Telepon (Opsional)

### Manajemen Data Donatur
1. Admin dapat mengelola data donatur yang ada.
2. Admin, dapat menambah, mengedit, menghapus, dan mencari data Donatur pada Program.
3. Data donatur yang disimpan meliputi :
   - IDDonatur (Otomatis)
   - Nama Donatur
   - Alamat Donatur (Opsional)
   - Nomor Telepon (Opsional)

### Pencatatan Data Transaksi
1. Admin dapat mengentry, mencari, mengubah, dan menghapus data transaksi donasi yang terjadi.
2. Untuk setiap transaksi yang dientry, Admin dapat langsung mencetak data kuitansi dari transaksi tersebut.
3. Pada halaman entry data transaksi, tersedia pilihan untuk memasukkan donatur baru, atau mencari data donatur dari data yang sudah ada.
4. Kuitansi dapat dicetak ulang dengan mencari data Transaksi yang ingin dicetak, kemudian klik pada tombol cetak kuitansi.
5. Pada Setiap Data Transaksi yang terjadi selalu tersimpan data sebagai berikut :
   - IDTransaksi (Otomatis)
   - Donatur
   - Tanggal Transaksi
   - Peruntukan Jenis Donasi
   - Jumlah Donasi
   - Amil
   - Sumber Donasi (Kotak Infak / Donatur Rutin)



### Laporan-Laporan
1. Beberapa laporan yang dihasilkan dari LazisLITE antara lain : 
   - Laporan KESELURUHAN (detail per item) data donasi yang masuk pada rentang waktu tertentu
   - Laporan REKAP data donasi yang masuk pada rentang waktu tertentu, berdasarkan Peruntukan Jenis Dona   - si Contoh : Zakat sekian juta, Wakaf sekian juta, dst.
   - Laporan REKAP data donasi yang masuk pada rentang waktu tertentu, berdasarkan Amil Contoh : Amil A sekian juta, Amil B sekian juta
   - Laporan REKAP data donasi per donatur pada rentang waktu tertentu, urut berdasarkan jumlah dari terbesar ke terkecil. Semisal Donatur A sekian juta, Donatur B sekian juta, dst.
2. Yang dimaksud dengan rentang waktu tertentu disini ialah, admin / pengguna dapat memilih untuk menampilkan laporan dari tanggal sekian hingga tanggal sekian. Semisal untuk menampilkan laporan dalam 1 bulan, 1 tahun, atau rentang waktu berjalan.
3. Laporan dapat dicetak melalui printer, ataupun disimpan dalam bentuk PDF dengan tambahan plugin.

# Lain-Lain

## Alur Penggunaan Program oleh Admin
1. Setiap user (Admin) login ke LazisLITE dengan memasukkan username dan password yang telah disediakan.
2. Admin meng-klik menu Data Donatur untuk mengelola data donatur
3. Admin meng-klik menu Transaksi untuk mencatat data transaksi. Pada pencatatan
4. Untuk melihat laporan-laporan, Admin meng-klik menu Laporan.
5. Semisal terdapat perubahan pada Jenis Donasi dan Amil, maka hanya Super Admin yang dapat melakukan penambahan tersebut dengan login pada akun Super Admin


## Konfigurasi
1. Hanya user dengan level akses SuperAdmin yang dapat melakukan konfigurasi program. 
2. Setiap instalasi program dapat dikustomisasi antara lain :
   - Logo LAZ
   - Nama dan alamat LAZ
   - Gambar tanda tangan pada kuitansi
   - Background Kuitansi


## Backup Database
1. SuperAdmin dapat melakukan Backup Database dengan mengikuti petunjuk yang tersedia pada panduan manual. 
2. Backup Database diperlukan untuk dilakukan secara rutin (semisal 1 bulan sekali) untuk berjaga-jaga apabila terdapat malfungsi pada fisik komputer yang mengakibatkan hilangnya data secara temporer ataupun permanen, baik sebagian ataupun keseluruhan. 
3. Database yang telah dibackup dapat dikembalikan dengan panduan manual yang disediakan.

# Copyright & Authorship
1. LazisLITE didistribusikan dalam MIT License.
2. Anda dapat melaporkan bug atau request fitur pada bagian Issues diatas
3. Mau kontribusi? silakan buat pull request. 
4. Mau dukungan teknis program ini di LAZ tempat kamu bekerja? Contact Author ya

> LazisLite CopyLEFT oleh Raudhah Project
> hubungi kami di salam@raudhahproject.com



























