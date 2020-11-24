<div class="modal fade" id="modalObservation" tabindex="-1" role="dialog" aria-labelledby="modalObservationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title" id="modalObservationLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}
        <form action="{{ route('update.reconocimiento', $import->id) }}" method="post" class="pt-2">
            <div class="modal-body">
            {{-- <h3>El reconicimiento se actualizara a </h3> --}}
            <div class="text-center">
                <h3>Si desea agregar una observacion, introduzcala a continuacion</h3>
            </div> 
                @csrf
                {{-- <input type="hidden" name="import_id" value="{{ $import->id }}"> --}}
                <input type="hidden" id="recognition_new" name="recognition_new" value="">
                {{-- <label class="form-control-label">* Observacion:</label> --}}
                <textarea name="observation" class="form-control" id="" cols="30" rows="10"></textarea>
            
            </div>
            <div class="modal-footer">
                <small style="font-family: roboto"> Esta notificación será enviada por correo y push notification</small>
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
</div>