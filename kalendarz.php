<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="./styl5.css" />
  </head>
  <body>
    <header>
      <div>
        <img src="#" height="150" width="150" alt="Mój kalendarz" />
      </div>
      <div>
        <h1>KALENDARZ</h1>
        <?php
          $connection = mysqli_connect("localhost", "root", "", "egzamin5");

          if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $wpis = $_POST['wpis'];
            $query3 = 'UPDATE zadania SET wpis = "'.$wpis.'" WHERE dataZadania = "2020-07-13"';
            mysqli_query($connection, $query3);        
          }

          $query1 = 'SELECT miesiac, rok FROM zadania WHERE dataZadania = "2020-07-01"';
          $query2 = 'SELECT dataZadania, wpis FROM zadania WHERE miesiac = "lipiec"';

          $answer1 = mysqli_query($connection, $query1);
          $arr1 = mysqli_fetch_assoc($answer1);

          $miesiac1 = $arr1["miesiac"];
          $rok1 = $arr1["rok"];

          echo "<h3>miesiąć: $miesiac1, rok: $rok1</h3>";
        ?>
      </div>
    </header>
    <main>
      <?php
        $answer2 = mysqli_query($connection, $query2);

        foreach($answer2 as $el) {
          $tempData = $el["dataZadania"];
          $tempWpis = $el["wpis"];
  
          echo "<div><h5>$tempData</h5><p>$tempWpis</p></div>";
        }
        mysqli_close($connection); 
      ?>
    </main>
    <footer>
      <form action="./kalendarz.php" method="POST">
        <div>
          <label for="wpis">dodaj wpis: </label>
          <input type="text" name="wpis" id="wpis" />
        </div>
        <div>
          <input type="submit" value="DODAJ" />
        </div>
      </form>
      <p>Stronę wykonał: Adam Ścieszka VI TI</p>
    </footer>
  </body>
</html>
