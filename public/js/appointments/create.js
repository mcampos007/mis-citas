let $doctor, $date, $speciality,$hours;

const noHoursAlert = `<div class="alert alert-danger" role="alert">
    <strong>Lo Lamento!</strong> No hay turnos disponibles para el medico en el día seleccionado!
</div>`

$(function() {
  
  $speciality = $('#speciality');
  $doctor = $('#doctor');
  $date = $('#date');
  $hours = $('#hours');

  $speciality.change(() => {
      specialityId = $speciality.val();
      const url = `/specialities/${specialityId}/doctors`;
      $.getJSON(url,onDoctorsLoaded)
      
    });

  $doctor.change(loadHours);

  $date.change(loadHours);
});

function onDoctorsLoaded(doctors) {
    let htmlOptions = '';
      doctors.forEach(doctor =>{
        htmlOptions +=`<option value="${doctor.id}"> ${doctor.name}</option>`;

      });
      $doctor.html(htmlOptions);
      loadHours();

}

function loadHours(){
  const selectedDate = $date.val();
  const doctorId = $doctor.val();
  const url = `/schedule/hours?date=${selectedDate}&doctor_id=${doctorId}`;
  $.getJSON(url,displayHours); 
}

function displayHours(data){
  
  if (!data.morning && !data.aftenoon){
      $hours.html(noHoursAlert);
    return;
    }

    let htmlHours = '';
    iRadio = 0;
  if (data.morning) {
    const morning_intervals = data.morning;
    morning_intervals.forEach(interval => {
      htmlHours += getRadioIntervalHtml(interval);
    });
  }
  
  if (data.afternoon) {
    const afternoon_intervals = data.afternoon;
    afternoon_intervals.forEach(interval => {
      htmlHours += getRadioIntervalHtml(interval);
    });
  }
  $hours.html(htmlHours);

}

function getRadioIntervalHtml(interval){
  const text = `${interval.start} - ${interval.end}`;

  return `<div class="custom-control custom-radio mb-3">
<input name="scheduled_time" value="${interval.start}" class="custom-control-input" id="interval${iRadio}" type="radio" required>
<label class="custom-control-label" for="interval${iRadio++}">${text}</label>
</div>`;
 
}