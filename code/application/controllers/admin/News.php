<?php
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }
        $this->load->model('news_model');
    }
    public function index()
    {
        $data['news'] = $this->news_model->getAll();
        $this->load->view('admin/news/index', $data);
    }

    public function add()
    {
        $this->load->view('admin/news/add');
    }

    public function save()
    {
        $this->news_model->save();
        $this->session->set_flashdata('success', 'news saved successfully');
        redirect('admin/news/index');
    }
    public function edit($id)
    {
        $data['news'] = $this->news_model->getById($id);
        $this->load->view('admin/news/edit', $data);
    }
    public function update($id)
    {
        $this->news_model->update($id);
        $this->session->set_flashdata('success', 'News updated successfully');
        redirect('admin/news/index');
    }
    public function delete($id)
    {
        $this->news_model->delete($id);
        $this->session->set_flashdata('success', 'News deleted successfully');
        redirect('admin/news/index');
    }
}
