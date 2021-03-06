             @auth
                @foreach($alert2 as $item)
                     <script>
                        Push.create('{{$item->titulo}}', {
                            body: '{{$item->descripcion}}',
                            icon: '{{ asset('/icon-512x512.ico') }}',
                            onClick: function () {
                                window.focus();
                                this.close();
                            }
                        });
                    </script>
                @endforeach
            @endauth
