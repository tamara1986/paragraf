 <div class="container">
     <div class="row">
         <div class="col-sm-4"></div>
         <div class="col-sm-4">
             <form>
              <h1 class="form-headline">Prijava za putno osiguranje</h1>
              <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Ime i prezime*" name="name" required> 
                <small id="nameError" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
               <input id="birthdate" placeholder="Datum rođenja*" class="form-control" name="birthday" required>
               <small id="birthdayError" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Broj pasoša*" id="passport" name="passport" required>
                <small id="passError" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <input type="text" placeholder="Telefon*" class="form-control" name="phone" id="phone" required>
                <small id="phoneError" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <input type="email" placeholder="Email*" class="form-control" name="email" id="email" required>
                <small id="emailError" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <input id="date-range" name="dates" placeholder="Unesite datum polaska i datum povratka" class="form-control" required>
                <small id="rangeError" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                    <div class="flex radio-wrap">
                        <div class="policy-choice">Odaberite vrstu polise osiguranja:</div>
                        <div class="radio-btns flex">
                            <span>Individualno<input type="radio" name="policy" value="individual" checked onclick="hideForm()"></span>
                            <span>Grupno<input type="radio" name="policy" value="group" onclick="showForm()" ></span>
                        </div>
                    </div>
              </div>
              <div id="section_users" style="display: none;">
                
              

              <div id="add_new_user">
              
                <div class="add_users">
                  <div class="form-group">
                    <input type="text" placeholder="Ime i Prezime*" class="form-control" name="name2" id="name2">
                    <small id="name2Error" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <input id="birthdate2" placeholder="Datum rođenja*" class="form-control" name="birthday2">
                    <small id="birthday2Error" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Broj pasoša*" id="passport2" class="form-control" name="passport2">
                    <small id="pass2Error" class="form-text text-muted"></small>
                  </div>
                </div>
                <div class="add-btn" id="add-btn">
                  <span class="add-btn-plus flex" onclick="saveUser()">+</span>
                  <div class="add-btn-info">Dodajte korisnike:</div>
                </div>
              </div>
              
              </div>
             
              
              <input type="button" onclick="submitForm()" class="btn btn-secondary btn-lg btn-block" value="Prihvati">
            </form>
         </div>
         <div class="col-sm-4"></div>

     </div>
 </div>