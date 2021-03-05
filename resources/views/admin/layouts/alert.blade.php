                @foreach($alert2 as $item)
                     <script>
                        Push.create('{{$item->titulo}}', {
                            body: '{{$item->descripcion}}',
                            icon: '{{ asset('/icon-512x512.ico') }}',
                            timeout: 6000,
                            onClick: function () {
                                window.focus();
                                this.close();
                            }
                        });
                    </script>
                @endforeach
