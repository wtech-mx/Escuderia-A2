<!-- Modal -->
<div class="modal fade" id="modal-doc-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-doc-{{$item->id}}" aria-hidden="true">
  <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="d-flex justify-content-end">
          <div class="mr-4 mt-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
        </div>


      <div class="modal-body">
          <p class="text-center mb-3">
              <img class="d-inline mb-2" src="{{asset('exp-tc/'.$item->img)}}" alt="{{$item->img}}" width="auto">
          </p>

          <p class="text-center text-dark">
              Fecha de Expedicion: <br>
              <strong>{{$item->fecha_expedicion}}</strong>
          </p>

      </div>

    </div>
  </div>
</div>
