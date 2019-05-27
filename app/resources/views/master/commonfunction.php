<?php

    //fungsi print tanggal sesuai dengan format yang diinginkan... 
    function printtanggal($tanggalasli, $formattanggal){
        //array nama2 bulan dalam bahasa indo.kenapa gak pakai locale ID? karena tak semua server ready dengan itu.
        $namanamabulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
        
        //extract tanggal donasi ke tiap2 formatnya dd, mm, yyyy
        $date = DateTime::createFromFormat('d/m/Y', $tanggalasli);
        $tanggal = $date->format('d');
        $bulan = $date->format('m');
        
        $bulannama = $namanamabulan[(($bulan-1)%12)];;
        $tahun = $date->format('Y');

        //periode saja (bulan dan tahun)
        if($formattanggal==1){
            echo '<tr>
                <td><strong>Periode</strong></td>
                <td>: '.$bulannama.' '.$tahun.'</td>
            </tr>';
        }
        //tanggal lengkap (d/m/y)
        else if($formattanggal==2){

            echo '<tr>
                <td><strong>Tanggal</strong></td>
                <td>: '.$tanggalasli.'</td>
            </tr>';
            
        }
        //periode dan tanggal dipisah
        else{
            echo '<tr>
                <td><strong>Tanggal</strong></td>
                <td>: '.$tanggal.'</td>
            </tr>';
            echo '<tr>
                <td><strong>Periode</strong></td>
                <td>: '.$bulannama.' '.$tahun.'</td>
            </tr>';
    
        }
    }

?>