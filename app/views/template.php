<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Sistema ERP - Giovandro Fabio dos Santos</title>
    <link rel="shortcut icon" href=""/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale =1">
    <!--css-->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>/assets/js/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>/assets/js/datatables/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>/assets/js/datatables/css/style_dataTable.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/auxiliar.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/grade.css">
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/style.css">

    <!--codigos-->
     <script src="<?php echo URL_BASE ?>assets/js/jquery-3.3.1.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="<?php echo URL_BASE ?>assets/js/js.js"></script>
     <script src="<?php echo URL_BASE ?>assets/js/jquery.min.js"></script>
     <!--font icones-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
     <script>
        var base_url = "<?php echo URL_BASE ?>";
     </script>
<!--     <script src="--><?php //echo URL_BASE ?><!--assets/js/jquery-3.3.1.min.js"></script>-->
</head>

<body>
    <?php include "cabecalho.php" ?>
    <?php include "menu.php" ?>

    <div class="rows mx-0">
        <div class="col-9 central mb-3">
            <?php $this->load($view, $viewData) ?>
        </div>
    </div>

    <!--font icones-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--    <script src="--><?php //echo URL_BASE; ?><!--assets/js/bootstrap.min.js"></script>-->
    <script src="https://kit.fontawesome.com/9480317a2f.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/jquery.mask.js" type="text/javascript"></script>
    <script src="<?php echo URL_BASE ?>assets/js/componentes/js_data_table.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/componentes/js_mascara.js" type="text/javascript"></script>
    <script src="<?php echo URL_BASE ?>assets/js/componentes/js_modal.js"></script>
    <!-- <script src="<?php echo URL_BASE ?>assets/js/js.js"></script> -->

    <!-- Graphs -->
    <!-- <script src="js/chart.js/Chart.min.js"></script> -->

</body>

</html>