<div class="home tab-pane <?php if(isset($active2)){echo 'active';}?>">
     <div class='pantop'><h4>Personal information</h4></div>
     <label class="label label-warning"><span class=" glyphicon glyphicon-info-sign"></span><i> Fields with asterisk must be filled *</i></label>
    <p>
        <?php echo form_open('application/personal_info'); ?>
            <table class="table table-striped">
                <tr>
                    <td>Surname/Family Name *<br>
                       <?php echo form_error('surname','<div class="error">', '</div>'); ?>
                        <input name="surname" type="text" class="form-control" id="4"
                        value="<?php display_input('surname',$sname);?>">
                    </td>
                    <td > Other Name's *</br>
                        <?php echo form_error('other_name','<div class="error">', '</div>'); ?>
                        <input name="other_name" type="text" class="form-control" id="5"
                        value="<?php display_input('other_name',$other_nam);?>">
                    </td>
                </tr>
                <tr>
                   <td>Title *<br>
                        <?php echo form_error('title','<div class="error">', '</div>'); ?>
                       <select class="form-control" name="title" id="6">
                           <option><?php display_input('title',$title);?></option>
                           <option>Mr</option>
                           <option>Mrs</option>
                           <option>Miss</option>
                           <option>Ms</option>
                       </select>  
                    </td>
                   <td>Date of Birth *<br>
                        <?php echo form_error('datebirth','<div class="error">', '</div>'); ?>
                       <table class="table">
                           <tr><td><select class=" form-control " name="datebirth1">
                                       <option value="<?php echo substr($datebirth, 0,2);?>"><?php echo substr($datebirth, 0,2);?></option>
                                       <option value="01">1</option>
                                       <option value="02">2</option>
                                       <option value="03">3</option>
                                       <option value="04">4</option>
                                       <option value="05">5</option>
                                       <option value="06">6</option>
                                       <option value="07">7</option>
                                       <option value="08">8</option>
                                       <option value="09">9</option>
                                       <option value="10">10</option>
                                       <option>11</option>
                                       <option>12</option>
                                       <option>13</option>
                                       <option>14</option>
                                       <option>15</option>
                                       <option>16</option>
                                       <option>17</option>
                                       <option>18</option>
                                       <option>19</option>
                                       <option>20</option>
                                       <option>21</option>
                                       <option>22</option>
                                       <option>23</option>
                                       <option>24</option>
                                       <option>25</option>
                                       <option>26</option>
                                       <option>27</option>
                                       <option>28</option>
                                       <option>29</option>
                                       <option>30</option>
                                       <option>31</option>
                                   </select></td>
                                   <td><select class=" form-control" name="datebirth2">
                                           <option value="<?php echo substr($datebirth, 3,2);?>"><?php echo substr($datebirth, 3,2);?></option>
                                       <option value="01">Jan</option>
                                       <option value="02">Feb</option>
                                       <option value="03">March</option>
                                       <option value="04">April</option>
                                       <option value="05">May</option>
                                       <option value="06">June</option>
                                       <option value="07">July</option>
                                       <option value="08">August</option>
                                       <option value="09">September</option>
                                       <option value="10">October</option>
                                       <option value="11">November</option>
                                       <option value="12">December</option>
                                       </select></td>
                                       <td>
                                           <select class=" form-control " name="datebirth">
                                       <option value="<?php echo substr($datebirth, 6,11);?>"><?php echo substr($datebirth, 6,11);?></option>
                                       <option>1990</option>
                                       <option>1989</option>
                                       <option>1988</option>
                                       <option>1987</option>
                                       <option>1986</option>
                                       <option>1985</option>
                                       <option>1984</option>
                                       <option>1983</option>
                                       <option>1982</option>
                                       <option>1981</option>
                                       <option>1980</option>
                                       <option>1979</option>
                                       <option>1978</option>
                                       <option>1977</option>
                                       <option>1976</option>
                                       <option>1975</option>
                                       <option>1974</option>
                                       <option>1973</option>
                                       <option>1972</option>
                                       <option>1971</option>
                                       <option>1970</option>
                                       <option>1969</option>
                                       <option>1968</option>
                                       <option>1967</option>
                                       <option>1966</option>
                                       <option>1965</option>
                                       <option>1964</option>
                                       <option>1963</option>
                                       <option>1962</option>
                                       <option>1961</option>
                                       <option>1960</option>
                                       <option>1959</option>
                                   </select>
                                     
                                       </td>
                           </tr>
                       </table>
                   </td>
                </tr>
                <tr>
               <td>Country of Birth *
                        <?php echo form_error('coun_birth','<div class="error">', '</div>'); ?>
                       <select  name="coun_birth" class="form-control " id="8">
                            <option value="<?php display_input('coun_birth',$country);?>"><?php display_input('coun_birth',$country);?></option>
                            <?php
                                 $country=array("Afghanistan","Akrotiri","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Ashmore and Cartier Islands","Australia","
                         Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Bassas da India","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Bouvet Island","Brazil","British Indian Ocean Territory","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burma","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central African Republic","Chad","Chile","China","Christmas Island","Clipperton Island","Cocos (Keeling) Islands","Colombia","Comoros","Congo, Democratic Republic of the",
                         "Congo, Republic of the","Cook Islands","Coral Sea Islands","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Dhekelia","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt"
                         ,"El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Europa Island","Falkland Islands (Islas Malvinas)","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","French Southern and Antarctic Lands","Gabon","Gambia","Gaza Strip","Georgia","Germany","Ghana","Gibraltar","Glorioso Islands","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guernsey","Guinea","Guinea-Bissau","Guyana","Haiti","Heard Island and McDonald Islands","Holy See (Vatican City)","Honduras","Hong Kong","Hungary","Iceland"
                         ,"India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Jan Mayen","Japan","Jersey","Jordan","Juan de Nova Island","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kuwait"
                         ,"Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Martinique"
                         ,"Mauritania","Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Moldova","Monaco","Mongolia",
                         "Montserrat","Morocco","Mozambique","Namibia","Nauru","Navassa Island","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Islands","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paracel Islands","Paraguay","Peru"
                         ,"Philippines","Pitcairn Islands","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Helena","Saint Kitts and Nevis","Saint Lucia","Saint Pierre and Miquelon","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia and Montenegro","
                         Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","
                         South Georgia and the South Sandwich Islands","Spain","Spratly Islands","Sri Lanka","Sudan","Suriname","Svalbard","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania ,United Republic of","Thailand","
                         Timor-Leste","Togo","Tokelau","Tonga","Trinidad and Tobago","Tromelin Island","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay",
                         "Uzbekistan","Vanuatu","Venezuela","Vietnam","Virgin Islands","Wake Island","Wallis and Futuna","West Bank"
                         ,"Western Sahara","Yemen","Zambia","Zimbabwe");
                         $limits=count($country);
                         for($i=0;$i < $limits;$i++){
                                 echo "<option value='$country[$i]'>$country[$i]</option>";
                         }
                                 ?>
                           </select></td>
                    <td>Nationality *
                         <?php echo form_error('nation','<div class="error">', '</div>'); ?>
                        <select type="text" name="nation" class="form-control" id="9">
                            <option value="<?php display_input('nation',$nationalt);?>"><?php display_input('nation',$nationalt);?> </option>
                            <?php
                                 $country=array("Afghanistans","Akrotirian","Albanis","Algeris","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Ashmore and Cartier Islands","Australia","
                         Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Bassas da India","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Bouvet Island","Brazil","British Indian Ocean Territory","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burma","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central African Republic","Chad","Chile","China","Christmas Island","Clipperton Island","Cocos (Keeling) Islands","Colombia","Comoros","Congo, Democratic Republic of the",
                         "Congo, Republic of the","Cook Islands","Coral Sea Islands","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Dhekelia","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt"
                         ,"El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Europa Island","Falkland Islands (Islas Malvinas)","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","French Southern and Antarctic Lands","Gabon","Gambia","Gaza Strip","Georgia","Germany","Ghana","Gibraltar","Glorioso Islands","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guernsey","Guinea","Guinea-Bissau","Guyana","Haiti","Heard Island and McDonald Islands","Holy See (Vatican City)","Honduras","Hong Kong","Hungary","Iceland"
                         ,"India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Jan Mayen","Japan","Jersey","Jordan","Juan de Nova Island","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kuwait"
                         ,"Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Martinique"
                         ,"Mauritania","Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Moldova","Monaco","Mongolia",
                         "Montserrat","Morocco","Mozambique","Namibia","Nauru","Navassa Island","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Islands","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paracel Islands","Paraguay","Peru"
                         ,"Philippines","Pitcairn Islands","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Helena","Saint Kitts and Nevis","Saint Lucia","Saint Pierre and Miquelon","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia and Montenegro","
                         Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","
                         South Georgia and the South Sandwich Islands","Spain","Spratly Islands","Sri Lanka","Sudan","Suriname","Svalbard","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzanian","Thailand","
                         Timor-Leste","Togo","Tokelau","Tonga","Trinidad and Tobago","Tromelin Island","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay",
                         "Uzbekistan","Vanuatu","Venezuela","Vietnam","Virgin Islands","Wake Island","Wallis and Futuna","West Bank"
                         ,"Western Sahara","Yemen","Zambia","Zimbabwe");
                         $limits=count($country);
                         for($i=0;$i < $limits;$i++){
                                 echo "<option value='$country[$i]'>$country[$i]</option>";
                         }
                                 ?>
                        </select>
                        </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_error('landline','<div class="error">', '</div>'); ?>
                        <div>Landline Number<input type="text" name="landline" class="form-control landline"
                    value="<?php display_input('landline',$landlin);?>"><span class="verifyland"></span></div>
                        
                        <div>Mobile Number *
                        <?php echo form_error('mobile','<div class="error">', '</div>'); ?>
                            <input type="text" name="mobile" class="form-control" id="10"
                         value="<?php display_input('mobile',$mobil);?>"></div>
                    </td>
                    <td >
                        <div >Fax Number
                        <?php echo form_error('fax','<div class="error">', '</div>'); ?> 
                            <input type="text" name="fax" class="form-control"
                            value="<?php display_input('fax',$fax);?>">
                        </div>
                            
                            <div>e-mail Address *
                                <?php
                                $res=$this->db->get_where('tb_user',array('userid'=>$this->session->userdata('userid')),1);
                                foreach ($res->result() as $row){
                                ?>
                            <?php echo form_error('email','<div class="error">', '</div>'); ?>
                                <input type="text" name="email" class="form-control alert-info" id="11" 
                            value="<?php echo ''. $row->email.'';?>">
                                <?php
                                }
                                ?>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td>Permanent Address *.
                        <?php echo form_error('perm_address','<div class="error">', '</div>'); ?>
                        <div><input name="perm_address" type="text" class="form-control" id="12"
                        value="<?php display_input('perm_address',$perm_addres);?>"></div>
                    </td>
                    <td>
                            Disabilities/Known disabilities *.<br>
                             <?php echo form_error('disab','<div class="error">', '</div>'); ?>
                            Yes <input name="disab" type="radio" value="yes" id="yes">
                            No <input name="disab" type="radio" value="no" id="no" checked="">
                            
                        </td>
                </tr>
                <tr>
                    <td colspan="3" id="text_area">
                            <div id="disabi">
                                 Nature of Disability.
                                <select name="disab_nature" class="form-control">
                                    <option id="yes5"></option>
                                    <option id="yes1">Physical disabilities</option>
                                    <option id="yes3">Visual impairment</option>
                                    <option id="yes4">Hearing impairment</option>
                                    <option id="yes2">Others</option>
                                </select>
                                 <div class="dis">
                            Specify.
                           <?php echo form_error('disab_nature','<div class="error">', '</div>'); ?>
                            <div><textarea name="disab_nature" class="form-control"
                            value="<?php display_input('disab_nature',$disab_natur);?>"></textarea></div>
                                 </div>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-12">
                            <div class="col-md-6 pull-left">
                                <input class="subtn btn-primary" type="submit" name="back" value="Back">
                            </div> 
                            <div class="col-md-6 ">
                                <input class="subtn btn-primary" type="submit" name="save" value="Save">
                            </div> 
                        </div>
                     
                    </td>
                    <td>
                        <input class="subtn btn-primary" type="submit" name="savcont" value="Save and continue">
                    </td>
                </tr>
            </table>
           
        </form>
    </p>
    <script>
        $(document).ready(function(){
            $('.dis').hide();
            $('#yes2').click(function(){
                $('.dis').show();
            });
            $('#yes1').click(function(){
                $('.dis').hide();
            });
            $('#yes3').click(function(){
                $('.dis').hide();
            });
            $('#yes4').click(function(){
                $('.dis').hide();
            });
            $('#yes5').click(function(){
                $('.dis').hide();
            });
        });
    </script>
    <script>
        $('.landline').keyup(function(){
           $('.verifyland').html('<label class="alert-danger">Should put numbers only</label>');
           var formlandline=$(this).val();
           if(formlandline.length >=10){
               setTimeout(function(){
               $('.verifyland').html('<label class="alert-warning"> Should be numbers not les than 10</label>');
               },1000);
           }else if(formlandline !==''){
               setTimeout(function(){
               $('.verifyland').html('<label class="alert-warning"> Should be numbers</label>');
               },1000);
           }else{
               setTimeout(function(){
              $('.verifyland').html('<label class="alert-success"> accepted</label>'); 
               },1000);
           }
        });
    </script>
</div>
