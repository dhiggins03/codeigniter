<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library( 'migration' );

    // check for CLI
    if ( ! $this->input->is_cli_request())
    {
      show_error('You don\'t have permission for this action');
    }
  }

  public function index()
  {
    $migration_result = $this->migration->latest();
    $this->show_result($migration_result);
  }    

  public function version($version)
  {
    $migration_result = $this->migration->version($version);
    $this->show_result($migration_result);
  }
  
  private function show_result($migration_result)
  {
    if ($migration_result === TRUE)
    {
      echo 'No migrations to run'.PHP_EOL;
    } 
    elseif ($migration_result === FALSE) 
    {
      echo $this->migration->error_string().PHP_EOL;
    }
    else
    {
      echo 'Success! Migrated to '.$migration_result.PHP_EOL;
    }
  }
}
