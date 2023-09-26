<?php

    include_once("config.php");
    $connection = new Database;

    function upload($post){
        if ($post["button"]){
            $kordinata = $post["cordinate"];
            $kordinata = explode(",", $kordinata);
            
            $tags = $post["tags"];
            $tags = explode(",",$tags);

            if(count($kordinata) == 2){
                if(!empty($tags)){
                  if(!empty($post["title"]) && !empty($post["description"]) && !empty($post["town"]) && !empty($post["part"]) && !empty($post["irany"]) && !empty($post["cordinate"])){
                    global $connection;
                    $stmt = $connection->pdo->prepare("INSERT INTO locations(cordinate, title, description, tags, city, part, irany) VALUES(:cordinate,:title,:description,:tags,:city,:part,:irany)");
                    $stmt->bindParam(":cordinate", $post["cordinate"]);
                    $stmt->bindParam(":title", $post["title"]);
			        $stmt->bindParam(":description", $post["description"]);
			        $stmt->bindParam(":tags", $post["tags"]);
			        $stmt->bindParam(":city", $post["town"]);
			        $stmt->bindParam(":part", $post["part"]);
			        $stmt->bindParam(":irany", $post["irany"]);

			        $stmt->execute();
			        $result = $stmt->rowCount();
                    sendAlert("success", "Sikeres hozzáadás!");
                  }else{
                    sendAlert("danger", "Minden mezőt ki kell tölteni!");
                  }
                }else{
                    sendAlert("danger", "A cimkék nem lehetnek üresek!");
                }
            }else{
                sendAlert("danger", "Nem megfelelő kordináta!");
            }
        }
    }

    function getLocations(){
        global $connection;
        $stmt = $connection->pdo->prepare("SELECT * FROM locations");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $data_query) {
            $kordinata = $data_query["cordinate"];
            $kordinata = explode(",", $kordinata);
            $latitude = $kordinata[0];
            $longtude = $kordinata[1];
            echo "
                {
                    'location': {
                        'latitude': {$latitude},
                        'longitude': {$longtude}
                    },
                    'title': '{$data_query['title']}',
                    'description': '{$data_query['description']}'
                },
            ";
        
        }
    }

    function sendAlert($type,$msg){
        echo "
        <div class='alert alert-{$type}' role='alert'>
        {$msg}
        </div>
        ";
    }
    
?>