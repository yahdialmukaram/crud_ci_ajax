<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class SiswaModel extends CI_Model//untuk nama clas harus di samakan dengan nama file 
{
	// fungsi menamilkan semua data siswa
	public function view()
	{
		return $this->db->get('siswa')->result();
	}
	// fungsi menampilkan data sisw berdasarkan nis
	public function view_by($nis)
	{
		$this->db->where('nis',$nis);
		return $this->db->get('siswa')->row();
	}
	// validasi untk form tambah dan ubah
	public function validation($mode)
	{
		 $this->load->library('form_validation'); //load librari form validation untuk proses validasinya
		// tambahkan if apaka $mode save a[a update
		// karena ketika ubpdate nis tidak harus di validasi
		// nis di validasi ketika mnembah data

		if ($mode == "save")
			$this->form_validation->set_rules('input_nis', 'NIS', 'required|numeric');
		$this->form_validation->set_rules('input_nama', 'Nama', 'required');
		$this->form_validation->set_rules('input_jeniskelamin', 'jeniskelamin');
		$this->form_validation->set_rules('input_telp', 'telp', 'required|numeric');
		$this->form_validation->set_rules('input_alamat', 'alamat', 'required');

		if ($this->form_validation->run()) // jika validation benar
			return true; // mkaka kembalikan hasilnya denga true
		else // jika data yang tidak sesuai di validasion 
		// di bawah ini ada salah penulisan seharusnya return bukan retur
			return FALSE; //maka kemalikan hasilnya denga false 
	}

	// fungdi untuk melakukan simoan data ke tabel siswa
	public function save()
	{
		$data = array(
			"nis" => $this->input->post('input_nis'),
			"nama" => $this->input->post('input_nama'),
			"jenis_kelamin" => $this->input->post('input_jeniskelamin'),
			"telp" => $this->input->post('input_telp'),
			"Alamat" => $this->input->post('input_alamat'));//disini tanda ) kurang

		$this->db->insert('siswa', $data); //untuk mengeksekusi perintah insert data 
	}

	// fungsi untuk mngubah data siwa berdasarkan nis
	public function edit($nis)
	{
		$data = array(
			"nis" => $this->input->post('input_nis'),
			"nama" => $this->input->post('input_nama'),
			"jenis_kelamin" => $this->input->post('input_jeniskelamin'),
			"telp" => $this->input->post('input_telp'),
			"Alamat" => $this->input->post('input_alamat')
		);

		$this->db->where('nis', $nis);
		$this->db->update('siswa', $data); // untuk mengekseskusi perintah update
	} //tanda penutup kurungnya kurang
	// fug=ngsi menghapus berdasarkan nis siswa
	public function delete($nis){
		$this->db->where('nis', $nis);
		$this->db->delete('siswa'); // untuk mengeksekusi delete data
	}
}
