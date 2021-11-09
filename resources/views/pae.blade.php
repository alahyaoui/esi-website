@extends('layouts.app')
@section('title',"PAE")

@section('content')
<h1 id="present">Votre PAE</h1>

<table id="pae">
        <thead>
            <tr>
                <th>Acronyme</th>
                <th>Libellé</th>
                <th>ECTS</th>
                <th>Nombre d'heures</th>
            </tr>
        </thead>
        <tbody id="Q1">
        </tbody>
        <br>
        <tbody id="Q2">
        </tbody>
</table>



<script>
     $(document).ready(function () {

        $.get("api/pae/" , function(JsonPrograms, status) {
            let pae = JSON.parse(JsonPrograms);
            if(pae.length==0){
                $("#present").text("Vous n'avez pas de PAE");
            }
            for (i = 0; i < pae.length; i++) {

                if(pae[i]["Quadrimestre"] % 2 != 0){
                    $('#Q1').append('<tr><td>' + pae[i]["acronyme"] + '</td><td>' + pae[i]["libelle"] + '</td><td>'+pae[i]["ects"] + '</td><td>' + pae[i]["heures"] + '</td></tr>');
                }else{
                    $('#Q2').append('<tr><td>' + pae[i]["acronyme"] + '</td><td>' + pae[i]["libelle"] + '</td><td>'+pae[i]["ects"] + '</td><td>' + pae[i]["heures"] + '</td></tr>');
                }
            }
        });
    });
</script>
@endsection


