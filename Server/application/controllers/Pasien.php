<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'controllers/Token.php';

class Pasien extends Token
{
    // buat konstruktor
    public function __construct()
    {
        parent::__construct();

        // panggil model "Mpasien"
        $this->load->model("Mpasien", "model", TRUE);

    }

    // buat fungsi "GET"
    function service_get()
    {
        if ($this->authtoken() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        } else {
            // ambil paramater token "(rm)"
            $token = $this->get("rm");

            // panggil fungsi "get_data"
            $hasil = $this->model->get_data(base64_encode($token));

            $this->response(array("pasien" => $hasil, "result" => 1, "error" => ""), 200);
        }
    }


    //buat fungsi "POST"
    function service_post()
    {
        if ($this->authtoken() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        } else {

            // ambil parameter data yang akan diisi
            $data = array(

            "rm" => $this->post("rm"),
            "nik"=> $this->post("nik"),
            "nama" => $this->post("nama"),
            "kelamin" => $this->post("kelamin"),
            "telepon" => $this->post("telepon"),
            "ttl" => $this->post("ttl"),
            "status_perkawinan" => $this->post("status_perkawinan"),
            "alamat" => $this->post("alamat"),
            "token" => base64_encode($this->post("rm")),
            );

            // panggil method "save_data"
            $hasil = $this->model->save_data($data["rm"],$data["nik"],
        $data["nama"],$data["kelamin"],$data["telepon"],$data["ttl"],
        $data["status_perkawinan"],$data["alamat"],$data["token"]);
            // jika hasil = 0
            if ($hasil == 0) {
                $this->response(array("status" => "Data Pasien Berhasil Disimpan", "result" => 1, "error" => ""), 200);
            }
            // jika hasil != 0
            else {
                $this->response(array("status" => "Data Pasien Gagal Disimpan !", "result" => 1, "error" => ""), 200);
            }
        }
    }
    //buat fungsi "PUT"
    function service_put()
    {
        if ($this->authtoken() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        } else {
            // ambil parameter data yang akan diisi
            $data = array(
            "rm" => $this->post("rm"),
            "nik"=> $this->post("nik"),
            "nama" => $this->post("nama"),
            "kelamin" => $this->post("kelamin"),
            "telepon" => $this->post("telepon"),
            "ttl" => $this->post("ttl"),
            "status_perkawinan" => $this->post("status_perkawinan"),
            "alamat" => $this->post("alamat"),
            "token" => base64_encode($this->post("token")),
            );

            // panggil method "update_data"
            $hasil = $this->model->update_data($data["rm"],$data["nik"],
            $data["nama"],$data["kelamin"],$data["telepon"],$data["ttl"],
            $data["status_perkawinan"],$data["alamat"],$data["token"]);

            // jika hasil = 0
            if ($hasil == 0) {
                $this->response(array("status" => "Data Pasien Berhasil Diubah", "result" => 1, "error" => ""), 200);
            }
            // jika hasil != 0
            else {
                $this->response(array("status" => "Data Pasien Gagal Diubah !", "result" => 1, "error" => ""), 200);
            }
        }
    }
    //buat fungsi "DELETE"
    function service_delete()
    {
        if ($this->authtoken() == 0) {
            return $this->response(array("result" => 0, "error" => "Kode Signature Tidak Sesuai !"), 200);
        } else {
            // ambil paramater token "(rm)"
            $token = $this->delete("rm");
            // panggil fungsi "delete_data"
            $hasil = $this->model->delete_data(base64_encode($token));
            // jika proses delete berhasil
            if ($hasil == 1) {
                $this->response(array("status" => "Data Pasien Berhasil Dihapus", "result" => 1, "error" => ""), 200);
            }
            // jika proses delete gagal
            else {
                $this->response(array("status" => "Data Pasien Gagal Dihapus !", "result" => 1, "error" => ""), 200);
            }
        }
    }
}
