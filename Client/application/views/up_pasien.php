<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pasien</title>

    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>" />
</head>
<body>
    <!-- buat area menu -->
    <nav class="area-menu">
        <button id="btn_lihat" class="btn-primary">Lihat Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>

    <!-- buat area untuk entry data mahasiswa -->
    <main class="area-grid">
    <label id="lbl_rm" for="txt_rm">
                Rekam Medis :
            </label>
        </section>
        <section class="item-input1">
            <input type="text" id="txt_rm" class="text-input" maxlength="10">
        </section>
        <section class="item-error1">
            <p id="err_rm" class="error-info"></p>
        </section>

        <section class="item-label1">
            <label id="lbl_nik" for="txt_nik">
                NIK :
            </label>
        </section>
        <section class="item-input1">
            <input type="text" id="txt_nik" class="text-input" maxlength="16">
        </section>
        <section class="item-error1">
            <p id="err_nik" class="error-info"></p>
        </section>

        <section class="item-label2">
            <label id="lbl_nama" for="txt_nama">
                Nama Pasien :
            </label>
        </section>
        <section class="item-input2">
            <input type="text" id="txt_nama" class="text-input" maxlength="50">
        </section>
        <section class="item-error2">
            <p id="err_nama" class="error-info"></p>
        </section>

        <section class="item-label4">
            <label id="lbl_kelamin" for="cbo_kelamin">
                kelamin Pasien :
            </label>
        </section>
        <section class="item-input4">
            <select id="cbo_kelamin" class="select-input">
                <option value="-">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </section>
        <section class="item-error4">
            <p id="err_kelamin" class="error-info"></p>
        </section>

        <section class="item-label3">
            <label id="lbl_telepon" for="txt_telepon">
                Telepon Pasien :
            </label>
        </section>
        <section class="item-input3">
            <input type="text" id="txt_telepon" class="text-input" maxlength="15" onkeypress="return setNumber(event)">
        </section>
        <section class="item-error3">
            <p id="err_telepon" class="error-info"></p>
        </section>

        <section class="item-label2">
            <label id="lbl_ttl" for="txt_ttl">
                TTL Pasien :
            </label>
        </section>
        <section class="item-input2">
            <input type="text" id="txt_ttl" class="text-input" maxlength="30">
        </section>
        <section class="item-error2">
            <p id="err_ttl" class="error-info"></p>
        </section>

        <section class="item-label4">
            <label id="lbl_status_perkawinan" for="cbo_status_perkawinan">
                Status Perkawinan :
            </label>
        </section>
        <section class="item-input4">
            <select id="cbo_status_perkawinan" class="select-input">
                <option value="Menikah">Menikah</option>
                <option value="-">Belum Menikah</option>
            </select>
        </section>
        <section class="item-error4">
            <p id="err_status_perkawinan" class="error-info"></p>
        </section>

        <section class="item-label2">
            <label id="lbl_alamat" for="txt_alamat">
                Alamat Pasien :
            </label>
        </section>
        <section class="item-input2">
            <input type="text" id="txt_alamat" class="text-input" maxlength="50">
        </section>
        <section class="item-error2">
            <p id="err_alamat" class="error-info"></p>
        </section>
    </main>

    <!-- buat area menu -->
    <nav class="area-menu" style="margin-top: 10px;">
        <button id="btn_ubah" class="btn-primary">Ubah Data</button>        
    </nav>
    
    <!-- import file "script.js" -->
    <script src="<?php echo base_url("ext/script.js"); ?>"></script>

    <script>
        // insialisasi object dan ambil data
        let txt_rm = document.getElementById("txt_rm");
        let txt_nik = document.getElementById("txt_nik");
        let txt_nama = document.getElementById("txt_nama");
        let cbo_kelamin = document.getElementById("cbo_kelamin");
        let txt_telepon = document.getElementById("txt_telepon");
        let txt_ttl = document.getElementById("txt_ttl");
        let cbo_status_perkawinan = document.getElementById("cbo_status_perkawinan");
        let txt_alamat = document.getElementById("txt_alamat");
        let token = '<?php echo $token; ?>';

        txt_rm.value = '<?php echo $rm; ?>';  
        txt_nik.value = '<?php echo $nik; ?>';
        txt_nama.value = '<?php echo $nama; ?>';
        cbo_kelamin.value = '<?php echo $kelamin; ?>'; 
        txt_telepon.value = '<?php echo $telepon; ?>';
        txt_ttl.value = '<?php echo $ttl; ?>';
        cbo_status_perkawinan.value = '<?php echo $status_perkawinan; ?>'; 
        txt_alamat.value = '<?php echo $alamat; ?>';   
               

        // inisialisasi object
        let btn_lihat = document.getElementById("btn_lihat");
        let btn_ubah = document.getElementById("btn_ubah");

        // buat event untuk "btn_lihat"
        btn_lihat.addEventListener('click',function(){
            // alihkan ke halaman view mahasiswa
            location.href='<?php echo base_url(); ?>'
        });

        // buat fungsi untuk refresh
        function setRefresh()
        {
            location.href='<?php echo site_url("Pasien/updatePasien"); ?>'+'/'+txt_rm.value
        }

        // buat event untuk "btn_ubah"
        btn_ubah.addEventListener('click',function(){
            // inisialisasi object
            let lbl_rm = document.getElementById("lbl_rm");
            let err_rm = document.getElementById("err_rm");

            let lbl_nik = document.getElementById("lbl_nik");
            let err_nik = document.getElementById("err_nik");

            let lbl_nama = document.getElementById("lbl_nama");
            let err_nama = document.getElementById("err_nama");

            let lbl_kelamin = document.getElementById("lbl_kelamin");
            let err_kelamin = document.getElementById("err_kelamin");

            let lbl_telepon = document.getElementById("lbl_telepon");
            let err_telepon = document.getElementById("err_telepon");

            let lbl_ttl = document.getElementById("lbl_ttl");
            let err_ttl = document.getElementById("err_ttl");

            let lbl_status_perkawinan = document.getElementById("lbl_status_perkawinan");
            let err_status_perkawinan = document.getElementById("err_status_perkawinan");

            let lbl_alamat = document.getElementById("lbl_alamat");
            let err_alamat = document.getElementById("err_alamat");
            

            // jika npm tidak diisi
            if(txt_rm.value === "")
            {
                err_rm.style.display = 'unset';
                err_rm.innerHTML = "Nomor Rekam Medis Harus Diisi !";
                lbl_rm.style.color = "#FF0000";
                txt_rm.style.borderColor = "#FF0000"; 

                
            }
            // jika nik diisi
            else
            {
                err_rm.style.display = 'none';
                err_rm.innerHTML = "";
                lbl_rm.style.color = "unset";
                txt_rm.style.borderColor = "unset";

                
            }
            const nik = (txt_nik.value === "") ?
            [
                err_nik.style.display = 'unset',
                err_nik.innerHTML = "nik Harus Diisi !",
                lbl_nik.style.color = "#FF0000",
                txt_nik.style.borderColor = "#FF0000",
            ]
            :
            [
                err_nik.style.display = 'none',
                err_nik.innerHTML = "",
                lbl_nik.style.color = "unset",
                txt_nik.style.borderColor = "unset",           
            ]
            
            // ternary operator
            const nama = (txt_nama.value === "") ?
            [
                err_nama.style.display = 'unset',
                err_nama.innerHTML = "Nama Pasien Harus Diisi !",
                lbl_nama.style.color = "#FF0000",
                txt_nama.style.borderColor = "#FF0000",            
            ]
            :
            [
                err_nama.style.display = 'none',
                err_nama.innerHTML = "",
                lbl_nama.style.color = "unset",
                txt_nama.style.borderColor = "unset",                
            ]

            const kelamin = (cbo_kelamin.selectedIndex === 0) ?
            [
                err_kelamin.style.display = 'unset',
                err_kelamin.innerHTML = "kelamin Pasien Harus Dipilih !",
                lbl_kelamin.style.color = "#FF0000",
                cbo_kelamin.style.borderColor = "#FF0000",            
            ]
            :
            [
                err_kelamin.style.display = 'none',
                err_kelamin.innerHTML = "",
                lbl_kelamin.style.color = "unset",
                cbo_kelamin.style.borderColor = "unset",                
            ]
            
            const telepon = (txt_telepon.value === "") ?
            [
                err_telepon.style.display = 'unset',
                err_telepon.innerHTML = "Telepon Pasien Harus Diisi !",
                lbl_telepon.style.color = "#FF0000",
                txt_telepon.style.borderColor = "#FF0000",            
            ]
            :
            [
                err_telepon.style.display = 'none',
                err_telepon.innerHTML = "",
                lbl_telepon.style.color = "unset",
                txt_telepon.style.borderColor = "unset",                
            ]

            const ttl = (txt_ttl.value === "") ?
            [
                err_ttl.style.display = 'unset',
                err_ttl.innerHTML = "Tempat Tanggal Lahir Harus Diisi !",
                lbl_ttl.style.color = "#FF0000",
                txt_ttl.style.borderColor = "#FF0000",            
            ]
            :
            [
                err_ttl.style.display = 'none',
                err_ttl.innerHTML = "",
                lbl_ttl.style.color = "unset",
                txt_ttl.style.borderColor = "unset",                
            ]

            const status_perkawinan = (cbo_status_perkawinan.selectedIndex === 0) ?
            [
                err_status_perkawinan.style.display = 'unset',
                err_status_perkawinan.innerHTML = "Status Perkawinan Harus Dipilih !",
                lbl_status_perkawinan.style.color = "#FF0000",
                cbo_status_perkawinan.style.borderColor = "#FF0000",            
            ]
            :
            [
                err_status_perkawinan.style.display = 'none',
                err_status_perkawinan.innerHTML = "",
                lbl_status_perkawinan.style.color = "unset",
                cbo_status_perkawinan.style.borderColor = "unset",                
            ]

            const alamat = (txt_alamat.value === "") ?
            [
                err_alamat.style.display = 'unset',
                err_alamat.innerHTML = "Alamat Harus Diisi !",
                lbl_alamat.style.color = "#FF0000",
                txt_alamat.style.borderColor = "#FF0000",            
            ]
            :
            [
                err_alamat.style.display = 'none',
                err_alamat.innerHTML = "",
                lbl_alamat.style.color = "unset",
                txt_alamat.style.borderColor = "unset",                
            ]
            
            // jika semua komponen terisi
            if(err_rm.innerHTML === "" && nik[1] === "" && nama[1] === "" && kelamin[1] === "" && telepon[1] === ""
            && ttl[1] === "" && status_perkawinan[1] === ""&& alamat[1] === ""  )
            {
                // panggil method setUpdate
                setUpdate(txt_rm.value,txt_nik.value,txt_nama.value,cbo_kelamin.value,txt_telepon.value,txt_ttl.value,
                cbo_status_perkawinan.value,txt_alamat.value,token);
            }            
        });
        
        const setUpdate = async(rm,nik,nama,kelamin,telepon,ttl,status_perkawinan,alamat,token) => {
            // buat variabel untuk form
            let form = new FormData();

            // isi/tambah nilai untuk form
            form.append("rmnya",rm)
            form.append("niknya",nik);
            form.append("namanya",nama);
            form.append("kelaminnya",kelamin);
            form.append("teleponnya",telepon);
            form.append("ttlnya",ttl)
            form.append("status_perkawinannya",status_perkawinan)
            form.append("alamatnya",alamat)
            
            form.append("tokennya",token);

            try {
                // kirim data ke controller
                let response = await fetch('<?php echo site_url("Pasien/setUpdate"); ?>',{
                    method: "POST",
                    body: form
                });

                // proses pembacaan hasil
                let result = await response.json();
                // tampilkan hasil
                alert(result.statusnya)
            }
            catch
            {
                alert("Data Gagal Dikirim !")
            }                        
            
            
            
            
            
    //         // proses kirim data ke controller
    //         fetch('<?php echo site_url("Pasien/setSave"); ?>',{
    //             method: "POST",
    //             body: form
    //         })
    // .then((response) => response.json())        
    // .then((result) => alert(result.statusnya))    
    // .catch((error) => alert("Data Gagal Dikirim !"))
        }        
        
                
    </script>
</body>
</html>