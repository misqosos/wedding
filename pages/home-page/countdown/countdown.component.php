
<style type="text/css">
  <?php
    include("countdown.component.css")
  ?>
</style>

<?php
  include("countdown.component.html")
?>

<script>
  <?php include("service/service.js") ?>
  
  weddingDate = new Date('2024-08-17T15:00:00');
  document.getElementById('weddingDate').innerHTML += this.formatDate(this.weddingDate);
  now = new Date();

  nextMonthCountdown = 
  (this.weddingDate.getDate() > this.now.getDate() && 
  this.weddingDate.getMonth() > this.now.getMonth()) || 
  (this.now.getMonth() == this.weddingDate.getMonth()) || 
  (this.weddingDate.getDate() - this.now.getDate() >= 0 && 
  (this.now.getHours() <= this.weddingDate.getHours() || 
  this.weddingDate.getHours() == 0) && 
  (this.now.getMinutes() < this.weddingDate.getMinutes() || 
  this.weddingDate.getMinutes() == 0)) ? 
  new Date(this.now.getFullYear(), this.now.getMonth(), this.weddingDate.getDate(), this.weddingDate.getHours(), this.weddingDate.getMinutes(), this.weddingDate.getSeconds(), this.weddingDate.getMilliseconds()) :
  (this.weddingDate.getDate() >= this.now.getDate() ?
  new Date(this.now.getFullYear(), this.now.getMonth() + 1, this.weddingDate.getDate(), this.weddingDate.getHours(), this.weddingDate.getMinutes(), this.weddingDate.getSeconds(), this.weddingDate.getMilliseconds()) :
  new Date(this.now.getFullYear(), this.now.getMonth() + 1, this.weddingDate.getDate(), this.weddingDate.getHours()+1, this.weddingDate.getMinutes(), this.weddingDate.getSeconds(), this.weddingDate.getMilliseconds()));

  monthsLeft = this.weddingDate.getMonth() - this.nextMonthCountdown.getMonth();
  daysLeft;
  hoursLeft;
  minutesLeft;
  secondsLeft;

  function countdown() {
    setInterval(() => {
      var now = new Date()
      if(
        now.getDate() == this.weddingDate.getDate() &&
        now.getHours() == this.weddingDate.getHours() &&
        now.getMinutes() == this.weddingDate.getMinutes() &&
        now.getSeconds() == this.weddingDate.getSeconds()) 
      {
        this.nextMonthCountdown = new Date(this.now.getFullYear(), this.now.getMonth() + 1, this.weddingDate.getDate(), this.weddingDate.getHours()+1, this.weddingDate.getMinutes(), this.weddingDate.getSeconds(), this.weddingDate.getMilliseconds())
        this.monthsLeft -= 1;
        console.log('dalsi mesiac',this.nextMonthCountdown)
      }

      var timeBetweenMonths = (this.nextMonthCountdown.getTime() - now.getTime()) / 1000;
      
      var daysLeft = (timeBetweenMonths/60/60/24) 
      this.daysLeft = Math.trunc(daysLeft);
      var hoursLeft = (daysLeft%1)*(24)
      this.hoursLeft = Math.trunc(hoursLeft);
      var minutesLeft = (hoursLeft%1)*60
      this.minutesLeft = Math.trunc(minutesLeft);
      var secondsLeft = (minutesLeft%1)*60
      this.secondsLeft = Math.trunc(secondsLeft);

      document.getElementById('monthsLeft').innerHTML = this.monthsLeft;
      document.getElementById('daysLeft').innerHTML = this.daysLeft;
      document.getElementById('hoursLeft').innerHTML = this.hoursLeft;
      document.getElementById('minutesLeft').innerHTML = this.minutesLeft;
      document.getElementById('secondsLeft').innerHTML = this.secondsLeft;

      document.getElementById('monthsLeftDescription').innerHTML = this.monthsLeft == 1 ? "Mesiac" : (this.monthsLeft > 1 && this.monthsLeft < 5 ? "Mesiace" : "Mesiacov");
      document.getElementById('daysLeftDescription').innerHTML = this.daysLeft == 1 ? "Deň" : (this.daysLeft > 1 && this.daysLeft < 5 ? "Dni" : "Dní");
      document.getElementById('hoursLeftDescription').innerHTML = this.hoursLeft == 1 ? "Hodina" : (this.hoursLeft > 1 && this.hoursLeft < 5 ? "Hodiny" : "Hodín");
      document.getElementById('minutesLeftDescription').innerHTML = this.minutesLeft == 1 ? "Minúta" : (this.minutesLeft > 1 && this.minutesLeft < 5 ? "Minúty" : "Minút");
      document.getElementById('secondsLeftDescription').innerHTML = this.secondsLeft == 1 ? "Sekunda" : (this.secondsLeft > 1 && this.secondsLeft < 5 ? "Sekundy" : "Sekúnd");

    }, 1000);
  }

  function stopCountdown() {
    if(this.weddingDate.getTime() - new Date().getTime() < 0) {
      //skryt div s casomierou a napisat daco jak ze wedding started
    }
  }

  this.countdown();
</script>
  