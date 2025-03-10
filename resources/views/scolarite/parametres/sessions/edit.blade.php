@extends('layouts.template-scolarite')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-cog me-1"></i>Paramètres</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            @if(session()->has('info'))
                                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                                    <h5 class="text-center">{{ session('info') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <i class="fa fa-check icon-deleted text-white"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('session.update', $anneeUniv->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="session" class="label-control label-text">Modification de la session :</label>
                                <input type="text" class="form-control border-input" name="session" id="session" value="{{ old('session', $anneeUniv->session) }}">
                                @error('session')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mt-2">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <a href="{{ route('scolarite.parametre') }}" class="btn-edit ms-4"><i class="fa fa-undo me-1"></i>Retour</a>
                                    <button type="submit" class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mt-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center bg-light">N°</th>
                                <th class="text-center bg-light">Session</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($anneeUnivs as $key => $anneeUniv)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $anneeUniv->session }}</td>
                                </tr>
                            @empty
                                <td colspan="2" class="text-center"><p class="">Aucune session !</p></td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <footer class="card-footer">
                            {{ $anneeUnivs->links() }}
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
