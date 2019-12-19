<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_dashboard extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('d_post');
		$this->load->model('d_get');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		// $this->load->library('form_validation');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
	}
	
	function sendMailDirect(){
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$details = $this->input->post('details');
		include('assets/php-mailer-master/PHPMailerAutoload.php');
		// $test = 'asyrafsam14@gmail.com';
		$mail = new PHPMailer;

                   //$mail->SMTPDebug = 2;                               // Enable verbose debug output

	      $mail->IsSMTP();                                      // Set mailer to use SMTP
	      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	      $mail->SMTPAuth = true;
	      // $mail->SMTPDebug = 2;
	      $mail->SMTPAutoTLS = false;
	      $mail->Host = gethostbyname('tls://smtp.gmail.com');                               // Enable SMTP authentication
	      $mail->Username = 'systemcharity14@gmail.com';                 // SMTP username
	      $mail->Password = 'systemcharity1996';                           // SMTP password
	      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	      $mail->Port = 587;                                    // TCP port to connect to

	      $mail->setFrom('systemcharity14@gmail.com', 'Gadget Profix');     // Add a recipient
	      $mail->addAddress($email);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = ''.$subject.'';
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = ''.$details.'';
	      $mail->send();
	      redirect(base_url('admin/index'));
	}
	public function get_events()
	 {
	     // Our Start and End Dates
	     $start = $this->input->get("start");
	     $end = $this->input->get("end");

	     $startdt = new DateTime('now'); // setup a local datetime
	     $startdt->setTimestamp($start); // Set the date based on timestamp
	     $start_format = $startdt->format('Y-m-d H:i:s');

	     $enddt = new DateTime('now'); // setup a local datetime
	     $enddt->setTimestamp($end); // Set the date based on timestamp
	     $end_format = $enddt->format('Y-m-d H:i:s');

	     $events = $this->d_get->get_events($start_format, $end_format);

	     $data_events = array();

	     foreach($events->result() as $r) {

	         $data_events[] = array(
	             "id" => $r->id,
	             "title" => $r->title,
	             "description" => $r->description,
	             "end" => $r->end,
	             "start" => $r->start
	         );
	     }

	     echo json_encode(array("events" => $data_events));
	     exit();
	 }

	public function add_event() 
	{
	    /* Our calendar data */
	    $name = $this->input->post("name", TRUE);
	    $desc = $this->input->post("description", TRUE);
	    $start_date = $this->input->post("start_date", TRUE);
	    $end_date = $this->input->post("end_date", TRUE);
	    // echo $start_date;
	    // echo $end_date; exit();
	    if(!empty($start_date)) {
	       $sd = DateTime::createFromFormat("Y-m-d H:i", $start_date);
	       $start_date = $sd->format('Y-m-d H:i:s');
	       $start_date_timestamp = $sd->getTimestamp();
	    } else {
	       $start_date = date("Y-m-d H:i:s", time());
	       $start_date_timestamp = time();
	    }

	    if(!empty($end_date)) {
	       $ed = DateTime::createFromFormat("Y-m-d H:i", $end_date);
	       $end_date = $ed->format('Y-m-d H:i:s');
	       $end_date_timestamp = $ed->getTimestamp();
	    } else {
	       $end_date = date("Y-m-d H:i:s", time());
	       $end_date_timestamp = time();
	    }

	    $this->d_post->add_event(array(
	       "title" => $name,
	       "description" => $desc,
	       "start" => $start_date,
	       "end" => $end_date
	       )
	    );

	    redirect(base_url('admin/index'));
	}
	public function edit_event()
     {
          $eventid = intval($this->input->post("eventid"));
          $event = $this->d_get->get_event($eventid);
          if($event->num_rows() == 0) {
               echo"Invalid Event";
               exit();
          }

          $event->row();

          /* Our calendar data */
          $name = $this->input->post("name");
          $desc = $this->input->post("description");
          $start_date = $this->input->post("start_date");
          $end_date = $this->input->post("end_date");
          $delete = intval($this->input->post("delete"));

          if(!$delete) {

               if(!empty($start_date)) {
                    $sd = DateTime::createFromFormat("Y-m-d H:i", $start_date);
                    $start_date = $sd->format('Y-m-d H:i:s');
                    $start_date_timestamp = $sd->getTimestamp();
               } else {
                    $start_date = date("Y-m-d H:i:s", time());
                    $start_date_timestamp = time();
               }

               if(!empty($end_date)) {
                    $ed = DateTime::createFromFormat("Y-m-d H:i", $end_date);
                    $end_date = $ed->format('Y-m-d H:i:s');
                    $end_date_timestamp = $ed->getTimestamp();
               } else {
                    $end_date = date("Y-m-d H:i:s", time());
                    $end_date_timestamp = time();
               }

               $this->d_post->update_event($eventid, array(
                    "title" => $name,
                    "description" => $desc,
                    "start" => $start_date,
                    "end" => $end_date,
                    )
               );

          } else {
               $this->d_post->delete_event($eventid);
          }

          redirect(base_url('admin/index'));
     }

}
