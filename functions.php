<?php
    include 'dbConnectionMapIt.php';
    $dbConn = startConnection("mapIt");
    
    include_once 'request.php';
    include_once 'router.php';

    
    function getIncident() {
        global $dbConn;
        $incident = array();
        //$result = array();
        
        $sql = "SELECT * FROM `reports`";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        $router = new Router(new Request);
$router->get('/', function() {
  return <<<HTML
  <h1>Hello world</h1>
HTML;
});
$router->get('/profile', function($request) {
  return <<<HTML
  <h1>Profile</h1>
HTML;
});
$router->post('/data', function($request) {
  return json_encode($request->getBody());
});

        foreach ($records as $record) {
            // array_push($incident, $record['latitude']);
            // array_push($incident, $record['longitude']);
            // array_push($incident, $record['disasterType']);
            // array_push($result, $incident);
            $incident[$record['reportId']][] = array('latitude' => $record['latitude'],
                                                     'longitude' => $record['longitude'],
                                                     'disasterType' => $record['disasterType']);
        }
        return $incident;
    }
    
    function getSize() {
        global $dbConn;
        $size = 0;
        //$result = array();
        
        $sql = "SELECT `reportId` FROM `reports` ORDER BY reportId DESC LIMIT 1";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            $size = $record['reportId'];
        }
        
        return $size;
    }
?>