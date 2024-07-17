<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Karat;

class BarangMasukComponent extends Component
{
    use WithFileUploads;

    public $file;
    public $no_penerimaan_barang;
	public $no_surat_jalan;
	public $supplier_id;
	public $tanggal;
	public $karat = []; 
	public $berat_real = [''];
	public $berat_kotor = [''];
	public $total_berat_real ; 
	public $total_berat_kotor ; 
	public $berat_timbangan;
	public $selisih;
	public $catatan;
	public $tipe_pembayaran;
	public $harga_beli;
	public $jatuh_tempo;
	public $nama_pengirim;
	public $pic;
	

    protected $rules = [
        'file' => 'required|image|max:2048', // 2MB Max
        'no_penerimaan_barang' => 'required|string|max:8',
		'no_surat_jalan' => 'required|string|max:30',
		'supplier_id' => 'required',
		'tanggal' => 'required|date|before_or_equal:today',
		'total_berat_kotor'=>'required',
		'total_berat_real'=>'required',
		'berat_timbangan'=> 'required',
		'catatan' => 'required',
		'tipe_pembayaran' => 'required',
		'nama_pengirim' => 'required',
    ];
	
	protected $messages = [
        'supplier_id.required' => 'The supplier field is required.',
		'tanggal.required' => 'The date field is required.',
        'tanggal.date' => 'The date field must be a valid date.',
        'tanggal.before_or_equal' => 'The date cannot be in the future.',
    ];
	
	public function mount()
    {
       
        $this->suppliers = Supplier::all();
		if (empty($this->karat)) {
            $this->karat[] = '';
        }
		$this->pic = Auth::user()->name;
		$this->no_penerimaan_barang = $this->generateNoPenerimaanBarang();
		$this->tanggal = Carbon::today()->format('Y-m-d');
		//$this->karat = Karat::all()->toArray();
    }
	
	protected function generateNoPenerimaanBarang()
    {
        $latestOrder = BarangMasuk::latest()->first();
        if (!$latestOrder) {
            return 'PO-00001';
        }

        $latestNo = $latestOrder->no_penerimaan_barang;
        $number = intval(substr($latestNo, 3)) + 1;
        return 'PO-' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }
	
	public function updated($propertyName)
    {
        if (str_contains($propertyName, 'berat_kotor')) {
            $this->updateTotalBeratKotor();
        }
		
		if (in_array($propertyName, ['berat_timbangan', 'total_berat_real'])) {
            $this->updateSelisih();
        }
    }

    public function updateTotalBeratKotor()
    {
        $this->total_berat_kotor = array_sum($this->berat_kotor);
    }
	
	public function updateSelisih()
    {
        $this->selisih = $this->berat_timbangan - $this->total_berat_real;
    }
	
	public function removeKarat($index)
    {
        unset($this->karat[$index]);
        unset($this->berat_real[$index]);
		unset($this->berat_kotor[$index]);
        $this->karat = array_values($this->karat);
        $this->berat_real = array_values($this->berat_real);
		$this->berat_kotor = array_values($this->berat_kotor);
		$this->updateTotalBeratKotor();
		$this->updateSelisih();
    }

    public function submit()
    {	
		
        $this->validate();

        $filePath = $this->file->store('barang_masuk', 'public');
		
		$countsupp = json_encode($this->karat);

        BarangMasuk::create([
            'file' => $filePath,
            'no_penerimaan_barang' => $this->no_penerimaan_barang,
			'no_surat_jalan'=>$this->no_surat_jalan,
			'supplier_id'=>$this->supplier_id,
			'tanggal'=>$this->tanggal,
			'karat'=>json_encode($this->karat), 
			'berat_real'=>json_encode($this->berat_real), 
			'berat_kotor'=>json_encode($this->berat_kotor),
			'total_berat_real'=>$this->total_berat_real,
			'total_berat_kotor'=>$this->total_berat_kotor,
			'berat_timbangan'=>$this->berat_timbangan,
			'selisih'=>$this->selisih,
			'catatan'=>$this->catatan,
			'tipe_pembayaran'=>$this->tipe_pembayaran,
			'harga_beli'=>$this->harga_beli,
			'jatuh_tempo'=>$this->jatuh_tempo,
			'nama_pengirim'=>$this->nama_pengirim,
			'pic'=>$this->pic
			
			
			
			
			
        ]);

        session()->flash('message', 'Barang berhasil ditambahkan.');

        $this->reset(['file', 'no_penerimaan_barang','no_surat_jalan','supplier_id','tanggal']);
    }
	
	public function addKarat()
    {
        $this->karat[] = ''; 
		$this->berat_real[] = '';
		$this->berat_kotor[] = '';
    }

    public function render()
    {
        return view('livewire.barang-masuk-component');
    }
}
