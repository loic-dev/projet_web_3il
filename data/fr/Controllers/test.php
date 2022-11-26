<?php 

require_once '../utils/regex.php'; 
new Database();




// function insertDb($table, $array = [])
// {
//         try {
//                 $columns = array_keys($array);
//                 $values = array_values($array);

//                 $arrToExec = array();

//                 $str = "INSERT INTO $table (";
//                 foreach($columns as $column) {
//                     $str .= $column;
//                     $str .= ',';
//                 }
//                 $str = substr_replace($str ,"", -1);
//                 $str .= ') VALUES (';
//                 foreach($columns as $key => $column) {
//                     $arrToExec[':' . $column] = $values[$key];
//                     $str .= ':' . $column;
//                     $str .= ',';
//                 } 
//                 $str = substr_replace($str ,"", -1);
//                 $str .= ')';
//                 Database::getPdo()->prepare($str)->execute($arrToExec);
//         } catch (exception $e) {
//                 throw $e;
//         }
// }


// insertDb("Advert", [
//     "Title" => "Title",
//     "Description" => '$this->getDescription()',
//     "Adress" => '$this->getAddress()',
//     "Picture1" => '$this->getPicture1()',
//     "Picture2" => '$this->getPicture2()',
//     "Picture3" => '$this->getPicture3()',
//     "MailStructure" => 'francoisdks@gmail.com',
//     "Instrument" => 'Guitare',
//     "Level" => 'Easy',
//     "Rubric" => 'Study',
//     "Canton" => 'Millau)'
// ]);



function updateDb($table, $toMatch, $match, $values = [])
{
        try {
                $sql = "UPDATE $table SET ";
                foreach ($values as $key => $value) {
                        $sql .= "$key = :$key";
                        $sql .= ',';
                }
                $sql = substr_replace($sql ,"", -1);
                $sql .= " WHERE $toMatch = :toMatch ;";
                var_dump($sql);

                $result = Database::getPdo()->prepare($sql);
                // $exec = ;
                $result->execute(array_merge([':toMatch' => $match],$values));
                
        } catch (exception $e) {
                throw $e;
        }
}

updateDb("Structure","Mail","francoisdks@gmail.com",[
    "Name" => '$newName',
    "Website" => 'test'
]);





// var_dump($_POST["hello"]);
// // var_dump($_GET["hello"]);
// // $hello  = Database::getPdo()->quote($_POST["hello"]);

// $hello = $_POST["hello"];

// echo "<br/>";
// echo "<br/>";
// $base = "SELECT * FROM Structure WHERE Mail = :Mail     ";
// // $base = "SELECT * FROM Structure WHERE Mail = '$hello'     ";
// // $base = "SELECT * FROM Structure WHERE Mail = '$hello'     ";
// // $base = "SELECT * FROM Structure WHERE Mail = " + $hello;


// var_dump($base);
// echo "<br/>";

// $rs = Database::getPdo()->prepare($base);
// $rs->execute([
//     'Mail' => $hello
// ]);

// var_dump($rs->fetchAll());
// var_dump(regex_input_text_with_accent('" or ""="'));

// echo '" or ""="';
?>

<form action="/fr/Controllers/test.php" method="post">
    <input type="text" name="hello" value="francoisdks@gmail.com" />
    <button type="submit">Go to user 123</button>
</form>