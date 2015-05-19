 <?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

?>
     <?php
          function sign ($valueChange)
          {  $sign = "+";
            if($valueChange<0) { $sign = "-";}                  
            return $sign;
          }
          function number($number)
           { if($number)
             { $number=number_format((double)$number)." sq.ft.";
               return $number;
             }
             else { $number="N/A"; return $number;}
           }
          function money($money)
           {
             if($money)
             { $money="\$".number_format((double)$money,2,'.',',');
               return $money;
             } 
             else { $money="N/A"; return $money;}
           }
          function abmoney($abmoney)
           {
             if($abmoney&&$abmoney!=0)
             { $abmoney="\$".number_format(abs((double)$abmoney),2,'.',',');
               return $abmoney;
             } 
             else { $abmoney="N/A"; return $abmoney;}
           }
           function imageCheck($image)
           {
             if ($image) {return $image;}
              else { $image = "https://anantitrust.files.wordpress.com/2014/09/zillow-logo.jpg";
                    return $image;}
           }
           function dataCheck($data)
           {
              if ($data) {return $data;}
              else { $data = "N/A";
                     return $data;}
           }
            function lastSoldPriceCheck($price)
           {
              if ( !$price&&$price == "0.00") 
                  {$price = "N/A"; return $price;}
              else { return $price;}
           }
           function lastSoldDateCheck($date)
           {
              if ( !$date || strtotime($date) <= strtotime("01-Jan-1970")) 
                  { $date = "N/A"; return $date;}
              else { return $date;}
           }
            date_default_timezone_set('America/Los_Angeles');
            $xmlurl="http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1b31sw6vy8b_4vl2o&address=".$_GET["streetInput"]."&citystatezip=".$_GET["cityInput"].",".$_GET["stateInput"]."&rentzestimate=true";
            $xml=simplexml_load_file($xmlurl);
            if($xml->message->code == 0)
            {   $imageurl = "http://www.zillow.com/webservice/GetUpdatedPropertyDetails.htm?zws-id=X1-ZWz1b31sw6vy8b_4vl2o&zpid=".(string)$xml->response->results->result->zpid;
                  $charturl1 = "http://www.zillow.com/webservice/GetChart.htm?zws-id=X1-ZWz1b31sw6vy8b_4vl2o&unit-type=percent&width=600&height=300&zpid=".(string)$xml->response->results->result->zpid;
                  $charturl5 = "http://www.zillow.com/webservice/GetChart.htm?zws-id=X1-ZWz1b31sw6vy8b_4vl2o&unit-type=percent&chartDuration=5years&width=600&height=300&zpid=".(string)$xml->response->results->result->zpid;
                  $charturl10 = "http://www.zillow.com/webservice/GetChart.htm?zws-id=X1-ZWz1b31sw6vy8b_4vl2o&unit-type=percent&chartDuration=10years&width=600&height=300&zpid=".(string)$xml->response->results->result->zpid;
                  $chartxml1=simplexml_load_file($charturl1);
                  $chartxml2=simplexml_load_file($charturl5);
                  $chartxml3=simplexml_load_file($charturl10);
                  $imagexml=simplexml_load_file($imageurl);
                  $arr = array(
                     "result" => array(
                     "homedetails" => (string)$xml->response->results->result->links->homedetails,
                     "street" => (string)dataCheck($xml->response->results->result->address->street),
                     "city" => (string)$xml->response->results->result->address->city,
                     "state" => (string)$xml->response->results->result->address->state,
                     "zipcode" => (string)$xml->response->results->result->address->zipcode,
                     "latitude" => (string)dataCheck($xml->response->results->result->address->latitude),
                     "longitude" => (string)dataCheck($xml->response->results->result->address->longitude),
                     "useCode" => (string)dataCheck($xml->response->results->result->useCode), 
                     "lastSoldPrice" => (string)lastSoldPriceCheck(money($xml->response->results->result->lastSoldPrice)),
                     "yearBuilt" => (string)dataCheck($xml->response->results->result->yearBuilt), 
                     "lastSoldDate" => (string)lastSoldDateCheck(date('d-M-Y',strtotime($xml->response->results->result->lastSoldDate))), 
                     "lotSizeSqFt" => (string)number($xml->response->results->result->lotSizeSqFt), 
                     "estimateLastUpdate" => (string)date('d-M-Y',strtotime($xml->response->results->result->zestimate->{'last-updated'})), 
                     "estimateAmount" => (string)money($xml->response->results->result->zestimate->amount),
                     "finishedSqFt" => (string)number($xml->response->results->result->finishedSqFt),
                     "estimateValueChange" => (string)abmoney($xml->response->results->result->zestimate->valueChange),
                     "bathrooms" => (string)(int)dataCheck($xml->response->results->result->bathrooms),
                     "estimateValuationRangeLow" => (string)money($xml->response->results->result->zestimate->valuationRange->low),
                     "estimateValuationRangeHigh" => (string)money($xml->response->results->result->zestimate->valuationRange->high),
                     "bedrooms" => (string)(int)dataCheck($xml->response->results->result->bedrooms),
                     "restimateLastUpdate" => (string)date('d-M-Y',strtotime($xml->response->results->result->rentzestimate->{'last-updated'})),
                     "restimateAmount" => (string)money($xml->response->results->result->rentzestimate->amount),
                     "taxAssessmentYear" => (string)dataCheck($xml->response->results->result->taxAssessmentYear), 
                     "restimateValueChange" => (string)abmoney($xml->response->results->result->rentzestimate->valueChange), 
                     "taxAssessment" => (string)money($xml->response->results->result->taxAssessment), 
                     "restimateValuationRangeLow" => (string)money($xml->response->results->result->rentzestimate->valuationRange->low), 
                     "restimateValuationRangeHigh" => (string)money($xml->response->results->result->rentzestimate->valuationRange->high),
                     "estimateValueChangeSign" => (string)sign((double)$xml->response->results->result->zestimate->valueChange),
                     "restimateValueChangeSign" => (string)sign((double)$xml->response->results->result->rentzestimate->valueChange)
                     )
              );

                if($imagexml->message->code == 0)
                  {  $images = array(
                     "image" => array(
                     "photoGallery" => (string)imageCheck($imagexml->response->links->photoGallery),
                     "imag1" => (string)imageCheck($imagexml->response->images->image->url)                    
                     )
                     );
                     $arr=array_merge($arr,$images);
                  }
                else { $images = array(
                       "image" => array(
                       "photoGallery" => "https://anantitrust.files.wordpress.com/2014/09/zillow-logo.jpg",
                       "imag1" => "https://anantitrust.files.wordpress.com/2014/09/zillow-logo.jpg"                    
                      )
                      );
                     $arr=array_merge($arr,$images);
                     }

                if($chartxml1->message->code == 0 && $chartxml2->message->code == 0 && $chartxml3->message->code == 0)
                   { $charts = array(
                     "chart" => array(
                     "url1year" => (string)$chartxml1->response->url,
                     "url5years" => (string)$chartxml2->response->url,
                     "url10years" => (string)$chartxml3->response->url
                     )
                     );
                    $arr=array_merge($arr,$charts);
                   }
                   $json = json_encode($arr,JSON_PRETTY_PRINT);
                   echo $json;
              }
      ?>
