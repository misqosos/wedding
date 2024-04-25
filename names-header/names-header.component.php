
<style type="text/css">
    <?php
        include("names-header.component.css")
    ?>
</style>
<div class="title-names-header" id="slide-names-header">
    <div class="menu-wrapper-names-header" id="menu">
        <p style="font-size: 2.5vw;">Menu</p>
        <li>
            <label class="option-decor">&#9825;&nbsp;
                <a href="">Náš príbeh</a>
            &nbsp;&#9825;</label>
        </li>
        <li>
            <label class="option-decor">&#9825;&nbsp;
                <a href="">Čo budem piť?</a>
            &nbsp;&#9825;</label>
        </li>
        <li>
            <label class="option-decor">&#9825;&nbsp;
                <a href="">Ako sa tam dostanem?</a>
            &nbsp;&#9825;</label>
        </li>
        <li>
            <label class="option-decor">&#9825;&nbsp;
                <a href="">Chcem spať?</a>
            &nbsp;&#9825;</label>
        </li>
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
        document.getElementById('menu').style.animationDuration = '2s';
        
        setTimeout(() => {
            sessionStorage.setItem("animationMade", true);
        }, 2000);
    }
</script>