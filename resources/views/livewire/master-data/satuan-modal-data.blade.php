<div>
  <div class="modal fade" id="modal-satuan">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" wire:click="$refresh">
            Daftar Data Satuan
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12 table-reesponsive">
            <table class="table table-bordered mb-0">
              <thead>
                <tr>
                  <th class="align-middle px-2 py-2 text-center" width="15%">Kode Satuan</th>
                  <th class="align-middle px-2 py-2 text-center">Nama Satuan</th>
                  <th class="align-middle px-2 py-2 text-center" width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($dataSatuan as $item)
                  <tr>
                    <td class="align-middle px-2 py-1 text-center">{{ $item->FK_SAT }}</td>
                    <td class="align-middle px-2 py-1 text-center">{{ $item->FN_SAT }}</td>
                    <td class="align-middle px-2 py-1 text-center">
                      <button class="btn btn-sm btn-success" wire:click="pilihSatuan('{{ $item->FK_SAT }}')">
                        Pilih Data
                      </button>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td class="align-middle px-2 py-1 text-center" colspan="4">Belum ada Data satuan</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <div class="float-right">
            {{ $dataSatuan->links() }}
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>

@push('script')
<script>
  $(document).ready(function () {
    livewire.on('modal-satuan', function(showValue) {
      $('#modal-satuan').modal(showValue);
    });
  });
</script>
@endpush

