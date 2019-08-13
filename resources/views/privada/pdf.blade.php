<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        table, th, td {
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
<div class="row" style="margin-top: -100px">
    <div class="col-md-4">
        <img class="img-fluid" src="img/contenido/contenido__abac-logo.png" width="200px">
    </div>
    <div class="col-md-4">
        <h6 class="text-center"><b>REGISTRO DE MATERIAS PRIMAS <br> APLICADO A COMPONENTES </b><br>Raw Material to Parts Relationship</h6>
    </div>
    <div class="col-md-4 text-right">
        <img class="img-fluid" src="img/calidad.png"  width="60px" >
    </div>
</div>
<hr style="background-color: black">
<p> <b>RASTREABILIDAD DE MATERIALES / Materials Traceability</b></p>
<p style="font-size: 14px">
    Partidas de materia prima utilizadas en la fabricacion de los conponentes de un articulo ABAC.
    <br>
    (Part of the raw material used in the manufacture of the articles of an ABAC article.)
</p>
<table class="table">
    <thead >
    <tr >
        <td rowspan="2" style="padding-top: 50px; padding-bottom: 0px"><b>COMPONENTE</b> <br> Part Nbr.</td>
        <td rowspan="2" style="padding-top: 50px; padding-bottom: 0px"><b>DESCRIPCION</b> Description</td>
        <td colspan="2"><b>N° PARTIDA</b> lot nbr.</td>
    </tr>
    <tr>
        <td><b>de Componente</b> Part lot</td>
        <td><b>de Mat. Prima</b> Row material lot</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $data->partida }}</td>
        <td>{{ $data->descripcion }}</td>
        <td>{{ $data->partida }}</td>
        <td>{{ $data->materia }}</td>
    </tr>
    </tbody>
</table>
<hr style="background-color: black; margin-bottom: 0px">
<b>FECHA/Date: {{  date("Y/m/d") }}</b>
<hr style="background-color: black; margin-bottom: 0px">
<b>F-ITR-09 A</b>
</body>
</html>


