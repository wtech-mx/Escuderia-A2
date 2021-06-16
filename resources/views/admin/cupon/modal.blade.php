<!-- Modal -->
<div class="modal fade" id="example{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{$item->titulo}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <p>{{$item->validez}}</p>
         <p>{{$item->aplicacion}}</p>
         <p>{{$item->precio}}</p>
         <img class="" src="{{asset('cupon/'.$item->img1)}}" alt="{{$item->img1}}" style="height: 100px!important;">
         <img class="" src="{{asset('cupon/'.$item->img2)}}" alt="{{$item->img2}}" style="height: 100px!important;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
