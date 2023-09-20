<?php

namespace App\Http\Livewire\MasterData;

use App\Models\Satuan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SatuanMainIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $form = false;

    public $state = [];
    public $params = [
        'FK_SAT' => null,
        'FN_SAT' => null,

        'edit' => false,
    ];

    public function mount()
    {
        $this->state = $this->params;
    }

    public function render()
    {
        $getData = Satuan::orderBy('FK_SAT', 'ASC')->paginate(2);
        return view('livewire.master-data.satuan-main-index', [
            'dataSatuan' => $getData
        ]);
    }

    public function showForm($show, $data= [])
    {
        $this->reset('state');

        $this->state = $this->params;

        $this->form = $show;
        if ($data != null) {
            $this->state['edit'] = true;
            $this->state['FK_SAT'] = $data['FK_SAT'];
            $this->state['FN_SAT'] = $data['FN_SAT'];
        }
    }

    public function createData()
    {
        $this->validate([
            'state.FK_SAT' => 'required|string|unique:satuans,FK_SAT',
            'state.FN_SAT' => 'required|string',
        ], [
            'required' => 'Data / Input Tidak Boleh Kosong !',
            'unique' => 'Data / Input Dengan Data Tersebut Sudah Ada !',
            'string' => 'Input Harus Berupa Alphanumerik !',
        ]);

        DB::beginTransaction();

        try {
            $createData = Satuan::create([
                'FK_SAT' => trim($this->state['FK_SAT']),
                'FN_SAT' => trim($this->state['FN_SAT']),
            ]);
            
            DB::commit();
            $this->emit('success', 'Data Telah Ditambahkan !');
            $this->showForm(false);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function editData($id)
    {
        try {
            $getData = Satuan::where('FK_SAT', '=', $id)->firstOrFail();

            $this->showForm(true, $getData->toArray());
        } catch (\Exception $e) {
            $this->emit('success', 'Terjadi Kesalahan ! <br> Silahkan Hubungi Administrator');
            dd($e);
        }
    }

    public function updateData()
    {
        $this->validate([
            'state.FK_SAT' => 'required|string|Exists:satuans,FK_SAT',
            'state.FN_SAT' => 'required|string',
        ], [
            'required' => 'Data / Input Tidak Boleh Kosong !',
            'unique' => 'Data / Input Dengan Data Tersebut Sudah Ada !',
            'string' => 'Input Harus Berupa Alphanumerik !',
            'exists' => 'Data tidak valid, Silahkan pilih ulang !',
        ]);

        DB::beginTransaction();

        try {
            $getData = Satuan::where('FK_SAT', '=', $this->state['FK_SAT'])->firstOrFail();
            $updateData = $getData->update([
                'FK_SAT' => trim($this->state['FK_SAT']),
                'FN_SAT' => trim($this->state['FN_SAT']),
            ]);

            DB::commit();
            $this->emit('info', 'Data Berhasil Diubah !');
            $this->showForm(false);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function deleteData($id)
    {
        DB::beginTransaction();
        try {
            $getData = Satuan::where('FK_SAT', '=', $id)->firstOrFail();
            $deleteData = $getData->delete();

            DB::commit();
            $this->emit('warning', 'Data di-Hapus !');
            $this->showForm(false);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('error', 'Terjadi Kesalahan ! <br> Silahkan Hubungi Administrator !');
            dd($e);
        }
    }
}
