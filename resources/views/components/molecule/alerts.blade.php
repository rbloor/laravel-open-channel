@if ( Session::has('message') )
<x-atom.banner class="mb-8" type="success">{{ Session::get('message') }}</x-atom.banner>
@endif

@if ( Session::has('error') )
<x-atom.banner class="mb-8" type="danger">{{ Session::get('error') }}</x-atom.banner>
@endif