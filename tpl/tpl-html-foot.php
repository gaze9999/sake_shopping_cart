<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="./dist/js/fontawesome-all.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
// click to scroll top
$('.move-up span').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 1000)
})

// AOS Instance
$(document).ready(function(){
    AOS.init()
})
</script>
<!-- <script src="./src/js/AosInclude.js"></script> -->
<script src="./src/js/variables/navbar.js"></script>
<script src="./src/js/navbarFilter.js"></script>
<script src="./src/js/variables/globalVar.js"></script>
<script src="./src/js/functions/globalFunc.js"></script>
<script src="./src/js/globalBtn.js"></script>
</body>
</html>