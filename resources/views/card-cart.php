<div id = "phips"></div>

<script
			  src="https://code.jquery.com/jquery-3.3.0.min.js"
			  integrity="sha256-RTQy8VOmNlT6b2PIRur37p6JEBZUE7o8wPgMvu18MC4="
              crossorigin="anonymous"></script>

<script>
console.log("giant")
      $.ajax({
        type: 'GET',
        url: '/cart',
        success: function (data) {
            console.log(data);
            $("#phips").html = data;
            }
        });
    </script>
