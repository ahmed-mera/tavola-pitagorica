<?php
  require 'php/algoritmi.php';
  $table = new createTable;
  $ar = $table -> table_file();//per avere un array
  if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $choose = $_POST['choose'];
  else:
    $choose = 'tavola_pitagorica';
  endif;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <style media="screen">
    body{
       background-color: #eee;
      background-size: cover;
      background-position: center;
        }
    .container-fluid
    {
      margin-top: 20px;

    }
    table , form{
      max-width: 100%;
      background-color: transparent
    }
    h1{
      margin-bottom: 10px;
      color: #848282;
      letter-spacing: -2px;
      text-transform: capitalize;
    }

    form select{

      text-transform: capitalize;

    }
    .table-bordered td,
     .table-bordered th {
    border: 1px solid #c2c5c8;
}

    tr.pari:nth-of-type(even),
    .addrow:last-of-type,
    tr.invert-row:nth-of-type(odd),
     .invert-cell td:nth-of-type(even)
       {
    background: #007bff;
  }
  .number{

    text-transform: capitalize;
    font-size: 25px

  }
  .number b {

    font-size: 30px
  }

    </style>
    <title></title>
  </head>
  <body>
    <div class="container-fluid">
      <h1 class="text-center">tavola pitagorica</h1>

      <div class="row">
        <div class="col-lg-3 col-12 mb-5 ">
          <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <select class="custom-select"  name="choose" required>
              <option value="tavola_pitagorica" <?php echo $check = (isset($choose) && $choose == 'tavola_pitagorica' ) ? 'selected' : ''; ?> >tavola pitagorica</option>
              <option value="diagonale_principale" <?php echo $check = (isset($choose) && $choose == 'diagonale_principale' ) ? 'selected' : ''; ?>>diagonale principale</option>
              <option value="diagonale_secondaria" <?php echo $check = (isset($choose) && $choose == 'diagonale_secondaria' ) ? 'selected' : ''; ?>>diagonale secondaria</option>
              <option value="incremento_riga" <?php echo $check = (isset($choose) && $choose == 'incremento_riga' ) ? 'selected' : ''; ?>>righe pari +5</option>
              <option value="decremento_col" <?php echo $check = (isset($choose) && $choose == 'decremento_col' ) ? 'selected' : ''; ?>>collonne dispari -7</option>
              <option value="somma_diagonale" <?php echo $check = (isset($choose) && $choose == 'somma_diagonale' ) ? 'selected' : ''; ?>>somma diagonale principale</option>
              <option value="somma_riga" <?php echo $check = (isset($choose) && $choose == 'somma_riga' ) ? 'selected' : ''; ?>>somma riga</option>
              <option value="somma_col" <?php echo $check = (isset($choose) && $choose == 'somma_col' ) ? 'selected' : ''; ?>>somma collonne</option>
              <option value="invert_riga" <?php echo $check = (isset($choose) && $choose == 'invert_riga' ) ? 'selected' : ''; ?>>invertire ordine riga</option>
              <option value="invert_col" <?php echo $check = (isset($choose) && $choose == 'invert_col' ) ? 'selected' : ''; ?>>invertire ordine collonne </option>
              <option value="invert_diago" <?php echo $check = (isset($choose) && $choose == 'invert_diago' ) ? 'selected' : ''; ?>>invertire diagonale princiapale</option>
            </select>
            <button type="submit" name="button" class="btn btn-primary btn-block mt-2">Invio</button>
          </form>
        </div>
        <div class="col-lg-7 offest-md-2 col-12 text-center">
          <table class='table table-bordered table-sm '>

              <?php
                switch ($choose) {
                  case 'tavola_pitagorica':
                  $table -> table($ar);
                  break;
                  case 'diagonale_principale':
                  $table -> diagonale_principale($ar);
                  break;
                  case 'diagonale_secondaria':
                  $table -> diagonale_secondaria($ar);
                  break;
                  case 'incremento_riga':
                  $table -> valori_pari($ar);
                  break;
                  case 'decremento_col':
                  $table -> valori_dispari($ar);
                  break;
                  case 'somma_diagonale':
                  echo $table -> somma_diagonale($ar);
                  break;
                  case 'somma_riga':
                  $table -> add_cell($ar);
                  break;
                  case 'somma_col':
                  $table -> add_row($ar);
                  break;
                  case 'invert_riga':
                  $table -> convert($ar);
                  break;
                  case 'invert_col':
                  $table -> convert2($ar);
                  break;
                  case 'invert_diago':
                  $table -> convert3($ar);
                  break;
                  default:
                  $table -> table($ar);
                    break;
                }
               ?>
               </table>

        </div>
       </div>
    </div>
    <script type="text/javascript" src="../layout/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $('.diagonale').parent().css('backgroundColor','#007bff');
      });
      $('.container-fluid').css({
        height : $(window).height() - 20
        // maxWidth :  $(window).width()
      });
    </script>
  </body>
</html>
