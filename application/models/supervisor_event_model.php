<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Supervisor_event_model extends CI_Model{
     var $conf;
     function __construct() {
         parent::__construct();
         $this->conf=array(
             'start_day'=>'monday',
             'show_next_prev'=>TRUE,
             'next_prev_url'=>  base_url().'index.php/supervisor_event/display_cal'
         );
         $this->conf['template']='{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

   {heading_row_start}<tr>{/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr class="days">{/cal_row_start}
   {cal_cell_start}<td class="day">{/cal_cell_start}

   {cal_cell_content}
   <div class="day_num">{day}</div>
   <div class="content">{content}</div>
  {/cal_cell_content}
   {cal_cell_content_today}
   <div class="day_num highlight">{day}</div>
   <div class="content">{content}</div>
   {/cal_cell_content_today}

   {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}
   ';
     }
     public function add_calendar_data($sn,$day,$data){
         $array=array(
             'calendar_register'=>$sn,
             'day'=>$day,
             'data'=>$data
         );
         $query=  $this->db->get_where('tb_calendar',array('calendar_register'=>$sn,'day'=>$day));
         if($query->num_rows()===1){
             $this->db->where('day',$day);
             $this->db->update('tb_calendar',$array);
         }  else {
             $this->db->insert('tb_calendar',$array);
         }
     }

     public function get_calendar_data($year,$month){
        $query= $this->db->select('day,data')->from('tb_calendar')->like('day',"$year-$month",'after')->where('calendar_register',  $this->session->userdata('userid'))->get();
             $cal_data=array();
             foreach ($query->result() as $row){
             $cal_data[substr($row->day,8,2)]=$row->data;    
             }
             return $cal_data;
         }
     
     function calendar($year,$month){
         
       $this->load->library('calendar', $this->conf);
       $cal_data=  $this->get_calendar_data($year, $month);
       return $this->calendar->generate($year,$month,$cal_data);
     }
 }


