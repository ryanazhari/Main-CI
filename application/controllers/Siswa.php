<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		$data['siswa'] = $this->db->get('siswa')->result_array();
		$data['judul'] = "Data Siswa";

		if( $this->input->post('katakunci') ) {
			$keyword = $this->input->post('katakunci', true);

			$this->db->like('nama', $keyword);
			$this->db->or_like('jurusan', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('no_hp', $keyword);

			$data['siswa'] = $this->db->get('siswa')->result_array();
		}

		$this->load->view('komponen/header', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('komponen/footer');
	}

	public function tambah()
	{

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jurusan','Jurusan','required');
		$this->form_validation->set_rules('no_hp','No HP','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');


		if( $this->form_validation->run() == false ) {
			$data['jurusan'] = ['rekayasa perangkat lunak','teknik komputer jaringan','multimedia'];
			$data['judul'] = "Tambah Data";

			$this->load->view('komponen/header', $data);
			$this->load->view('siswa/tambah_data', $data);
			$this->load->view('komponen/footer');
		} else {
			$nama = $this->input->post('nama', true);
			$jurusan = $this->input->post('jurusan', true);
			$no_hp = $this->input->post('no_hp', true);
			$email = $this->input->post('email', true);

			$data = [
				'nama' => $nama,
				'jurusan' => $jurusan,
				'no_hp' => $no_hp,
				'email' => $email
			];

			$this->db->insert('siswa', $data);
			$this->session->set_flashdata('berhasil','Ditambahkan');
			redirect('siswa');

		}
	}

	public function hapus($id)
	{
		$this->db->delete('siswa',['id' => $id]);
		$this->session->set_flashdata('berhasil','Dihapus');
		redirect('siswa');
	}

	public function edit($id)
	{

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jurusan','Jurusan','required');
		$this->form_validation->set_rules('no_hp','No HP','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');


		if( $this->form_validation->run() == false ) {
			$data['siswa'] = $this->db->get_where('siswa', ['id' => $id])->row_array();
			$data['jurusan'] = ['rekayasa perangkat lunak','teknik komputer jaringan','multimedia'];
			$data['judul'] = "Edit Data";

			$this->load->view('komponen/header', $data);
			$this->load->view('siswa/edit_data', $data);
			$this->load->view('komponen/footer');
		} else {
			$nama = $this->input->post('nama', true);
			$jurusan = $this->input->post('jurusan', true);
			$no_hp = $this->input->post('no_hp', true);
			$email = $this->input->post('email', true);

			$data = [
				'nama' => $nama,
				'jurusan' => $jurusan,
				'no_hp' => $no_hp,
				'email' => $email
			];

			$this->db->where('id',$id);
			$this->db->update('siswa', $data);
			$this->session->set_flashdata('berhasil','Diedit');
			redirect('siswa');

		}
	}

}
