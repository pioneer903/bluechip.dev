<?php 
$result = 1;
  
//if number of rows fields is bigger them 0 that means it's NOT available '  
if(($result)>0){  
    //and we send 0 to the ajax request  
    echo 0;  
}else{  
    //else if it's not bigger then 0, then it's available '  
    //and we send 1 to the ajax request  
    echo 1;  
}  
 ?>