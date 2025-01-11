<style>
.card {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
  font-size: 1.25rem;
}

.form-group {
  margin-bottom: 1.5rem;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

</style>
<div class="card">
  <div class="card-header bg-info text-white">
    <h5 class="card-title mb-0">Product diteals</h5>
  </div>
  <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="model" class="font-weight-bold">Model No</label>
            <input class="form-control" name="model" type="text" id="model">
          </div>
          <div class="form-group ">
          <label for="made" class="font-weight-bold">Collection Gender</label>
          <select class="form-control" name="collection_gendr" id="ccollection_gendr">
                  <option value="all">All</option>
                  <option value="women">Women</option>
                  <option value="men">Men</option>
                  <option value="kids">Kids</option>
              </select>
          </div>

          <div class="form-group "> 
          <label for="made" class="font-weight-bold">Collection</label>
          <select class="form-control" name="collection" id="collection">
                  <option value="new">New</option>
                  <option value="old">Old</option>
                  <option value="sell">Sell</option>
                  <option value="last">Last</option>
              </select>
          </div>
          
          <div class="form-group ">
          <label for="made" class="font-weight-bold">Type </label>
          <select class="form-control" name="optian" id="optian">
                  <option value="un glasses">Sun Glasses</option>
                  <option value="eye glasses">Eye Glasses</option>
                  <option value="klip">Klip On</option>
              </select>
          </div>

          <div class="form-group">
            <label for="made" class="font-weight-bold">Made Year</label>
            <input class="form-control" name="made_year" type="text" id="made">
          </div>
          <div class="form-group">
            <label for="color" class="font-weight-bold">Color</label>
            <input class="form-control" name="color" type="text" id="color">
          </div>
          <div class="form-group">
            <label for="lens" class="font-weight-bold">Lens Diameter</label>
            <input class="form-control" name="lens" type="text" id="lens">
          </div>
          <div class="form-group">
            <label for="arm" class="font-weight-bold">Arm Length</label>
            <input class="form-control" name="arm" type="text" id="arm">
          </div>
          <div class="form-group">
            <label for="bridg" class="font-weight-bold">Bridge Size</label>
            <input class="form-control" name="bridg" type="text" id="bridg">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="cost" class="font-weight-bold">Cost</label>
            <input class="form-control" name="cost" type="text" id="cost">
          </div>
          <div class="form-group">
            <label for="ratel" class="font-weight-bold">Retail Price</label>
            <input class="form-control" name="ratel" type="text" id="ratel">
          </div>
          <div class="form-group">
            <label for="discon" class="font-weight-bold">Discount %</label>
            <input class="form-control" name="discon" type="text" id="discon">
          </div>
          <div class="form-group">
            <label for="tax" class="font-weight-bold">Tax %</label>
            <input class="form-control" name="tax" type="text" id="tax">
          </div>
          <div class="form-group">
            <label for="final" class="font-weight-bold">Final Price</label>
            <input class="form-control" name="final" type="text" id="final">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="count" class="font-weight-bold">Total Pieces</label>
            <input class="form-control" name="count" type="text" id="count">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="madein" class="font-weight-bold">Made In</label>
            <input class="form-control" name="madein" type="text" id="madein">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="descrip" class="font-weight-bold">Description</label>
        <input class="form-control" name="descrip" type="text" id="descrip">
      </div>
  </div>
</div>