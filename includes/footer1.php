 
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
        var btn = document.getElementById('btn')
 var input_email = document.getElementById('email')
 var form = document.getElementById('form')
 console.log(btn);
  btn.addEventListener('click',function(){
    console.log('hohhdt');
     var email = document.getElementById('form2Example1').value
      
      var password = document.getElementById('form2Example2').value
      if (email != '' && password != '') {
          var ajax = new XMLHttpRequest;
          var method = 'POST';
          var url = '../auth/login1.php'
          ajax.open(method,url)
          ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded')
          ajax.onreadystatechange = function () {
              if (ajax.status == 200 && ajax.readyState ==4) {
                  btn.innerHTML = 'login'
                  console.log(ajax.responseText);
                  <?php header('..index.php')?>
                 
              }
           
          }
          btn.innerHTML = "<img id='img' src= '../loader.gif' style='width:10px; height:10px'>loading"
          ajax.send("email=" + email + "&password=" + password)
      }else{
         window.alert('please fill in all fields');
      }
  })
       </script>
       <script>
           var btn1 = document.getElementById('btn2')
           var div = document.getElementById('div')
           btn1.addEventListener('click',function(e){
            console.log('jia');
               e.preventDefault()
               div.innerHTML = "<form action='login1.php' method='POST'><div class='form-outline mb-4' style=''><input type='email' name='forget' id='form2Example2'placeholder='enter email' class='form-control in'/><button style='color:white;margin-left:-30px;margin-top:20px;' onclick=''class='float-end btn btn-primary' name='forbtn'>Send</button></div> </form>"

           })
           var 
       </script>
        
    <script src="http://localhost/myblog/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

        <!-- Core theme JS-->
        <script src="http://localhost/myblog/js/script.js"></script>
        
        <script src="http://localhost/sweetalert/sweetlalert2.min.js"></script>


    </body>
</html>
