@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Liste des inscriptions') }}</div>

                <ul class="list-group">
                    @foreach($allStudents as $student)
                    <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal_{{$student->matricule}}">
                        {{ $student->first_name }} {{ $student->last_name }} (matricule : {{ $student->matricule }} )
                        <span class="badge bg-warning rounded-pill align-badge-center">En cours de validation</span>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_{{$student->matricule}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

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