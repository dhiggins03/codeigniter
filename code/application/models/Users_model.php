<?php
class Users_model extends CI_Model
{
    public function get_users()
    {
        $sql = "SELECT *
        FROM `users`";

        $query = $this->db->query($sql);
            

        if ($query->num_rows() > 0 )
            return $query->result();

        return false;
    }

    public function get_user($id)
    {
        $sql = "SELECT *
        FROM `users`
        WHERE `userId` = ?";
        

        $query = $this->db->query($sql, $id);
            

        if ($query->num_rows() == 1 )
            return $query->row();

        return false;
    }
    
    function add_user($userforename, $usersurname, $useremail) 
    {
        $this->db->query("INSERT INTO `users` (`userForename`, `userSurname`, `userEmail`)
        VALUES
            ('{$userforename}', '{$usersurname}', '{$useremail}');
        ");
        if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function edit($id, $user)
    {
        $this->db->where(array('userId'=>$id));
        $this->db->update('users', $user);
        if ($this->db->affected_rows() === 1)
        {
          return TRUE;
        }
        return FALSE;
    }

    public function get_by_email($email){
        return $this->db->get_where('users', array('userEmail'=>$email));
    }

    function delete($id)
    {
        $this->db->where(array('userId'=>$id));
        $this->db->delete('users');

        if ($this->db->affected_rows() === 1)
        {
        return TRUE;
        }
        return FALSE;
    }
}