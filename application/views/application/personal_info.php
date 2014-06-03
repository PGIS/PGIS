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
                        <input name="datebirth" type="text" class="form-control datepicker" id="7"
                               value="<?php display_input('datebirth',$datebirth);?>">
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
                         South Georgia and the South Sandwich Islands","Spain","Spratly Islands","Sri Lanka","Sudan","Suriname","Svalbard","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","
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
                        <div>Landline Number<input type="text" name="landline" class="form-control"
                        value="<?php display_input('landline',$landlin);?>"></div>
                        
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
                            <?php echo form_error('email','<div class="error">', '</div>'); ?>
                                <input type="text" name="email" class="form-control" id="11"
                            value="<?php display_input('email',$email);?>">
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
                            Disabilities/Special needs *.<br>
                             <?php echo form_error('disab','<div class="error">', '</div>'); ?>
                            Yes <input name="disab" type="radio" value="yes" id="yes">
                            No <input name="disab" type="radio" value="no" id="no" checked="">
                            
                        </td>
                </tr>
                <tr>
                    <td colspan="3" id="text_area">
                            <div id="disabi">
                            Nature of Disability /special needs (if any).
                           <?php echo form_error('disab_nature','<div class="error">', '</div>'); ?>
                            <div><textarea name="disab_nature" class="form-control"
                            value="<?php display_input('disab_nature',$disab_natur);?>"></textarea></div>
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
    
</div>
