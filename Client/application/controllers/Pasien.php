<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	// buat variabel global
	var $key_name = 'KEY-API';
	var $key_value = 'RESTAPI';
	var $key_bearer = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2NzUzNTUxMzh9.JmFMZbPq573_Hzt_NAhlRFyBvxi6cj7m0HMMR7HNwPo';

	public function index()
	{
		

		$data["tampil"] = json_decode
		($this->client->simple_get(APIPASIEN));

		
			$this->load->view('vw_pasien', $data);
		
	}

	function setDelete()
	{
		$this->client->http_header($this->key_bearer);

		// buat variabel json
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);


		$delete = json_decode($this->client->simple_delete(APIPASIEN, array("rm" => $hasil->rmnya, $this->key_name => $this->key_value)));

		if ($delete->result == 0) {
			echo json_encode(array("statusnya" => $delete->error));
		} else {
			echo json_encode(array("statusnya" => $delete->status));
		}
	}

	function addPasien()
	{
		$this->load->view('en_pasien');
	}

	// buat fungsi untuk simpan data mahasiswa...
	function setSave()
	{
		$this->client->http_header($this->key_bearer);

		// baca nilai dari fetch
		$data = array(
			"rm" => $this->input->post("rmnya"),
			"nik" => $this->input->post("niknya"),
			"nama" => $this->input->post("namanya"),
			"kelamin" => $this->input->post("kelaminnya"),
			"telepon" => $this->input->post("teleponnya"),
			"ttl" => $this->input->post("ttlnya"),
			"status_perkawinan" => $this->input->post("statusnya"),
			"alamat" => $this->input->post("alamatnya"),
			"token" => $this->input->post("rmnya"),
			$this->key_name => $this->key_value
		);

		$save = json_decode($this->client->simple_post(APIPASIEN, $data));

		if ($save->result == 0) {
			echo json_encode(array("statusnya" => $save->error));
		} else {
			echo json_encode(array("statusnya" => $save->status));
		}
	}

	// fungsi untuk update data
	function updatePasien()
	{
		$this->client->http_header($this->key_bearer);

		// ambil nilai npm
		$token = $this->uri->segment(3);

		$tampil = json_decode($this->client->simple_get(APIPASIEN, array("rm" => $token, $this->key_name => $this->key_value)));

		if ($tampil->result == 0) {
			echo $tampil->error;
		} else {

			foreach ($tampil->pasien as $result) {
				// echo $result->nama_mhs."<br>";

				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$data = array(
					"rm" => $result->rm,
					"nik" => $result->nik,
					"nama" => $result->nama,
					"kelamin" => $result->kelamin,
					"telepon" => $result->telepon,
					"ttl" => $result->ttl,
					"status_perkawinan" => $result->status_perkawinan,
					"alamat" => $result->alamat,
					"token" => $token,
				);
			}
			$this->load->view('up_pasien', $data);
		}
	}

	// buat fungsi untuk ubah data mahasiswa
	function setUpdate()
	{
		$this->client->http_header($this->key_bearer);

		// baca nilai dari fetch
		$data = array(
			"rm" => $this->input->post("rmnya"),
			"nik" => $this->input->post("niknya"),
			"nama" => $this->input->post("namanya"),
			"kelamin" => $this->input->post("kelaminnya"),
			"telepon" => $this->input->post("teleponnya"),
			"ttl" => $this->input->post("ttlnya"),
			"status_perkawinan" => $this->input->post("status_perkawinannya"),
			"alamat" => $this->input->post("alamatnya"),
			"token" => $this->input->post("tokennya"),
			$this->key_name => $this->key_value
		);

		$update = json_decode($this->client->simple_put(APIPASIEN, $data));

		// kirim hasil ke "up_mahasiswa"
		if ($update->result == 0) {
			echo json_encode(array("statusnya" => $update->error));
		} else {
			echo json_encode(array("statusnya" => $update->status));
		}
	}
}
