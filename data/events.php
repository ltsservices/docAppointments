<?php
// --------------------------------------------------------------------------------------------------
// Manages the events
// --------------------------------------------------------------------------------------------------

// Require our Event class and datetime utilities
require (dirname(__FILE__) . '/db_class.php');
require (dirname(__FILE__) . '/event_class.php');


header('Content-type:text/javascript;charset=UTF-8');
$action = $_GET["action"];

// --------------------------------------------------------------------------------------------------
// --- The Main
// --------------------------------------------------------------------------------------------------
try {
    $db = new DBConnection();
    $db->getConnection();

        switch ($action) {
            case "list":
                $ret = listEvents($_GET['start'], $_GET['end']);
                   break;
        }

    $db->close();
}
catch (Exception $e) {
    $db->close();
    $ret              = array();
    $ret['IsSuccess'] = false;
    $ret['Msg']       = $e->getMessage();
}
echo json_encode($ret);




// --------------------------------------------------------------------------------------------------
// --- List the content
// --------------------------------------------------------------------------------------------------
function listEvents($start, $end){
   global $db;
    $output_arrays = array();

    $sql    = "select * from jqcalendar left join jquser on ut_id=userId where start between '" . $start . "' and '" . $end . "'";
    $handle = mysql_query($sql);
    while ($row = mysql_fetch_object($handle)) {
        $data = array();
        $data['id']=$row->id;
        $data['title']= 'N/A';
        $data['start'] = parseDateTime($row->start)->format('c');
        $data['end'] = parseDateTime($row->end)->format('c');
        $data['editable']=false;
        $data['allDay']=false;
        $data['overlap']=false;
        $data['comment'] =utf8_encode($row->comment);

        $firstname=utf8_encode($row->firstname);
        $lastname=utf8_encode($row->lastname);
        $type=$row->type;
        $data['className']='event-'.$type;

        switch($type){
            case 'ind':
                $data['title']='Fermé';
                $data['editable']=true;
                break;

            case 'red':
            case 'bo':
            case 'bbv':
            case 'pvpp':
                $title=$firstname. ' ' . $lastname;
                $extra=$row->extra;
                if($extra != null){
                    $title .= ' '.$extra;
                }

                $data['title']= $title;
                break;
         }
        $event = new Event($data);
        $output_arrays[] = $event->toArray();
    }

    return $output_arrays;
}
