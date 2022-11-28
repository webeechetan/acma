<?php
error_reporting(0);
include('header-ajax.php');
#ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
use App\Models\AcmaEventSummit ;  
use App\Models\AchmaEventMembers;

if(isset($_GET['EVENT_2020'])){
    
    $event = new AcmaEventSummit();
    $data = $event->getUser();
    echo json_encode($data);
    #print_R($data);
}

if(isset($_GET['download'])){ 

    $event = new AcmaEventSummit();
    $result = $event->getLeadsCSV();
    $filename           =   'acma-leads-'.date('d/m/Y');
  
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$filename.'.csv');
  
    $output             =   fopen('php://output', 'w');
    $names              =   array(
    'Billing name','Designation','Email','Phone','Company Name','Eligibility','Number of member',
    'Member 1 Name','Member 1 Email','Member 1 Designation','Member 1 Phone',
    'Member 2 Name','Member 2 Email','Member 2 Designation','Member 2 Phone',
    'Member 3 Name','Member 3 Email','Member 3 Designation','Member 3 Phone',
    'Member 4 Name','Member 4 Email','Member 4 Designation','Member 4 Phone');
    $count              =   0;
  
    fputcsv($output,$names);
  
    if(isset($result) && !empty($result)){
      foreach($result as $data){
        
       
        #echo  $data['achma_event_member'][0]['member_name'];
        $modifiedData=array(
          $data['billing_name'],$data['designation'],$data['billing_email'],$data['billing_tel'],$data['company_name'],$eligibilty,$data['number_of_member'],
          $data['achma_event_members'][0]['member_name'],$data['achma_event_members'][0]['member_email'],$data['achma_event_members'][0]['member_mobile_no'],$data['achma_event_members'][0]['member_designation'],
          $data['achma_event_members'][1]['member_name'],$data['achma_event_members'][1]['member_email'],$data['achma_event_members'][1]['member_mobile_no'],$data['achma_event_members'][1]['member_designation'],
          $data['achma_event_members'][1]['member_name'],$data['achma_event_members'][1]['member_email'],$data['achma_event_members'][1]['member_mobile_no'],$data['achma_event_members'][1]['member_designation'],
          $data['achma_event_members'][1]['member_name'],$data['achma_event_members'][1]['member_email'],$data['achma_event_members'][1]['member_mobile_no'],$data['achma_event_members'][1]['member_designation']
  
        );
        #echo '<pre>'; print_R( $modifiedData ); echo '</pre>';
        
        fputcsv($output,$modifiedData);
        $latest[] = $modifiedData;
      }
      #echo '<pre>'; print_R( $latest ); echo '</pre>';
    }
    die;
  } 

