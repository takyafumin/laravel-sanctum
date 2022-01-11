@extends('layouts.app')

@section('content')
<div class="container">
    @if (!empty($user))
        Loggined!
    @else
        Not Loggin.
    @endif
    <hr>
    <h3>ユーザ情報</h3>
    <pre id="user-info"></pre>
    <input id="get-user-info"
        type="button" value="取得"
        data-url="http://localhost/api/me"
        data-target="#user-info"
    />
</div>
<script src="{{ mix('js/user-index.js') }}"></script>
@endsection
