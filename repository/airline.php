<?php
include "dbConnection.php";
$con=dbConnection();
class Airline{
      private $airline_id;
      private $airline_name;
      private $contact;

      function __construct($aid,$airline_name,$contact){
            $this->airline_id=$aid;
            $this->airline_name=$airline_name;
            $this->contact=$contact;
      }}
      class AirlineRepo{
      
      // airline crud operation
      public function UpdateAirline(Airline $airline){
            if($con){
                  $sql="SELECT *FROM airline where airline_id='$airline->airline_id';";
                  $result=mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>=1) {
                        $query="UPDATE FROM airline where airline_id='$airline->airline_id';";  // update if already exist
                        $update=mysqli_query($con,$query);
                        if($verify){
                              return true;
                        }
                        else{
                              return false;
                        }
                  }
                  else{
                        $query="INSERT INTO airline () VALUES ();"; 
                        $update=mysqli_query($con,$query);
                        if($verify){
                              return true;
                        }
                        else{
                              return false;
                        }
                  }
            }
            

            return false;
      }
      public function DeleteAirline(Airline $airline){
            if($con){
                  $query="DELETE FROM airline where airline_id='$airline->airline_id';";
                  $update=mysqli_query($con,$query);
                  if($verify){
                        return true;
                  }
                  else{
                        return false;
                  }      

            }
            return false;      
      }
      public function GetAllAirlines(){
            if($con){
                  $query="SELECT *FROM airlines";
                  return mysqli_query($con,$query);
            }
            else{
                  return 1;
            }
            
      }
      public function GetAirline(Airline $airline){
            if($con){
                  $query="SELECT *FROM airlines WHERE airline_id='$airline->airline_id';";
                  return mysqli_query($con,$query);
            }
            else{
                  return 1;
            }

      }
      }

?>