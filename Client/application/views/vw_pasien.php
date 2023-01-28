<?php
    $key = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
    $random_key = substr($key,0,10);

    //echo $random_key;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Pasien</title>
    <!-- import fontawesome (CSS) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>" />


</head>

<body>
    <!-- buat area menu -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Tambah Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>
    <!-- buat area tabel -->
    <table>
        <!-- judul tabel -->
        <thead>
            <tr>
            <th style="width: 10%;">Aksi</th>
                <th style="width: 5%;">No.</th>
                <th style="width: 10%;">RM</th>
                <th style="width: 10%;">NIK</th>
                <th style="width: 15%;">Nama</th>
                <th style="width: 5%;">Kelamin</th>
                <th style="width: 10%;">Telepon</th>
                <th style="width: 15%;">TTL</th>
                <th style="width: 5%;">Status Perkawinan</th>
                <th style="width: 15%;">Alamat</th>
            </tr>
        </thead>
        <!-- isi tabel -->
        <tbody>

            <!-- proses looping data -->
            <?php
                //   set nilai awal no
                $no = 1;
                
                foreach($tampil->pasien as $result)
                {                      
            ?>
            <tr>
                <td style="text-align: center;">
<nav class="area-aksi">
    <button class="btn-ubah" id="btn_ubah" title="Ubah Data" 
    
    onclick="return gotoUpdate('<?php echo $result->rm; ?>')"> //////////////////////////////////////////////////////////////////////////
    
    <i class="fa-solid fa-pen"></i>
    </button>

    <button class="btn-hapus" id="btn_hapus" title="Hapus Data" 

    onclick="return gotoDelete('<?php echo $result->rm; ?>')">

        <i class="fa-solid fa-trash-can"></i>
    </button>
</nav>
                </td>

                <td style="text-align: center;">
                    <?php echo $no; ?>
                </td>

                <td style="text-align: center;">
                    <?php echo $result->rm; ?>
                </td>

                <td style="text-align: justify;">
                    <?php echo $result->nik; ?>
                </td>

                <td style="text-align: center;">
                    <?php echo $result->nama; ?>    
                </td>

                <td style="text-align: center;">
                    <?php echo $result->kelamin; ?>
                </td>

                <td style="text-align: center;">
                    <?php echo $result->telepon; ?>
                </td>

                <td style="text-align: justify;">
                    <?php echo $result->ttl; ?>
                </td>

                <td style="text-align: center;">
                    <?php echo $result->status_perkawinan; ?>    
                </td>

                <td style="text-align: center;">
                    <?php echo $result->alamat; ?>
                </td>
            </tr>
            <?php
                   $no++; 
                }
            ?>

        </tbody>        
    </table>

    <!-- import fontawesome (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // inisialisasi object
        let btn_tambah = document.getElementById("btn_tambah");

        // buat event untuk tambah data
        btn_tambah.addEventListener('click',function(){
            // alert("Tambah Data")
            // manipulasi css (property & value)
            // btn_tambah.style.background="#FF0000"
            // this.style.borderRadius="10px";
            // this.style.fontSize="30px"

            // manipulasi css(className)
            // this.className = "btn-secondary"

            // manipulasi HTML
            // this.innerHTML = "<strong>Add Data</strong>";
            // this.innerText = "Add Data";

            // alihkan ke halaman/Controller (Mahasiswa) fungsi "addMahasiswa"
            location.href='<?php echo site_url("Pasien/addPasien")?>'
        })

        // btn_tambah.addEventListener('click',setRefresh)

        function setRefresh()
        {
            location.href='<?php echo base_url(); ?>'
        }
        
        // buat fungsi untuk ke halaman ubah
        function gotoUpdate(rm)
        {
            // npm = "MzQ1Njc5"
            // let npmx = atob(npm);

            location.href='<?php echo site_url("Pasien/updatePasien")?>'+'/'+rm
        }

        // buat fungsi untuk hapus data
        function gotoDelete(rm)
        {
            if(confirm("Data Pasien "+rm+" Ingin Dihapus ?") === true)
            {                
                // alert("Data Berhasil Dihapus")

                // panggil fungsi setDelete
                setDelete(rm);                
            }
            // else
            // {
            //     alert("Kok Gak Jadi ?")
            // }
        }

        function setDelete(rm)
        {
            // buat variabel/konstanta data
            const data = {
                "rmnya" : rm,                
            }

            // kirim data async dengan fetch
            fetch('<?php echo site_url("Pasien/setDelete"); ?>',
            {
                method : "POST",
                headers: {
                    "Content-Type" : "application/json"
                },
                body: JSON.stringify(data)
            })

            .then((response)=>
            {
                return response.json()
            })

            .then(function(data)
            {
                // jika nilai "err" = 0
                // if(data.err === 0)
                    // alert("Data Berhasil Dihapus")
                // jika nilai "err" = 1
                // else
                    // alert("Data Gagal Dihapus !")
                alert(data.statusnya);
                //  panggil fungsi setRefresh
                setRefresh();
            })
        }
    </script>
</body>

</html>
