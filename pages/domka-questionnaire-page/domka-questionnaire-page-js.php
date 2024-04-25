
<?php
  include("domka-questionnaire-page-template.php")
?>

<script>
<?php
  include("service/service.js")
?>
<?php
  include("service/form-service.js")
?>
questionNumber = 1;
correctAnswersNum = 1;
hobbies = [];
arrays = ['hobbies'];
booleans = ['sentFirstMessage', 'isAllCorrect'];
dates = ['dob'];
isHappyDomka = false;
isSadDomka = false;
formSubmitted = false;
isAllCorrect = false;
revealedAnswers = false;
correctAnswers = new Map();

form = {
  id : null,
  surname : null,
  dob : null,
  email : null,
  age : null,
  hobbies : null,
  hairColor : null,
  height : null,
  favColor : null,
  sentFirstMessage : null,
  isAllCorrect : null
};

function onSubmit() {
  const questionName = document.getElementById(this.questionNumber.toString()).title;
  const templateFormData = getTemplateFormData('domka-form', this.form, questionName);
  this.compareDomka(templateFormData, questionName);

  setElementVisibility(this.questionNumber.toString(), false);
  setElementVisibility('submit-button', false);

  this.postDomka(templateFormData)

  if (this.questionNumber == this.correctAnswersNum) {
    this.setElementVisibility('all-correct', true)
    return;
  }
  this.correctAnswersNum--
  document.getElementById('corrects-amount').innerHTML = 'Uhádol si '+ this.correctAnswersNum +' / '+ this.questionNumber +' odpovedí.'
  this.setElementVisibility('not-all-correct', true)
}

function nextQuestion() {
  const questionName = document.getElementById(this.questionNumber.toString()).title;

  const templateFormData = getTemplateFormData('domka-form', this.form, questionName);
  if (templateFormData.dob && dates.includes(questionName)) {
    templateFormData.dob = formatDate(templateFormData.dob.reverse().join("-"), true, true);
  }
  console.log(templateFormData.dob)

  this.compareDomka(templateFormData, questionName);
  
  setElementVisibility('next-button', false);
  setTimeout(() => {
    setElementVisibility(this.questionNumber.toString(), false);
    this.questionNumber++;
    setElementVisibility(this.questionNumber.toString(), true);
    if (this.questionNumber < 9) {
      setElementVisibility('next-button', true, 'flex');
    } else { setElementVisibility('submit-button', true); }
  }, 1000);
}

function addToArray(event, formControlName) {
  if (event.target.checked) {
    if (!this[formControlName].includes(event.target.value)) {
      this[formControlName].push(event.target.value);
    }
  }
  if (!event.target.checked) {
    this[formControlName].splice(this[formControlName].indexOf(event.target.value), 1);
  }
  this.form[formControlName] = this[formControlName];
}

function areEqualArrays(a, b) {
  if (a.length !== b.length) return false;
  const elements = new Set([...a, ...b]);
  for (const x of elements) {
    const count1 = a.filter(e => e === x).length;
    const count2 = b.filter(e => e === x).length;
    if (count1 !== count2) return false;
  }
  return true;
}

function compareObjects(referenceObj, comparingObj, questionName) {
  if (referenceObj) {
    // pre arrays
    if (this.arrays.includes(questionName)) {
      comparingObj[questionName] = this[questionName];
      if (this.areEqualArrays(comparingObj[questionName], JSON.parse(referenceObj[questionName].toString()))) {
        this.showImage('happy-domka');
        this.correctAnswersNum++;
      } else {
        this.showImage('sad-domka');
      }
    }
    // pre ostatne
    if (comparingObj[questionName] == referenceObj[questionName]) {
      this.showImage('happy-domka');
      this.correctAnswersNum++;
    } else {
      if (!this.arrays?.includes(questionName)) {
        this.showImage('sad-domka');
      }
    }
  } else {
    console.log('Referencna Domka nie je v databaze.');
  }

  this.mapCorrectDomka(this.questionNumber, questionName);
}

function compareDomka(comparingObj, questionName) {
  this.getCorrectDomka().then((correctDomka) => {
    if (correctDomka) {
      this.compareObjects(correctDomka, comparingObj, questionName);
    } else {
      console.log('Referencna Domka nie je v databaze.');
    }
  })
}

function mapCorrectDomka(questionNumber, questionName) {
  this.getCorrectDomka().then((correctDomka) => {
    if (correctDomka) {
      if (this.dates?.concat(this.booleans, this.arrays).includes(questionName)) {
        if (this.arrays?.includes(questionName)) {
          let convertedArray = JSON.parse(correctDomka[questionName]);
          this.correctAnswers.set(questionNumber, convertedArray.concat());
        }
        if (this.dates?.includes(questionName)) {
          let date = this.formatDate(correctDomka[questionName], true);
          this.correctAnswers.set(questionNumber, date);
        }
        if (this.booleans?.includes(questionName)) {
          let convertedBoolean = Boolean(Number(correctDomka[questionName])) == true ? "Áno" : "Nie";
          this.correctAnswers.set(questionNumber, convertedBoolean);
        }
      } else {
        this.correctAnswers.set(questionNumber, correctDomka[questionName]);
      }
    } else {
      console.log('Referencna Domka nie je v databaze.');
    }
  })  
}

function showImage(elementId) {
  setElementVisibility(elementId, true)
  setTimeout(() => {
    setElementVisibility(elementId, false)
  }, 1000);
}

function revealCorrectAnswers() {
  setElementVisibility('not-all-correct', false)
  setElementVisibility('correct-answers', true)
  showCorrectAnswers();
}

function setElementVisibility(elementId, display = true, displayStyle = 'block'){
  if (!display) {
    document.getElementById(elementId).style.display = 'none';
    return;
  }
  document.getElementById(elementId).style.display = displayStyle;
}

function showCorrectAnswers(){
  var wrapper = document.getElementById("correct-answers-looper");
  var myHTML = '';

  for (let [key, value] of this.correctAnswers) {
    myHTML += 'Otázka č. '+key+'. : <b>'+value+'</b><br>'
  }
  wrapper.innerHTML = myHTML;
}

</script>