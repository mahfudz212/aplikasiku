<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
      function __construct(){
          parent:: __construct();
          $this->load->model('admin_model');
      
    }
	public function index()
	{
        $judul['atas']="Halaman Utama Administrator";
        $judul['menuatas']="Beranda";
        $data['s']=$this->db->get('siswa')->num_rows();
        $data['g']=$this->db->get('guru')->num_rows();
        $data['k']=$this->db->get('kelas')->num_rows();
		$this->load->view('template/header',$judul);
        $this->load->view('beranda',$data);
        $this->load->view('template/footer');
	}
    public function Siswa()
	{
        $judul['atas']="Halaman siswa";
        $judul['menuatas']="siswa";
		$this->load->view('template/header',$judul);
        $this->load->view('siswa');
        $this->load->view('template/footer');
	}
    public function Guru()
	{
        $judul['atas']="Halaman guru";
        $judul['menuatas']="Guru";
        $data['gr']=$this->admin_model->tampildata('guru','id_guru');
		$this->load->view('template/header',$judul);
        $this->load->view('guru',$data);
        $this->load->view('template/footer');
	}
    public function tambah_guru(){
        $judul['atas']="Halaman Tambah guru";
        $judul['menuatas']="Form guru";
		$this->load->view('template/header',$judul);
        $this->load->view('form_guru',array('error'=>''));
        $this->load->view('template/footer'); 
    }
    public function simpan_guru(){
        if ($_FILES['foto']['name']) {
           $config['upload_path']='./assets/guru/';
           $config['allowed_types']='gif/jpg/png|JPG|jpeg|jfif';
           $config['max_size']=100;
           $config['max_width']=600;
           $config['max_height']=500;
           $config['encrypt_name']=True;
           $this->load->library('upload',$config);
           if (!$this->upload->do_upload('foto')) {
               $error=array('error'=>$this->upload->display_errors());
                $judul['atas']="Halaman Tambah guru";
                $judul['menuatas']="Form guru";
                $this->load->view('template/header',$judul);
                $this->load->view('form_guru',$error);
                $this->load->view('template/footer'); 
           } else {
               $gbr=$this->upload->data();
               $foto=$gbr['file_name'];
               //simpan
               $data= array('nip'=> $this->input->post('nip'),    
                            'nama_guru'=> $this->input->post('nama_guru'),
                            'jk_guru'=> $this->input->post('jk'),
                            'alamat_guru'=> $this->input->post('alamat_guru'),
                            'tlp_guru'=> $this->input->post('tlp_guru'),
                            'foto_guru'=> $foto);
             $query=$this->admin_model->editdata('guru',$data);
                 if($query) {
                     $this->session->set_flashdata('info','data guru
                     berhasil teredit');
                     redirect('Admin/guru');
                 } else {
                     $this->session->set_flashdata('info','data guru
                      gagal teredit');
                     redirect('Admin/guru');
                 }
               //simpan
           }
           
        } else {
            echo"gambar atau file tidak ada";
        }
        
    }
    public function Kelas()
	{
        $judul['atas']="Halaman kelas";
        $judul['menuatas']="Kelas";
        $data['k']=$this->admin_model->tampildata('kelas','id_kelas');
		$this->load->view('template/header',$judul);
        $this->load->view('kelas',$data);
        $this->load->view('template/footer');
	}
    public function tambah_kelas(){
        $judul['atas']="Halaman Tambah kelas";
        $judul['menuatas']="Form kelas";
		$this->load->view('template/header',$judul);
        $this->load->view('form_kelas');
        $this->load->view('template/footer');    
    }
    public function simpan_kelas(){
        $this->form_validation->set_rules('kode_kelas','','required',array('required'=>'kode kelas wajid diisi'));
        $this->form_validation->set_rules('nama_kelas','','required',array('required'=>'nama kelas wajib diisi'));
        if ($this->form_validation->run()==FALSE) {
            $judul['atas']="Halaman Tambah kelas";
            $judul['menuatas']="Form kelas";
            $this->load->view('template/header',$judul);
            $this->load->view('form_kelas');
            $this->load->view('template/footer');
        } else {
           $data= array(
               'kode_kelas'=>$this->input->post('kode_kelas'),
               'nama_kelas'=>$this->input->post('nama_kelas')
            );
            $query=$this->admin_model->simpandata('kelas',$data);
                if ($query) {
                    $this->session->set_flashdata('info',' data kelas berhasil disimpan');
                    redirect('Admin/kelas');
                } else {
                    $this->session->set_fleshdata('info','data kelas gagal terdisimpan');
                    redirect('Admin/kelas');
                }
                

          }

    }
    public function hapuskelas($id){
        $this->admin_model->hapusdata('kelas',$id,'id_kelas');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info','data kelas berhasil terhapus');
            redirect('Admin/kelas');
        } else {
           $this->session->set_flashdata('info','data kelas gagal ');
           redirect('Admin/kelas');
        }
        
    }
     public function tahunajaran()
	{
        $judul['atas']="Halaman Tahun Ajaran";
        $judul['menuatas']="Tahunajaran";
        $data['th']=$this->admin_model->tampildata('tahun_ajaran','id_tahun_ajaran');
		$this->load->view('template/header',$judul);
        $this->load->view('tahunajaran',$data);
        $this->load->view('template/footer');
	}
    public function formedit_kelas($id){
        $judul['atas']="Halaman Form Edit kelas";
        $judul['menuatas']="Form Edit kelas";
        $data['ke']=$this->admin_model->formedit('kelas','id_kelas',$id);
		$this->load->view('template/header',$judul);
        $this->load->view('formedit_kelas',$data);
        $this->load->view('template/footer');
    }
    public function edit_kelas(){
        $id=$this->input->post('id');
        $data= array(
            'kode_kelas'=>$this->input->post('kode_kelas') ,
            'nama_kelas'=>$this->input->post('nama_kelas')
         );
         $query=$this->admin_model->editdata('kelas','id_kelas',$id,$data);
             if($query) {
                 $this->session->set_flashdata('info','data kelas
                 berhasil teredit');
                 redirect('Admin/kelas');
             } else {
                 $this->session->set_flashdata('info','data kelas
                  gagal teredit');
                 redirect('Admin/kelas');
             }
     
    }
    public function tambah_th(){
        $judul['atas']="Halaman Tambah Tahun Ajaran";
        $judul['menuatas']="Form Tahun Ajaran";
		$this->load->view('template/header',$judul);
        $this->load->view('form_th');
        $this->load->view('template/footer');
    }
    public function simpan_th(){
        $this->form_validation->set_rules('th','Tahun Ajara','required');
        if ($this->form_validation->run()==FALSE) {
            $judul['atas']="Halaman Tambah Ajaran";
            $judul['menuatas']="Form Tahun Ajaran";
            $this->load->view('template/header',$judul);
            $this->load->view('form_th');
            $this->load->view('template/footer');
        } else {
           $data= array(
               'tahun_ajaran'=>$this->input->post('th')
            );
            $query=$this->admin_model->simpandata('tahun_ajaran',$data);
                if ($query) {
                    $this->session->set_flashdata('info','data tahun
                    ajaran berhasil disimpan');
                    redirect('Admin/tahunajaran');
                } else {
                    $this->session->set_fleshdata('info','data tahun
                    ajaran gagal terdisimpan');
                    redirect('Admin/tahunajaran');
                }
                

          }

     
     }
     public function hapusth($id){
         $this->admin_model->hapusdata('tahun_ajaran',$id,'id_tahun_ajaran');
         if ($this->db->affected_rows()) {
             $this->session->set_flashdata('info','data tahun ajaran berhasil terhapus');
             redirect('Admin/tahunajaran');
         } else {
            $this->session->set_flashdata('info','data tahun ajaran gagal ');
            redirect('Admin/tahunajaran');
         }
         
     }
     public function formedit_th($id)
     {
        $judul['atas']="Halaman Form Edit Tahun Ajaran";
        $judul['menuatas']="Form Edit Tahun Ajaran";
        $data['ta']=$this->admin_model->formedit('tahun_ajaran','id_tahun_ajaran',$id);
		$this->load->view('template/header',$judul);
        $this->load->view('formedit_th',$data);
        $this->load->view('template/footer');

     }
     public function edit_th(){
         $id=$this->input->post('id');
        $data= array(
            'tahun_ajaran'=>$this->input->post('th')
         );
             $query= $this->admin_model->editdata('tahun_ajaran','id_tahun_ajaran',$id);
             if($query) {
                 $this->session->set_flashdata('info','data tahun
                 ajaran berhasil teredit');
                 redirect('Admin/tahunajaran');
             } else {
                 $this->session->set_flashdata('info','data tahun
                 ajaran gagal teredit');
                 redirect('Admin/tahunajaran');
             }
     }
}
