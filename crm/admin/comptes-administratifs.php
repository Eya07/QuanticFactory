<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
include("getData.php");
include("console_log.php");
check_login();

$data = get_data()->results;
console_log($data);
console_log("hemllo");

if (isset($_GET['submit_opendata_to_database'])) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "crm";
  
  try {
  
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
      // echo "Connected Successfully";
      
  } catch(PDOException $e) {
  
      echo "Connection Failed" .$e->getMessage();
  }
  foreach ($data as $row) {
  $query = "INSERT INTO comptesadministratifs (exercice_comptable, budget, section_budgetaire_i_f, sens_depense_recette, type_d_operation_r_o_i_m, chapitre_budgetaire_cle, chapitre_niveau_vote_texte_descriptif, nature_budgetaire_cle, nature_budgetaire_texte, fonction_cle, fonction_texte, mandate_titre_apres_regul) VALUES (:exercice_comptable, :budget, :section_budgetaire_i_f, :sens_depense_recette, :type_d_operation_r_o_i_m, :chapitre_budgetaire_cle, :chapitre_niveau_vote_texte_descriptif, :nature_budgetaire_cle, :nature_budgetaire_texte, :fonction_cle, :fonction_texte, :mandate_titre_apres_regul)";

  

  
  $query_run = $conn->prepare($query);

  $data_insert = [
      ':exercice_comptable' => $row->exercice_comptable,
      ':budget' => $row->budget,
      ':section_budgetaire_i_f' => $row->section_budgetaire_i_f,
      ':sens_depense_recette' => $row->sens_depense_recette,
      ':type_d_operation_r_o_i_m' => $row->type_d_operation_r_o_i_m,
      ':chapitre_budgetaire_cle' => $row->chapitre_budgetaire_cle,
      ':chapitre_niveau_vote_texte_descriptif' => $row->chapitre_niveau_vote_texte_descriptif,
      ':nature_budgetaire_cle' => $row->nature_budgetaire_cle,
      ':nature_budgetaire_texte' => $row->nature_budgetaire_texte,
      ':fonction_cle' => $row->fonction_cle,
      ':fonction_texte' => $row->fonction_texte,
      ':mandate_titre_apres_regul' => $row->mandate_titre_apres_regul,
      
  ];
  $query_execute = $query_run->execute($data_insert);

  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /*
  $cnt = 1;

  $query = "INSERT INTO comptesadministratifs(exercice_comptable, budget, section_budgetaire_i_f, sens_depense_recette, type_d_operation_r_o_i_m, chapitre_budgetaire_cle, chapitre_niveau_vote_texte_descriptif, nature_budgetaire_cle, nature_budgetaire_texte, fonction_cle, fonction_texte, mandate_titre_apres_regul) VALUES ";

  foreach ($data as $row) {

    $query .= "('$row->exercice_comptable','$row->budget','$row->section_budgetaire_i_f','$row->sens_depense_recette','$row->type_d_operation_r_o_i_m','$row->chapitre_budgetaire_cle','$row->chapitre_niveau_vote_texte_descriptif','$row->nature_budgetaire_cle','$row->nature_budgetaire_texte','$row->fonction_cle','$row->fonction_texte','$row->mandate_titre_apres_regul'),";

  }

  // Remove the trailing comma and space
  $query = rtrim($query, ', ');


  $result = mysqli_query($con, $query);

  if ($result) {
    echo "Data inserted successfully!";
  } else {
    echo "Error: " . mysqli_error($con);
  }
*/


  /*
  //  $query = "insert into comptesadministratifs(exercice_comptable, budget, section_budgetaire_i_f, sens_depense_recette, type_d_operation_r_o_i_m, chapitre_budgetaire_cle, chapitre_niveau_vote_texte_descriptif, nature_budgetaire_cle, nature_budgetaire_texte, fonction_cle, fonction_texte, mandate_titre_apres_regul) values";
  foreach ($data as $row) {

  
    $a = mysqli_query($con, "insert into comptesadministratifs(exercice_comptable, budget, section_budgetaire_i_f, sens_depense_recette, type_d_operation_r_o_i_m, chapitre_budgetaire_cle, chapitre_niveau_vote_texte_descriptif, nature_budgetaire_cle, nature_budgetaire_texte, fonction_cle, fonction_texte, mandate_titre_apres_regul) values('$row->exercice_comptable','$row->budget','$row->section_budgetaire_i_f','$row->sens_depense_recette','$row->type_d_operation_r_o_i_m','$row->chapitre_budgetaire_cle','$row->chapitre_niveau_vote_texte_descriptif','$row->nature_budgetaire_cle','$row->nature_budgetaire_texte','$row->fonction_cle','$row->fonction_texte','$row->mandate_titre_apres_regul')");

  }

  //$a = mysqli_query($con, $query);
  if ($a) {

    console_log("insert into comptesadministratifs " . $cnt);
    console_log($a);

  } else {
    console_log("insert into error " . mysqli_error($con));

  }
  $cnt = $cnt + 1;*/
}

/*  $query = sprintf(
    "INSERT INTO comptesadministratifs(exercice_comptable, budget, section_budgetaire_i_f, sens_depense_recette, type_d_operation_r_o_i_m, chapitre_budgetaire_cle, chapitre_niveau_vote_texte_descriptif, nature_budgetaire_cle, nature_budgetaire_texte, fonction_cle, fonction_texte, mandate_titre_apres_regul) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
    mysql_real_escape_string($row->exercice_comptable),
    mysql_real_escape_string($row->budget),
    mysql_real_escape_string($row->section_budgetaire_i_f),
    mysql_real_escape_string($row->sens_depense_recette),
    mysql_real_escape_string($row->type_d_operation_r_o_i_m),
    mysql_real_escape_string($row->chapitre_budgetaire_cle),
    mysql_real_escape_string($row->chapitre_niveau_vote_texte_descriptif),
    mysql_real_escape_string($row->nature_budgetaire_cle),
    mysql_real_escape_string($row->nature_budgetaire_texte),
    mysql_real_escape_string($row->fonction_cle),
    mysql_real_escape_string($row->fonction_texte),
    mysql_real_escape_string($row->mandate_titre_apres_regul)
  );*/
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>Admin | Comptes Administratifs </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="../assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="../assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
  <link href="../assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css"
    media="screen" />
  <link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
  <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
  <link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
</head>

<body class="">
  <?php include("header.php"); ?>
  <div class="page-container row">

    <?php include("leftbar.php"); ?>

    <div class="clearfix"></div>
    <!-- END SIDEBAR MENU -->
  </div>
  </div>
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>

    <div class="content sm-gutter">
      <div class="page-title">
      </div>
      <!-- BEGIN DASHBOARD TILES -->
      <div class="row">
        <div class="col-md-3 col-vlg-3 col-sm-6">
          <div class="tiles green m-b-10">
            <div class="tiles-body">
              <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;"
                  class="remove"></a> </div>
              <div class="tiles-title text-black">Comptes Administratifs </div>
              <div class="widget-stats">
                <div class="wrapper transparent">
                  <?php $ov = mysqli_query($con, "select * from comptesadministratifs");
                  $num = mysqli_num_rows($ov);
                  ?>
                  <span class="item-title">Database</span> <span class="item-count animate-number semi-bold"
                    data-value="<?php echo $num; ?>" data-animation-duration="700">0</span>
                </div>
              </div>


              <div class="widget-stats ">
                <div class="wrapper last">
                  <?php
                  /* $tdate = date("Y/m/d");

                  $tv1 = mysqli_query($con, "select * from usercheck where logindate='$tdate'");
                  $num11 = mysqli_num_rows($tv1);*/
                  $num11 = count($data);
                  ;
                  ?>



                  <span class="item-title">Opendata API</span> <span class="item-count animate-number semi-bold"
                    data-value="<?php echo $num11; ?>" data-animation-duration="700">0</span>
                  <?php

                  ?>
                </div>
              </div>


            </div>
          </div>


        </div>


      </div>

    </div>
    <div class="content">

      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold">Comptes Administratifs – Budgets Principaux à partir de 2019 (Opendata
                  API)</span></h4>
              <div class="tools">
                <a href="javascript:;" class="collapse"></a>
                <a href="#grid-config" data-toggle="modal" class="config"></a>
                <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a>
              </div>
            </div>
            <div class="grid-body ">
              <a href="?submit_opendata_to_database=true" class="btn btn-primary btn-xs btn-mini">Add to Database</a>

              <table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:1%"></th>
                    <th>
                      Exercice comptable</th>
                    <th style="width:10%">Budget </th>
                    <th style="width:10%">Section Budgétaire (I/F) </th>
                    <th style="width:10%">Sens (Dépense / Recette)</th>
                    <th style="width:10%">Type d'opération (R/O/I/M)</th>
                    <th style="width:10%">Chapitre Budgétaire - Clé </th>
                    <th style="width:10%">Chapitre Niveau Vote - Texte Descriptif </th>
                    <th style="width:10%">Nature Budgétaire - Clé </th>
                    <th style="width:10%">Nature Budgétaire - Texte </th>
                    <th style="width:10%">Fonction - Clé </th>
                    <th style="width:10%">Fonction - Texte </th>
                    <th style="width:10%">Mandaté / Titré après régul </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $ret = mysqli_query($con, "select * from usercheck ");
                  $cnt = 1;
                  foreach ($data as $row) { ?>
                    <tr>
                      <td class="v-align-middle">
                        <?php echo $cnt; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->exercice_comptable; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->budget; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->section_budgetaire_i_f; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->sens_depense_recette; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->type_d_operation_r_o_i_m; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->chapitre_budgetaire_cle; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->chapitre_niveau_vote_texte_descriptif; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->nature_budgetaire_cle; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->nature_budgetaire_texte; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->fonction_cle; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->fonction_texte; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row->mandate_titre_apres_regul; ?>
                      </td>

                    </tr>
                    <?php $cnt = $cnt + 1;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>Table <span class="semi-bold">Comptes Administratifs (Database)</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config"
                  data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a
                  href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
              <table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:1%"></th>
                    <th>
                      Exercice comptable</th>
                    <th style="width:10%">Budget </th>
                    <th style="width:10%">Section Budgétaire (I/F) </th>
                    <th style="width:10%">Sens (Dépense / Recette)</th>
                    <th style="width:10%">Type d'opération (R/O/I/M)</th>
                    <th style="width:10%">Chapitre Budgétaire - Clé </th>
                    <th style="width:10%">Chapitre Niveau Vote - Texte Descriptif </th>
                    <th style="width:10%">Nature Budgétaire - Clé </th>
                    <th style="width:10%">Nature Budgétaire - Texte </th>
                    <th style="width:10%">Fonction - Clé </th>
                    <th style="width:10%">Fonction - Texte </th>
                    <th style="width:10%">Mandaté / Titré après régul </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $ret = mysqli_query($con, "select * from comptesadministratifs ");
                  $cnt = 1;
                  while ($row = mysqli_fetch_array($ret)) { ?>
                    <tr>
                      <td class="v-align-middle">
                        <?php echo $row['id']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['exercice_comptable']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['budget']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['section_budgetaire_i_f']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['sens_depense_recette']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['type_d_operation_r_o_i_m']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['chapitre_budgetaire_cle']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['chapitre_niveau_vote_texte_descriptif']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['nature_budgetaire_cle']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['nature_budgetaire_texte']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['fonction_cle']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['fonction_texte']; ?>
                      </td>
                      <td class="v-align-middle">
                        <?php echo $row['mandate_titre_apres_regul']; ?>
                      </td>

                    </tr>
                    <?php $cnt = $cnt + 1;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="addNewRow"></div>
  </div>
  <!-- BEGIN CHAT -->

  </div>
  <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/breakpoints.js" type="text/javascript"></script>
  <script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
  <script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
  <script src="../assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js"
    type="text/javascript"></script>
  <script type="text/javascript" src="../assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
  <script type="text/javascript" src="../assets/plugins/datatables-responsive/js/lodash.min.js"></script>
  <script src="../assets/js/datatables.js" type="text/javascript"></script>
  <script src="../assets/js/core.js" type="text/javascript"></script>
  <script src="../assets/js/chat.js" type="text/javascript"></script>
  <script src="../assets/js/demo.js" type="text/javascript"></script>
</body>

</html>