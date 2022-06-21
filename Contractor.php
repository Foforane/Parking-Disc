
    <h3>Enter the details of the Contractor!</h3>
    <form method = "Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   
       <br>
       <label class = "req" for="ID_">ID Number:</label>
       <input type="text" id="ID_" name="cID" required>
       
       <label class="req" for="fName_">First Name:</label> 
       <input type="text" id="fName_" name="fName"  required>
       <label class="req" for="lName_">Last Name:</label> 
       <input type="text" id="lName_" name="lName"  required>
       <label class="req" for="PhoneNo_">Phone Number:</label>  
       <input type="text" id="PhoneNo_" name="PhoneNumber"  required>
        
      
       
       <br><input class = "btn btn-primary" type="submit" name = "RegContractor" value="Register Contractor">
       <br>
      	
   
     </form> 
     <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br>
  <input class = "btn btn-primary" type="submit" name = "cancel" value="cancel"> 
  </form> 