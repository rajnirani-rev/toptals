


ALTER TABLE `question` ADD `marks_assign` INT( 3 ) NOT NULL DEFAULT '1' AFTER `question_title` 



<?php

	
	function get_exam_weighted_exam($exam_id) {
		$this->db->select('weighted_exam');
		$this->db->from('exam');
		$this->db->where('id', $exam_id);
		$query = $this->db->get();
		if(($query->num_rows()) > 0) {
			foreach($query->result() as $v){
				return $v->weighted_exam;
			}
		} else {
			return false;
		}
	}




		
	public function edit_exam()
	{
		//////////////////////////////////////////
		if($this->session->userdata('user_data')) {
		$user_logged_rec = $this->session->userdata('user_data');
		$organization_id=$user_logged_rec['organization_id'];	
		$organization_name=$user_logged_rec['organization_name'];$data['organization_name'] = $organization_name;
		$organization_owner_name=$user_logged_rec['owner_first_name'].' '.$user_logged_rec['owner_last_name'];
		$data['organization_owner_name'] = $organization_owner_name;
		$remaining_session=$this->organization_model->remaining_session($organization_id);$data['remaining_session'] = $remaining_session;					
		}
		
		$exam_id=1;
		$get_exam_detail=$this->organization_model->get_exam_detail($exam_id);
		
		if($this->input->post('submit')){//print_r($_POST);die;
		$exam_id=$this->input->post('exam_id');
		$this->form_validation->set_error_delimiters('<div class="err">', '</div>');
		$this->form_validation->set_rules('exam_name', 'Exam Name', 'trim|required');
		$this->form_validation->set_rules('number_of_question', 'Number Of Question', 'trim|required');
		$this->form_validation->set_rules('passmarks', 'Passmarks', 'trim|required');
		$this->form_validation->set_rules('time_limit', 'Time Limit', 'trim|required');
		
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'trim');
		$this->form_validation->set_rules('bcc_results', 'Bcc Result', 'trim');
		$this->form_validation->set_rules('exam_banner', 'Exam Banner', 'trim');
		$this->form_validation->set_rules('styling', 'Styling', 'trim');
		$this->form_validation->set_rules('weighted_exam', 'Weighted Exam', 'trim');
		$this->form_validation->set_rules('show_final_score', 'Show Final Score', 'trim');
		$this->form_validation->set_rules('display_incorrect_answers_on_completion', 'Display Incorrect Answers On Completion', 'trim');
		$this->form_validation->set_rules('exam_code', 'Exam Code', 'trim');
		$this->form_validation->set_rules('exam_introduction_text', 'Exam Introduction Text', 'trim');
		$this->form_validation->set_rules('email_invitation_note_optional', 'Email Invitation Note Optional', 'trim');
		$this->form_validation->set_rules('text_completion_success', 'Text Completion Success', 'trim');
		$this->form_validation->set_rules('automated_email_reminder_text', 'Automated Email Reminder Text', 'trim');
		$this->form_validation->set_rules('text_completion_fail', 'Text Completion Fail', 'trim');
		
		if($this->form_validation->run() == FALSE){
			//$this->load->view('add_exam');	
		}
		else {
			$this->load->model('organization_model');
			if($exam_id=$this->organization_model->edit_exam($exam_id)){			
				$data['exam_created_successfully'] = "";
				$this->session->set_flashdata('exam_created_successfully', 'Exam Updated successfully.');	
				redirect('organization/question/exam_id/'.$exam_id, 'refresh');		
				}
			}
		}
		//////////////////////////////////////////
		$data['main_content'] = 'add_exam';		
		$this->load->view('includes/template', $data);
	}
	










	
	function edit_exam($exam_id){
		$edit_exam_insert_data = array(
			'exam_name' => $this->input->post('exam_name'),
			//'created_date' => date('Y-m-d h:i:s'),
			//'organization_id' =>$organization_id,
			'number_of_question'    => $this->input->post('number_of_question'),
			'passmarks' => $this->input->post('passmarks'),
			'time_limit'    => $this->input->post('time_limit'),
			'full_name'    => $this->input->post('full_name'),
			'email'    => $this->input->post('email'),
			'bcc_results'    => $this->input->post('bcc_results'),
			'exam_banner'    => $this->input->post('exam_banner'),
			'styling'    => $this->input->post('styling'),
			'weighted_exam'    => $this->input->post('weighted_exam'),
			'show_final_score'    => $this->input->post('show_final_score'),
			'display_incorrect_answers_on_completion'    => $this->input->post('display_incorrect_answers_on_completion'),
			'exam_code'    => $this->input->post('exam_code'),
			'exam_introduction_text'    => $this->input->post('exam_introduction_text'),
			'email_invitation_note_optional'    => $this->input->post('email_invitation_note_optional'),
			'text_completion_success'    => $this->input->post('text_completion_success'),
			'automated_email_reminder_text'    => $this->input->post('automated_email_reminder_text'),
			'text_completion_fail'    => $this->input->post('text_completion_fail')			
		);
		$this->db->where('id', $exam_id);
		$this->db->update('exam', $edit_exam_insert_data); 
		//echo $this->db->last_query();
		return $exam_id;
	}	
	
	function get_exam_detail($exam_id) {
		$this->db->select('exam_name,organization_id,number_of_question,passmarks,time_limit,full_name,email,bcc_results,exam_banner,styling,weighted_exam,show_final_score,display_incorrect_answers_on_completion,exam_code,exam_introduction_text,email_invitation_note_optional,text_completion_success,automated_email_reminder_text,text_completion_fail');
		$this->db->from('exam');
		$this->db->where('id', $exam_id);
		$query = $this->db->get();
	   //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}





















SELECT DISTINCT YEAR( exam_result.exam_date ) AS exam_year, MONTH( exam_result.exam_date ) AS exam_mnt, `e`.`id` , `e`.`exam_name` , count( * ) AS c
FROM (`exam` e)
JOIN `exam_result` ON `exam_result`.`exam_id` = `e`.`id`
WHERE `e`.`organization_id` = '1'
GROUP BY YEAR( exam_result.exam_date ) , MONTH( exam_result.exam_date ) , exam_result.exam_id
=============================
SELECT DISTINCT YEAR( exam_result.exam_date ) AS exam_year, MONTH( exam_result.exam_date ) AS exam_mnt, `e`.`id`, `e`.`exam_name`,e.passmarks,exam_result.marks_got,
sum(IF(e.passmarks >= exam_result.marks_got,1, 0)) AS failed
,sum(IF(e.passmarks < exam_result.marks_got, 1, 0)) AS passed
FROM (`exam` e) JOIN `exam_result` ON `exam_result`.`exam_id` = `e`.`id` WHERE `e`.`organization_id` = '1' GROUP BY YEAR(exam_result.exam_date ), MONTH( exam_result.exam_date ), `exam_result`.`exam_id`
================================
$this->db->select('YEAR( exam_result.exam_date ) AS exam_year, MONTH( exam_result.exam_date ) AS exam_mnt, `e`.`id` , `e`.`exam_name` ,e.passmarks,
sum(IF(e.passmarks >= exam_result.marks_got,1, 0)) AS failed
,sum(IF(e.passmarks < exam_result.marks_got, 1, 0)) AS passed');
		$this->db->from('exam e');
		$this->db->join('exam_result', 'exam_result.exam_id = e.id');
		$this->db->where($where_arr);
		$this->db->group_by("exam_result.exam_date ) , MONTH( exam_result.exam_date ) , exam_result.exam_id"); 
=====================================


$this->db->select('p.id,
(SELECT uf.fieldvalue FROM map_userfields uf WHERE uf.pointid = p.id AND uf.fieldid = 20) As ContactName,
(SELECT uf.fieldvalue FROM map_userfields uf WHERE uf.pointid = p.id AND uf.fieldid = 31) As ContactEmail
',TRUE);
$this->db->from('map_points p');
$this->db->where_in('p.type',$pointCategory);
$q = $this->db->get();
	
	 $rows =   $this->db->select('b.brand_id,b.name')
    ->select('(select count(*) from items where brand_id = b.brand_id) as itemc',FALSE)
    ->select('(select count(*) from models where brand_id = b.brand_id) as modelc',FALSE)
    ->from('brands as b')
    ->limit($perpage,$page)->get()->result();
//---------------------------------------------------------------------------------------------------------------

$this->db->select('e.id,e.exam_name,(select count(id) from assign_student_exam where e.id = assign_student_exam.exam_id) as session_alloted,
(select count(id) from exam_result where e.id = exam_result.exam_id and exam_result.marks_got>=e.passmarks) as passed,
(select count(id) from exam_result where e.id = exam_result.exam_id and exam_result.marks_got<e.passmarks) as failed
',TRUE);
$this->db->from('exam e');
$this->db->where($where_arr);
$q = $this->db->get();


SELECT `e`.`id`, `e`.`exam_name`,e.passmarks, (select count(id) from assign_student_exam where e.id = assign_student_exam.exam_id) as session_alloted, (select count(marks_got) from exam_result where `assign_student_exam`.id = exam_result.session_id and exam_result.marks_got >= e.passmarks) as passed, (select count(marks_got) from exam_result where `assign_student_exam`.id = exam_result.session_id and exam_result.marks_got < e.passmarks) as failed, MONTH(exam_result.exam_date) as exam_month, YEAR(exam_result.exam_date) as exam_year 
FROM (`exam` e) 
JOIN `exam_result` ON `exam_result`.`exam_id` = `e`.`id` 
Join `assign_student_exam`  On `assign_student_exam`.exam_id = e.id
WHERE `e`.`organization_id` = '1' 

//--------------------------------------------------------------------------------------------------------------

	function get_exam_summary_of_organization($where_arr = NULL) {
		$this->db->select('`e`.`id`, `e`.`exam_name`,e.passmarks, (select count(id) from assign_student_exam where e.id = assign_student_exam.exam_id) as session_alloted, (select count(marks_got) from exam_result where `assign_student_exam`.id = exam_result.session_id and exam_result.marks_got >= e.passmarks) as passed, (select count(marks_got) from exam_result where `assign_student_exam`.id = exam_result.session_id and exam_result.marks_got < e.passmarks) as failed, MONTH(exam_result.exam_date) as exam_month, YEAR(exam_result.exam_date) as exam_year');
		$this->db->from('exam e');
		$this->db->join('exam_result', 'exam_result.exam_id = e.id');
		$this->db->join('assign_student_exam', 'assign_student_exam.exam_id = e.id');
		$this->db->where($where_arr);
		$query = $this->db->get();  //echo $this->db->last_query();exit();die();
		if(($query->num_rows()) > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

