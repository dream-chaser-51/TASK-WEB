<!DOCTYPE html>
<html>
<body>

<h2>User Form</h2>

<form id ="userform" name="userform" action="insert.php" method="post" enctype="multipart/form-data" >
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
  <input type="text" id="uphone" name="uphone" value=""><br>
  <span id='uphone_error_msg'></span><br>

  <label for="Address">Address:</label><br>
  <input type="text" id="uaddress" name="uaddress" value=""><br>
  <span id='uaddress_error_msg'></span><br>

  <label><input type="checkbox" name="uagree"> I Agree </label><br>
  <span id='uagree_error_msg'></span><br><br>

  <input type="submit" name="submit" value="Submit">
  <span id='success_msg'></span><br>
</form>

<!-- Include Scripts Starts Here-->
<!-- Ajax-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Include Scripts End Here-->

<script type = "text/javascript">

// SELECTING ALL ERROR DISPLAY
var name_error = document.getElementById('uname_error_msg');
var age_error = document.getElementById('uage_error_msg');
var email_error = document.getElementById('uemail_error_msg');
var phone_error = document.getElementById('uphone_error_msg');
var address_error = document.getElementById('uaddress_error_msg');
var agree_error = document.getElementById('uagree_error_msg');

//Client Side Validation Start Here
function validate()
{
    // SELECTING ALL FORM ELEMENT
    var userName=document.forms["userform"]["uname"].value;
    var userAge=document.forms["userform"]["uage"].value;
    var userEmail=document.forms["userform"]["uemail"].value;
    var userPhone=document.forms["userform"]["uphone"].value;
    var userAddress=document.forms["userform"]["uaddress"].value;

    //SET ISVALID AS DEFAULT TRUE
    var isValid = true;

    //Check User name value as empty or null check
    if(userName==null || userName=="")
    {
        name_error.style.color = "red";
        name_error.style.visibility="visible";
        name_error.textContent = "Please Enter valid Name";
        isValid =  false;
    }
    else
    {
        name_error.style.visibility="hidden";
    }

    //Check User Age value as empty or null check
    if(userAge==null || userAge=="" || userAge.length > 3)
    {
        age_error.style.color = "red";
        age_error.style.visibility="visible";
        age_error.textContent = "Please Enter valid Age";
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
        email_error.textContent = "Please Enter valid Email Address";
        isValid =  false;
    }

    //Check User Phone value as empty or null check
    if(userPhone==null || userPhone=="" || userPhone.length != 10)
    {
        if(userPhone.length != 10 && userPhone !="")
        {
            phone_error.textContent = "Phone number should be on 10 digits ";
        }
        else
        {
            phone_error.textContent = "Please Enter valid Phone Number";
        }
        phone_error.style.color = "red";
        phone_error.style.visibility="visible";
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
        address_error.textContent = "Please Enter valid Address";
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
        agree_error.textContent = "User must be Agree the Term Of Condition";
        isValid =  false;
    }
    else
    {
        agree_error.style.visibility="hidden";
    }
    return isValid;
}

//Validate the email format on blur
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
            return false;
        }
        else
        {
            email_error.textContent = "";
            return true;
        }
    }
});
//Client Side Validation End  Here

//userform On submit Ajax Call Start
$(document).ready(function () {
    $('#userform').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: form.serialize(),
            beforeSend : function ()
            {
                //Call the client side validation function in before ajax success
                var isvalid = validate();
                if(isvalid === false)
                {
                    return false;
                }
            },
            success: function(response)
            {
                $('#success_msg').html(response).fadeIn('slow');
                if(response == "User Deatils Saved Successfully")
                {
                    $("#userform")[0].reset();
                    email_error.textContent = '';
                }
            },
            error: function (data) 
            {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
});
//userform On submit Ajax Call End
</script>
</body>
</html>
