@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails de l'équipement</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Nom</label>
                        <div class="col-md-6">
                            <p>{{ $equipment->name }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <p>{{ $equipment->description }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Statut</label>
                        <div class="col-md-6">
                            <p>{{ $equipment->status }}</p>
                        </div>
                    </div>

                    @if ($equipment->image)
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <img src="{{ asset('images/' . $equipment->image) }}" width="200px">
                            </div>
                        </div>
                    @endif

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('equipment.index') }}" class="btn btn-primary">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
