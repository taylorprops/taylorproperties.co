
@extends('layouts.results')
@section('title', 'Tayor Properties')
@section('content')

<div id="test"></div>

@endsection

@section('js')
<script>

const abortableFetch = ('signal' in new Request('')) ? window.fetch : fetch
const controller = new AbortController()

abortableFetch('/test', {
signal: controller.signal
}).catch(function(ex) {
if (ex.name === 'AbortError') {
console.log('request aborted')
}
}).then(function(response) {
return response.text()
}).then(function(body) {

});

// some time later...
setTimeout(function() {
    controller.abort();
}, 10);

/*
fetch('/test')
.then(function(response) {
return response.text()
}).then(function(body) {

});
*/
</script>
@endsection
