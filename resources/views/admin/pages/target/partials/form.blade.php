<!-- admission -->
<div class="col-md-4 form-group mt-3">
  <label for="admission">Admission</label>
  <input class="@error('admission') is_invalid @enderror form-control" id="admission" name="admission"
    type="number" placeholder="Enter admission"
    @error('admission') aria-describedby="admission-error" @enderror required value="{{ $employee->admission ?? '' }}">
  @error('admission')
    <div class="invalid-feedback" id="admission-error">{{ $message }}</div>
  @enderror
</div>
<!-- collection -->
<div class="col-md-4 form-group mt-3">
  <label for="collection">Collection</label>
  <input class="@error('collection') is_invalid @enderror form-control" id="collection" name="collection"
    type="number" placeholder="Enter collection"
    @error('collection') aria-describedby="collection-error" @enderror required value="{{ $employee->collection ?? '' }}">
  @error('collection')
    <div class="invalid-feedback" id="collection-error">{{ $message }}</div>
  @enderror
</div>
<!-- new_od -->
<div class="col-md-4 form-group mt-3">
  <label for="new_od">New OD</label>
  <input class="@error('new_od') is_invalid @enderror form-control" id="new_od" name="new_od"
    type="number" placeholder="Enter New OD" @error('new_od') aria-describedby="new_od-error" @enderror
    required value="{{ $employee->new_od ?? '' }}">
  @error('new_od')
    <div class="invalid-feedback" id="new_od-error">{{ $message }}</div>
  @enderror
</div>
<!-- od_realization -->
<div class="col-md-4 form-group mt-3">
  <label for="od_realization">OD Realization</label>
  <input class="@error('od_realization') is_invalid @enderror form-control" id="od_realization"
    name="od_realization" type="number" placeholder="Enter od realization"
    @error('od_realization') aria-describedby="od_realization-error" @enderror required value="{{ $employee->od_realization ?? '' }}">
  @error('od_realization')
    <div class="invalid-feedback" id="od_realization-error">{{ $message }}</div>
  @enderror
</div>
<!-- savings -->
<div class="col-md-4 form-group mt-3">
  <label for="savings">Savings</label>
  <input class="@error('savings') is_invalid @enderror form-control" id="savings" name="savings"
    type="number" placeholder="Enter savings" @error('savings') aria-describedby="savings-error" @enderror
    required value="{{ $employee->savings ?? '' }}">
  @error('savings')
    <div class="invalid-feedback" id="savings-error">{{ $message }}</div>
  @enderror
</div>
<!-- disbursement -->
<div class="col-md-4 form-group mt-3">
  <label for="disbursement">Disbursement</label>
  <input class="@error('disbursement') is_invalid @enderror form-control" id="disbursement"
    name="disbursement" type="number" placeholder="Enter disbursement"
    @error('disbursement') aria-describedby="disbursement-error" @enderror required value="{{ $employee->disbursement ?? '' }}">
  @error('disbursement')
    <div class="invalid-feedback" id="disbursement-error">{{ $message }}</div>
  @enderror
</div>
<!-- late_od_realization -->
<div class="col-md-4 form-group mt-3">
  <label for="late_od_realization">Late OD Realization</label>
  <input class="@error('late_od_realization') is_invalid @enderror form-control" id="late_od_realization"
    name="late_od_realization" type="number" placeholder="Enter late od realization"
    @error('late_od_realization') aria-describedby="late_od_realization-error" @enderror required value="{{ $employee->late_od_realization ?? '' }}">
  @error('late_od_realization')
    <div class="invalid-feedback" id="late_od_realization-error">{{ $message }}</div>
  @enderror
</div>
<!-- loan_scheme -->
<div class="col-md-4 form-group mt-3">
  <label for="loan_scheme">Loan Scheme</label>
  <input class="@error('loan_scheme') is_invalid @enderror form-control" id="loan_scheme" name="loan_scheme"
    type="number" placeholder="Enter loan scheme"
    @error('loan_scheme') aria-describedby="loan_scheme-error" @enderror required value="{{ $employee->loan_scheme ?? '' }}">
  @error('loan_scheme')
    <div class="invalid-feedback" id="loan_scheme-error">{{ $message }}</div>
  @enderror
</div>
