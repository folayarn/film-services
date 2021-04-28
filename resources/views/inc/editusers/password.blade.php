<div class="card">
    <div class="card-header">
        Change Password
    </div>
    <div class="card-body">
        <form action="{{url('update_password/'.$user->id) }}" method="POST" >

        @csrf
            <div class="form-group">
<label class="label-control">
                              Old Password </label>
                <input type="password" class="form-control" id="old"

                name="old"
                 required>
              </div>


               <div class="form-group">
               <label class="label-control">
                              New PassWord </label>
                <input type="password" class="form-control" id="password"
                name="password"
                 required>
              </div>
              <div class="form-group">
                <label class="label-control">Confirm PassWord </label>
                 <input type="password" class="form-control" id="confirm_password"
                 name="confirm_password"
                  required>
               </div>


              <div class="form-group">

                <button class="btn btn-outline-success">Change Password</button>
              </div>

        </form>

    </div>
