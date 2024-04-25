<style type="text/css">
    <?php
        include("domka-questionnaire-page.component.css")
    ?>
</style>
<div class="frame-domka">
    <!-- formular -->
    <div class="form-domka">
        <form id="domka-form">

            <div id="1" title="surname">
                <p>Ako sa volám priezviskom?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="surname" value="Kováčová"/> Kováčová</label> <br>
                        <label><input type="radio" name="surname" value="Fidorková" /> Fidorková</label> <br>
                        <label><input type="radio" name="surname" value="Kaštanová" /> Kaštanová</label> <br>
                        <label><input type="radio" name="surname" value="Fedorková" /> Fedorková</label> <br>
                        <label><input type="radio" name="surname" value="Stolárová" /> Stolárová</label> 
                    </div>
                </div>
            </div>
            
            <div id="2" title="dob" style="display: none;">
                <p>Kedy som sa narodila?</p> 
                <div class="form-options-date">
                    <input id="day" type="text" class="text-dob" name="dob" maxlength="2" placeholder="Deň"/> . 
                    <input id="month" type="text" class="text-dob" name="dob" maxlength="2" placeholder="Mesiac"/> . 
                    <input id="year" type="text" class="text-dob" name="dob" maxlength="4" placeholder="Rok"/> 
                </div>
            </div>
            
            <div id="3" title="email" style="display: none;">
                <p>Kam mi môžeš napísať e-mailík?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="email" value="domkasponka@gmail.com" /> domkasponka&#64;gmail.com</label> <br>
                        <label><input type="radio" name="email" value="fedorkova487@zoznam.sk" /> fedorkova487&#64;zoznam.sk</label> <br>
                        <label><input type="radio" name="email" value="dominika.fedorkova1@gmail.com" /> dominika.fedorkova1&#64;gmail.com</label> <br>
                        <label><input type="radio" name="email" value="dominicQa19@azet.sk" /> dominicQa19&#64;azet.sk</label> <br>
                        <label><input type="radio" name="email" value="maledievcatko@centrum.sk" /> maledievcatko&#64;centrum.sk</label> 
                    </div>
                </div>
            </div>
            
            <div id="4" title="age" style="display: none;">
                <p>Takže koľko to mám rokov?</p>
                <div class="form-options-date">
                    <input type="text-age" name="age"/> 
                </div>
            </div>
            
            <div id="5" title="hobbies" style="display: none;">
                <p>Moje obľúbené činnosti?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Pečenie"/> Pečenie</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Tobogány" /> Tobogány</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Snowboard" /> Snowboard</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Túry" /> Túry</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Rozprávanie" /> Rozprávanie</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Chodenie po obchodoch" /> Chodenie po obchodoch</label> <br>
                        <label><input type="checkbox" name="hobbies" onchange="addToArray(event, 'hobbies')" value="Mitko" /> Mitko</label>
                    </div>
                </div>
            </div>
            
            <div id="6" title="hairColor" style="display: none;">
                <p>Farba mojich nádherných vláskov?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="hairColor" value="Blond" /> Blond</label> <br>
                        <label><input type="radio" name="hairColor" value="Hnedá" /> Hnedá</label> <br>
                        <label><input type="radio" name="hairColor" value="Čierna" /> Čierna</label> <br>
                        <label><input type="radio" name="hairColor" value="Červená" /> Červená</label> 
                    </div>
                </div>
            </div>
            
            <div id="7" title="height" style="display: none;">
                <p>Aký vysoký som krpec?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="height" value="158" /> 158 cm</label> <br>
                        <label><input type="radio" name="height" value="150" /> 150 cm</label> <br>
                        <label><input type="radio" name="height" value="168" /> 168 cm</label> <br>
                        <label><input type="radio" name="height" value="163" /> 163 cm</label> 
                    </div>
                </div>
            </div>
            
            <div id="8" title="favColor" style="display: none;">
                <p>Moja obľúbená farba?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="favColor" value="Hnedá" /> Hnedá</label> <br>
                        <label><input type="radio" name="favColor" value="Ružová" /> Ružová</label> <br>
                        <label><input type="radio" name="favColor" value="Čierna" /> Čierna</label> <br>
                        <label><input type="radio" name="favColor" value="Žltá" /> Žltá</label> <br>
                        <label><input type="radio" name="favColor" value="Červená" /> Červená</label> 
                    </div>
                </div>
            </div>
            
            <div id="9" title="sentFirstMessage" style="display: none;">
                <p>Napísala som môjmu milému<br> ako prvá?</p>
                <div style="display: flex; justify-content: center;">
                    <div class="form-options-radio">
                        <label><input type="radio" name="sentFirstMessage" value=1 /> Áno</label> <br>
                        <label><input type="radio" name="sentFirstMessage" value=0 /> Nie</label> 
                    </div>
                </div>
            </div>
        </form>

        <!-- ($questionNumber < 9 && !$isSadDomka && !$isHappyDomka) -->
        <button class="next-button" id="next-button" onclick="nextQuestion()">
            <a>Ďalšia otázka</a>&nbsp;&nbsp;&nbsp;
            <i class="fa fa-arrow-right" style="font-size: 3vw;" aria-none="true"></i>
        </button>
        
        <!-- if($questionNumber == 9 && !$formSubmitted) -->
        <div style="display: none;" id="submit-button"><br>
            <button onclick="onSubmit()" class="submit-button">Vyhodnotiť</button>
        </div>
    </div>

    <!-- vyhodnocovacie veci -->

    <!-- if($questionNumber != $correctAnswersNum && $formSubmitted) -->
    <div class="form-domka evaluation" style="display: none;" id="not-all-correct">
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
    <div class="form-domka evaluation" style="display: none;" id="correct-answers">
        <!-- foreach($correctAnswers as $key=>$value) -->
        <div style="font-size: 2vw; text-align: left;" id="correct-answers-looper"></div>
        <!--  endforeach; -->
    </div>

    <!-- if($questionNumber == $correctAnswersNum && $formSubmitted) -->
    <div class="form-domka evaluation" style="display: none;" id="all-correct">
        Gratulujem! <br><br>
        Uhádol si všetko správne, vyhrávaš veľkú pochvalu.
    </div>

    <!-- if($isSadDomka)-->
    <div style="display: none;" id="sad-domka">
        <img src="assets/images/sad_domka.png" alt="sad-domka" class="picture">
        <i class="fa fa-times icon" style="color: red;" aria-none="true"></i>
    </div>

    <!-- if($isHappyDomka) -->
    <div style="display: none;" id="happy-domka">
        <img src="assets/images/happy_domka.png" alt="happy-domka" class="picture">
        <i class="fa fa-check icon" style="color: green;" aria-none="true"></i>
    </div>

    <!-- domov tlacitko -->
    <div class="home-button">
        <a href="" style="display: flex; align-items: center; color: inherit; text-decoration: none; -webkit-text-stroke-color: inherit">
            Domov&nbsp;&nbsp;<i class="fa fa-home" style="font-size: 4vw;" aria-none="true"></i>
        </a>
    </div>
</div>
