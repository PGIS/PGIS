var n = document.getElementById("b"); 
           
      if(document.getElementById(20).value===""){
          
            n.style.display = "none";
      }else{
       if(checking_form1() &&checking_form3() && checking_form2() && checking_form4()&& checking_form5()){
           n.style.display = "block";
       }else{
            n.style.display = "none";
       }
      }
  function checking_form1(){
        
       for(i=1; i<3; i++){
        if(document.getElementById(i).value===""){
               return false;
                break;
        }else{
            if((i+1)===3){
              return true;  
            }else {   
                continue;
            }
        }
    }
   }
   
   function checking_form2(){
        
       for(i=4; i<13; i++){
        if(document.getElementById(i).value===""){
               return false;
                break;
        }else{
            if((i+1)===13){
              return true;  
            }else {   
                continue;
            }
        }
    }
   }
   
   function checking_form3(){
        var p=document.getElementById("form3");
        var l = p.elements.length;
       for(i=0; i<l; i++){
        var g = p.elements[i].value;
        if(g ===""){
               return false;
                break;
        }else{
            if((i+1)===l){
              return true;  
            }else {   
                continue;}
        }
    }
   }
   
   function checking_form4(){
        var p=document.getElementById("form4");
        var l = p.elements.length;
       for(i=0; i<l; i++){
        var g = p.elements[i].value;
        if(g ===""){
               return false;
                break;
        }else{
            if((i+1)===l){
              return true;  
            }else {   
                continue;}
        }
    }
   }
   
  function checking_form5(){
        
       for(i=14; i<16; i++){
        if(document.getElementById(i).value===""){
               return false;
                break;
        }else{
            if((i+1)===16){
              return true;  
            }else {   
                continue;
            }
        }
    }
   } 
  function con_message(){
    return confirm('Make sure that all impontant information and uploaded documnent\n\
have been submitted,Are you sure you want to proceed?'); 
   }
