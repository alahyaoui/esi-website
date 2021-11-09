@extends('layouts.app')
@section('title',"Program")

@section('content')
<h1 id="present">Votre Programme</h1>

<table id="bloc1" border="2">
        <thead>
            <tr>
                <th>Acronyme</th>
                <th>Libellé</th>
                <th>ECTS</th>
                <th>Nombre d'heures</th>
                <th>Est validé</th>
            </tr>
        </thead>


        <tbody id="Q1"> </tbody>
        <br>
        <tbody id="Q2"></tbody>
</table>

<table id="bloc2"  border="2">
        <thead>
            <tr>
                <th>Acronyme</th>
                <th>Libellé</th>
                <th>ECTS</th>
                <th>Nombre d'heures</th>
                <th>Est validé</th>
            </tr>
        </thead>

        
        <tbody id="Q3"></tbody>
        <br>
        <tbody id="Q4"></tbody>
</table>

<table id="bloc3"  border="2">
        <thead>
            <tr>
                <th>Acronyme</th>
                <th>Libellé</th>
                <th>ECTS</th>
                <th>Nombre d'heures</th>
                <th>Est validé</th>
            </tr>
        </thead>

        
        <tbody id="Q5"> </tbody>
        <br>
        <tbody id="Q6"></tbody>
</table>

<button>Post</button>

<script>
     $(document).ready(function () {
        $.get("api/programme" , function(JsonPrograms, status) {
            let Program = JSON.parse(JsonPrograms);
            if(Program.length==0){
                $("#present").text("Vous n'avez pas de PAE");
            }
            for (i = 0; i < Program.length; i++) {
                $('#Q' + Program[i]["Quadrimestre"]).append(
                        '<tr id='+i+'>' +
                        '<td>' + Program[i]["acronyme"] + '</td>'+
                        '<td>' + Program[i]["libelle"] + '</td>'+
                        '<td>' + Program[i]["ects"] + '</td>'+
                        '<td>' + Program[i]["heures"] +'</td>'
                        );
                        
                if(Program[i]["is_validate"]){
                    $('#'+i).append('<td><input type="checkbox" checked disabled="disabled"></td>');
                    //Verifier le disabled !!!
                }else{
                    $('#'+i).append('<td><input type="checkbox"></td>');
                }
            }
        });
    });
</script>
@endsection

