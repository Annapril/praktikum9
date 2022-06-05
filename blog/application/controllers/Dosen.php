<?php
class Dosen extends CI_Controller{
    public function index(){
        //akses model dosen
        $this->load->model('dosen_model');
        $dosen = $this->dosen_model->getAll();
        $data['dosen'] = $dosen;
        $this->load->view('layouts/header');
        $this->load->view('dosen/index', $data);
        $this->load->view('layouts/footer');
    }
    public function detail($id){
        // akses model dosen
        $this->load->model('dosen_model');
        $pengajar = $this->dosen_model->getById($id);
        $data['pengajar'] = $pengajar;
        $this->load->view('layouts/header');
        $this->load->view('dosen/detail', $data);
        $this->load->view('layouts/footer');
    }
    public function form(){
        // render view
        $this->load->view('layouts/header');
        $this->load->view('dosen/form');
        $this->load->view('layouts/footer');
    }
    public function save(){
        //akses ke model dosen
        $this->load->model('dosen_model','dosen'); // 1
        $_nama = $this->input->post('nama');
        $_nidn = $this->input->post('nidn');
        $_gender = $this->input->post('gender');
        $_tmp_lahir = $this->input->post('tmp_lahir');
        $_tgl_lahir = $this->input->post('tgl_lahir');
        $_pendidikan = $this->input->post('pendidikan');

        $data_dosen['nama']=$_nama;// 2
        $data_dosen['nidn']=$_nidn;
        $data_dosen['gender']=$_gender;
        $data_dosen['tmp_lahir']=$_tmp_lahir;
        $data_dosen['tgl_lahir']=$_tgl_lahir;
        $data_dosen['pendidikan']=$_pendidikan;

        if(!empty($_idedit)){//update
            $data_dosen['id']=$_idedit;// 3
            $this->dosen->update($data_dosen);
        }else{//data baru
            $this->dosen->simpan($data_dosen);
        }
        redirect('dosen','refresh');
    }
    public function edit($id){
        // akses model dosen
        $this->load->model('dosen_model','dosen');
        $obj_dosen = $this->dosen->getById($id);
        $data['obj_dosen']=$obj_dosen;
            // kirim ke view
            $this->load->view('layouts/header');
            $this->load->view('dosen/edit', $data);
            $this->load->view('layouts/footer');
    }
    public function delete($id){
        $this->load->model('dosen_model', 'dosen');
        // cek data dosen berdasarkan id
        $data_dosen['id']=$id;
        $this->dosen->delete($data_dosen);
        redirect('dosen', 'refresh');
    }
    public function __construct()
    {
        parent:: __construct();
        if(!$this->session->userdata('logged_in')){
            redirect('/login');
        }
    }
}
?>