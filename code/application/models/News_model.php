<?php
class News_model extends CI_Model
{
    public function getAll()
    {
        $keyword = $this->input->get('keyword');
        $this->db->like(array('title'=>$keyword));
        $this->db->or_like(array('description'=>$keyword));
        $this->db->or_like(array('author'=>$keyword));
        $this->db->order_by('id DESC');
        return $this->db->get('news')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('news', array('id'=>$id))->row();
    }

    public function save()
    {
        $arr['title'] = $this->input->post('title');
        $arr['author'] = $this->input->post('author');
        $arr['description'] = $this->input->post('description');

        //insert into the database
        $this->db->insert('news', $arr);
    }

    public function update($id)
    {
        $arr['title'] = $this->input->post('title');
        $arr['author'] = $this->input->post('author');
        $arr['description'] = $this->input->post('description');

        //insert into the database
        $this->db->where(array('id'=>$id));
        $this->db->update('news', $arr);
    }
    public function delete($id)
    {
        $this->db->where(array('id'=>$id));
        $this->db->delete('news');
    }
}
