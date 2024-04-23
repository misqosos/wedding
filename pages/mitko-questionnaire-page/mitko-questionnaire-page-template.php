<style type="text/css">
    <?php
        include("mitko-questionnaire-page.component.css")
    ?>
</style>
<div class="frame-mitko">
    <!-- formular -->
    <div class="form-mitko">
        <form id="mitko-form">

            <div id="1" title="surname">
                <p>Ako sa volám priezviskom?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio"> 
                        <label><input type="radio" name="surname" value="Kováč"/> Kováč</label> <br>
                        <label><input type="radio" name="surname" value="Husár" /> Husár</label> <br>
                        <label><input type="radio" name="surname" value="Drotár" /> Drotár</label> <br>
                        <label><input type="radio" name="surname" value="Hronec" /> Hronec</label> <br>
                        <label><input type="radio" name="surname" value="Stolár" /> Stolár</label> 
                    </div>
                </div>
            </div>
            
            <div id="2" title="dob" style="display: none;">
                <p>Kedy som sa narodil?</p>
                <div class="form-options-date">
                    <input type="date" name="dob"/> 
                </div>
            </div>
            
            <div id="3" title="meetingPlace" style="display: none;">
                <p>Kde sme sa spoznali?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="meetingPlace" value="Bar" /> Bar</label> <br>
                        <label><input type="radio" name="meetingPlace" value="Diskotéka" /> Diskotéka</label> <br>
                        <label><input type="radio" name="meetingPlace" value="Festival" /> Festival</label> <br>
                        <label><input type="radio" name="meetingPlace" value="Zoznamka" /> Zoznamka</label> <br>
                        <label><input type="radio" name="meetingPlace" value="Škola" /> Škola</label> 
                    </div>
                </div>
            </div>
            
            <div id="4" title="age" style="display: none;">
                <p>Takže koľko to mám rokov?</p>
                <div class="form-options-date">
                    <input type="text" name="age"/> 
                </div>
            </div>
            
            <div id="5" title="hobbies" style="display: none;">
                <p>Moje obľúbené činnosti?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Chodiť pešo"/> Chodiť pešo</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Tobogány" /> Tobogány</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Snowboard" /> Snowboard</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Šport" /> Šport</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Rozprávanie" /> Rozprávanie</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Hudba" /> Hudba</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Domka" /> Domka</label>
                    </div>
                </div>
            </div>
            
            <div id="6" title="car" style="display: none;">
                <p>Na akom aute sa vozím?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="car" value="Fiat Punto" /> Fiat Punto</label> <br>
                        <label><input type="radio" name="car" value="Ferrari Enzo" /> Ferrari Enzo</label> <br>
                        <label><input type="radio" name="car" value="Ford C-Max" /> Ford C-Max</label> <br>
                        <label><input type="radio" name="car" value="Ssang-Yong Korando" /> Ssang-Yong Korando</label> 
                    </div>
                </div>
            </div>
            
            <div id="7" title="height" style="display: none;">
                <p>Aký vysoký som chlap?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="height" value="198" /> 198 cm</label> <br>
                        <label><input type="radio" name="height" value="190" /> 190 cm</label> <br>
                        <label><input type="radio" name="height" value="188" /> 188 cm</label> <br>
                        <label><input type="radio" name="height" value="193" /> 193 cm</label> 
                    </div>
                </div>
            </div>
            
            <div id="8" title="favSport" style="display: none;">
                <p>Môj obľúbený šport?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="favSport" value="Futbal" /> Futbal</label> <br>
                        <label><input type="radio" name="favSport" value="Hokej" /> Hokej</label> <br>
                        <label><input type="radio" name="favSport" value="Bicyklovanie" /> Bicyklovanie</label> <br>
                        <label><input type="radio" name="favSport" value="Tenis" /> Tenis</label> <br>
                        <label><input type="radio" name="favSport" value="Hádzaná" /> Hádzaná</label> 
                    </div>
                </div>
            </div>
            
            <div id="9" title="hasSeenParentsFirst" style="display: none;">
                <p>Stretol som ako prvý budúcich svokrovcov?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="hasSeenParentsFirst" value=1 /> Áno</label> <br>
                        <label><input type="radio" name="hasSeenParentsFirst" value=0 /> Nie</label> 
                    </div>
                </div>
            </div>
        </form>

        <!-- ($questionNumber < 9 && !$isSadMitko && !$isHappyMitko) -->
        <button class="next-button" id="next-button" onclick="nextQuestion()">
            <a>Ďalšia otázka</a>&nbsp;&nbsp;&nbsp;
            <i class="fa fa-arrow-right" style="font-size: 2vw;" aria-none="true"></i>
        </button>
        
        <!-- if($questionNumber == 9 && !$formSubmitted) -->
        <div style="display: none;" id="submit-button"><br>
            <button onclick="onSubmit()" class="submit-button">Vyhodnotiť</button>
        </div>
    </div>

    <!-- vyhodnocovacie veci -->

    <!-- if($questionNumber != $correctAnswersNum && $formSubmitted) -->
    <div class="form-mitko evaluation" style="display: none;" id="not-all-correct">
        <!-- if(!$revealedAnswers) -->
        <p>
            Gratulujem! <br><br>
            <label id="corrects-amount"></label> <br>
            <a style="font-size: 1.5vw; cursor: pointer;" onclick="revealCorrectAnswers()">
                Chcem vidieť správne odpovede
            </a>
        </p>
    </div>
        
    <!-- if($revealedAnswers) -->
    <div class="form-mitko evaluation" style="display: none;" id="correct-answers">
        <!-- foreach($correctAnswers as $key=>$value) -->
        <div style="font-size: 2vw; text-align: left;" id="correct-answers-looper"></div>
        <!--  endforeach; -->
    </div>

    <!-- if($questionNumber == $correctAnswersNum && $formSubmitted) -->
    <div class="form-mitko evaluation" style="display: none;" id="all-correct">
        Gratulujem! <br><br>
        Uhádol si všetko správne, vyhrávaš veľkú pochvalu.
    </div>

    <!-- if($isSadMitko)-->
    <div style="display: none;" id="sad-mitko">
        <img src="assets/images/sad_mitko.png" alt="sad-mitko" class="picture">
        <i class="fa fa-times icon" style="color: red;" aria-none="true"></i>
    </div>

    <!-- if($isHappyMitko) -->
    <div style="display: none;" id="happy-mitko">
        <img src="assets/images/happy_mitko.png" alt="happy-mitko" class="picture">
        <i class="fa fa-check icon" style="color: green;" aria-none="true"></i>
    </div>

    <!-- domov tlacitko -->
    <div class="home-button">
        <a href="" style="display: flex; align-items: center; color: inherit; text-decoration: none; -webkit-text-stroke-color: inherit">
            Domov&nbsp;&nbsp;<i class="fa fa-home" style="font-size: 4vw;" aria-none="true"></i>
        </a>
    </div>
</div>
