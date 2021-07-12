<?php
include "dbConnection.php";
$con=dbConnection();
class Flight{
      public $flight_id;
      public $airline_id;
      public $arrival;
      public $departure;
      public $atime;
      public $dtime;
      public $status;

      function __construct($fid,$airline_id,$departure,$arrival,$dtime,$atime,$status){
            $this->flight_id=$fid;
            $this->airline_id=$airline_id;
            $this->arrival=$arrival;
            $this->departure=$departure;
            $this->atime=$atime;
            $this->dtime=$dtime;
            $this->status=$status;
      }
}

class FlightRepo{


      // flight crud operation
      public function UpdateFlight(Flight $flight){
            if($con){
                  $sql="SELECT *FROM flights  where flight_id='$flight->flight_id';";
                  $result=mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>=1) {
                        $query="UPDATE flights SET flight_id='$flight->flight_id',airline_id='$flight->airline_id',departure='$flight->departure',arrival='$flight->arrival',dtime='$flight->dtime',atime='$flight->atime'',status='$flight->status'  where flight_id='$flight->flight_id';";  // update if already exist
                        $update=mysqli_query($con,$query);
                        if($verify){
                              return true;
                        }
                        else{
                              return false;
                        }
                  }
                  else{
                        $query="INSERT INTO flights `(`flight_id`, `airline_id`, `departure`, `arrival`, `dtime`, `atime`, `status`)  VALUES ('$flight->flight_id','$flight->airline_id','$flight->departure','$flight->arrival','$flight->dtime','$flight->atime','$flight->status');"; 
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
      public function DeleteFlight(Flight $flight){
            if($con){
                  $query="DELETE FROM flights where flight_id='$flight->flight_id';";
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
      public function GetAllFlights(){
            if(dbConnection()){
                  $query="SELECT *FROM flights";
                  $result= mysqli_query(dbConnection(),$query);
                  if (mysqli_num_rows($result) > 0) {
                        $count=0;
                        
                        while($row = mysqli_fetch_assoc($result)) {
                              $flight[$count]=new Flight($row["flight_id"],$row["airline_id"],$row["departure"],$row["arrival"],$row["dtime"],$row["atime"],$row["status"]);
                              $count++;
            }}
            return $flight;
}
      else{
            return 1;
      }}
      public function GetFlight(Flight $flight){
            if($con){
                  $query="SELECT *FROM flights WHERE flight_id='$flight->flight_id';";
                  $result= mysqli_query($con,$query);
                  if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                              $fli=new Flight($row["flight_id"],$row["airline_id"],$row["departure"],$row["arrival"],$row["dtime"],$row["atime"],$row["status"]);
                              
            }}
            return $fli;
            } 
      else{
            return 1;
      }
}}
?>