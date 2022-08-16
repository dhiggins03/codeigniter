<?php

class Migration_2022081611400_first_migration extends CI_Migration {
	// load dependencies
	public function __construct()
	{
		$this->load->database();
		$this->load->dbforge();
	}

  public function up()
	{
    $this->db->trans_begin();

    $this->db->query("CREATE TABLE `users` (
        `userId` int(11) NOT NULL AUTO_INCREMENT,
        `userForename` varchar(255) NOT NULL,
        `userSurname` varchar(255) NOT NULL,
        `userEmail` varchar(255) NOT NULL,
        PRIMARY KEY (`userId`)
      ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");




      if ($this->db->trans_status() === FALSE)
      {
          $this->db->trans_rollback();
      } 
      else
      {
          $this->db->trans_commit();
      }
  }
  }