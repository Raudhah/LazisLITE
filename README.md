# LazisLITE
LazisLITE adalah Software manajemen LAZIS skala kecil untuk 1 kantor cabang. 
Memudahkan mengelola data donatur, transaksi pencatatan Ziswaf, dan laporan-laporan.
LazisLITE berbasis Web, diakses menggunakan browser, baik melalui komputer / laptop maupun Smartphone. 

## KEBUTUHAN LazisLITE
1. Sebuah Komputer Yang menjalankan program Server Apache/Nginx, PHP, dan MySQL.
2. Sebuah Browser yang terhubung dengan komputer server tersebut.  
   Browser dapat berupa PC/Laptop, ataupun sebuah smartphone yang terhubung 

## Fitur Utama LazisLITE
Beberapa fitur utama dari LazisLITE adalah sebagai berikut : 

### Multiple user. 
- Terdapat 3 jenis user utama yaitu : 
  1. Superadmin
     adalah orang yang dapat mengelola konfigurasi dari program. Superadmin dapat mengelola data user (admin pengguna program), mengelola data amil, dan mengelola data jenis donasi, sekaligus melakukan konfigurasi-konfigurasi program (Nama LAZ, logo, dlsb).
  2. Admin
     Adalah orang yang bertugas sehari-hari mencatat dan mengelola transaksi donasi, dan juga mengelola data para donatur.  
- Beberapa user dapat login bersama-sama menggunakan akun yang berbeda.


### Manajemen Jenis Donasi (peruntukan), 
Yang dimaksud jenis donasi disini adalah semisal : Zakat, Shodaqoh/Infaq, Beasiswa, Wakaf, Pendidikan, Anak Yatim, Program lembaga A, Program Lembaga B, dlsb.
Admin dapat menambah, mengedit, menghapus, dan mencari data Jenis Donasi pada Program.

### Manajemen Data Amil
Admin dapat mengelola data para amil yang ada. 
Admin dapat menambah, mengedit, menghapus, dan mencari data Amil pada Program.  
Data Amil yang disimpan meliputi : 
- IDAmil (Otomatis)
- Nama Amil
- Nomor Telepon (Opsional)

### Manajemen Data Donatur
Admin dapat mengelola data donatur yang ada. 
Admin, dapat menambah, mengedit, menghapus, dan mencari data Donatur pada Program.
Data donatur yang disimpan meliputi : 
- IDDonatur (Otomatis)
- Nama Donatur
- Alamat Donatur (Opsional)
- Nomor Telepon (Opsional)

### Pencatatan Data Transaksi
- Admin dapat mengentry data transaksi donasi yang terjadi. 
- Untuk setiap transaksi yang dientry, Admin dapat langsung mencetak data kuitansi. 
- Kuitansi dapat dicetak ulang dengan mencari data Transaksi yang ingin dicetak, kemudian klik pada tombol cetak kuitansi 
- Pada Setiap Data Transaksi yang terjadi selalu tersimpan data sebagai berikut : 
    1. IDTransaksi (Otomatis)
    2. Donatur
    3. Tanggal Transaksi
    4. Peruntukan Jenis Donasi
    5. Jumlah Donasi
    6. Amil
    7. Sumber Donasi (Kotak Infak / Donatur Rutin)


### Laporan-Laporan
Beberapa laporan yang dihasilkan dari LazisLITE antara lain
1. Laporan KESELURUHAN (detail per item) data donasi yang masuk pada rentang waktu tertentu 
2. Laporan REKAP data donasi yang masuk pada rentang waktu tertentu, berdasarkan Peruntukan Jenis Donasi
   Contoh : Zakat sekian juta, Wakaf sekian juta, dst. 
3. Laporan REKAP data donasi yang masuk pada rentang waktu tertentu, berdasarkan Amil 
   Contoh : Amil A sekian juta, Amil B sekian juta
4. Laporan REKAP data donasi per donatur pada rentang waktu tertentu, urut berdasarkan jumlah dari terbesar ke terkecil. 

Yang dimaksud dengan rentang waktu tertentu disini ialah, admin / pengguna dapat memilih untuk menampilkan laporan dari tanggal sekian hingga tanggal sekian. Semisal untuk menampilkan laporan dalam 1 bulan  


# Alur Penggunaan Program oleh Admin
1. Setiap user (Admin) login ke LazisLITE dengan memasukkan username dan password yang telah disediakan. 
2. Admin meng-klik menu Data Donatur untuk mengelola data donatur
3. Admin meng-klik menu Transaksi untuk mencatat data transaksi. Pada pencatatan 
4. Untuk melihat laporan-laporan, Admin meng-klik menu Laporan. 
5. Semisal terdapat perubahan pada Jenis Donasi dan Amil, maka hanya Super Admin yang dapat melakukan penambahan tersebut dengan login pada akun Super Admin

# Konfigurasi
Setiap instalasi program dapat dikustomisasi antara lain : 
- Logo LAZ
- Nama dan alamat LAZ
- Gambar tanda tangan pada kuitansi
- Background Kuitansi
Hanya user dengan level akses SuperAdmin yang dapat mengkustomisasi ini.

# Copyright & Authorship



























