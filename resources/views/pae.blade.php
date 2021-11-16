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

            $.post("api/pae/" + {{Auth::user()->id}}, function (data, status) {
                if (data.length === 0) {
                    $("#present").text("Vous n'avez pas de PAE");
                }
                for (i = 0; i < data.length; i++) {

                    if (data[i]["courseQuadri"] % 2 !== 0) {
                        $('#Q1').append('<tr><td>' + data[i]["course"]
                            + '</td><td>' + data[i]["courseDesc"]
                            + '</td><td>' + data[i]["courseCredits"]
                            + '</td><td>' + data[i]["courseHours"]
                            + '</td></tr>');
                    } else {
                        $('#Q2').append('<tr><td>' + data[i]["course"]
                            + '</td><td>' + data[i]["courseDesc"]
                            + '</td><td>' + data[i]["courseCredits"]
                            + '</td><td>' + data[i]["courseHours"]
                            + '</td></tr>');
                    }
                }
            });
        });
    </script>
@endsection


