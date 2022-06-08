<?php 

function executeRequete($req)
{
    global $mysqli;
    $resultat = $mysqli->query($req);
    if(!$resultat) // 
    {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
    }
    return $resultat; // 
}
 
function debug($var, $mode = 1)
{
    echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
    $trace = debug_backtrace();
    $trace = array_shift($trace);
    echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';
    if($mode === 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    }
    echo '</div>';
}


function genererTableau( PDO $connexion , string $table , array $colonne   ){
    $data = $connexion->query("SELECT * FROM $table");
    // concaténation tout notre tableau 
    $html = "
            <table class=\"table table-striped table-sm table-hover\">
            <thead>
                <tr>";
            foreach($colonne as $k => $c){
                $html .= "<th>$k</th>";
            }
                $html .= "<th>action</th>";
            $html .= "</tr>
            </thead>
            <tbody>" ;
                foreach($data as $d) { 
                $html .= "<tr>";
                     foreach($colonne as $k => $c){
                         if($c == "string"){
                            $html .=  "<td>". htmlspecialchars($d[$k]) ."</td>";
                         }elseif($c == "boolean") {
                            $html .= ($d[$k] == 1) ? "<td>Clôturé</td>" : "<td>Ouvert</td>" ;
                        }
                     }
                     $html .= "<td>
                     <a 
                        href=\"?action=delete&id=". htmlspecialchars($d["id"]) ."\"
                        class=\"btn btn-warning btn-sm\"
                        onclick=\"return confirm('êtes vous sûr de supprimer le compte de ". htmlspecialchars($d["id"]) ." ?')\"
                        >
                        supprimer
                    </a>
                    <a href=\"?action=update&id=". htmlspecialchars($d["id"]) ."\"
                            class=\"btn btn-dark btn-sm ms-2\"
                            >modifier
                    </a>
                        </td>
                    </tr>" ;
                }
            $html .= "</tbody>
        </table>
    ";
    return $html ;
}