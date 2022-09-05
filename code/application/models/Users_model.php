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
    
    function add_user($userforename, $usersurname, $useremail) 
    {

    $this->db->query("INSERT INTO `users` (`userForename`, `userSurname`, `userEmail`)
    VALUES
        ($userforename, $usersurname, $useremail);
    ");

    }
}