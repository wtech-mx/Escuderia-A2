             @auth
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

                @foreach($seguro_alerta as $item)
                     <script>
                        Push.create('Seguro', {
                            body: 'Vencimiento de seguro',
                            icon: '{{ asset('/icon-512x512.ico') }}',
                            onClick: function () {
                                window.focus();
                                this.close();
                            }
                        });
                    </script>
                @endforeach
            @endauth
