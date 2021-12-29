@component('mail::message')
# Seu post foi curtido!

{{ $liker->name }} curtiu um de seus posts.

@component('mail::button', ['url' => route('posts.show', $post)])
Ver Post
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
