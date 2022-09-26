
<?php
class validation
{
    function Validate($value,$all)
    {
        $check= array();
        foreach($value as $key=>$value1)
        {
            if(empty($value1))
            {
                $check[$key]="$key is required !";
            }
            elseif($key=='NAME')
            {
                if(is_numeric($value1) || preg_match('/[^a-z_+-0-9]/i',$value1))
                {
                    $check[$key]="Please enter correct $key!";

                }
            }
            elseif($key=='EMAIL')
            {
                if(!empty($all))
                {
                    foreach($all as $key2=>$value2)
                    {
                        if($value1['EMAIL']==$value2['EMAIL'])
                        {
                        $check[$key]="EMAIL already exist!";
                        break;
                        }
                    }
                }
                if(!filter_var($value1, FILTER_VALIDATE_EMAIL))
                {
                    $check[$key]="Please enter a valid EMAIL !";

                }
            }
            elseif($key=='PASSWORD')
            {
                $value1=trim($value1);
                if(empty($value))
                {
                    $check[$key]="Don't enter spaces !";

                }
                elseif(strlen($value1)<8)
                {
                    $check[$key]="PASSWORD must be 8 digit!";

                }
            }
            else
            {
                $value1=trim($value1);
                if(empty($value1))
                {
                    $check[$key]="Don't enter spaces !";
                }
            }
        }
    return $check;
    }
}
?>