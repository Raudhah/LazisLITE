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
     adalah orang yang dapat mengelola konfigurasi dari program. Superadmin dapat mengelola data user (admin pengguna program), mengelola data amil, dan mengelola data jenis donasi, 
  2. Admin
     Adalah orang yang bertugas sehari-hari mencatat dan mengelola transaksi donasi, dan juga mengelola data para donatur. 
  3. Guest
     Adalah orang yang dapat membuka program, namun mereka tidak login. Bagi mereka dapat melihat beberapa laporan umum yang tersedia melalui menu laporan. 
- Beberapa user dapat login bersama-sama menggunakan akun yang berbeda.
- Sebuah transaksi yang sedang diedit, tidak akan dapat di-edit oleh admin yang lain pada waktu yang bersamaan. 



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

### Manajejemen Data Transaksi
Admin dapat mengentry data transaksi donasi yang terjadi. 
Untuk setiap transaksi yang dientry, Admin dapat langsung mencetak data kuitansi. 
Pada Setiap Data Transaksi yang terjadi selalu tersimpan data sebagai berikut : 
- IDTransaksi (Otomatis)
- Donatur
- Tanggal Transaksi
- Peruntukan Jenis Donasi
- Jumlah Donasi
- Amil
- Sumber Donasi (Kotak Infak / Donatur Rutin)
- Keterangan

