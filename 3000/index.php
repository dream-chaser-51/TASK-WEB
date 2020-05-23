<!DOCTYPE html>
<html>
<body>

<h2>User Form</h2>

<form id ="userform" name="userform" action="" method="post" enctype="multipart/form-data" onsubmit = "return(validate())">
  <label for="Name">Name:</label><br>
  <input type="text" id="uname" name="uname" value=""><br>
  <span id='uname_error_msg'></span><br>

  <label for="Age">Age:</label><br>
  <input type="number" id="uage" name="uage" value=""><br>
  <span id='uage_error_msg'></span><br>

  <label for="Email">Email:</label><br>
  <input type="text" id="uemail" name="uemail" value=""><br>
  <span id='uemail_error_msg'></span><br>

  <label for="Phone Number">Phone Number:</label><br>
  <input type="text" pattern="^[6-9]{1}[0-9]{9}$" id="uphone" name="uphone" value=""><br>
  <span id='uphone_error_msg'></span><br>

  <label for="Address">Address:</label><br>
  <input type="text" id="uaddress" name="uaddress" value=""><br>
  <span id='uaddress_error_msg'></span><br>

  <label><input type="checkbox" name="uagree" value="0"> I Agree </label><br>
  <span id='uagree_error_msg'></span><br><br>

  <input type="submit" name="submit" value="Submit"> 
  <span id='success_msg'></span><br>
</form>

<script type = "text/javascript">

// SELECTING ALL ERROR DISPLAY
var name_error = document.getElementById('uname_error_msg');
var age_error = document.getElementById('uage_error_msg');
var email_error = document.getElementById('uemail_error_msg');
var phone_error = document.getElementById('uphone_error_msg');
var address_error = document.getElementById('uaddress_error_msg');
var agree_error = document.getElementById('uagree_error_msg');

//SET ISVALID AS DEFAULT TRUE
var isValid = true;

function validate()
{
    // SELECTING ALL FORM ELEMENT
    var userName=document.forms["userform"]["uname"].value;
    var userAge=document.forms["userform"]["uage"].value;
    var userEmail=document.forms["userform"]["uemail"].value;
    var userPhone=document.forms["userform"]["uphone"].value;
    var userAddress=document.forms["userform"]["uaddress"].value;

    //Check User name value as empty or null check
    if(userName==null || userName=="")
    {
        name_error.style.color = "red";
        name_error.style.visibility="visible";
        name_error.textContent = "User Name must not be blank";
        isValid =  false;
    }
    else
    {
        name_error.style.visibility="hidden";
    }

    //Check User Age value as empty or null check
    if(userAge==null || userAge=="")
    {
        age_error.style.color = "red";
        age_error.style.visibility="visible";
        age_error.textContent = "User Age must not be blank";
        isValid =  false;
    }
    else
    {
        age_error.style.visibility="hidden";
    }

    //Check User Email value as empty or null check
    if(userEmail==null || userEmail=="")
    {
        email_error.style.color = "red";
        email_error.style.visibility="visible";
        email_error.textContent = "User Email must not be blank";
        isValid =  false;
    }

    //Check User Phone value as empty or null check
    if(userPhone==null || userPhone=="")
    {
        phone_error.style.color = "red";
        phone_error.style.visibility="visible";
        phone_error.textContent = "User Phone Number must not be blank";
        isValid =  false;
    }
    else
    {
        phone_error.style.visibility="hidden";

    }

    //Check User Address value as empty or null check
    if(userAddress==null || userAddress=="")
    {
        address_error.style.color = "red";
        address_error.style.visibility="visible";
        address_error.textContent = "User Address must not be blank";
        isValid =  false;
    }
    else
    {
        address_error.style.visibility="hidden";
    }

    //Check the agree checkbox is not checked return the error
    if(!userform.uagree.checked) 
    {
        agree_error.style.color = "red";
        agree_error.style.visibility="visible";
        agree_error.textContent = "User must be Agree the Condition";
        isValid =  false;
    }

    return isValid;
}


var userEmailAddress = document.getElementById('uemail');
userEmailAddress.addEventListener('blur', function() 
{
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (userEmailAddress.value != '') 
    {
        if(reg.test(userEmailAddress.value) == false)
        {
            email_error.style.color = "red";
            email_error.textContent = "Invalid EMail Address";
            isValid = false;
        }
        else
        {   
            email_error.textContent = "Valid Email";
            
        }
        return isValid;
    }
});

</script>

</body>
</html>
 