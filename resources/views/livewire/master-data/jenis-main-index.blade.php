<div>
  <div class="row">
    <div class="col-12 {{ $form == true ? 'd-block':'d-none' }}">
      <div class="card card-outline card-success">
        <div class="card-header">
          <h4 class="card-title">
            <span class="fa fa-edit mr-2"></span>
            Formulir Data Jenis
          </h4>

          <div class="card-tools">
            <button class="btn btn-xs btn-danger px-3" wire:click="showForm(false)">
              <span class="fa fa-times mr-2"></span>
              Tutup Formulir
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="kode_jenis">Kode Jenis</label>
                <input type="text" wire:model="state.FK_JENIS" name="kode_jenis" id="kode_jenis" class="form-control form-control-sm {{ $errors->has('state.FK_JENIS') ? 'is-invalid':''}}" placeholder="Masukan Kode Jenis" {{ $state['edit'] == true ? 'disabled':'' }} required>
                <div class="invalid-feedback">
                  {{ $errors->first('state.FK_JENIS') }}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_jenis">Nama Jenis</label>
                <input type="text" wire:model="state.FN_JENIS" name="nama_jenis" id="nama_jenis" class="form-control form-control-sm {{ $errors->has('state.FN_JENIS') ? 'is-invalid':''}}" placeholder="Masukan Kode Jenis" required>
                <div class="invalid-feedback">
                  {{ $errors->first('state.FN_JENIS') }}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            @if ($state['edit'] == true)
            <div class="col-md-4">
              <button class="btn btn-sm btn-success btn-block" wire:click="updateData">
                <span class="fa fa-check mr-3"></span>
                Simpan Perubahan
              </button>
            </div>
            @else
            <div class="col-md-4">
              <button class="btn btn-sm btn-success btn-block" wire:click="createData">
                <span class="fa fa-check mr-3"></span>
                Buat Data Jenis
              </button>
            </div>                
            @endif
            <div class="col-md-4">
              <button class="btn btn-block btn-sm btn-danger" wire:click="showForm(false)">
                <span class="fa fa-undo mr-2"></span>
                Reset / Batalkan Input
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h4 class="card-title">
            <span class="fa fa-table mr-3"></span>
            Data Jenis
          </h4>

          <div class="card-tools">
            <button class="btn btn-xs btn-primary px-3" wire:click="showForm(true)">
              <span class="fa fa-plus mr-2"></span>
              Tambah Data Jenis
            </button>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="align-middle px-2 py-2 text-center" width="15%">No.</th>
                <th class="align-middle px-2 py-2 text-center" width="18%">Kode Jenis</th>
                <th class="align-middle px-2 py-2 text-center">Nama Jenis</th>
                <th class="align-middle px-2 py-2 text-center" width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataJenis as $item)
                  <tr>
                    <td class="align-middle px-2 py-2 text-center">
                      {{ ($dataJenis->currentpage()-1) * $dataJenis->perpage() + $loop->index + 1 }}.
                    </td>
                    <td class="align-middle px-2 py-2 text-center">{{ $item->FK_JENIS }}</td>
                    <td class="align-middle px-2 py-2 text-center">{{ $item->FN_JENIS }}</td>
                    <td class="align-middle px-2 py-2 text-center">
                      <div class="btn-group">
                        <button class="btn btn-sm btn-warning mr-2" wire:click="editData('{{ $item->FK_JENIS }}')">
                          <span class="fa fa-edit"></span>
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="hapusData('{{ $item->FK_JENIS }}')">
                          <span class="fa fa-trash"></span>
                        </button>
                      </div>
                    </td>
                  </tr>
              @empty
              <tr>
                <td class="align-middle px-2 py-1 text-center" colspan="4">Tidak Ada Data Jenis</td>
              </tr>                  
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="card-footer">
          <div class="float-right">
            {{ $dataJenis->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
