 
        </div>
    <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
       <script>

//         document.getElementById('btn2').addEventListener('click',function(e){
//     e.preventDefault()
//     var email = prompt('input email');
//     if (!email == '') {
//         var ajax = new XMLHttpRequest
//     var method = 'POST';
//     var url = '../auth/forget.php';
//     ajax.open(method,url)
//     ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded')
//     ajax.onreadystatechange = function(){
//         if(ajax.status == 200 && ajax.readyState == 4){
//             console.log(ajax.responseText)
//             var parent_div = document.getElementById('div');
//             // parent_div.innerHTML = '<div class="otp-container"><h2>Enter OTP</h2><div class="otp-inputs"><input type="text" maxlength="" onchange="moveFocus(event, 0)" /><input type="text" maxlength="1" oninput="moveFocus(event, 1)" /><input type="text" maxlength="1" oninput="moveFocus(event, 2)" /><input type="text" maxlength="1" oninput="moveFocus(event, 3)" /><input type="text" maxlength="1" oninput="moveFocus(event, 4)" /><input type="text" maxlength="1" oninput="moveFocus(event, 5)" /></div><button class="submit-btn" onclick="submitOTP()">Submit</button></div>'
//         }
//     }
//     ajax.send('forgot='+email)
//     }
    

// //   })
var btn = document.getElementById('btn')

var logusername = document.getElementById('form2Example0')
var logPassword = document.getElementById('form2Example2')
var alert = document.getElementById('alert')
var forget = document.getElementById('forget')
var form = document.getElementById('form')
console.log(btn);
 function login(e,type){
    e.preventDefault()
    console.log('clickd');
    var email = document.getElementById('form2Example1').value;
var username = document.getElementById('form2Example0').value

     console.log(email);
     var password = document.getElementById('form2Example2').value
     if (email != '' && password != '') {
         var ajax = new XMLHttpRequest
         var method = 'POST'
         var url = 'forget.php'
         ajax.open(method,url)
         ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded')
         ajax.onreadystatechange = function () {
             if (ajax.status == 200 && ajax.readyState ==4) {
                let response = ajax.responseText;
                alert.style.display='block'
                 if (response=='login successful') {
                    alert.innerHTML = 'login successful'
                    setTimeout(() => {
                    window.location.href='../index.php'      
                    }, 300);
                 }else if(response=="<div class='alert alert-danger text-center' role='alert'> your password is not correct </div>"){
                    btn.innerHTML = 'submit'
                    logPassword.value = ''
                    alert.innerHTML = 'your password is not correct'
                 }else if(response=="<div class='alert alert-danger text-center' role='alert'>Account not available!. Check email spelling or register an account</div>"){
                    btn.innerHTML = 'submit'
                    logPassword.value = ''
                    alert.innerHTML = 'Account not available!. Check email spelling or register an account'
                 }else if(response=='registered success'){
                    alert.innerHTML = 'Account Registered successfully'
                    setTimeout(() => {
                    window.location.href='../index.php'      
                    }, 300);
                 }
                 console.log(ajax);
                  console.log(ajax.response.trim());
             }
           
         }
         btn.innerHTML = "<img id='img' src= 'loader.gif' style='width:10px; height:10px'>loading";
         if (type=='register') {
         ajax.send("register="+'register'+"&email=" + email + "&password=" + password+"&username="+username)
            
         } else {
         ajax.send("submit="+'submit'+"&email=" + email + "&password=" + password)
            
         }
     }else{
        alert('please fill in all fields');
     }
 }
       </script>
       <script>
        if(window.location.pathname == "/myblog/auth/login.php"){
            window.onLoad = scrollTo(
                {
                    bottom:0,
                    behaviour:'smooth'
                }
            )
        
        }
           var btnt = document.getElementById('btn2')
           var div = document.getElementById('div')
           btnt.addEventListener('click',function(e){
            console.log('jia');
               e.preventDefault()
               div.innerHTML = "<form action='forget.php' method='POST'><div class='form-outline mb-4' style=''><input type='email' name='forget' id='form2Example2'placeholder='enter email' class='form-control in'/><button style='color:white;margin-left:-30px;margin-top:20px;' onclick='login(event)'class='float-end btn btn-primary' name='forbtn' id='forget'>Send</button></div> </form>"

           })
          
  document.addEventListener('DOMContentLoaded',function(){
    var password = document.getElementsByClassName('fas')[1];
console.log(
    password
);
var input = document.getElementsByClassName('in')[0]
password.addEventListener('click',function(){
        console.log('jo');
        if (password.className =='fas fa-eye-slash') {
            password.className = 'fas fa-eye';
            input.type = 'password'

        }else{
            password.className = 'fas fa-eye-slash'
            input.type = 'text'
        }
    })
      
  })
  

       </script>
        
    <script src="http://localhost/myblog/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

        <!-- Core theme JS-->
        <script src="http://localhost/myblog/js/script.js"></script>
        <script src="../auth/login.js"></script>
        <script src="http://localhost/sweetalert/sweetlalert2.min.js"></script>


    </body>
</html>
