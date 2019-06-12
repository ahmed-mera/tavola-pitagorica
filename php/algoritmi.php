<?php
/**
 ** il primo class per creare la tabella
 */
class createTable{
  // scrivo sul file e carica larray
  public function table_file(){
    //apro un file per salvare i dati
    $myFile = fopen('php/table.csv', 'w');
    $limit = 10;
    for ($row=1; $row <= $limit ; $row++) : //per le righe
      for ($cell=1; $cell <= $limit ; $cell++) : //per le colonne
        $myTable [$row][$cell] = $row * $cell  ; //carico il array con i numeri della tabella
      endfor;
      fputcsv($myFile, $myTable[$row]);
    endfor;
    fclose($myFile);
    return $myTable ;
   }
  //stampa tabella
  public function table($ar , $style_row = ''){
    //apro un file per salvare i dati
    $limit = count($ar);
    for ($row=1; $row <= $limit ; $row++) : //per le righe
      echo "<tr class = '$style_row'>";//stampo la tabella
      foreach ($ar[$row] as $val) : //per le colonne
        echo "<td>" . $val . "</td>";//stampo la riga
      endforeach;
      echo "</tr>";
    endfor;
   }

  //per sostituire i valori della diagonale principale
   public function diagonale_principale($ar)  {
     $ta = $ar;
    for ($i=1; $i <= count($ta) ; $i++) :
      $ta[$i][$i] = '<span class = "diagonale"> X </span>';
    endfor;
    createTable::table($ta );}

  //per sostituire i valori della diagonale secondaria
   public function diagonale_secondaria($ar)  {
     $ta = $ar;
    for ($i=0; $i < count($ta) ; $i++) :
      $ta[$i+1][count($ta[$i+1])-$i] = '<span class = "diagonale"> X </span>';
    endfor;
    createTable::table($ta);}

    //per sostituire i valori pari + 5
   public function valori_pari($ar)  {
       $ta = $ar;
      for ($i=1; $i <= count($ta) ; $i++) :
        for ($j=1; $j <= count($ta) ; $j++) :
          if ( ( $ta[$i][$j] % 2 ) == 0 ):
            $ta[$i][$j] = $ta[$i][$j] + 5;
          endif;
        endfor;
      endfor;
      createTable::table($ta,'pari');}

  //per sostituire i valori dispari collonne - 7
   public function valori_dispari($ar)  {
     $ta = $ar;
    for ($i=1; $i <= count($ta) ; $i++) :
      if ( ( $ta[1][$i] % 2 ) != 0 ):
        for ($j=1; $j <= count($ta) ; $j++) :
          $ta[$j][$i] = '<span class = "diagonale">'.( $ta[$j][$i] - 7 ) .'</span>';
        endfor;
        endif;
    endfor;
    createTable::table($ta);}

    //somma della diagonale diagonale_principale
    public function somma_diagonale($ar) {
      $add = 0;
      for ($i=1; $i <= count($ar) ; $i++) :
        $add += $ar[$i][$i];
      endfor;
      $ad = '<div class="number">la somma della diagonale principale =  <b class="text-primary">'.$add.'</b></div>' ;
      return  $ad;
    }

    //somma Riga
    public function add_cell($ar) {
        for ($i=1; $i <= count($ar) ; $i++) :
          $add = 0;
          for ($j=1; $j <= count($ar[$i]) ; $j++) :
              $add +=$ar[$i][$j];
          endfor;
          $ar[$i][] = '<span class="diagonale">'.$add.'</span>';
        endfor;
        createTable::table($ar);
    }

    //somma collonne
    public function add_row($ar) {
      // echo '<pre>';print_r($ar);echo '</pre>';
        for ($i=1; $i <= count($ar) ; $i++) :
          $add = 0;
          for ($j=1; $j <= count($ar) ; $j++) :
              $add +=$ar[$j][$i];
          endfor;
          $a[$i] = $add;
        endfor;
        $ar[] = $a;
        createTable::table($ar,'addrow');//stampo la tabella
    }

    //converte ogni Riga
    public function convert($ar){

      for ($i=1; $i <= count($ar); $i++) :
        $a[$i] = array_reverse($ar[$i]);
      endfor;

      createTable::table($a,'invert-row');//stampo la tabella
    }

    //converte ogni collonne
    public function convert2($ar){

      for ($i=1; $i <= count($ar); $i++) :
          $a[$i] = $ar[(count($ar) +1) -$i];
      endfor;
       createTable::table($a,'invert-cell');//stampo la tabella
    }

        //converte diagonale principale
    public function convert3($ar){

          for ($i=1; $i <= count($ar); $i++) :
              $a[$i] = $ar[(count($ar)+1) - $i][(count($ar)+1) - $i];
          endfor;
          //assignamenti i valori all'array orginle
          for ($i=1; $i <= count($ar); $i++) :
              $ar[$i][$i] = '<span class="diagonale">'.$a[$i].'</span>';
          endfor;
           createTable::table($ar,'row1');//stampo la tabella
        }
}
