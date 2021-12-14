@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Liste des inscriptions') }}</div>

                <ul class="list-group">

                    @php($i=0)

                    @foreach($allStudents as $student)

                    <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal_{{$student->user_id}}">

                        {{ $student->first_name }} {{ $student->last_name }}


                        @foreach($allInscriptions as $insc)
                            @if($student->user_id == $insc->user_id)
                                @switch($insc->state)
                                @case('E')
                                <span id="badge_{{$student->user_id}}" class="badge bg-warning rounded-pill align-badge-center">En cours de validation</span>
                                @break
                                @case('V')
                                <span id="badge_{{$student->user_id}}" class="badge bg-success text-white rounded-pill align-badge-center">Validé</span>
                                @break
                                @case('R')
                                <span id="badge_{{$student->user_id}}" class="badge bg-danger text-white rounded-pill align-badge-center">Refusé</span>
                                @break
                                @endswitch
                            @endif
                        @endforeach
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_{{$student->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Détail de l'étudiant</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    @include('form_studentdata_modal', [$student, $allFiles])

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#refuse-modal_{{$student->user_id}}">Refuser</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#validation-confirm_{{$student->user_id}}">Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- REFUSER -->
                    <div id="refuse-modal_{{$student->user_id}}" class="modal fade comment-box" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Entrez un commentaire</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea id="message_refus_{{$student->user_id}}" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="changeStateRefused('{{ $student->user_id }}')">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ACCEPTER -->
                    <div class="modal fade" id="validation-confirm_{{$student->user_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <b>Confirmation</b>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Confirmer la validation
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="changeStateValidated('{{ $student->user_id }}')">Confirmer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function changeStateValidated(id) {
                            $.get("validate/" + id);
                            $("#badge_" + id).removeClass();
                            $("#badge_" + id).text("Validé");
                            $("#badge_" + id).addClass("badge bg-success text-white rounded-pill align-badge-center")
                        }

                        function changeStateRefused(id) {
                            let message_refus = $("#message_refus_"+id).val();
                            $.get("refuse/" + id + "/" + message_refus);
                            $("#badge_" + id).removeClass();
                            $("#badge_" + id).text("Refusé");
                            $("#badge_" + id).addClass("badge bg-danger text-white rounded-pill align-badge-center")
                        }
                    </script>

                    @php($i++)

                    @endforeach

                    <style>
                        .list-group-item>.badge {
                            float: right;
                        }
                    </style>
                </ul>

            </div>
        </div>
    </div>

</div>

</div>
@endsection