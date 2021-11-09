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


        <tbody id="Q1"></tbody>
        <br>
        <tbody id="Q2"></tbody>
    </table>

    <table id="bloc2" border="2">
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

    <table id="bloc3" border="2">
        <thead>
        <tr>
            <th>Acronyme</th>
            <th>Libellé</th>
            <th>ECTS</th>
            <th>Nombre d'heures</th>
            <th>Est validé</th>
        </tr>
        </thead>


        <tbody id="Q5"></tbody>
        <br>
        <tbody id="Q6"></tbody>
    </table>

    <span hidden id="stu_matricule">{{Auth::user()->matricule}}</span>
    <button>Post</button>


    <script>
        $(document).ready(function () {
            var stu_matricule = $('#stu_matricule').text()
            $.get("api/programme/" + stu_matricule, function (data, status) {
                //let Program = JSON.parse(data);
                console.log(data)
                if (data.length === 0) {
                    $("#present").text("Vous n'avez pas de PAE");
                }

                // TODO: joins
                for (let i = 0; i < data.length; i++) {
                    $('#Q' + data[i]["Quadrimestre"]).append(
                        '<tr id=' + i + '>' +
                        '<td>' + data[i]["course"] + '</td>' +
                        '<td>' + data[i]["libelle"] + '</td>' +
                        '<td>' + data[i]["ects"] + '</td>' +
                        '<td>' + data[i]["heures"] + '</td>'
                    );

                    // TODO: rajouter bouton vide pas cochable pour le cours où il manque les prérquis
                    if (data[i]["is_validated"]) {
                        $('#' + i).append('<td><input type="checkbox" checked disabled="disabled"></td>');
                        // Verifier le disabled !!!
                    } else {
                        $('#' + i).append('<td><input type="checkbox"></td>');
                    }
                } // end for

            });
        });
    </script>
@endsection

