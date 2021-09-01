<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body" >

                <div class="col-12">
                    <p class="text-center" style="font: normal normal bold 23px/31px Segoe UI;">
                        Sectores
                    </p>
                </div>

                <form method="POST" action="{{route('store.sector')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="col-12 mt-3">

                        <label for="">
                            <p><strong>Agregar un nuevo sector</strong></p>
                        </label>

                        <div class=" custom-file mb-3">
                            <input type="text" class="form-control" name="sector" id="sector" placeholder="Nombre">
                        </div>

                            <button type="submit" class="btn btn-lg btn-save-dark text-white mt-5">
                                <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}"
                                    width="20px">
                                Guardar
                            </button>

                    </div>
                </form>

                <label for="" class="mt-4">
                    <p><strong>Sectores</strong></p>
                </label>

                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Borrar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($sector as $item)
                      <tr>
                        <td>{{$item->sector}}</td>
                        <td>
                            <a type="button" class="btn" data-toggle="modal"
                            data-target="#modal-{{ $item->id }}">
                            <i class="fas fa-trash" style="font-size: 15px;"></i>
                            </a>
                        </td>
                        @include('admin.user.destroy')
                      </tr>
                      @endforeach
                    </tbody>
                  </table>



            </div>


        </div>
    </div>
</div>
