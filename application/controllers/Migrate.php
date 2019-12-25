<?php
/**
 * Controller Name: Migrate
 * Descripation: Use to migrate SQL Queries on MML
 * @author Shreyanshi(shreya@dazzlebirds.com)
 * Created date: December 3, 2019
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{

   public function index(){

	   	$this->load->helper('file');
	    
	    $this->load->library('migration');

		if ( ! $this->migration->current())
	    {
	        // echo 'Error<br/>' . $this->migration->error_string();
	    } else {
	        echo 'Migrations ran successfully!';
	    }   

		//shows latest version of migration
		echo $this->migration->latest();  

	    }

}