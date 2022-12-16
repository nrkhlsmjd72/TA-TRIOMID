<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class Pasien extends Server {

    //buat konstruktor
    public function __construct()
        {
                parent::__construct();
                 //panggil model "MPasien"
                $this->load->model("Mpasien","model",TRUE);
        }

	//buat fungsi "GET"
    function service_get()
    {
       
        
        //panggil fungsi "get_data"
       $hasil = $this->model->get_data();

        $this->response(array("Pasien" =>
        $hasil),200);

    }

    //buat fungsi "POST"
    function service_post()
    {
       
        //ambil parameter token data yang akan diisi
        $data = array(
            "rm" => $this->post("rm"),
            "nik"=> $this->post("nik"),
            "nama" => $this->post("nama"),
            "kelamin" => $this->post("kelamin"),
            "telepon" => $this->post("telepon"),
            "ttl" => $this->post("ttl"),
            "status" => $this->post("status"),
            "alamat" => $this->post("alamat"),
            "token" => base64_encode($this->post("rm")),
        );
        // panggil method "save data"
        $hasil = $this->model->save_data($data["rm"],$data["nik"],
        $data["nama"],$data["kelamin"],$data["telepon"],$data["ttl"],
        $data["status"],$data["alamat"],$data["token"]);
        // jika hasil = 0
        if($hasil == 0 )
        {
            $this->response(array("status" =>"Data Pasien Berhasil Disimpan"),200);
        }
        // jika hasil != 0
        else
        {
            $this->response(array("status" =>"Data Pasien Gagal Disimpan !"),200);
        }

 
    }
    //buat fungsi "PUT"
    function service_put()
    {
     // panggil model "MPasien"
     $this->load->model("Mpasien","model",TRUE);
     //ambil parameter token "(rm)"
     $data = array(
        "rm" => $this->post("rm"),
        "nik"=> $this->post("nik"),
        "nama" => $this->post("nama"),
        "kelamin" => $this->post("kelamin"),
        "telepon" => $this->post("telepon"),
        "ttl" => $this->post("ttl"),
        "status" => $this->post("status"),
        "alamat" => $this->post("alamat"),
        "token" => base64_encode($this->post("rm")),
    );
    // panggil method "save data"
    $hasil = $this->model->update_data($data["rm"],$data["nik"],
    $data["nama"],$data["kelamin"],$data["telepon"],$data["ttl"],
    $data["status"],$data["alamat"],$data["token"]);
     //panggil fungsi "delete_data"

     if($hasil == 1)
     {
         $this->response(array("status" =>"Data Pasien Berhasil Dihapus"),200);
     }
     // jika proses delete gagal
     else
     {
         $this->response(array("status" => "Data
         Pasien Gagal Dihapus !"),200);
     }
    }
    //buat fungsi "DELETE"
    function service_delete()
    {
        // panggil model "MPasien"
        $this->load->model("Mpasien","model",TRUE);
        //ambil parameter token "(rm)"
        $token = $this->delete("rm");
        //panggil fungsi "delete_data"
        $hasil = $this->model->delete_data
        (base64_encode($token));
        if($hasil == 1)
        {
            $this->response(array("status" =>"Data Pasien Berhasil Dihapus"),200);
        }
        // jika proses delete gagal
        else
        {
            $this->response(array("status" => "Data
            Pasien Gagal Dihapus !"),200);
        }

    }
}
