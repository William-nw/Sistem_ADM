    @extends('layouts.app')

@section('content-title', 'Form Daftar User Orang Tua')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            {{ session('error') }}
        </div>
    @endif

{{-- <form id="demo-form2" action="{{ route('pembayaran.store') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
    @csrf --}}
    <div id="smartwizard" class="sw sw-theme-default">
        <ul class="nav">
           <li>
               <a class="nav-link" href="#step-1">
                   <strong> Data Siswa  </strong>
               </a>
           </li>
           <li>
               <a class="nav-link" href="#step-2">
                  <strong>Uang Pembangunan</strong>
               </a>
           </li>
           <li>
               <a class="nav-link" href="#step-3">
                  <strong>Uang SPP</strong>
               </a>
           </li>
           <li>
               <a class="nav-link" href="#step-4">
                  <strong>Uang Buku</strong>
               </a>
           </li>
           <li>
               <a class="nav-link" href="#step-5">
                  <strong>Uang Baju</strong>
               </a>
           </li>
           <li>
               <a class="nav-link" href="#step-6">
                  <strong>Uang Konsumsi</strong>
               </a>
           </li>
        </ul>
     
        <div class="tab-content">
           <div id="step-1" class="tab-pane" role="tabpanel">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="siswa_ortu">Siswa Ortu <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 "> 
                    <div class="form-group">
                        <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option value="AL">Alabama</option>
                          <option value="WY">Wyoming</option>
                          <option value="AM">America</option>
                          <option value="CA">Canada</option>
                          <option value="RU">Russia</option>
                        </select>
                      </div>
                </div>
            </div>
           </div>
           <div id="step-2" class="tab-pane" role="tabpanel">
              Step content
           </div>
           <div id="step-3" class="tab-pane" role="tabpanel">
              Step content
           </div>
           <div id="step-4" class="tab-pane" role="tabpanel">
              Step content
           </div>
           <div id="step-5" class="tab-pane" role="tabpanel">
              Step content
           </div>
           <div id="step-6" class="tab-pane" role="tabpanel">
              Step content
           </div>
        </div>
    </div>
</form>
@endsection
