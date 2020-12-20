<body> 
<p><h1 align="center">Welcome to Bookdepo database </h1></p>

<?php
include_once("dbconnect.php");
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>id</th><th>title</th><th>author</th><th>price</th><th>descriptions</th><th>publisher</th><th>isbn</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}


try {
  $stmt = $conn->prepare("SELECT id, title, author, price, descriptions, publisher, isbn FROM book");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>


<p align="left"><a href="index.html">Add new book</a></p>
<body>








      

