<!-- Modal -->

<div class="modal fade" id="evidenceModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Evidencia {{ $key+1 }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('files/exports') }}/{{ $export->id.'/'.$item }}" frameborder="0" width="100%" height="500px">
            </div>
        </div>
    </div>
</div>