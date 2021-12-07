@extends('layouts.app')
@section('title',"Program")

@section('content')
    <h1 id="present">Votre Programme</h1>

    <table id="bloc1" border="2">
        <tbody id="Q1"></tbody>
        <br>
        <tbody id="Q2"></tbody>
    </table>

    <table id="bloc2" border="2">
        <tbody id="Q3"></tbody>
        <br>
        <tbody id="Q4"></tbody>
    </table>

    <table id="bloc3" border="2">
        <tbody id="Q5"></tbody>
        <br>
        <tbody id="Q6"></tbody>
    </table>

    <button>Post</button>


    <script>
        $(document).ready(function () {
            for (let i = 1; i <= 3; i++) {
                $('#bloc' + i).prepend(
                    '<thead>' +
                    '<tr>' +
                    '<th>Acronyme</th><th>Libellé</th><th>ECTS</th><th>Nombre d\'heures</th><th>Est validé</th>' +
                    '</tr>' +
                    '</thead>'
                );
            }

            $.post("api/programme/" + {{Auth::user()->id}}, function (data, status) {
                if (data.length === 0) {
                    $("#present").text("Vous n'avez pas de PAE");
                }

                for (let i = 0; i < data.length; i++) {
                    $('#Q' + data[i]["courseQuadri"]).append(
                        '<tr id=' + i + '>' +
                        '<td>' + data[i]["course"] + '</td>' +
                        '<td>' + data[i]["courseDesc"] + '</td>' +
                        '<td>' + data[i]["courseCredits"] + '</td>' +
                        '<td>' + data[i]["courseHours"] + '</td>'
                    );

                    // TODO: rajouter bouton vide pas cochable pour le cours où il manque les prérquis
                    if(!data[i]["is_accessible"]){
                        if(data[i]["is_validated"]){
                            $('#' + i).append('<td><input type="checkbox" checked disabled="disabled"></td>');
                        }else{
                            $('#' + i).append('<td><input type="checkbox" disabled="disabled"></td>');
                        }
                    }else{
                        $('#' + i).append('<td><input type="checkbox"></td>');
                    }
                } // end for

            });
        });
    </script>
@endsection

