<div class="card">
    <div class="card-header">
        Edit Details
    </div>
    <div class="card-body">
        <form action="{{url('update_user/'.$user->id) }}" method="POST" >

        @csrf
            <div class="form-group">
<label class="label-control">
                              Full Name </label>
                <input type="text" class="form-control" id="name"
                value="{{ $user->name }}"
                name="name"
                placeholder="Full Name" required>
              </div>


               <div class="form-group">
<label class="label-control">
                              Date of Birth </label>
                <input type="date" class="form-control" id="dob"
                name="dob" value="{{ $user->dob }}"
                 >
              </div>
              <div class="form-group">
                <label class="label-control">
                                              Email </label>
                                <input type="email" class="form-control" id="email"
                                name="email" value="{{ $user->email }}"
                                disabled>
                              </div>
              <div class="form-group">

                <button class="btn btn-outline-success send_btn3">Save</button>
              </div>

        </form>

    </div>
