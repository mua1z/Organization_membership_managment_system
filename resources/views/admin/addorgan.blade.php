<div class="modal-body">
                <form id="add-organization-form" action="{{url('uploadorgan')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                        <label   for="organization_name"></label>
                        <input type="text" id="organization_name" name= "organization_name" placeholder="organization_name" required>
                        </div>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" id="name" placeholder="OrgAdmin name" name="name"required>
                    </div>
                    <div class="form-group">
                        <label for="plan"></label>
                        <select id="plan" name="plan" required>
                            <option value="">Select Subscription a plan</option>
                            <option value="basic">Basic</option>
                            <option value="professional">Professional</option>
                            <option value="enterprise">Enterprise</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label class="form-group" for="member"></label>
                        <input type="number" id="member" placeholder="Enter your member e.g 1000" name="member" required>
                    </div>
                    <div class="form-group">
                    <label  for="email"></label>
                        <input type="email" id="email" placeholder="Enter your email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="organization_type"></label>
                        <select id="organization_type" name="organization_type" required>
                        <option value="">Select Organization_type</option>
                            <option value="startup">Startup</option>
                            <option value="educational">Educational</option>
                            <option value="government">Government</option>
                            <option value="corporate">Corporate</option>

                        </select>
                        </div>

                    <label for="password">password :</label>
                        <input type="password" id="password" placeholder="password" name="password" required><br>


  <label for="photo">Photo:</label>
  <input type="file" id="file" name="file" placeholder="Enter your photo"  >


s

            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">Create Organization</button>
            </div>
            </form>
            </div>
