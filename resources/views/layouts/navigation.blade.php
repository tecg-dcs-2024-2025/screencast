<div role="navigation">
    @auth
        <form action="/logout"
              method="post">
            {!!  csrf_token()  !!}
            @component('components.form.buttons.normal')
                Me déconnecter
            @endcomponent
        </form>
    @endauth

    @guest
        <p>Non Connecté</p>
    @endguest
</div>