@extends('layouts.app')

@section('content-title', 'test Pembayaran')

@section('content')

   @include('includes/error')

   <form action="{{ route('testing-payment.simulatePayment') }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >

    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siswa">Siswa<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <div class="form-group">
                <select id="" name="account_va" class="select2_single form-control" tabindex="-1">
                <option value="" style="text-align-last:center">-- Pilih Anak --</option>
                    @foreach($siswa as $data_siswa)
                        @foreach($data_siswa['siswa_ortu'] as $parent_child)
                            <option style="text-align-last:center"
                            value="{{$data_siswa['studentSaving'][$parent_child->NIS_siswa]->external_id}}">
                                {{$parent_child->NIS_siswa}} -
                                {{$parent_child->nama_siswa}} -
                                {{$parent_child->tingkat}} -
                                ( {{$parent_child->masterKelas->nama_kelas}} - {{$parent_child->tahunAjaran->nama_tahun_ajaran}} )
                            </option>
                        @endforeach
                    @endforeach
                </select>
              </div>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah_transfer">Jumlah Transfer<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="amount_transfer" name="amount_transfer" required="required" class="form-control"
                   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
        </div>
    </div>

       <div class="item form-group">
           <div class="col-md-6 col-sm-6 offset-md-3">
               <button type="submit" class="btn btn-success">Submit</button>
           </div>
       </div>

    <div class="item form-group">
        <label for="tergunggak" class="col-form-label col-md-3 col-sm-3 label-align">Cek Tertunggak</label>
        <div class="col-md-6 col-sm-6 ">
            <a href="#" class="btn btn-primary stretched-link">SPP</a>
            <a href="#" class="btn btn-primary stretched-link">Pembangunan</a>
            <a href="#" class="btn btn-primary stretched-link">Buku</a>
            <a href="#" class="btn btn-primary stretched-link">Baju</a>
            <a href="#" class="btn btn-primary stretched-link">Konsumsi</a>
        </div>
    </div>
</form>
@endsection
