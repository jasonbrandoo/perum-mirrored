@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header bg-white header-elements-inline">
    <h6 class="card-title">Create New Customer</h6>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>

  <form class="wizard-form steps-basic" action="#" data-fouc>
    <h6>Personal data</h6>
    <fieldset>
      {{-- <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Select location:</label>
            <select name="location" data-placeholder="Select position" class="form-control form-control-select2" data-fouc>
              <option></option>
              <optgroup label="North America">
                <option value="1">United States</option>
                <option value="2">Canada</option>
              </optgroup>
              <optgroup label="Latin America">
                <option value="3">Chile</option>
                <option value="4">Argentina</option>
                <option value="5">Colombia</option>
                <option value="6">Peru</option>
              </optgroup>
              <optgroup label="Europe">
                <option value="8">Croatia</option>
                <option value="9">Hungary</option>
                <option value="10">Ukraine</option>
                <option value="11">Greece</option>
              </optgroup>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Select position:</label>
            <select name="position" data-placeholder="Select position" class="form-control form-control-select2" data-fouc>
              <option></option>
              <optgroup label="Developer Relations">
                <option value="1">Sales Engineer</option>
                <option value="2">Ads Solutions Consultant</option>
                <option value="3">Technical Solutions Consultant</option>
                <option value="4">Business Intern</option>
              </optgroup>

              <optgroup label="Engineering &amp; Design">
                <option value="5">Interaction Designer</option>
                <option value="6">Technical Program Manager</option>
                <option value="7">Software Engineer</option>
                <option value="8">Information Security Engineer</option>
              </optgroup>

              <optgroup label="Marketing &amp; Communications">
                <option value="13">Media Outreach Manager</option>
                <option value="14">Research Manager</option>
                <option value="15">Marketing Intern</option>
                <option value="16">Business Intern</option>
              </optgroup>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Applicant name:</label>
            <input type="text" name="name" class="form-control" placeholder="John Doe">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Email address:</label>
            <input type="email" name="email" class="form-control" placeholder="your@email.com">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Phone #:</label>
            <input type="text" name="tel" class="form-control" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999">
          </div>
        </div>

        <div class="col-md-6">
          <label>Date of birth:</label>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <select name="birth-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
                  <option></option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <select name="birth-day" data-placeholder="Day" class="form-control form-control-select2" data-fouc>
                  <option></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="...">...</option>
                  <option value="31">31</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <select name="birth-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
                  <option></option>
                  <option value="1">1980</option>
                  <option value="2">1981</option>
                  <option value="3">1982</option>
                  <option value="4">1983</option>
                  <option value="5">1984</option>
                  <option value="6">1985</option>
                  <option value="7">1986</option>
                  <option value="8">1987</option>
                  <option value="9">1988</option>
                  <option value="10">1989</option>
                  <option value="11">1990</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </fieldset>

    <h6>Address</h6>
    <fieldset>
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group">
              <label>Alamat KTP:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Kota:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Provinsi:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Kode Pos:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat Surat:</label>
              <input type="text" class="form-control">
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group">
              <label>Alamat Tinggal:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Kota:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Provinsi:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Kode Pos:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Status Rumah:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Lama Tinggal:</label>
              <input type="text" class="form-control">
            </div>
          </fieldset>
        </div>
      </div>

    </fieldset>

    <h6>Job</h6>
    <fieldset>
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Name:</label>
              <div class="col-lg-9">
                <input type="number" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Pekerjaaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor Karyawan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jabatan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Masa Kerja:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control">
                  </div>
                  <label class="col-form-label">Tahun</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Address:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Telp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Fax:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Email:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan Tambahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan Suami/Istri:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Total:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Pengeluaran Rutin:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sisa Penghasilan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kemampuan Angsuran:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </fieldset>

    <h6>Additional info</h6>
    <fieldset>
      {{-- <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="d-block">Applicant resume:</label>
                              <input type="file" name="resume" class="form-input-styled" data-fouc>
                              <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
                            </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Where did you find us?</label>
                              <select name="source" data-placeholder="Choose an option..." class="form-control form-control-select2" data-fouc>
                                  <option></option> 
                                  <option value="monster">Monster.com</option> 
                                  <option value="linkedin">LinkedIn</option> 
                                  <option value="google">Google</option> 
                                  <option value="adwords">Google AdWords</option> 
                                  <option value="other">Other source</option>
                              </select>
                            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Availability:</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" name="availability" class="form-input-styled" data-fouc>
                Immediately
              </label>
            </div>

            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" name="availability" class="form-input-styled" data-fouc>
                1 - 2 weeks
              </label>
            </div>

            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" name="availability" class="form-input-styled" data-fouc>
                3 - 4 weeks
              </label>
            </div>

            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" name="availability" class="form-input-styled" data-fouc>
                More than 1 month
              </label>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Additional information:</label>
                              <textarea name="additional-info" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control"></textarea>
                            </div>
        </div>
      </div> --}}
    </fieldset>
  </form>
</div>
@endsection