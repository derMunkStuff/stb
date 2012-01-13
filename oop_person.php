<?php 
class person {
        var $name; 

	   function __construct($persons_name) {           
	                        $this->name = $persons_name;            
	                }  
	   
	    protected function set_name($new_name) { 
	                $this->name = strtoupper($new_name);  
	        }
	
	    function get_name() {
	                return $this->name;
	        }

} 

class mitarbeiter extends person {
        function __construct($employee_name) {
                $this->set_name($employee_name);

 	     function set_name($new_name) { 
	                $this->name = $new_name;  
	        }
        }
}
// person::set_name($new_name);
$stefan = new person("huhu");
$thomas = new mitarbeiter("thomas");


echo $stefan->get_name();

echo "--->". $thomas->get_name();



?>