
<div class="card">
    <div class="card-header">
        Add Films
    </div>
    <div class="card-body">
        <form action="{{route('admin.film') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
<label class="label-control">
                              Title </label>
                <input type="text" class="form-control" id="title"
                name="title"
                placeholder="Film Title" required>
              </div>
              <div class="form-group">
                        <label class="label-control">
                              Film Genre<span style="color: red">*</span> </label>
                        <select class="form-control" id='ques_drop' multiple name="data[]" required>
                        <option>You can select multiple</option>
                  </select>
                        </div>
 <div class="form-group">
<label class="label-control">
                              Film Length </label>
                <input type="text" class="form-control" id="length"
                name="length"
                placeholder="Film length" required>
              </div>
               <div class="form-group">
<label class="label-control">
                              Release Year </label>
                <input type="date" class="form-control" id="year"
                name="year"
                placeholder="Release Year" required>
              </div>
               <div class="form-group">
<label class="label-control">
                              Image Cover </label>
                <input type="file" class="form-control" id="image"
                name="image"  required>
              </div>
              <div class="form-group">
                <label class="label-control">
                                              Price </label>
                                <input type="number" class="form-control" id="price"
                                name="price" required>
                              </div>
               <div class="form-group">
                        <label class="label-control">
                              The Director </label>
                        <select class="form-control" id='ques_drop2' name="director" required>
                        <option>Choose</option>
                  </select>
                        </div>

              <div class="form-group">

                <button class="btn btn-outline-success">Save</button>
              </div>

        </form>

    </div>



</div>


