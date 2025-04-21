@component('layouts.app')
    <h1>Dashboard</h1>
    @if($losses)
        <table>
            <tr>
                <th scope="col">Date de la perte</th>
                <th scope="col">Nom du propriétaire</th>
                <th scope="col">Nom de l’animal</th>
            </tr>
            @foreach($losses as $loss)
                <tr>
                    <td>
                        <a href="/loss-declaration/show?id={!! $loss->id !!}">
                            {!! $loss->lost_at->locale('fr')->isoFormat('Do MMMM YYYY') !!}
                        </a>
                    </td>
                    <td>{!! $loss->pet_owner->name !!}</td>
                    <td>{!! $loss->pet->name !!}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Il n’y a encore aucune déclaration enregistrée</p>
    @endif
@endcomponent