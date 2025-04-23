@component('layouts.app',compact('title'))
    <h1>Récapitulatif des données soumises</h1>
    <dl>
        <div>
            <dt>Email&nbsp;:</dt>
            <dd>{!! $pet_owner->email  !!}</dd>
        </div>
    </dl>
@endcomponent