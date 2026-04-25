
<?php
   session_start();
   if(!isset($_SESSION['admin_login']))
   {
      header('location: ../index.php');
   }
   // Database Connection
   include '../db/dconn.php';

   // Reading value
   $draw = $_POST['draw'];
   $row = $_POST['start'];
   $rowperpage = $_POST['length']; // Rows display per page
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $searchValue = $_POST['search']['value']; // Search value

   $searchArray = array();

   // Search
   $searchQuery = " ";
   if($searchValue != ''){
        $searchQuery = " AND (email_usuario LIKE :email OR 
           titulo LIKE :titulo OR
           precio LIKE :precio OR 
           expediente LIKE :expediente) ";
      $searchArray = array( 
           'email'=>"%$searchValue%",
           'titulo'=>"%$searchValue%",
           'precio'=>"%$searchValue%",
           'expediente'=>"%$searchValue%"
      );
   }

   // Total number of records without filtering
   $stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM propiedades ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];

   // Total number of records with filtering
   $stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM propiedades WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];

   // Fetch records
   $stmt = $db->prepare("SELECT propiedades.id, usuarios.nombre, propiedades.titulo, propiedades.precio, propiedades.fecha, propiedades.vendido, propiedades.autorizada, propiedades.expediente
   FROM propiedades
   LEFT JOIN usuarios ON usuarios.email = propiedades.email_usuario
   WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

   // Bind values
   foreach ($searchArray as $key=>$search) {
      $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
   }

   $stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
   $stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
   $stmt->execute();
   $empRecords = $stmt->fetchAll();

   $data = array();

   foreach ($empRecords as $row) {
      $data[] = array(
         "id"=>$row["id"],
         "nombre"=>$row['nombre'],
         "titulo"=>$row['titulo'],
         "precio"=>$row['precio'],
         "expediente"=>$row['expediente'],
         "vendida"=>$row['vendido'],
         "autorizada"=>$row['autorizada']
      );
   }

   // Response
   $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
   );

   echo json_encode($response);