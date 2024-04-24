
<style type="text/css">
    <?php
        include("names-header.component.css")
    ?>
</style>
<div class="title-names-header" id="slide-names-header" onclick="slideDownHeader()">
    <div class="menu-wrapper-names-header" id="menu">
        <li><p style="font-size: 2.5vh;">Menu</p></li>
        <li><a href="">Náš príbeh</a></li>
        <li><a href="">Čo budem piť?</a></li>
        <li><a href="">Ako sa tam dostanem?</a></li>
        <li><a href="">Chcem spať?</a></li>
    </div>
    <p>Domka & Michal</p>
</div>

<script>
    makeAnimation();
    function makeAnimation(){
        if (sessionStorage.getItem("animationMade")) { 
            document.getElementById('menu').style.animationName = 'none';
            document.getElementById('menu').style.animationDuration = 'none';
            return; 
        }
        document.getElementById('menu').style.animationName = 'header-slide';
        document.getElementById('menu').style.animationDuration = '6s';
        sessionStorage.setItem("animationMade", true);
    }

    function slideDownHeader(){
        if(document.getElementById('menu').style.height == 0) { 
            document.getElementById('menu').style.height = '16vh';
        } else { document.getElementById('menu').style.height = 0; }
    }
</script>