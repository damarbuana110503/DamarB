<div>
  <div class="row">
    <div class="col-12 {{ $form == true ? 'd-block':'d-none' }}">
      <div class="card card-outline card-success">
        <div class="card-header">
          <h4 class="card-title">
            <span class="fa fa-edit text-success mr-2"></span>
            Formulir Data Barang
          </h4>

          <div class="card-tools">
            <button class="btn btn-sm btn-danger px-3" wire:click="showForm(false)">
              <span class="fa fa-times mr-2"></span>
              Tutup Form Input
            </button>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="kode_barang">Kode Barang :</label>
                <input type="text" wire:model="state.FK_BRG" name="kode_barang" id="kode_barang" class="form-control form-control-sm {{ $errors->has('state.FK_BRG') ? 'is-invalid':'' }}" placeholder="Masukan Kode Barang" {{ $state['edit'] == true ? 'disabled':'' }} required>
                <div class="invalid-feedback">
                  {{ $errors->first('state.FK_BRG') }}
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_barang">Nama Barang : </label>
                <input type="text" wire:model="state.FN_BRG" name="nama_barang" id="nama_barang" class="form-control form-control-sm {{ $errors->has('state.FN_BRG') ? 'is-invalid':'' }}" placeholder="Masukan Nama Barang" required>
                <div class="invalid-feedback">
                  {{ $errors->first('state.FN_BRG') }}
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="kode_jenis">Jenis Barang :</label>
                <div class="float-right">
                  <button class="badge badge-info px-3" wire:click="openModalJenis">
                    Pilih Data Jenis
                  </button>
                </div>
                <input type="text" wire:model="state.TEXT_JENIS" name="kode_jenis" id="kode_jenis" class="form-control form-control-sm {{ $errors->has('state.FK_JENIS') ? 'is-invalid':'' }}" placeholder="Masukan Jenis Barang" disabled required>
                <div class="invalid-feedback">
                  {{ $errors->first('state.FK_JENIS') }}
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_satuan">Satuan Barang :</label>
                <div class="float-right">
                  <button class="badge badge-info px-3" wire:click="openModalSatuan">
                    Pilih Data Satuan
                  </button>
                </div>
                <input type="text" wire:model="state.TEXT_SAT" name="kode_satuan" id="kode_satuan" class="form-control form-control-sm {{ $errors->has('state.FK_SAT') ? 'is-invalid':'' }}" placeholder="Masukan Satuan Barang" disabled required>
                <div class="invalid-feedback">
                  {{ $errors->first('state.FK_SAT') }}
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="harga_hna">Harga HNA :</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold">Rp.</span>
                  </div>
                  <input type="number" wire:model="state.FHARGA_HNA" name="harga_hna" id="harga_hna" class="form-control form-control-sm {{ $errors->has('state.FHARGA_HNA') ? 'is-invalid':'' }}" placeholder="Masukan Harga HNA" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('state.FHARGA_HNA') }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="harga_jual">Harga Jual :</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold">Rp.</span>
                  </div>
                  <input type="number" wire:model="state.FHARGA_JUAL" name="harga_jual" id="harga_jual" class="form-control form-control-sm {{ $errors->has('state.FHARGA_JUAL') ? 'is-invalid':'' }}" placeholder="Masukan Harga Jual" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('state.FHARGA_JUAL') }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="profit">Profit :</label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text font-weight-bold">Rp.</span>
                  </div>
                  <input type="number" wire:model="state.FPROFIT" name="profit" id="profit" class="form-control form-control-sm {{ $errors->has('state.FPROFIT') ? 'is-invalid':'' }}" placeholder="Masukan Profit :" required>
                  <div class="invalid-feedback">
                    {{ $errors->first('state.FPROFIT') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            @if ($state['edit'] == true)
            <div class="col-md-4">
              <button class="btn btn-success btn-xs btn-block" wire:click="updateData">
                <span class="fa fa-check mr-2"></span>
                Simpan Perubahan
              </button>
            </div>  
            @else
            <div class="col-md-4">
              <button class="btn btn-success btn-xs btn-block" wire:click="createData">
                <span class="fa fa-check mr-2"></span>
                Buat Data Barang
              </button>
            </div>                
            @endif
            <div class="col-md-4">
              <button class="btn btn-danger btn-xs btn-block" wire:click="showForm(false)">
                <span class="fa fa-undo mr-2"></span>
                reset Data Barang
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
            <span class="fa fa-table text-primary mr-2"></span>
            Data Barang
          </h4>

          <div class="card-tools">
            <button class="btn btn-xs btn-success px-3" wire:click="showForm(true)">
              <span class="fa fa-plus mr-2"></span>
              Tambah Data Barang
            </button>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="align-middle px-2 py-2 text-center">No</th>
                <th class="align-middle px-2 py-2 text-center">Kode Barang</th>
                <th class="align-middle px-2 py-2 text-center">Nama Barang</th>
                <th class="align-middle px-2 py-2 text-center">Jenis Barang</th>
                <th class="align-middle px-2 py-2 text-center">Satuan Barang</th>
                <th class="align-middle px-2 py-2 text-center">Harga HNA</th>
                <th class="align-middle px-2 py-2 text-center">Harga Jual</th>
                <th class="align-middle px-2 py-2 text-center">Profit</th>
                <th class="align-middle px-2 py-2 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataBarang as $item)
                  <tr>
                    <td class="align-middle px-2 py-2 text-center">
                      {{ ($dataBarang->currentpage()-1) * $dataBarang->perpage() + $loop->index + 1 }}.
                    </td>
                    <td class="align-middle px-2 py-2 text-center">{{ $item->FK_BRG }}</td>
                    <td class="align-middle px-2 py-2 text-center">{{ $item->FN_BRG }}</td>
                    <td class="align-middle px-2 py-2 text-center">{{ $item->jenis->FN_JENIS }}</td>
                    <td class="align-middle px-2 py-2 text-center">{{ $item->satuan->FN_SAT }}</td>
                    <td class="align-middle px-2 py-2 text-center">Rp. {{ number_format($item->FHARGA_HNA, 0, ',', '.') }}</td>
                    <td class="align-middle px-2 py-2 text-center">Rp. {{ number_format($item->FHARGA_JUAL, 0, ',', '.') }}</td>
                    <td class="align-middle px-2 py-2 text-center">Rp. {{ number_format($item->FPROFIT, 0, ',', '.') }}</td>
                    <td class="align-middle px-2 py-2 text-center">
                      <div class="btn-group">
                        <button class="btn btn-sm btn-warning" wire:click="editData('{{ $item->FK_BRG }}')">
                          <span class="fa fa-edit"></span>
                        </button>   
                        <button class="btn btn-sm btn-danger" wire:click="deleteData('{{ $item->FK_BRG }}')">
                          <span class="fa fa-trash"></span>
                        </button>
                      </div>
                    </td>
                  </tr>
              @empty
                  <tr>
                    <td class="align-middle px-2 py-2 text-center" colspan="8">Belum Ad Data Barang</td>
                  </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="float-right">
            {{ $dataBarang->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  @livewire('master-data.jenis-modal-data')
  @livewire('master-data.satuan-modal-data')
</div>
