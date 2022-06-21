
    <h3>Enter the details for the Project you are rolling out!</h3>
    <form method = "Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   
       <br>
       <label class = "req" for="Proj_">Name of Organization:</label>
       <input type="text" id="Proj_" name="projName" required>
       
       <label class="req" for="Company_">Address of Organization:</label> 
  
       <Textarea id="Company_" name = "pAddress" required rows="6"></Textarea>
      
       <label class="req" for="sdate_">Start Date:</label> 
       <input class = "date" type="date" id="sdate_" name="pStartDate" required >
       <label class="req" for="edate_">End Date:</label> 
       <input class = "date" type="date" id="edate_" name="pEndDate" required >
       
       <br><input class = "btn btn-primary" type="submit" name = "RegProject" value="Register Project">
       <br>
      	
   
     </form> 
     <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br>
  <input class = "btn btn-primary" type="submit" name = "cancel" value="cancel"> 
  </form> 