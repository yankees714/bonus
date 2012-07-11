<?php
class Browse extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/New_York');
		$this->load->model('issue_model', '', TRUE);
		$this->load->model('article_model', '', TRUE);
		$this->load->model('attachments_model', '', TRUE);
	}
	
	public function index($volume = '', $issue_number = '')
	{
		if(empty($volume) || empty($issue_number))
		{
			$issue = $this->issue_model->get_latest_issue();
			$volume = $issue->volume;
			$issue_number = $issue->issue_number;
		}
		$this->issue($volume,$issue_number);
	}
	
	public function error($message = '')
	{
		$data->message = $message;
		$this->load->view('error', $data);
	}
	
	public function issue($volume,$issue_number)
	{
		// get issue
		$issue = $this->issue_model->get_issue($volume, $issue_number);
		
		if(!$issue)
		{
			$this->error();
		}
		else
		{
			// get adjacent issues (for next/prev buttons)
			$nextissue = $this->issue_model->get_adjacent_issue($volume, $issue_number, 1);
			$previssue = $this->issue_model->get_adjacent_issue($volume, $issue_number, -1);
			
			// popular articles
			$popular = $this->article_model->get_popular_articles($volume, $issue_number, '10'); 
			
			// get random quote
			$data->footerdata->quote = $this->attachments_model->get_random_quote();
			
			// get sections
			$sections = $this->issue_model->get_sections();
			
			foreach($sections as $section)
			{
				// get articles
				$articles[$section->name] = $this->article_model->get_articles($volume, $issue_number, $section->id);
			}
			
			// load data, view
			$data->issue = $issue;
			$data->nextissue = $nextissue;
			$data->previssue = $previssue;
			$data->popular = $popular;
			$data->sections = $sections;
			$data->articles = $articles;	
			$this->load->view('browse', $data);
		}
	}
}
?>