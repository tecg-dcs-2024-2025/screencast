<h1>Identifiez-vous</h1>
<p>Le faire vous donnera accès à votre dashboard pour administrer les déclarations de perte</p>
@component('layouts.app',['title'=>'Identifiez-vous'])
    <form action="/login"
          method="post">
        @csrfToken()
        <fieldset>
            <div class="fields">
                @component('components.form.fields.input_text',
[
    'type' => 'email',
    'field_name' => 'email',
    'required' => 'required',
    'placeholder' => 'jean.valjean@miserables.fr'
])
                    <abbr title="requis">*</abbr>&nbsp;Email
                @endcomponent
                @component('components.form.fields.input_text',
[
    'type' => 'password',
    'field_name' => 'password',
    'required' => 'required',
])
                    <abbr title="requis">*</abbr>&nbsp;Mot de passe
                @endcomponent
            </div>
        </fieldset>
        @component('components.form.buttons.normal')
        Identifiez-moi&nbsp;!
        @endcomponent
    </form>
    <a href="/register">S’inscrire</a>
@endcomponent