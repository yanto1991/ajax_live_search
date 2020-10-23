<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ControllerSearch extends CI_Controller
{
	
	function index()
	{
		$this->load->view('v_search');
	}

	function search(){
		$output = '';
		$query = '';
		$data1 = '';
		$data2 = '';

		$this->load->model('search_model');

		if($this->input->post('query'))
		{
			$query = $this->input->post('query');

			$data1 = trim(substr($query, 0, 7));
			$data2 = trim(substr($query, 7));
			// $data1 = substr($query, 0, 7);
			// $data2 = substr($query, 7);
		}
		 

		$data = $this->search_model->fetch_data($data1, $data2);
		// $data = $this->search_model->fetch_data($query);

		$output .= '<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>No</th>
							<th>Category</th>
							<th>Word</th>
						</tr>
		';
		if($data->num_rows() > 0){
		foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->No.'</td>
							<td>'.$row->Category.'</td>
							<td>'.$row->Word.'</td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="5">No Data Found</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;
	}
}
