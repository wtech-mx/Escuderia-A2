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

                @foreach($tc_alerta as $item)
                     <script>
                        Push.create('tarjeta de circulacion', {
                            body: 'Vencimiento de tarjeta de circulacion',
                            icon: '{{ asset('/icon-512x512.ico') }}',
                            onClick: function () {
                                console.log('entro')
                                window.focus();
                                this.close();
                            }
                        });
                    </script>
                @endforeach
            @endauth
