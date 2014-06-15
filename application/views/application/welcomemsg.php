<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
        <div class="col-md-6 well well-sm">Dear <?php echo $this->session->userdata('userid');?></div>
        <div class="col-md-12">
           <pre> Welcome to Postgraduate Information System.
  Now that you have logged in successfully you are ready to start online application.Remember that the information which you 
  provide must be true.
  before you submit the application you must make sure that all important informational are included as well as supported
  documents.
  You must verify the following are included before you submit the application.
        copy of certificates and higher education transcripts
        copy Resume or CV
        copy of application fee receipt
        other certificate like birth certificate
        Statement of purpose/research proposal

NOTE::Application which miss any of the following won't be processed
           </pre>
    <div class="col-md-6 ">
        <button class="btn btn-block btn-info">
            Application dead line:
            <?php 
          $query = $this->db->get('tb_system_setting');
             if($query->num_rows()>0){
                 foreach ($query->result() as $row){
                   $closedate=$row->appdeadline;
                }
                echo $closedate;
             }
            ?>
        </button>
    </div>   
    <div class='app'>
        <a href="<?php echo site_url('application/apply');?>">
            <button type="button" class="mybtn btn-primary">Start online application
            <span class="glyphicon glyphicon-new-window"></span>
            </button>
        </a>
    </div>
        
        </div>
    </div>
</div>
<?php include 'footer.php';?>