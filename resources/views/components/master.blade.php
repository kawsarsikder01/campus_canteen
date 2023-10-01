<!DOCTYPE html>
<html lang="en">
  <x-partial.head/>
<body>

  <x-partial.header/>

{{$slot}}


{{-- <x-partial.footer/> --}}
   <script src="{{asset('assets/assets/js/shopping_cart.js')}}"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   {{-- <script src="{{asset('assets/assets/js/add_product.js')}}"></script> --}}
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
      (function (window, document) {
          var loader = function () {
              var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
              script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
              tag.parentNode.insertBefore(script, tag);
          };
  
          window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
      })(window, document);
  </script>
</body>
</html>