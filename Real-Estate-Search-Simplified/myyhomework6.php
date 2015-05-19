<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
    div#content {width:480px;height:190px;border-style: solid;
    border-width: 3px;}   
    h1{font-size:25px;}
    h2{font-size:20px; font-weight: bold;}
    </style>  
    <script language=JavaScript> 
     function checkEmpty() 
     {
       var street_filled = city_filled = state_filled = false; 
       var blank="";
         if (document.myform.street.value != blank) street_filled=true; 
         if (document.myform.city.value != blank) city_filled=true; 
         if (document.myform.state.value != blank) state_filled=true; 
         if((street_filled)&&(city_filled)&&(state_filled))
         { return(true);}
         else { var alertstring="Please enter value for "; 
           if (!street_filled) 
            {   alertstring=alertstring + "Street Address"; 
                if (!city_filled) alertstring=alertstring + " and City";
                if (!state_filled) alertstring=alertstring + " and State";
              }
           else { if (!city_filled) 
                     { alertstring=alertstring + "City"; 
                       if(!state_filled) alertstring=alertstring + " and State";
                     }
                  else { if (!state_filled) alertstring=alertstring + "State"; }
                }
           alert(alertstring);
           return(false);
              }
       }
    </script> 
</head>
<body>
<center>
  <h1>Real Estate Search</h1>
  <div id="content">
    <form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="location">
      <table style="font-size:18px; position:relative;left:-45px;top:10px;"><tr><td>Street Adress*:</td><td><input type="text" name="street" style="font-size:15px;" value="<?php echo (isset($_POST["street"]) ? $_POST["street"] : ''); ?>"/></td><tr>
      <tr><td>City*:</td><td><input type="text" name="city" style="font-size:15px;" value="<?php echo (isset($_POST["city"]) ? $_POST["city"] : ''); ?>"/></td></tr>
      <tr><td>State*:</td><td>
      <select name="state" style="font-size:15px; height:25px;">
      <option hidden selected value=""></option>
      <option value="AL" <?php if (isset($_POST["state"])&&$_POST["state"]=="AL") echo "selected";?>>AL</option>
      <option value="AK" <?php if (isset($_POST["state"])&&$_POST["state"]=="AK") echo "selected";?>>AK</option>
      <option value="AR" <?php if (isset($_POST["state"])&&$_POST["state"]=="AR") echo "selected";?>>AR</option>
      <option value="AZ" <?php if (isset($_POST["state"])&&$_POST["state"]=="AZ") echo "selected";?>>AZ</option>
      <option value="CA" <?php if (isset($_POST["state"])&&$_POST["state"]=="CA") echo "selected";?>>CA</option>
      <option value="CO" <?php if (isset($_POST["state"])&&$_POST["state"]=="CO") echo "selected";?>>CO</option>
      <option value="CT" <?php if (isset($_POST["state"])&&$_POST["state"]=="CT") echo "selected";?>>CT</option>
      <option value="DC" <?php if (isset($_POST["state"])&&$_POST["state"]=="DC") echo "selected";?>>DC</option>
      <option value="DE" <?php if (isset($_POST["state"])&&$_POST["state"]=="DE") echo "selected";?>>DE</option>
      <option value="FL" <?php if (isset($_POST["state"])&&$_POST["state"]=="FL") echo "selected";?>>FL</option>
      <option value="GA" <?php if (isset($_POST["state"])&&$_POST["state"]=="GA") echo "selected";?>>GA</option>
      <option value="HI" <?php if (isset($_POST["state"])&&$_POST["state"]=="HI") echo "selected";?>>HI</option>
      <option value="IA" <?php if (isset($_POST["state"])&&$_POST["state"]=="IA") echo "selected";?>>IA</option>
      <option value="ID" <?php if (isset($_POST["state"])&&$_POST["state"]=="ID") echo "selected";?>>ID</option>
      <option value="IL" <?php if (isset($_POST["state"])&&$_POST["state"]=="IL") echo "selected";?>>IL</option>
      <option value="IN" <?php if (isset($_POST["state"])&&$_POST["state"]=="IN") echo "selected";?>>IN</option>
      <option value="KS" <?php if (isset($_POST["state"])&&$_POST["state"]=="KS") echo "selected";?>>KS</option>
      <option value="KY" <?php if (isset($_POST["state"])&&$_POST["state"]=="KY") echo "selected";?>>KY</option>
      <option value="LA" <?php if (isset($_POST["state"])&&$_POST["state"]=="LA") echo "selected";?>>LA</option>
      <option value="MA" <?php if (isset($_POST["state"])&&$_POST["state"]=="MA") echo "selected";?>>MA</option>
      <option value="MD" <?php if (isset($_POST["state"])&&$_POST["state"]=="MD") echo "selected";?>>MD</option>
      <option value="ME" <?php if (isset($_POST["state"])&&$_POST["state"]=="ME") echo "selected";?>>ME</option>
      <option value="MI" <?php if (isset($_POST["state"])&&$_POST["state"]=="MI") echo "selected";?>>MI</option>
      <option value="MN" <?php if (isset($_POST["state"])&&$_POST["state"]=="MN") echo "selected";?>>MN</option>
      <option value="MO" <?php if (isset($_POST["state"])&&$_POST["state"]=="MO") echo "selected";?>>MO</option>
      <option value="MS" <?php if (isset($_POST["state"])&&$_POST["state"]=="MS") echo "selected";?>>MS</option>
      <option value="MT" <?php if (isset($_POST["state"])&&$_POST["state"]=="MT") echo "selected";?>>MT</option>
      <option value="NC" <?php if (isset($_POST["state"])&&$_POST["state"]=="NC") echo "selected";?>>NC</option>
      <option value="ND" <?php if (isset($_POST["state"])&&$_POST["state"]=="ND") echo "selected";?>>ND</option>
      <option value="NE" <?php if (isset($_POST["state"])&&$_POST["state"]=="NE") echo "selected";?>>NE</option>
      <option value="NH" <?php if (isset($_POST["state"])&&$_POST["state"]=="NH") echo "selected";?>>NH</option>
      <option value="NJ" <?php if (isset($_POST["state"])&&$_POST["state"]=="NJ") echo "selected";?>>NJ</option>
      <option value="NM" <?php if (isset($_POST["state"])&&$_POST["state"]=="NM") echo "selected";?>>NM</option>
      <option value="NV" <?php if (isset($_POST["state"])&&$_POST["state"]=="NV") echo "selected";?>>NV</option>
      <option value="NY" <?php if (isset($_POST["state"])&&$_POST["state"]=="NY") echo "selected";?>>NY</option>
      <option value="OH" <?php if (isset($_POST["state"])&&$_POST["state"]=="OH") echo "selected";?>>OH</option>
      <option value="OK" <?php if (isset($_POST["state"])&&$_POST["state"]=="OK") echo "selected";?>>OK</option>
      <option value="OR" <?php if (isset($_POST["state"])&&$_POST["state"]=="OR") echo "selected";?>>OR</option>
      <option value="PA" <?php if (isset($_POST["state"])&&$_POST["state"]=="PA") echo "selected";?>>PA</option>
      <option value="RI" <?php if (isset($_POST["state"])&&$_POST["state"]=="RI") echo "selected";?>>RI</option>
      <option value="SC" <?php if (isset($_POST["state"])&&$_POST["state"]=="SC") echo "selected";?>>SC</option>
      <option value="SD" <?php if (isset($_POST["state"])&&$_POST["state"]=="SD") echo "selected";?>>SD</option>
      <option value="TN" <?php if (isset($_POST["state"])&&$_POST["state"]=="TN") echo "selected";?>>TN</option>
      <option value="TX" <?php if (isset($_POST["state"])&&$_POST["state"]=="TX") echo "selected";?>>TX</option>
      <option value="UT" <?php if (isset($_POST["state"])&&$_POST["state"]=="UT") echo "selected";?>>UT</option>
      <option value="VA" <?php if (isset($_POST["state"])&&$_POST["state"]=="VA") echo "selected";?>>VA</option>
      <option value="VT" <?php if (isset($_POST["state"])&&$_POST["state"]=="VT") echo "selected";?>>VT</option>
      <option value="WA" <?php if (isset($_POST["state"])&&$_POST["state"]=="WA") echo "selected";?>>WA</option>
      <option value="WI" <?php if (isset($_POST["state"])&&$_POST["state"]=="WI") echo "selected";?>>WI</option>
      <option value="WV" <?php if (isset($_POST["state"])&&$_POST["state"]=="WV") echo "selected";?>>WV</option>
      <option value="WY" <?php if (isset($_POST["state"])&&$_POST["state"]=="WY") echo "selected";?>>WY</option>   
      </select>
      </td></tr>
    <tr><td></td><td><input type="submit" style="background-color:#ececec;width:60px;height:30px" name="submit" value="Search" onclick="checkEmpty()"/>
    <a href="http://www.zillow.com/" target="_blank"><img src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=/static/logos/Zillowlogo_150x40.gif" width="150" height="40" alt="Zillow Real Estate Search" /></a></td></tr>
    <tr><td><I>*-Mandatory fields.</I></td></tr>
  </table>
    </form>
  </div>
<?php
 date_default_timezone_set('America/Los_Angeles');
 if(isset($_POST["submit"])&&($_POST["street"]!="")&&($_POST["city"]!="")&&($_POST["state"]!=""))
  { 
    function arrow($number)
         {  $arrowurl="http://www-scf.usc.edu/~csci571/2014Spring/hw6/up_g.gif";
        if($number<0)
        { 
          $arrowurl="http://www-scf.usc.edu/~csci571/2014Spring/hw6/down_r.gif"; }
          return $arrowurl;
        }
    function number($a)
        { if($a)
          { $a=number_format((double)$a)."&nbsp;&nbsp;sq. ft";
            return $a;
          }
        }
    function money($b)
        {
         if(isset($b))
          { $b="\$".number_format((double)$b,2,'.',',');
            return $b;
          } 
        }
    function abmoney($c)
        {
         if($c&&$c!=0)
          { $c="\$".number_format(abs((double)$c),2,'.',',');
            return $c;
          } 
        }

    function lastSoldDateCheck($date)
        {
              if ( !$date || strtotime($date) <= strtotime("01-Jan-1970")) 
                  { $date = "N/A"; return $date;}
              else { return $date;}
        }
   $url="http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1b31sw6vy8b_4vl2o&address=".$_POST["street"]."&citystatezip=".$_POST["city"].",".$_POST["state"]."&rentzestimate=true";
   $xml=simplexml_load_file($url);
   if($xml->message->code == 0)
   { 
   echo "<h1 align='center'>Search Results</h1>\n";
   echo "<table><tr><td colspan=4 style='background-color:#f1e9c4'>See more details for&nbsp;<a href='".$xml->response->results->result->links->homedetails."'target='_blank'>".$xml->response->results->result->address->street.",&nbsp;".$xml->response->results->result->address->city.",&nbsp;".$xml->response->results->result->address->state."&nbsp;-".$xml->response->results->result->address->zipcode."</a>&nbsp;on Zillow</td></tr>";
   echo "<tr><td width='250px'>Property Type:</td><td width='150px'>".$xml->response->results->result->useCode.
     "</td><td>Last Sold Price:</td><td align='right'>".money($xml->response->results->result->lastSoldPrice)."</td></tr>";
   echo "<tr><td>Year Built:</td><td>".$xml->response->results->result->yearBuilt.
     "</td><td>Last Sold Date:</td><td align='right'>".lastSoldDateCheck(date('d-M-Y',strtotime($xml->response->results->result->lastSoldDate)))."</td></tr>";
   echo "<tr><td>Lot Size:</td><td>".number($xml->response->results->result->lotSizeSqFt).
     "</td><td>Zestimate &#174; Property Estimate as of&nbsp;".date('d-M-Y',strtotime($xml->response->results->result->zestimate->{'last-updated'})).":</td><td align='right'>".money($xml->response->results->result->zestimate->amount)."</td></tr>";
   echo "<tr><td>Finished Area:</td><td>".number($xml->response->results->result->finishedSqFt).
     "</td><td>30 Days Overall Change<img src='".arrow($xml->response->results->result->zestimate->valueChange)."'>:</td><td align='right'>".abmoney($xml->response->results->result->zestimate->valueChange)."</td></tr>";
   echo "<tr><td>Bathrooms:</td><td>".$xml->response->results->result->bathrooms.
     "</td><td>All Time Property Range:</td><td align='right'>".money($xml->response->results->result->zestimate->valuationRange->low)."-".money($xml->response->results->result->zestimate->valuationRange->high)."</td></tr>";
   echo "<tr><td>Bedrooms:</td><td>".$xml->response->results->result->bedrooms.
     "</td><td>Rent Zestimate &reg; Valuation as of&nbsp;".date('d-M-Y',strtotime($xml->response->results->result->rentzestimate->{'last-updated'})).":</td><td align='right'>".money($xml->response->results->result->rentzestimate->amount)."</td></tr>";
   echo "<tr><td>Tax Assessment Year:</td><td>".$xml->response->results->result->taxAssessmentYear.
     "</td><td>30 Days Rent Change<img src='".arrow($xml->response->results->result->rentzestimate->valueChange)."'>:</td><td align='right'>".abmoney($xml->response->results->result->rentzestimate->valueChange)."</td></tr>";
   echo "<tr><td>Tax Assessment:</td><td>".money($xml->response->results->result->taxAssessment).
     "</td><td>All Time Rent Range:</td><td align='right'>".money($xml->response->results->result->rentzestimate->valuationRange->low)."-".money($xml->response->results->result->rentzestimate->valuationRange->high)."</td></tr></table>";
   echo "&#169; Zillow, Inc.,2006-2014. Use is subject to <a href='http://www.zillow.com/corp/Terms.htm' target='_blank'>Terms of Use</a><br>";
   echo "<a href='http://www.zillow.com/zestimate/' target='_blank'>What's a Zestimate?</a>";
   }
   else { echo "<h2>No exact match found -- Verify that the given address is correct.</h2>"; }
 }
?>
</center>
</body>
</html>