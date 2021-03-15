@extends('layouts.app')

@section('contentPanel')
    <div class="row">
        @foreach($alert2 as $item)
            <script>
                Push.create('{{$item->title}}', {
                    body: '{{$item->descripcion}}',
                    icon: '{{ asset('/icon-512x512.ico') }}',
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });
            </script>
        @endforeach
    </div>
@endsection

