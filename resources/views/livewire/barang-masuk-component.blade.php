<div class="container mt-4">
   <div class="row justify-content-center" >
      <div class="col-md-8"  style="">
         @if (session()->has('message'))
         <div class="alert alert-success">
            {{ session('message') }}
         </div>
         @endif
         <form wire:submit.prevent="submit">
            <div class="form-row">
              
			   
				<div class="form-group col-md-2">
				<label for="file">File</label>
				<div class="custom-file">
				<input type="file" class="custom-file-input" id="file" wire:model="file">
				<label class="custom-file-label" for="file"></label>
				</div>
				@error('file') <span class="text-danger">{{ $message }}</span> @enderror
				</div>

				<script>
				document.addEventListener('DOMContentLoaded', function () {
				bsCustomFileInput.init();
				});
				</script>

               <div class="form-group col-md-5">
                  <label for="no_penerimaan_barang">No Penerimaan Barang</label>
                  <input type="text" class="form-control" id="no_penerimaan_barang" wire:model="no_penerimaan_barang" readonly>
                  @error('no_penerimaan_barang') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="form-group col-md-5">
                  <label for="no_surat_jalan">No Surat Jalan</label>
                  <input type="text" class="form-control" id="no_surat_jalan" wire:model="no_surat_jalan">
                  @error('no_surat_jalan') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="supplier_id">Supplier</label>
                  <select class="form-control" id="supplier_id" wire:model="supplier_id">
                     <option value="">Pilih Supplier</option>
                     @foreach($suppliers as $supplier)
                     <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                     @endforeach
                  </select>
                  @error('supplier_id') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="form-group col-md-6">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" wire:model="tanggal" max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
                  @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
            </div>
            <div class="form-row mb-3">
               <div class="col-md-3">
                  <label>Karat</label>
               </div>
               <div class="col-md-3">
                  <label>Berat Real</label>
               </div>
               <div class="col-md-3">
                  <label>Berat Kotor</label>
               </div>
               <div class="col-md-3">
                  <button type="button" class="btn btn-success" wire:click="addKarat">Tambah Karat</button>
               </div>
            </div>
            @foreach ($karat as $index => $value)
            <div class="form-row mb-2 align-items-center">
               <div class="form-group col-md-3">
                  <input type="text" required wire:model="karat.{{ $index }}" class="form-control" placeholder="Karat {{ $index + 1 }}">
               </div>
               <div class="form-group col-md-3">
                  <input type="number" step="0.01" min="0.01" required wire:model="berat_real.{{ $index }}" class="form-control" placeholder="Berat Real {{ $index + 1 }}">
               </div>
               <div class="form-group col-md-3">
                  <input type="number" step="0.01" min="0.01" required wire:model="berat_kotor.{{ $index }}" class="form-control" placeholder="Berat Kotor {{ $index + 1 }}">
               </div>
               @if ($index > 0)
               <div class="form-group col-md-2">
                  <button type="button" class="btn btn-danger" wire:click="removeKarat({{ $index }})">Delete</button>
               </div>
               @endif
            </div>
            @endforeach
            <div class="form-row">
               <div class="form-group col-md-3">
                  <label for="no_surat_jalan">Total Berat Real</label>
                  <input type="number" step="0.01" min="0.01"  class="form-control" id="no_surat_jalan" wire:model="total_berat_real">
                  @error('total_berat_real') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="form-group col-md-3">
                  <label for="total_berat_kotor">Total Berat Kotor</label>
                  <input type="text" class="form-control" id="total_berat_kotor" wire:model="total_berat_kotor" readonly>
                  @error('total_berat_kotor') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="form-group col-md-3">
                  <label for="total_berat_kotor">Berat Timbangan</label>
                  <input type="number" step="0.01" min="0.01"   class="form-control" id="berat_timbangan" wire:model="berat_timbangan" >
                  @error('berat_timbangan') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="form-group col-md-3">
                  <label for="selisih">Selisih</label>
                  <input type="text" class="form-control" id="selisih" wire:model="selisih" readonly >
                  @error('selisih') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-12">
                  <label for="catatan">Catatan</label>
                  <input type="text" class="form-control" id="catatan" wire:model="catatan">
                  @error('catatan') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="catatan">Tipe Pembayaran</label>
                  <select class="form-control" id="tipe_pembayaran" wire:model="tipe_pembayaran">
                     <option value="">Pilih</option>
                     <option value="Lunas">Lunas </option>
                     <option value="Jatuh Tempo">Jatuh Tempo</option>
                  </select>
                  @error('tipe_pembayaran') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               @if($tipe_pembayaran == 'Lunas')
               <div class="form-group col-md-6">
                  <label for="harga_beli">Harga Beli</label>
                  <input type="number" step="0.01" min="0.01" class="form-control" id="harga_beli" wire:model="harga_beli">
                  @error('harga_beli') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               @elseif($tipe_pembayaran == 'Jatuh Tempo')
               <div class="form-group col-md-6">
                  <label for="jatuh_tempo">Jatuh Tempo</label>
                  <input type="date" class="form-control" id="jatuh_tempo" wire:model="jatuh_tempo" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
                  @error('jatuh_tempo') <span class="text-danger">{{ $message }}</span> @enderror
               </div>
               @endif
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="catatan">Nama Pengirim</label>
                  <input type="text" class="form-control" id="nama_pengirim" wire:model="nama_pengirim">
                  @error('nama_pengirim') <span class="text-danger">{{ $message }}</span> @enderror 
               </div>
               <div class="form-group col-md-6">
                  <label for="catatan">PIC</label>
                  <input type="text" class="form-control" id="pic" wire:model="pic" readonly>
                  @error('pic') <span class="text-danger">{{ $message }}</span> @enderror 
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>