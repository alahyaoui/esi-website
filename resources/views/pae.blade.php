@extends('canevas')
@section('title',"PAE")

@section('content')
@else
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

        $.get("pae/" , function(JsonPrograms, status) {
            let pae = JSON.parse(JsonPrograms);
            if(pae.length==0){
                $("#present").text("Vous n'avez pas de PAE");
            }
            for (i = 0; i < pae.length; i++) {

                if(pae[i]["Quadrimestre"] % 2 != 0){
                    $('#pae.Q1').append('<tr><td>'+pae[i]["acronyme"]+'</td><td>'+pae[i]["libelle"]+'</td><td>'+pae[i]["ects"]'</td><td>'+pae[i]["heures"]'</td></tr>');
                }else{
                    $('#pae.Q2').append('<tr><td>'+pae[i]["acronyme"]+'</td><td>'+pae[i]["libelle"]+'</td><td>'+pae[i]["ects"]'</td><td>'+pae[i]["heures"]'</td></tr>');
                }
            }
        });
    });
</script>
@endif
@endsection



<!--<div id="pae">
<table id="Q1">
    <tr>
        <th>Acronyme</th>
        <th>Libellé</th>
        <th>ECTS</th>
        <th>Nombre d'heures</th>
    </tr>
    @foreach($pae as $course)
        @if($course->Q %2 != 0)
            <tr>
                <td>{{$course->acronyme}}</td>
                <td>{{$course->libelle}}</td>
                <td>{{$course->ects}}</td>
                <td>{{$course->heures}}</td>
            </tr>
        endif
    endfor
</table>
<h1>Deuxième quadrimestre</h1>
<table id="Q2">
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach($pae as $course)
        @if($course->Q %2 == 0)
            <tr>
                <td>{{$course->acronyme}}</td>
                <td>{{$course->libelle}}</td>
                <td>{{$course->ects}}</td>
                <td>{{$course->heures}}</td>
            </tr>
        endif
    endfor
</table>
</div>


